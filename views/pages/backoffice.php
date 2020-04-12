<?php 
ob_start();
 require 'header.php'; 
?>
<div class="container">
    <a class="publish" href="index?controller=agenda&action=form_agenda">Publier un évènement</a>
    <div class="event">
    <?php 

    foreach($agenda_user as $agenda){
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col"><img src="<?php echo $agenda->image;?>" /><?php echo utf8_decode($agenda->titre);?></th>
                </tr>
            </thead>
            <tbody>
                <tr> <td><a class="space" href="index.php?controller=agenda&action=form_modify_agenda&id_agenda=<?php echo $agenda->id_agenda.' '; ?>">Modifier</a> <a href="index.php?controller=agenda&action=delete_agenda&id_agenda=<?php echo $agenda->id_agenda; ?>">Supprimer</a></td>
                <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>