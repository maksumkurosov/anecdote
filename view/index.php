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
$total = $anecdote->getTotalAnecdotes();
$page = 1;
$limit = 5;
$pagination = new Pagination($total , $page ,$limit, '?page_number=');
require_once 'parts/head.php';

if(!isset($_GET['page'])) {
    if (!isset($_GET['page_number'])||$_GET['page_number']==1){
//        $approvedList = $anecdote->getApprovedAnecdotes();
        $anecdoteList = $anecdote->getAnecdoteListForm(0, $limit);
    } else{
        $anecdoteList = $anecdote->getAnecdoteListForm($_GET['page_number']*$limit-$limit, $limit);
    }
    if (isset($_SESSION['user'])) {
        $userRole = $user::getUser($_SESSION['user']['name']);
    }
    require_once 'site.php';
    echo $pagination->get();
}

require_once 'parts/navigation.php';

if(isset($_GET['page']) && $_GET['page']=='check_posts') {
    $anecdoteList = $anecdote->getAnecdoteListAdmin();
    if (isset($_SESSION['user'])){
        $userRole = $user::getUser($_SESSION['user']['name']);
    }
    require_once 'admin_cabinet.php';
}

if(isset($_GET['page']) && $_GET['page']=='anecdote') {
    $currentAnecdote = $anecdote->getCurrentAnecdote($_GET['id']);
    $log = $user::getUserById($currentAnecdote['user_id']);
    require_once 'current_anecdote.php';
}
if(isset($_GET['page']) && $_GET['page']=='login') {
    require_once 'auth/login.php';
}

if(isset($_GET['page']) && $_GET['page']=='registration') {
    require_once 'auth/registration.php';
}

if(isset($_GET['page']) && $_GET['page']=='about') {
    require_once 'about.php';
}

if(isset($_GET['page']) && $_GET['page']=='check_posts') {
    require_once 'admin_cabinet.php';
    echo $pagination->get();
}

if(isset($_GET['page']) && $_GET['page']=='post') {
    require_once 'post.php';
}

if(isset($_GET['page']) && $_GET['page']=='contact') {
    require_once 'contact.php';
}

if(isset($_GET['page']) && $_GET['page']=='exit') {
    $user::unsetSessionName();
}
if(isset($_GET['page']) && $_GET['page']=='new_anecdote'){
    require_once 'new_anecdote.php';
}
//--------------------------------------------------------
if(isset($_GET['action']) && $_GET['action']=='confirm') {
    $admin->confirmAnecdote($_GET['id']);
}
if(isset($_GET['action']) && $_GET['action']=='cancel') {
    $admin->deleteAnecdote($_GET['id']);
}

if(isset($_POST['form_registration'])) {
    $user::checkLoginExists($_POST['login'],$_POST['password']);
}
if(isset($_POST['form_login'])) {
    //$userID = $user::getUserIdByLogin($_POST['login']);
    $arrayUser = $user::checkUserData($_POST['login'],$_POST['password']);
    $user::setSessionUser($arrayUser['login'],$arrayUser['id'],$arrayUser['is_admin']);
}

if(isset($_POST['form_anecdote'])) {
    $anecdote->createAnecdote($_POST['them'],$_POST['title'],$_POST['anecdote']);
    echo 'Ваш запит додано';
}

require_once 'parts/footer.php';
require_once 'parts/scripts.php';