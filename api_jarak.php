<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_alat = $_POST['nama_alat'];
    $keterangan_alat = $_POST['keterangan_alat'];
    $nilai = $_POST['nilai'];

    if (!empty($nilai) && !empty($nama_alat) && !empty($keterangan_alat)) {
        $sql = "INSERT INTO tampung_data_device (nama_alat, keterangan_alat, nilai) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "ssd", $nama_alat, $keterangan_alat, $nilai);

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(["status" => "success", "message" => "Data berhasil disimpan"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Gagal menyimpan data"]);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(["status" => "error", "message" => "Data tidak valid"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Request tidak valid"]);
}

mysqli_close($koneksi);
?>
