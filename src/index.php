<?php
    ob_start();
    require_once __DIR__ . '/../vendor/autoload.php';

    require __DIR__ . '/../app/Security/ROLES.php';
    use app\Security\ROLES;

    if (session_status() == PHP_SESSION_NONE)
        session_start();

    if (!isset($_SESSION['rol']))
        $_SESSION['rol'] = ROLES::GUEST;


    require_once __DIR__ . "/components/Library.php";
    require_once __DIR__ . "/pages/Router.php";
    use src\components\Library;
    use src\pages\Router;

    $components = new Library();
    $router = new Router();
    $page = $_GET["page"] ?? ($_COOKIE['page'] ?? '/');
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="shortcut icon" href="public/assets/icons/coffe_secondary_bold.svg" type="image/x-icon">
    <title>CoffeeShop</title>
</head>
<body>
    <header class="header">
        <h2>CoffeeShop</h2>
        <?php echo $components->navbar([
                '/' =>  $page !== '/' ? 'Inicio' : null,
                '/shop' => 'Tienda',
                '/about' => 'Sobre Nosotros',
                '/login' => 'image:../public/assets/icons/user_text_color.svg',
        ]) ?>
    </header>
    <main>
    <?php
    echo $router->go($page);
    ?>
    </main>
</body>
</html>