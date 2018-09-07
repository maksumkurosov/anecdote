<?php
class AnecdoteController extends Anecdote
{
    public  function actionCreateAnecdote($them,$title,$anecdote) {

        $this->createAnecdote($them,$title,$anecdote);
    }

    public  function getAnecdoteListForm()
    {
        return $this->getAnecdoteList();
    }
    public  function getTotalAnecdotes()
    {
        return $this->getTotalAnecdote();
    }

//    public  function getApprovedAnecdoteListForm()
//    {
//        return $this->getApprovedAnecdoteList();
//    }
}