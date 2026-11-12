<?php
    $is_register = $_COOKIE['is_register'] ?? true;

    function register()
    {

    }
?>

<style>
    .h3-form
    {
        font-size: 3rem;
    }
    .full-page
    {
        height: 90vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 3rem;
        border: 1px solid var(--hover-color);
    }
    .form_container
    {
        display: flex;
        padding: 4rem;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 1rem;
        min-width: 40vw;

    }
    .form_container input {
        padding: 0.6rem 1.5rem;
        border-radius: 0.4rem;
        border: none;
        width: 100%;
        font-family: var(--text-font);
    }
    .form-btn
    {
        max-width: 50%;
    }
</style>
<section class="full-page">
    <h3 class="h3-form"><?php echo $is_register ? 'Registrarse' : 'Iniciar Sesión' ;?></h3>
    <form class="form_container" method="post">
        <?php
          if  ($is_register) echo '<input name="name" type="text" placeholder="Nombre">';
        ?>
        <input name="email" type="email" placeholder="Email">
        <input name="password" type="password" placeholder="Contraseña" >
        <input class="form-btn btn btn-sm" type="button" value="Enviar">
        <input type="button" class="form-btn btn-transparent" value="Inicio Sesion">
    </form>
</section>
