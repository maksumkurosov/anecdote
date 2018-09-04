<?php

class UserController
{

    public function test()
    {
        return 'blabla';

    }

    public static function setSessionName($login)
    {
        $_SESSION['user'] = $login;

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
          return true;
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

}
