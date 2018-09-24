<?php

class UserController
{
    public static function setSessionUser($login,$id,$admin)
    {
        $_SESSION['user']['name'] = $login;
        $_SESSION['user']['id'] = $id;
        $_SESSION['user']['is_admin'] = $admin;

        header('Location:/');

    }

    public static function unsetSessionName()
    {
        unset($_SESSION['user']);

        header('Location:/');

    }

    function page_redirect($location)
    {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
        exit;
    }
    public static function  checkUserData($login, $password)
    {
        if(User::checkUserData($login,$password)) {
          echo 'Ви залогінилися!';
          return User::checkUserData($login,$password);
        } else {
            echo 'Неправельний логін або пароль';
            return false;
        }
    }

    public static function checkLoginExists ($login,$password)
    {
        if (!User::checkCorrectLogin($login)) {
            if(User::register($login,$password)) {
                echo 'Ви успішло зареєстровані';
            }
        } else {
            echo 'Такий імя вже використовується, введіть інше';
        }
    }

    public static function getUser ($name)
    {
        if (isset($_SESSION['user'])) {
            return User::getUserByName($name);
        }
    }

    public static function getUserById ($id)
    {
        return User::getLoginById($id);
    }
    public static function getUserIdByLogin ($login)
    {
        return User::getIdByLogin($login);
    }
    public static function getUserLike ($user_id)
    {
        return User::getUserLikes($user_id);
    }

}
