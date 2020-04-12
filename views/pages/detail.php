<?php require 'header.php'; ?>
<div class="container">

    <?php 
    foreach($agenda as $showagenda){ 
        ?>
    <div class="card col-12">
    <img src="<?php echo $showagenda->image; ?>" class="card-img-top" alt="image">
    <div class="card-body">
        <h5 class="card-title"><?php echo utf8_decode($showagenda->titre); ?></h5>
        <p class="card-text"><?php echo utf8_decode($showagenda->description).'<br />'.$showagenda->date.' '.$showagenda->heure; ?></p>
        <?php }  
        foreach($comments as $comment){
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Commentaire en lien avec cet article :</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?php echo $comment->commentaire;?></td> 
                </tr>
                <tr>
                <td><?php echo $comment->date.' '.$comment->heure.' ';?></td> 
                </tr>
                <?php } ?> 
                <?php if(isset($_SESSION['id'])){?>
                <td><button id="write_comment">Ecrire un commentaire</button>
                <div id="publish" style="display:none">
                    <form method="POST" action="index.php?controller=comment&action=publish_comment">
                        
                        <textarea name="commentaire" placeholder="commentaire"></textarea>
                        <br />
                        <input type="hidden" name="id_agenda" value="<?php echo $id; ?>"  />
                        </br />
                        <input type="submit" />
                    </form>
                </div>
                </td>
                <?php } ?>
            </tbody>
        </table>
    </div>
  
    </div>
    <script>
        document.querySelectorAll('button').forEach(eleme =>{
        eleme.addEventListener('click', function(){
        childs=eleme.nextElementSibling
        if(childs.style.display=="block"){
            childs.style.display="none"
        }else{
            childs.style.display="block"  
        }
    })})
    </script>