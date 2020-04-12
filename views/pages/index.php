<?php ob_start(); require 'header.php'; ?>
<div class="container">
    <div class="event">
    <?php 
        if(isset($erreur)){
            if($erreur==1){
            echo 'Vos identifiants ne sont pas corrects';
            }
        }
    foreach($agendas as $agenda){
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col"><img src="<?php echo $agenda->image;?>" /><?php echo utf8_decode($agenda->titre);?> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?php echo $agenda->date.' '.$agenda->heure.' ';?><a href="index.php?controller=agenda&action=show_agenda&id_agenda=<?php echo $agenda->id_agenda; ?>">détail</a></td>   
                </tr>
                <tr> <td><a href="index.php?controller=comment&action=show_comment&id_agenda=<?php echo utf8_decode($agenda->id_agenda); ?>" ><span class="comment" style="display: none" ><?php echo $agenda->id_agenda; ?></span></a></td>
                <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'footer.php' ?>


<script>
   var js = document.createElement('script');
   js.type = 'text/javascript';
   js.src = 'script/index.js' ;
   //Ajout de la balise dans la page
   document.body.appendChild(js);
</script> 
       