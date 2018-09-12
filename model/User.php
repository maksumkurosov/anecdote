<?php
class User

{
    public static function register($login,$password)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO user (login,  password) '
            . 'VALUES (:login,  :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function checkUserData($login, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE login = :login AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user;
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        //header("Location: /view/login");
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkCorrectLogin($login)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE login = :login';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function getUserByName($login)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE login = :login';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
    public static function getLoginById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT login FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
    public static function getIdByLogin($login)
    {
        $db = Db::getConnection();

        $sql = 'SELECT id FROM user WHERE login = :login';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);

        //$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $f = $result->fetch();
        return $f['id'];
    }
}