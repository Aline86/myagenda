<?php require 'header.php';?>

<div class="container">
    <div class="event">
            <form  method="POST" enctype="multipart/form-data" action="index.php?controller=agenda&action=publish_agenda">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>" />
                <br />
                <input type="text" name="titre" placeholder="titre"/>
                <br />
                <textarea name="description" placeholder="description de l'évènement"></textarea>
                <br />
                <input type="date" name="date" />
                <br />
                <input type="text" name="time" placeholder="horaire" />
                <br />
                <input class="pic" name="image" type="file" accept=".png,.jpg,.jpeg"  multiple />
                <br />
                <input type="submit" />
            </form>
            <?php if(isset($erreur)){
                if($erreur==1){
                echo 'Veuillez remplir tous les champs';
                }
            }
            ?>
        </div>
    </div>
</div>
