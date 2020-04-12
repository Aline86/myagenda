<?php
class LogoutController{
    public function logout(){
        session_start();
        unset($_SESSION['id']);
        header('Location: index.php?controller=pages&action=home');
    }
}