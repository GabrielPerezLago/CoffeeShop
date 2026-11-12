<style>
    .full-view {
        height: 90vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        gap: 4rem;
    }

    .title-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 2rem;
    }

    .big-title {
        font-size: clamp(2.5rem, 6vw, 5rem);
        line-height: 1.1;
    }

    .img-title {
        width: 100%;
        max-width: 8rem;
    }

    .btn-home-container{
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 3rem;
    }
</style>

<section class="full-view">
    <article class="title-container">
        <h1 class="big-title">
            Bienvenido a Coffeeshop
        </h1>
        <img class="img-title" src="../public/assets/icons/coffee_text_bold.svg" alt="Logo Image">
    </article>
    <h2>Tu tienda de café de confianza</h2>
    <article class="btn-home-container">
        <button class="btn btn-lg"> Tienda </button>
        <button class="btn btn-lg"> Registrate </button>
    </article>
</section>
