<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<!-- <div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Chat
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body"> -->
<!-- chat start -->
<div class="container">
    <div class="row">
        <div class="col-12 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Chat</h3>
                <hr>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 mb-3">
                        <ul id="user-list" class="list-group"></ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="message-holder">
                                    <div id="messages" class="row"></div>
                                </div>
                                <div class="form-group">
                                    <textarea id="message-input" class="form-control" name="" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button id="send" class="btn float-right  btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // console.log(location.host)
    // var conn = new WebSocket('ws://localhost:8080');
    var conn = new WebSocket("ws://" + location.host + "/");
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onmessage = function(e) {
        console.log(e.data);
    };
</script>
<!-- chat end -->
<!-- </div> -->
<?= $this->endSection(); ?>