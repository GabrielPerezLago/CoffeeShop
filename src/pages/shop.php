<?php
    use src\components\Library;
    use App\Controllers\ProductController;
    $rol = '';
    $component = new Library();
    $products = new ProductController()->all();

    if (isset($_SESSION['rol']) && $_SESSION['rol'] !== null) $rol = $_SESSION['rol'];
    else $rol = 'GUEST';


    ?>
<h1>
    Binevenido a la tienda
    <?php echo $_SESSION['username']  ?? ''?>
</h1>

<section class="shop-container">
    <?php
        foreach ($products as $product) {
            echo $component->product($_SESSION['rol'], $product, '/shop');
        }
    ?>
</section>
<script src="../scripts/product.cuantity.js"></script>

