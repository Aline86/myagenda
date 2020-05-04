<?php
class LogoutController{
    public function logout(){
   
        unset($_SESSION['id']);
        $agendas=Agenda::get_all();
        require_once('views/pages/index.php');
    }
}