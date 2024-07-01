<?php
$server = "localhost";
$database = "rentodb";
$username = "root";
$password = "";
$koneksidb = mysqli_connect($server, $username,
 $password, $database);

 if($koneksidb){
    echo "";
    }else{
    echo "Gagal terhubung";
    }    
?>