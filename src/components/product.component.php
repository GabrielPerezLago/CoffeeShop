<?php


return fn (?array $args): ?string => $args !== null
? '
    <article class="product-container">
        <div class="product-img">
            <img src="../public/assets/images/default_coffee.png" alt="coffee product image">
        </div>
        <div>
           <h4>Titulo</h4>
           <p>Descripcion</p>
           <div class="product-price">
            <p>Precio</p>
            <div class="product-cuentity"></div>
                <button id="plus_btn">+</button>
                <input id="cuantity" type="number" min="1" max="100" value="1" disabled>
                <button id="less_btn" >-</button>
           </div>
           
        </div>
    </article>
  '
 : null ;
?>