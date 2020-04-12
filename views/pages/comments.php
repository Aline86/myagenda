
<?php 

 require 'header.php'; 
?>
<div class="container">

    <div class="comment">
        <?php 
        foreach($comments as $comment){
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col"><?php echo utf8_decode($comment->commentaire);?> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?php echo $comment->date.' '.$comment->heure.' ';?></td> 
                
                <?php } ?>  
                </tr>
                <?php
                if(isset($_SESSION['id'])){?>
                <td><button id="write_comment">Ecrire un commentaire</button>
                <div id="publish" style="display:none">
                    <form method="POST" action="index.php?controller=comment&action=publish_comment">
                        <input type="hidden" name="id_agenda" value="<?php echo $id_agenda; ?>"  />
                        <input type="hidden" name="id_user" value="<?php echo $id_user=isset($_SESSION['id'])? $_SESSION['id']:"" ; ?>"  />
                        <textarea name="commentaire" placeholder="commentaire"></textarea>
                        <br />
                        <input type="submit" />
                    </form>
                </div>
                </td>
                <?php } ?>
            </tbody>
        </table>
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