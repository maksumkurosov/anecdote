<body>
<!-- Page Header -->
<header class="masthead" style="background-image: url('/view/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Anecdote Blog</h1>
                    <span class="subheading">Блог з найсмішнішими анегдотами</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach ($anecdoteList as $anecdote) :?>
                <?php if ($anecdote['status']=='posted'):?>
                    <div class="post-preview">
                        <a href="?page=anecdote&id=<?php echo $anecdote['id'] ?>">
                            <h2 class="post-title">
                                <?php echo $anecdote['title'] ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?php echo mb_strimwidth($anecdote['anecdote'], 0, 60, "..."); ?>
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a class="text"><?php echo ucfirst($anecdote['login']) ?></a>
                                on <?php echo $anecdote['date'] ?>
                        </p>
                    </div>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
    </div>
</div>