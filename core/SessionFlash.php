<?php 

class SessionFlash 
{
    static function setSessionFlash($key , $value){
        $_SESSION['FLASH'][$key] = $value;
    }

    
    static function getSessionFlash($key) {
        $value = $_SESSION['FLASH'][$key] ?? null;
        unset($_SESSION['FLASH'][$key]);
        return $value;
    }

    static function hasSessionFlash($key){
        if(isset($_SESSION['FLASH'][$key])){
            return true;
        }
        return false;
}}


?>
