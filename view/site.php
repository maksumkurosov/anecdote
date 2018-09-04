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
                <?php if ($anecdote['approved']==1):?>
                    <div class="post-preview">
                        <a href="/post.php">
                            <h2 class="post-title">
                                <?php echo $anecdote['title'] ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?php echo $anecdote['anecdote'] ?>
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a class="text"><?php echo ucfirst($anecdote['user_name']) ?></a>
                                on <?php echo $anecdote['date'] ?>
                        </p>
                    </div>
                <?php endif;?>
            <?php endforeach; ?>
            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>

