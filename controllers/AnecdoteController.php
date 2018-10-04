<?php
class AnecdoteController
{
    public static function actionCreateAnecdote($them,$title,$anecdote) {

        Anecdote::createAnecdote($them,$title,$anecdote);
    }
    public function actionAddAnecdoteToTop($anecdoteId)
    {
        Anecdote::addToTop($anecdoteId);
    }
//    public function add()
//    {
//        echo 'qweqwqweqwewe';
//    }

    public static function getAnecdoteListForm($start_from,$record_per_page)
    {
        return Anecdote::getAnecdoteList($start_from,$record_per_page);
    }
    public static function getAnecdoteListAdmin()
    {
        return Anecdote::getAnecdoteListAdmin();
    }
//    public  function getApprovedAnecdotes()
//    {
//        return $this->getAllAnecdotes();
//    }
    public function getTotalAnecdotes()
    {
        return Anecdote::getTotalAnecdote();
    }
    public function getLastAnecdote($userId)
    {
        return Anecdote::getLastUserAnecdote($userId);
    }
    public function getCurrentAnecdote($id)
    {
        return Anecdote::getCurrentAnecdote($id);
    }
    public function checkAnecdoteInTop($id)
    {
        return Anecdote::getLastTopAnecdote($id);
    }
    public function getTop()
    {
        return Anecdote::getTopList();
    }
    public function delFromTop($anecdoteId)
    {
        return Anecdote::deleteFromTop($anecdoteId);
    }

//    public  function getApprovedAnecdoteListForm()
//    {
//        return $this->getApprovedAnecdoteList();
//    }
}