<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/index.php">Start Bootstrap</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=about">About</a>
                </li>
                <?php if (empty($_GET)) :?>
                    <?php if (isset($_SESSION['user'])) :?>
                         <?php if ($userRole['is_admin']) :?>
                            <li class="nav-item">
    <!--                            <a class="nav-link" href="/view/admin_cabinet.php">Check posts</a>-->
                                <a class="nav-link" href="?page=check_posts">Check posts</a>
                            </li>
                         <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link" href="?page=contact">Contact</a>
                </li>
                <?php
                if (empty($_SESSION)) {echo
                '<li class="nav-item">
                    <a class="nav-link" href="?page=login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=registration">Registration</a>
                </li>';
                }
                ?>
                <?php
                if (isset($_SESSION['user'])) {echo
                    '<li class="nav-item">  
                        <a class="nav-link">'.'You are:'.$_SESSION['user'].'</a>                      
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="?page=exit">Exit</a>
                    </li>';
                    echo '<li class="nav-item">
                            <a class="nav-link text-success" href="?page=new_anecdote">Запропонувати анекдот</a>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>