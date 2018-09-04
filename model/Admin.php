<?php
class Admin
{
    public function confirmAnecdote($id)
    {
        $db = Db::getConnection();

        $sql = "UPDATE anecdote
            SET                
                approved = :approved 
                status = :status 
            WHERE id = :id";

        $yes = 1;
        $status = 'posted';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':approved', $yes, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        return $result->execute();
    }
    public function deleteAnecdote($id)
    {
        $db = Db::getConnection();

        $sql = "UPDATE anecdote
            SET                
                approved = :approved 
                status = :status 
            WHERE id = :id";

        $yes = 0;
        $status = 'cancel';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':approved', $yes, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        return $result->execute();
    }
}