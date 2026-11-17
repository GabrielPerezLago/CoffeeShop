<?php
    require_once __DIR__ . "/../../app/Controllers/UserController.php";
    use App\Security\ROLES;
    use App\Controllers\UserController;
    $toError = false;
    $errorMessage = "";

    if(isset($_SESSION['email']) && $_SESSION['email'] != '')
    {
        header('Location:?page=/profile');
    }
    if (isset($_GET['action']) && ($_GET['action'] === 'login'|| $_GET['action'] === 'register') )
    {
        $newVal = ($_GET['action'] === 'register') ? '1' : '0';
        setCookie('is_register', $newVal, time() + (60 * 60 * 24 * 30));

        $page = $_GET['page'] ?? '/login';
        header('Location:?page=' . $page);
        exit();
    }
    $is_register = ($_COOKIE['is_register'] ?? '1') === '1';

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $user = new UserController();
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $username = $_POST['name'] ?? '';

        try
        {
            if ($is_register)
                $user->register($username, $email, $password);

            else
                $user->login($email, $password);

            if (session_status() !== PHP_SESSION_NONE && (isset($_SESSION['rol']) && $_SESSION['rol'] !== ROLES::GUEST->value))
            {
                header('Location:?page=/shop');
                exit();
            }


        }
        catch (Exception $excp)
        {
            $toError = true;
            $errorMessage = $excp
                    ->getMessage();
        }
    }

    echo $toError;
?>

<style>
    .error-wizzard
    {
        position: absolute;
        background-color: var(--secondary-color);
        width: 50vw;
        height: 50vh;
        border-radius: 0.3rem;
        box-shadow: 0.1rem 0.1rem 0 var(--hover-color);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 2rem;

        h4 {
            font-size: 4rem;
        }

        p
        {
            font-size: 2rem;
            padding: 2rem;
        }
    }
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
    .password-container
    {
        display: flex;
        align-items: center;
        width: 40vw;
        justify-content: flex-end;

    }

    .password-container img {
        padding: 0.1rem;
        position: absolute;
    }
</style>
<section class="full-page">
    <div class="error-wizzard" <?php echo $toError ? 'style="display: flex;"' : 'style="display: none"; ' ?> >
        <h4 class="">Error</h4>
        <p><?php echo $errorMessage; ?></p>
    </div>
    <h3 class="h3-form"><?php echo $is_register ? 'Registrarse' : 'Iniciar Sesión' ;?></h3>
    <form class="form_container" method="post">
        <?php
          if  ($is_register) echo '<input name="name" type="text" placeholder="Nombre">';
        ?>
        <input name="email" type="email" placeholder="Email">
        <div class="password-container">
            <input type="password" id="pass_input" placeholder="Contraseña">
            <img id="pass_icon" src="../public/assets/icons/eye_icon.svg" width="30" alt="EYE ICON">
        </div>
        <input type="submit" class="form-btn btn btn-sm" <?php echo $is_register ? 'value="Registrarse"' : 'value="Iniciar Sesión"' ?>>
        <a href="?page=/login&action=<?php echo $is_register ? 'login' : 'register'; ?>" class="form-btn btn-transparent"><?php echo $is_register ? 'Iniciar Sesión' : 'Registrate'?></a>
    </form>
</section>
<script src="../scripts/password.input.js" ></script>