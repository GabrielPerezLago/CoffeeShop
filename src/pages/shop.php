<?php
    require_once __DIR__ . '/../components/Library.php';
?>
<h1>
    Binevenido a la tienda
    <?php echo $_SESSION['username'] ?>
</h1>

<section>
    <?php echo \src\components\Library::product(['hola']) ?>
</section>
<script src="../scripts/product.cuantity.js"></script>

