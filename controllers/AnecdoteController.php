<?php
class AnecdoteController extends Anecdote
{
    public  function actionCreateAnecdote($them,$title,$anecdote) {

        $this->createAnecdote($them,$title,$anecdote);
    }

    public  function getAnecdoteListForm($start_from,$record_per_page)
    {
        return $this->getAnecdoteList($start_from,$record_per_page);
    }
//    public  function getApprovedAnecdotes()
//    {
//        return $this->getAllAnecdotes();
//    }
    public  function getTotalAnecdotes()
    {
        return $this->getTotalAnecdote();

    }public  function getLastAnecdote($userId)
    {
        return $this->getLastUserAnecdote($userId);
    }

//    public  function getApprovedAnecdoteListForm()
//    {
//        return $this->getApprovedAnecdoteList();
//    }
}