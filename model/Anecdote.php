<?php
class Anecdote
{
//    public function getAnecdoteList()
//    {
//        $db = Db::getConnection();
//        $result = $db->query('SELECT anecdote.*, user.login
//        FROM anecdote
//        INNER JOIN user ON anecdote.user_id = user.id');
//        //'SELECT * FROM anecdote'
//
//        $advertisementList = array();
//        while ($row = $result->fetch()) {
//            $advertisementList[$row['id']] = $row;
//        }
//        return $advertisementList;
//    }
//    public function getAllAnecdotes()
//    {
//        $db = Db::getConnection();
//        $result = $db->query("SELECT anecdote.*, user.login
//        FROM anecdote
//        INNER JOIN user ON anecdote.user_id = user.id
//        WHERE status = 'posted'");
//
//        $advertisementList = array();
//        while ($row = $result->fetch()) {
//            $advertisementList[$row['id']] = $row;
//        }
//        return $advertisementList;
//    }
    public static function getAnecdoteList($start_from,$record_per_page)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT anecdote.*, user.login
        FROM anecdote
        INNER JOIN user ON anecdote.user_id = user.id
        WHERE status = 'posted'
        order by id ASC LIMIT $start_from,$record_per_page ");

//        $query = "SELECT * FROM tbl_student order by student_id DESC LIMIT $start_from, $record_per_page";
        $advertisementList = array();
        while ($row = $result->fetch()) {
            $advertisementList[$row['id']] = $row;
        }
        return $advertisementList;
    }
    public static function getAnecdoteListAdmin()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT anecdote.*, user.login
        FROM anecdote
        INNER JOIN user ON anecdote.user_id = user.id') ;
        //'SELECT * FROM anecdote'
//        $query = "SELECT * FROM tbl_student order by student_id DESC LIMIT $start_from, $record_per_page";
        $advertisementList = array();
        while ($row = $result->fetch()) {
            $advertisementList[$row['id']] = $row;
        }
        return $advertisementList;
    }

//    public function getApprovedAnecdoteList()
//    {
//        $db = Db::getConnection();
//        $result = $db->query('SELECT * FROM anecdote WHERE approved = 1');
//
//        $advertisementList = array();
//        while ($row = $result->fetch()) {
//            $advertisementList[$row['id']] = $row;
//        }
//        return $advertisementList;
//    }

    public static function getLastUserAnecdote($userId)
    {
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM anecdote WHERE user_id = :id ORDER BY date DESC';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }


    public static function getCurrentAnecdote($id)
    {
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM anecdote WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }

    public static function createAnecdote($them,$title,$anecdote)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO anecdote (them, title, anecdote,user_id) '
            . 'VALUES (:them, :title, :anecdote,:user_id)';

        $result = $db->prepare($sql);
        $result->bindParam(':them', $them, PDO::PARAM_STR);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':anecdote', $anecdote, PDO::PARAM_STR);
        $result->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getTotalAnecdote()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT count(id) AS count FROM anecdote WHERE status = 'posted'";

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
//        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    public static function addToTop($idAnecdote)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO top (id_anecdote) VALUES (:id_anecdote)';
        $result = $db->prepare($sql);
        $result->bindParam(':id_anecdote', $idAnecdote, PDO::PARAM_INT);
        return $result->execute();
    }

}