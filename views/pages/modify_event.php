<?php require 'header.php'; ?>
<div class="container">
    <div class="event">
        <form method="POST" enctype="multipart/form-data" action="index.php?controller=agenda&action=update_agenda">
        <?php foreach($agenda as $modify){?>
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>" />
            <input type="hidden" name="id_agenda" value="<?php echo utf8_decode($modify->id_agenda) ?>" />
            <br />
            <input type="text" name="titre" value="<?php echo utf8_decode($modify->titre) ?>"  />
            <br />
            <textarea name="description" placeholder="Votre texte"></textarea>
            <br />
            <input type="date" name="date" value="<?php echo utf8_decode($modify->date) ?>"  />
            <br />
            <input type="text" name="time" value="<?php echo utf8_decode($modify->heure)?>"  />
            <br />
            <input name="image" class="pic" type="file" accept=".png,.jpg,.jpeg"  multiple value="<?php echo $modify->image ?>"  />
            <br />
            <input type="submit" />
            <?php }?>
        </form>
    </div>
</div>