<?php
    include('koneksi.php');

    
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repeatpassword = $_POST['repeatpassword'];
        $status = $_POST['status'];

        // Validasi jika kolom kosong
        if(empty($username) || empty($password) || empty($repeatpassword) || empty($status)){
            header("Location:register.php?notif=kosong");
            exit;
        }

        // Pengecekan apakah kedua password cocok
        if($password !== $repeatpassword){
            header("Location:register.php?notif=password");
            exit;
        }

        // Hash password
        $md5password = md5($password);

        // Masukkan data ke database
        $sql = "INSERT INTO `user` (`username`, `password`, `status`) VALUES ('$username', '$md5password', '$status')";
        $query = mysqli_query($koneksi, $sql);

        if($query){
            header("Location:register.php?notif=berhasil");
        } else {
            header("Location:register.php?notif=gagal");
        }
    
?>
