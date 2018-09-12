<?php
class Admin
{
    public function confirmAnecdote($id)
    {
        $db = Db::getConnection();

        $sql = "UPDATE anecdote SET status = 'posted' WHERE id = ".$id;

        return $db->query($sql);
    }
    public function deleteAnecdote($id)
    {
        $db = Db::getConnection();

        $sql = "UPDATE anecdote SET status = 'cancel' WHERE id = ".$id;

        return $db->query($sql);
    }
}