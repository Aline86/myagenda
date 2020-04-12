<?php 

require_once 'connection.php';
ob_start();
class AgendaComment {
    public $id_comment;
    public $id_agenda;
    public $id_user;
    public $commentaire;
    public $date;
    public $heure;
    
    public function __construct($id_comment, $id_agenda, $id_user, $commentaire, $date, $heure)
    {
      $this->id_comment=$id_comment;
      $this->id_agenda=$id_agenda;
      $this->id_user=$id_user;
      $this->commentaire=$commentaire;
      $this->date=$date;
      $this->heure=$heure;
    }
    public static function count_comment($id){
        $db = Db::getInstance();
        $requete='SELECT count(id_agenda) as total FROM agenda_comment WHERE id_agenda="'.$id.'"ORDER BY date desc';
        $resultat=$db->query($requete);
        $resultat->execute();
        while ($comment = $resultat->fetch(PDO::FETCH_ASSOC))
            {
            
              $comments[] = new AgendaComment(utf8_encode($comment['id_comment']),utf8_encode($comment['id_agenda']),  utf8_encode($comment['id_user']), utf8_encode($comment['commentaire']), utf8_encode($comment['date']), utf8_encode($comment['heure']));
            }
        return $comments;
    } 
    public static function get_all($id_agenda){
        $db = Db::getInstance();
      
        $requete='SELECT * FROM agenda_comment WHERE id_agenda = "'.$id_agenda.'" ORDER BY date desc';
        $resultat=$db->query($requete);
        $resultat->execute();
        $comments=[];
        while ($comment = $resultat->fetch(PDO::FETCH_ASSOC))
            {
              $comments[] = new AgendaComment(utf8_encode($comment['id_comment']),utf8_encode($comment['id_agenda']),  utf8_encode($comment['id_user']), utf8_encode($comment['commentaire']), utf8_encode($comment['date']), utf8_encode($comment['heure']));
            }
        return $comments;
    }
    public static function comment($id){
      $db = Db::getInstance();
      $requete='SELECT * FROM agenda_comment WHERE id_agenda="'.$id.'" ORDER BY date desc';
      $resultat=$db->query($requete);
      $resultat->execute();
      $comments=[];
      while ($comment = $resultat->fetch(PDO::FETCH_ASSOC))
          {
              
              $comments[] = new AgendaComment(utf8_encode($comment['id_comment']),utf8_encode($comment['id_agenda']),  utf8_encode($comment['id_user']), utf8_encode($comment['commentaire']), utf8_encode($comment['date']), utf8_encode($comment['heure']));
          }
      return $comments;
    } 
    public static function add_comment($id_agenda, $id_user, $commentaire, $date, $heure){
        require_once 'connection.php';
        $db = Db::getInstance();
        $q = $db->prepare('INSERT INTO agenda_comment(id_agenda, id_user, commentaire, date, heure) VALUES(:id_agenda, :id_user, :commentaire, :date, :heure)');

        $q->bindValue(':id_agenda', $id_agenda);
        $q->bindValue(':id_user', $id_user);
        $q->bindValue(':commentaire', $commentaire);
        $q->bindValue(':date', $date);
        $q->bindValue(':heure', $heure);
        $q->execute();   
    } 
      
}