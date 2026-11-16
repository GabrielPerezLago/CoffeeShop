<?php
    use App\Controllers\UserController;

    if (isset($_GET['action']) && ($_GET['action'] === '/logout'))
    {
        $user = new UserController();
        $user->logout();

        header('Location:?page=/login');
    }
?>

<style>
    .profile-ttl
    {
        padding: 3rem;
        display: flex;
        justify-content: space-between;
        align-items: center;

    }
    .profile-h2
    {
        font-size: 3rem;
    }

    .icons-align
    {
        display: flex;
        align-items: center;
        gap: 2rem;
    }
</style>

<section>
    <div class="profile-ttl">
        <h2 class="profile-h2">
            ¡Hola <?php echo $_SESSION['username'] ?> !
        </h2>
        <div class="icons-align">
            <a href="?page=/cart" class=""><img width="40" src="../public/assets/icons/bag_icon.svg"> </a>
            <a href="?page=/profile&action=/logout" ><img src="../public/assets/icons/log_out.svg" width="40"></a>
        </div>
    </div>
    <div>


    </div>
</section>
