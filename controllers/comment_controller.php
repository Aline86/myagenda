<?php 

class CommentController{

    public function show_comment() {
        session_start();
        $id_agenda=isset($_GET['id_agenda'])?$_GET['id_agenda']:"";
        $comments=AgendaComment::get_all($id_agenda);
        require_once('views/pages/comments.php');   
    }
    public function publish_comment(){
        session_start();
        $id_agenda=isset($_POST['id_agenda'])?$_POST['id_agenda']:"";
        $id_user=$_SESSION['id'];
        $commentaire=isset($_POST['commentaire'])?$_POST['commentaire']:"";
        date_default_timezone_set("Europe/Amsterdam"); 
        $date=date("Y-m-d");
        $heure=date("h:i:s"); 
        if($commentaire!=""){
            AgendaComment::add_comment($id_agenda, $id_user, $commentaire, $date, $heure);
            $id_agenda=isset($_POST['id_agenda'])?$_POST['id_agenda']:"";
            $comments=AgendaComment::get_all($id_agenda);
            require_once('views/pages/comments.php'); 
        }
    }
}