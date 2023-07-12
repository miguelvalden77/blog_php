<?php require_once "./utils/helpers.php" ?>

<section class="comment_section">

    <form class="comment_form" action="guardar_comentario.php" method="post">
        <input class="comment_input" type="text" name="comentario">
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


