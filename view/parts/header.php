<nav class="navbar navbar-expand-md navbar-dark bg-dark">
<!--    <form  class="form-inline my-2 my-lg-0" method="post">-->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a href="/index.php" class="nav-link">Головна</a>
        </li>
        <?php
        if (isset($_SESSION['email'])) {
            ?>
            <a href="?page=create-advertisement" class="btn btn-primary">Create Advertisement</a>
        <?php
        }
        ?>
    </ul>
<!--    </form>-->

    <form class="form-inline my-2 my-lg-0" method="post">
        <?php
        if (isset($_SESSION['email'])){
            echo '<ul class="navbar-nav mr-auto">
            <a class="nav-link"> Ви ввійшли як: '.$_SESSION['email'].'</a>
            <input type="submit" name="exit" class="btn btn-danger" value="Exit">
            </ul>';
        }else {
            echo '<input type="button" class="btn btn-outline-success" value="Login" onClick=\'location.href="?page=login"\'>';
            echo '<input type="button" class="btn btn-outline-primary ml-3" value="Registration"  onClick=\'location.href="?page=registration"\'>';
        }
        ?>
    </form>

</nav>
