
# CoffeeShop <img src="./src/public/assets/icons/coffe_secondary_bold.svg" alt="icono cafe" width="20">

---

## Página Web de una tienda de Café

Esta pagina esta enfocada a la venta de café exclusivo y con un sistema de roles los cuales a los clientes les permite hacer pedidos y comprar su tan querido café y a los administradores les pemite administrar los pedidos y los productos de la pagina.


## Tech

| DB | LENGUAJES | STYLES |
|---|---|---| 
|MONGODB| PHP | CSS|


## Instalción

**Levantar el contenedor de mongo**

```
docker compose up -d
docker compose exec web composer require mongodb/mongodb
```

## Funcionamiento
***La app funciona de la siguiente manera:*** 

### ***Customer***
El cliente podra ver la tienda sin loguearse, pero para comprar algun producto tendra que Inicar Sessión / Registrarse , una vez hecho eso selecionara una catidad en cada producto y solicitara la compra la cual debe ser aceptada por un administrador.

### ***Admin***
El administrador (devera estar logueado) podra administrar los productos (CRUD) y vera una lista de solicitudes de compra las cuales tendra que administrar y aceptar segun criterio y stok.


## Roles & Permisos 

#### Administrador 
 1. CRUD Productos
 2. Aceptar Compras

#### Customer
 1. Comprar
 2. Carrito & Historial de Compras
 3. Datos






