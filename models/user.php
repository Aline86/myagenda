<?php
require_once 'connection.php';
  class User {
    public $id_user;
    public $pseudo;
    public $login;
    public $password;
    
    public function __construct($id_user, $pseudo, $login, $password)
    {
      $this->id_user=$id_user;
      $this->pseudo=$pseudo;
      $this->login=$login;
      $this->password=$password;
    }
    public static function add($pseudo, $login, $password)
    {
        require_once 'connection.php';
        $db = Db::getInstance();
        $q = $db->prepare('INSERT INTO user(pseudo, login, password) VALUES(:pseudo, :login, :password)');

        $q->bindValue(':pseudo', $pseudo);
        $q->bindValue(':login', $login);
        $q->bindValue(':password', $password);
        $q->execute();   
        ob_start();
        $_SESSION['id']=$db->lastInsertId();
    }
    public static function check_login($login){
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM user WHERE login="'.$login.'"');
     
        $count=$q->rowCount();
        if($count<1){
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
                {
                    return FALSE;
                }
        }else{
            return TRUE;
        }
    }
    public static function check_user($login, $password){
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM user WHERE login="'.$login.'"');
        $q->execute();
        $user_id = $q->fetch();
        $pwdHash = $user_id['password'];
        if(($login==$user_id['login']) && password_verify($password, $pwdHash)){
            
            $_SESSION['id']=$user_id['id_user'];
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public static function update($id_user, $login, $password, $pseudo)
    {   require_once 'connection.php';
        $db = Db::getInstance();

        $requete='UPDATE user SET login="'.$login.'", password="'.$password.'", pseudo="'.$pseudo.'" WHERE id_user="'.$id_user.'"';
        $db->query($requete);
        
    }
    public static function get_user($id){
        $db = Db::getInstance();
        $requete='SELECT * FROM user WHERE id_user="'.$id.'"';
        $resultat=$db->query($requete);
        $resultat->execute();
        $user=[];
        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC))
            {
               $user[] = new User(utf8_encode($donnees['id_user']), utf8_encode($donnees['login']),  utf8_encode($donnees['password']), utf8_encode($donnees['pseudo']));
            }
        return $user;
    }   

}  