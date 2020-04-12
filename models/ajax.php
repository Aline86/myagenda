
<?php 
require_once '../connection.php';

    $id=isset($_GET['nb'])?$_GET['nb']:"";
    $db = Db::getInstance();
    $requete='SELECT count(id_comment) as total FROM agenda_comment INNER JOIN agenda ON agenda.id_agenda=agenda_comment.id_agenda WHERE agenda.id_agenda="'.$id.'"';
    $resultat=$db->query($requete);
    $resultat->execute();
    while ($comment = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            echo $comment['total'];
        }
    
