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
    <h1>Data Table</h1>
    <table class="table table-striped table-bordered table-hover" id="table_test">
        <thead>
            <tr>
                <th>Id</th>
                <th>Them</th>
                <th>Anecdote</th>
                <th>Date</th>
                <th>Title</th>
                <th>User name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Them</th>
                <th>Anecdote</th>
                <th>Date</th>
                <th>Title</th>
                <th>User name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach ($anecdoteList as $value) :?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['them'] ?></td>
                <td><?php echo $value['anecdote'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><?php echo $value['title'] ?></td>
                <td><?php echo $value['user_id'] ?></td>
                <td><?php echo $value['status'] ?></td>
                <td>
                    <a href="?action=confirm&id=<?php echo $value['id']?>">Опублікувати</a>
                    <a href="?action=cancel&id=<?php echo $value['id']?>">Відхилити</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>