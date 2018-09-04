<?php
class Anecdote
{
    public function getAnecdoteList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM anecdote');

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


    public function getCurrentAnecdote($id)
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

    public function createAnecdote($them,$title,$anecdote)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO anecdote (them, title, anecdote,user_name) '
            . 'VALUES (:them, :title, :anecdote,:user_name)';

        $result = $db->prepare($sql);
        $result->bindParam(':them', $them, PDO::PARAM_STR);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':anecdote', $anecdote, PDO::PARAM_STR);
        $result->bindParam(':user_name', $_SESSION['user'], PDO::PARAM_STR);
        return $result->execute();
    }

}