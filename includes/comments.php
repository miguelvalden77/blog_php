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
        if (!empty($comentarios)) :
            while ($comentario = mysqli_fetch_assoc($comentarios)) :
        ?>
                <div class="comment_post">
                    <p style="padding-bottom: 0.25rem; color: rgb(9, 58, 219)"><?= $comentario["nombre"] ?></p>
                    <p style="display: inline-block;"><?= $comentario["comentario"] ?></p>
                    <?php if ($_SESSION["usuario"]["id"] == $comentario["usuarioId"]) : ?>
                        <a href="borrar_comentario.php?id=<?= $comentario["id"] ?>">
                            <button style="border: none; color: whitesmoke; display: inline-block; margin-left: 0.5rem" class="datos_button bg-red">Eliminar</button>
                        </a>
                    <?php endif; ?>
                </div>
        <?php
            endwhile;
        endif;
        ?>

    </section>

    <script>
        const comment = document.getElementById("comment_input")
        const caracteres = document.getElementById("caracteres")

        comment.addEventListener("input", (evt) => {
            if (evt.target.value.length >= 101) {
                comment.value = evt.target.value.slice(0, 100)
                return
            }
            caracteres.textContent = evt.target.value.length
        })
    </script>