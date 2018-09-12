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

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <a href="?page=current&id=<?php echo $currentAnecdote['id'] ?>">
                    <h2 class="post-title">
                        <?php echo $currentAnecdote['title'] ?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?php echo $currentAnecdote['anecdote'] ?>
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a class="text"><?php echo ucfirst($log['login']) ?></a>
                    on <?php echo $currentAnecdote['date'] ?>
                </p>
            </div>
        </div>
    </div>
</div>