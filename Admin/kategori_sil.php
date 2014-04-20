<?php


include_once '../models/Admin.php';
include_once  '../models/Kategori.php';

$Admin = new Admin();
$Kategori = new Kategori();

//eğer daha önce ziyaretçi login olmadıysa
if ( $Admin->isLogined() == false ){
    header('Location: login.php');
    exit;
}

if( isset($_GET['id']) ){
    $delete_result = $Kategori->delete($_GET['id']);
    if( $delete_result == true ){
        header('Location:kategori_liste.php?delete=ok');
        exit;
    }else{
        header('Location:kategori_liste.php?delete=notok');
        exit;
    }
}

header('Location:kategori_liste.php ');
exit;