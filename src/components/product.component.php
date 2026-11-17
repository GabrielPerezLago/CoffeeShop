<?php


return fn (string $rol, ?array $args, string $route): ?string => $args !== null
? '
    <article class="product-container">
        <div class="product-img" style="background-image: url(' . ($args['image']  ?? '../public/assets/images/default_coffee.png' ) . ');"></div>
        <div class="product-details">
           <h4 class="product-ttl"> '. $args['name'] .'</h4>
           <p class="product-desc">'. $args['description'] .'</p>
           <div class="product-price">
            <p>'. $args['price'] . ' €</p>
            <div class="product-cuantity"></div>
                <button class="plus_btn">+</button>
                <input class="cuantity" type="number" min="1" max="100" value="1" disabled>
                <button class="less_btn">-</button>
           </div>
           <div class="products_actions">
                <div class="admin_panel" ' . ($rol === 'ADMIN' ? 'style="display:flex;"' : 'style="display:flex;"') .  '>
                <a href="" class="admin-btn-actions">
                    <img src="../public/assets/icons/update.svg" alt="update product icon" width="20">
                </a>
                <a href="" class="admin-btn-actions">
                    <img src="../public/assets/icons/delete.svg" alt="delete product icon" width="20">
                </a>
                </div>
                <div><button class="btn-clean btn-add"><img src="../public/assets/icons/add_cart.svg" alt="add to cart icon" width="20"></button></div>
           </div>
        </div>
    </article>
  '
 : null ;
?>