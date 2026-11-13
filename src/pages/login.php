<?php

    if (isset($_GET['action']) && ($_GET['action'] === 'login'|| $_GET['action'] === 'register') )
    {
        $newVal = ($_GET['action'] === 'register') ? '1' : '0';
        setCookie('is_register', $newVal, time() + (60 * 60 * 24 * 30));

        $page = $_GET['page'] ?? '/login';
        header('Location:?page=' . $page);
        exit();
    }
    $is_register = ($_COOKIE['is_register'] ?? '1') === '1';

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
        <input type="button" class="form-btn btn btn-sm" <?php echo $is_register ? 'value="Registrarse"' : 'value="Iniciar Sesión"' ?>>
        <a href="?page=/login&action=<?php echo $is_register ? 'login' : 'register'; ?>" class="form-btn btn-transparent"><?php echo $is_register ? 'Iniciar Sesión' : 'Registrate'?></a>
    </form>
</section>
