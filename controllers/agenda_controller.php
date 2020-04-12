<?php
header('Content-type: text/html; charset=UTF-8');
session_start();

     function traitementImage($str, $fichierLieu, $fichierType){
        $stri = strip_tags($str); 
        $stri = preg_replace('/[\r\n\t ]+/', ' ', $str);
        $stri = preg_replace('/[\"\*\/\:\<\>\?\'\|]+/', ' ', $str);
        $stri = strtolower($str);
        $stri = html_entity_decode( $str, ENT_QUOTES, "utf-8" );
        $stri = htmlentities($str, ENT_QUOTES, "utf-8");
        $stri = preg_replace("/(&)([a-z])([a-z]+;)/i", '$2', $str);
        $stri = str_replace(' ', '-', $str);
        $stri = rawurlencode($str);
        $stri = str_replace('%', '-', $str);
        if( !strstr($fichierType, 'jpg') && !strstr($fichierType, 'jpeg') && !strstr($fichierType, 'png')){
            echo "";
            }
        $tmp_file = $fichierLieu;
        $name_file = $stri;
        if(move_uploaded_file($tmp_file,'./images/'.$name_file)) {
            echo "";
        }
        $tmp_file='./images/';
        $link=$tmp_file.$name_file;
            return $link;
    }


class AgendaController{
    public function show_agenda() {
        $id=isset($_GET['id_agenda'])?$_GET['id_agenda']:"";
        $agenda=Agenda::get_agenda($id);
        $comments=AgendaComment::comment($id);
        require_once('views/pages/detail.php');
    }
    public function show_back(){
        $id=$_SESSION['id'];
        $agenda_user=Agenda::get_user_agenda($id);
        require_once('views/pages/backoffice.php');
    }
    public function publish_agenda(){
        $id_user=isset($_POST['id_user'])?$_POST['id_user']:"";
        $titre=isset($_POST['titre'])?$_POST['titre']:"";
        $description=isset($_POST['description'])?$_POST['description']:"";
        $date=isset($_POST['date'])?$_POST['date']:"";
        $heure=isset($_POST['time'])?$_POST['time']:"";
        
        $image=isset($_FILES['image'])?traitementImage($_FILES['image']['name'], $_FILES['image']['tmp_name'], $_FILES['image']['type']):"";
        if($titre!="" AND $description!="" AND $date!="" AND $heure !=""){
            Agenda::add($id_user, $titre, $description, $date, $heure, $image);
            $agenda_user=Agenda::get_user_agenda($_SESSION['id']);
            require_once('views/pages/backoffice.php');
        }else{
            $erreur=1;
            require_once('views/pages/publish_event.php');
        }
    }
    public function form_agenda(){
        require_once('views/pages/publish_event.php');
    }
    public function update_agenda(){
        $id_agenda=isset($_POST['id_agenda'])?$_POST['id_agenda']:"";
        $titre=isset($_POST['titre'])?$_POST['titre']:"";
        $description=isset($_POST['description'])?$_POST['description']:"";
        $date=isset($_POST['date'])?$_POST['date']:"";
        $heure=isset($_POST['heure'])?$_POST['heure']:"";
        $image=isset($_FILES['image'])?traitementImage($_FILES['image']['name'], $_FILES['image']['tmp_name'], $_FILES['image']['type']):"";
       
        Agenda::update( $titre, $description, $date, $heure, $image, $id_agenda);
        $agenda_user=Agenda::get_user_agenda($_SESSION['id']);
        require_once('views/pages/backoffice.php');
    }
    public function form_modify_agenda(){
        $id_agenda=isset($_GET['id_agenda'])?$_GET['id_agenda']:"";
        $agenda=Agenda::get_agenda($id_agenda);
        require_once('views/pages/modify_event.php');
    }
    public function delete_agenda(){
        $id_agenda=isset($_GET['id_agenda'])?$_GET['id_agenda']:"";
        Agenda::delete($id_agenda);
        $agenda_user=Agenda::get_user_agenda($_SESSION['id']);
        require_once('views/pages/backoffice.php');
    }
}