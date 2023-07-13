    
<?php require_once "./utils/helpers.php" ?>

<section class="comment_section">

    <form class="comment_form" action="guardar_comentario.php" method="post">
        <small class="caracteres" id="caracteres">0</small>
        <input class="comment_input" type="text" name="comentario" id="comment_input">
        <input type="hidden" name="postId" value="<?= $entrada["id"] ?>">
        <button class="bg-primary">Comentar</button>
    </form>

    <?php 
        $comentarios = getComments($db, $entrada["id"]);
        if(!empty($comentarios)):
        while($comentario = mysqli_fetch_assoc($comentarios)) :
            ?>
        <p><?= $comentario["comentario"] ?></p>
    <?php 
        endwhile;
        endif; 
        ?>

</section>

<script>      
    const comment = document.getElementById("comment_input")
    const caracteres = document.getElementById("caracteres")
                
    comment.addEventListener("input", (evt)=>{
        if(evt.target.value.length >= 31){
            comment.value = evt.target.value.slice(0, 30)
            return
        }
        caracteres.textContent = evt.target.value.length
    })
</script>
