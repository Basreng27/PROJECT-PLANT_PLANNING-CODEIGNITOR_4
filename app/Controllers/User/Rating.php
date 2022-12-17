<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Rating_model;

class Rating extends BaseController
{
    protected $RatingModel;

    public function __construct()
    {
        $this->RatingModel = new Rating_model();
    }

    public function prosesRating()
    {
        if (session()->get('stat') != 'login-user') {
            return redirect('/');
        }

        $id_madu = $this->request->getVar('id_madu');
        $id_user = $this->request->getVar('id_user');
        $rating = $this->request->getVar('rating');
        $komen = $this->request->getVar('komen');

        $check = $this->RatingModel->getRating($id_madu, $id_user);
        if (!empty($check)) {
            $getData = $this->RatingModel->getRating($id_madu, $id_user);
            $this->RatingModel->save([
                'id_rating' => $getData['id_rating'],
                'id_user' => $id_user,
                'id_madu' => $id_madu,
                'rating' => $rating,
                'komen' => $komen
            ]);
        } else {
            $this->RatingModel->save([
                'id_user' => $id_user,
                'id_madu' => $id_madu,
                'rating' => $rating,
                'komen' => $komen
            ]);
        }

        return redirect()->to('/pesanan-user');
    }
}
