<?php require_once "utils/redirection.php"; ?>
<?php require_once "includes/header.php";?>

<div class="container">
    <main class="contenido-principal">
        <h1 style="margin-right: 0.3rem; display: inline-block; margin-bottom: 1rem;">Crear entrada</h1>
        <p style="padding-bottom: 2rem;">Crea una nueva entrada para que el resto de usuarios pueda verla</p>
        <form action="guardar_entrada.php" method="post">
            <div>
                <div class="label-form">
                    <label>Titulo</label>
                    <input type="text" name="titulo">
                </div>

                <div class="label-form">
                    <label>Descripcion</label>
                    <textarea style="resize: none;" name="descripcion" cols="30" rows="6"></textarea>
                </div>
                
                <div class="label-form">
                    <label>Categoria</label>
                    <select name="categoriaId">
                        <?php 
                        $categorias = getCategorias($db);
                        while($categoria = mysqli_fetch_assoc($categorias)): 
                        ?>
                            <option value="<?= $categoria["id"] ?>"><?= $categoria["nombre"] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
                
                <button style="margin-top: 0; width: 100%; font-size: 1rem;" class="bg-primary datos_form_button">Crear</button>
            </form>
        </main>
        
        <?php require_once "includes/aside.php"; ?>
    </div>
    
    <?php require_once "includes/footer.php" ?>