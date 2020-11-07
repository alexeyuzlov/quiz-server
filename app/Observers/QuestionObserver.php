<?php

namespace App\Observers;

use App\DataAccess\QuestionRepository;
use App\Models\Question;

class QuestionObserver
{
    private $questions;

    public function __construct(QuestionRepository $questions)
    {
        $this->questions = $questions;
    }

    /**
     * Handle the Question "deleted" event.
     *
     * @param Question $question
     * @return void
     */
    public function deleted(Question $question)
    {
        $this->questions->removeAnswers($question);
    }
}
