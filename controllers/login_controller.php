<?php 
session_start();
class LoginController {
    public function accountcreation(){
        require_once('views/pages/account_creation.php');
    }
    public function checkdata(){
        $pseudo=isset($_POST['pseudo'])?$_POST['pseudo']:"";
        $login=isset($_POST['login'])?$_POST['login']:"";
        $password=isset($_POST['password'])?$_POST['password']:"";
        $passwordconfirmation=isset($_POST['passwordconfirmation'])?$_POST['passwordconfirmation']:"";
        if($password==$passwordconfirmation){
            $checkresult=User::check_login($login);
            if($checkresult==FALSE){
                $password=isset($passwordconfirmation)?password_hash($_POST['password'], PASSWORD_DEFAULT):"";
                User::add($pseudo, $login, $password);
                $agendas=Agenda::get_all();
                require_once('views/pages/index.php');
            }else{
                $erreur=2;
                require_once('views/pages/account_creation.php');
            }
        }else{
            $erreur=1;
            require_once('views/pages/account_creation.php');
        }
    }
    public function connexioncheck(){
        $login=isset($_POST['login'])?$_POST['login']:"";
        $password=isset($_POST['password'])?$_POST['password']:"";
        if($login!="" && $password!=""){
            $logincheck=User::check_user($login, $password);
            if($logincheck==TRUE){
                $agendas=Agenda::get_all();         
                require_once('views/pages/index.php');
            }else{
                $erreur=1;
                $agendas=Agenda::get_all(); 
                require_once('views/pages/index.php');
            }
        }else{
            $erreur=1; 
            $agendas=Agenda::get_all();
            require_once('views/pages/index.php');
        }
    }
    public function edit_profile(){
        $id_user=$_SESSION['id'];
        require_once('views/pages/update_profile.php');
    }
    public function update_profile(){
        echo $id_user=$_SESSION['id'];
        $pseudo=isset($_POST['pseudo'])?$_POST['pseudo']:"";
        $login=isset($_POST['login'])?$_POST['login']:"";
        $password=isset($_POST['password'])?password_hash($_POST['password'], PASSWORD_DEFAULT):"";
        if($login!="" AND $pseudo!="" AND $password!=""){
            $checkresult=User::check_login($login);
                if($checkresult==FALSE){
                    User::update($id_user, $login, $password, $pseudo);
                    $agendas=Agenda::get_all();         
                    require_once('views/pages/index.php');
                }else{
                    $erreur=1;
                    require_once('views/pages/update_profile.php');
                }
            }else{
                $erreur=2;
                require_once('views/pages/update_profile.php');
            }
        }
    }