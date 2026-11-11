<?php

    require_once __DIR__ . "/components/Library.php";
    use src\components\Library;
    $components = new Library();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="shortcut icon" href="../public/assets/icons/coffe_secondary_bold.svg" type="image/x-icon">
    <title>CoffeeShop</title>
</head>
<body>
    <header class="header">
        <h2>CoffeeShop</h2>
        <?php echo $components->navbar() ?>
    </header>
</body>
</html>