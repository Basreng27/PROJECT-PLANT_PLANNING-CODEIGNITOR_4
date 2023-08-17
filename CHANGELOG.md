CREATE TABLE semprot (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    semprot_ke INT,
    waktu VARCHAR(25),
    id_tanaman INT,
    lama INT,
    status INT,
    FOREIGN KEY (id_tanaman) REFERENCES tanamans(id_tanaman) ON UPDATE CASCADE ON DELETE CASCADE
);
