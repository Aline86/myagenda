<div class="container">
    <div class="title">
    <h1>My Agenda</h1>
    </div>
<?php
if(isset($_SESSION['id'])){
    ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=pages&action=home">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=login&action=edit_profile">Modifier son profil</a>
        </li>
    </ul>
    <li class="nav-item">
        <a class="nav-link" href="index.php?controller=agenda&action=show_back">Backoffice</a>
    </li>
    <div class="text_content" id="text">Déconnexion</div>
    <li class="nav-item">
        <a href="index.php?controller=logout&action=logout" id="logout"><i class="fas fa-times"></i></a>
    </li>
    </div>
</nav>
<?php
}else{
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=pages&action=home">Accueil</a>
            </li>
        </ul>
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=login&action=accountcreation">Créer un compte</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" id="Bouton" href="#">Connexion</a>
        </li>
        </div>
    </nav>
    <div id="form" style="display:none" class="form">
        <form action="index.php?controller=login&action=connexioncheck" method="POST">
            <input class="input" type="text" placeholder="Login" name="login">
            <input class="input" type="password" placeholder="Password" name="password">
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
<?php
}
?>
</div>
</div>
<script>
    var js = document.createElement('script');
    js.type = 'text/javascript';
    js.src = 'script/connexion.js' ;
    //Ajout de la balise dans la page
    document.body.appendChild(js);
</script> 