<body>
<!-- Page Header -->
<header class="masthead" style="background-image: url('/view/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Anecdote Blog</h1>
                    <span class="subheading">Перевірка анекдотів</span>
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
                <?php if ($anecdote['approved']== null):?>
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
                            <a class="text"><?php echo ucfirst($anecdote['login']) ?></a>
                            on <?php echo $anecdote['date'] ?>
                        </p>
                    </div>
                <div class="clearfix">
                    <a class="btn btn-success float-left" href="?action=confirm&id=<?php echo $anecdote['id']?>">Опублікувати</a>
                    <a class="btn btn-danger float-left" href="?action=cancel">Відхилити</a>
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
<div class="container">
    <h1>Data Table</h1>
    <table class="table table-striped table-bordered table-hover" id="table_test">
        <thead>
            <tr>
                <th>Id</th>
                <th>Them</th>
                <th>Anecdote</th>
                <th>Approved</th>
                <th>Date</th>
                <th>Title</th>
                <th>User name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Them</th>
                <th>Anecdote</th>
                <th>Approved</th>
                <th>Date</th>
                <th>Title</th>
                <th>User name</th>
                <th>Status</th>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach ($anecdoteList as $value) :?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['them'] ?></td>
                <td><?php echo $value['anecdote'] ?></td>
                <td><?php echo $value['approved'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><?php echo $value['title'] ?></td>
                <td><?php echo $value['user_id'] ?></td>
                <td><?php echo $value['status'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>