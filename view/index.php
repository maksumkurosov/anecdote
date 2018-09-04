<?php
spl_autoload_register(function ($class_name) {
    $array_paths = array(
        '/controllers/',
        '/config/',
        '/model/'
    );
    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            require_once "$path";
        }
    }
});

$user = new UserController();
$anecdote = new AnecdoteController();
$admin = new Admin();
require_once 'parts/head.php';

if (!isset($_GET['page'])) {
    $anecdoteList = $anecdote->getAnecdoteListForm();
    if (isset($_SESSION['user'])){
        $userRole = $user::getUser($_SESSION['user']);
    }
    require_once 'site.php';
}

require_once 'parts/navigation.php';

if (isset($_GET['page']) && $_GET['page']=='check_posts') {
    $anecdoteList = $anecdote->getAnecdoteListForm();
    if (isset($_SESSION['user'])){
        $userRole = $user::getUser($_SESSION['user']);
    }
    require_once 'admin_cabinet.php';
}

if (isset($_GET['page']) && $_GET['page']=='login') {
    require_once 'auth/login.php';
}

if (isset($_GET['page']) && $_GET['page']=='registration') {
    require_once 'auth/registration.php';
}

//if (isset($_GET['page']) && $_GET['page']=='site') {
//    $anecdoteList = $anecdote->getAnecdoteListForm();
//    require_once 'site.php';
//    //var_dump($anecdoteList);
//}
if (isset($_GET['page']) && $_GET['page']=='about') {
    require_once 'about.php';
}
if (isset($_GET['page']) && $_GET['page']=='check_posts') {
    require_once 'admin_cabinet.php';
}

if (isset($_GET['action']) && $_GET['action']=='confirm') {
    $admin->confirmAnecdote($_GET['id']);
}
if (isset($_GET['action']) && $_GET['action']=='cancel') {
    $admin->deleteAnecdote($_GET['id']);
}

if (isset($_GET['page']) && $_GET['page']=='post') {
    require_once 'post.php';
}
if (isset($_GET['page']) && $_GET['page']=='contact') {
    require_once 'contact.php';
}

if (isset($_POST['form_registration'])) {
    $user::checkLoginExists($_POST['login'],$_POST['password']);
}
if (isset($_POST['form_login'])) {
    $user::checkUserData($_POST['login'],$_POST['password']);
    $user::setSessionName($_POST['login']);
    //$user->page_redirect('index.php');

//    echo "<meta http-equiv='refresh' content='0'>";
//    header('Location: index.php');
}
if (isset($_GET['page']) && $_GET['page']=='exit') {
    $user::unsetSessionName();
    //$user->page_redirect('index.php');

}
if (isset($_GET['page']) && $_GET['page']=='new_anecdote'){
    require_once 'new_anecdote.php';
}
if (isset($_POST['form_anecdote'])) {
    $anecdote->createAnecdote($_POST['them'],$_POST['title'],$_POST['anecdote']);
    echo 'Ваш запит додано';
}

require_once 'parts/footer.php';
require_once 'parts/scripts.php';