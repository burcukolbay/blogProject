<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Member
 *
 * @author burcu
 */
class Admin {
    public $con;
    
    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", "", "blog");
    }
    
    
    public function login($email,$sifre) {        
        $sql = 'SELECT * '
                . "FROM kullanici "
                . "WHERE email='$email'";

        //veritabanında $sql değişkeni içindeki sorgu çalıştırıldı
        $Result = mysqli_query($this->con, $sql);
        $queryResult= mysqli_fetch_row($Result);
//email var mı?
        if ( is_null($queryResult) ){
            return array(false, 'Email is wrong!');
        }
        
        $sql = ' SELECT * FROM kullanici'
                . " WHERE email='$email' AND sifre='$sifre'";
$Result = mysqli_query($this->con, $sql);
        $queryResult= mysqli_fetch_row($Result);

        //bir önceki sqlde yer alan şifre doğru mu?
        if ( is_null($queryResult) ){
            return array(false, 'Password is wrong!');
        }
        
        $loginResult = true;
        $_SESSION['login'] = 1;
        return array(true);
    }
   
    
    
    
    public function logout() {
        unset($_SESSION['login']);
        return true;
    }
    
    /**
     * Oturum açılıp açılmadığını kontrol eden method.
     * @return boolean
     */
    public function isLogined(){
        if ( isset($_SESSION['login']) && $_SESSION['login'] == 1 ){
            return true;
        }else{
            return false;
        }
    }
   
    
}


