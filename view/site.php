<style>
    .one_news span {
        border: 1px dotted;
        cursor: pointer;
        display: block;
        margin-bottom: 5px;
        text-align: center;
        width: 85px;
    }
    .one_news span:hover{
        border: 1px solid;
    }
</style>
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
                                <?php
                                if (strlen($anecdote['anecdote'])<60){
                                    echo $anecdote['anecdote'];
                                } else {
                                    $pos = strpos($anecdote['anecdote'], ' ', 60);
//                                    echo substr($anecdote['anecdote'],0,$pos).'...';
                                    echo mb_strimwidth($anecdote['anecdote'], 0, $pos+3, "...");
                                }
                                    ?>
                                <input type="hidden" id="user_id" value="<?=$_SESSION['user']['id'];?>" />
                                <input type="hidden" id="anecdote_id" value="<?php echo $anecdote['id'];?>" />
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a class="text"><?php echo ucfirst($anecdote['login']) ?></a>
                                on <?php echo $anecdote['date'] ?>
                        </p>
                    </div>
                    <div class="like" data-id="<?php echo $anecdote['id']?>"><span class="counter" id="like"><b><?php echo $anecdote['count_like'] ?></b></span></div>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
    </div>
</div>