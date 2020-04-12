<?php 
require_once 'connection.php';

class Agenda {
    public $id_agenda;
    public $id_user;
    public $titre;
    public $description;
    public $date;
    public $heure;
    public $image;
    
    public function __construct($id_agenda, $id_user, $titre, $description, $date, $heure, $image )
    {
      $this->id_agenda=$id_agenda;
      $this->id_user=$id_user;
      $this->titre=$titre;
      $this->description=$description;
      $this->date=$date;
      $this->heure=$heure;
      $this->image=$image;
    }
    public static function get_all(){
        $db = Db::getInstance();
        $requete='SELECT * FROM agenda ORDER BY date asc';
        $resultat=$db->query($requete);
        $resultat->execute();
        $agendas=[];
        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC))
            {
                $agendas[] = new Agenda(utf8_encode($donnees['id_agenda']), utf8_encode($donnees['id_user']),  utf8_encode($donnees['titre']), utf8_encode($donnees['description']), utf8_encode($donnees['date']), utf8_encode($donnees['heure']), utf8_encode($donnees['image']));
            }
        return $agendas;
    }  
    public static function get_agenda($id){
        $db = Db::getInstance();
        $requete='SELECT * FROM agenda WHERE id_agenda="'.$id.'"';
        $resultat=$db->query($requete);
        $resultat->execute();
        $agenda=[];
        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC))
            {
               $agenda[] = new Agenda(utf8_encode($donnees['id_agenda']), utf8_encode($donnees['id_user']),  utf8_encode($donnees['titre']), utf8_encode($donnees['description']), utf8_encode($donnees['date']), utf8_encode($donnees['heure']), utf8_encode($donnees['image']));
            }
        return $agenda;
    }   
    public static function get_user_agenda($id){
        $db = Db::getInstance();
        $requete='SELECT * FROM agenda WHERE id_user="'.$id.'"';
        $resultat=$db->query($requete);
        $resultat->execute();
        $agenda=[];
        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC))
            {
               $agenda[] = new Agenda(utf8_encode($donnees['id_agenda']), utf8_encode($donnees['id_user']),  utf8_encode($donnees['titre']), utf8_encode($donnees['description']), utf8_encode($donnees['date']), utf8_encode($donnees['heure']), utf8_encode($donnees['image']));
            }
        return $agenda;
    }   
    public static function add($id_user, $titre, $description, $date, $heure, $image)
    {
        require_once 'connection.php';
        $db = Db::getInstance();
        $q = $db->prepare('INSERT INTO agenda(id_user, titre, description, date, heure, image)  VALUES(:id_user, :titre, :description, :date, :heure, :image) ');

        $q->bindValue(':id_user', $id_user);
        $q->bindValue(':titre', $titre);
        $q->bindValue(':description', $description);
        $q->bindValue(':date', $date);
        $q->bindValue(':heure', $heure);
        $q->bindValue(':image', $image);
        $q->execute();   
    }
    public static function delete($id)
    {
        $db = Db::getInstance();
        $db->exec('DELETE FROM agenda_comment WHERE id_agenda = '.$id);
        $db->exec('DELETE FROM agenda WHERE id_agenda = '.$id);
    }
    public static function update( $titre, $description, $date, $heure, $image, $id_agenda)
    {   require_once 'connection.php';
        $db = Db::getInstance();

        $requete='UPDATE agenda SET titre="'.$titre.'", description="'.$description.'", date="'.$date.'", heure="'.$heure.'", image="'.$image.'" WHERE id_agenda="'.$id_agenda.'"';
        $db->query($requete);
        
    }
}