<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include_once '../models/Admin.php';
$Admin= new Admin();


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body>
         <?php include_once './inc/body_top.php'; ?>
        <?php
if ( $Admin->isLogined() == false ){
?>
        <div>
            <a href="login.php">Giriş için tıklayınız</a>
            
            
        </div>
        <?php
}else
{?>
        <div>
            <a href="kategori_ekle.php">Kategori Ekle</a>
            <br>
            <a href="yayin_ekle.php">Yayin Ekle</a>
            
        </div>
        <div>
            Toplam Yorum Sayısı: 
            <br>
            Toplam Yayin Sayısı:
            <br>
            Toplam Kategori Sayısı:
            <br>
            
        </div>
        <?php
        
}
?>
    </body>
</html>
