<?php declare(strict_types=1);

namespace App\DataAccess;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Collection;

class QuestionRepository
{
    /**
     * @param bool $withAnswers
     * @return Question[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Question::all();
    }

    public function find(Question $question): Question
    {
        $question->load('answers');
        $question->answers->makeVisible('correct');
        return $question;
    }

    public function create($body): Question
    {
        return $this->save($body, new Question());
    }

    public function edit($body, Question $question): Question
    {
        return $this->save($body, $question);
    }

    public function remove(Question $question): void
    {
        $question->delete();

        // todo should be here or via observer?
        // $this->removeAnswers($question);
    }

    public function removeAnswers(Question $question)
    {
        $question->load('answers');
        $question->answers()->delete();
    }

    public function checkAnswers(Collection $results) {
        $errors = [];
        foreach ($this->getAll() as $question) {
            $result = $results->where('id', $question->id)->first();
            if (!$result) {
                $result = [
                    'answerIds' => []
                ];
            }

            $correctAnswerIds = $question->answers
                ->makeVisible('correct')
                ->where('correct', true)
                ->pluck('id')
                ->toArray();

            if ($correctAnswerIds != $result['answerIds']) {
                array_push($errors, [
                    'id' => $question->id,
                    'answerIds' => $correctAnswerIds
                ]);
            }
        }

        return $errors;
    }

    private function save($body, Question $question): Question
    {
        $question->question = $body['question'];
        $question->save();

        $this->saveAnswers($body, $question);

        $question->refresh();
        return $this->find($question);
    }

    private function saveAnswers($body, Question $question): void
    {
        $this->removeAnswers($question);

        $models = [];
        foreach ($body['answers'] as $item) {
            array_push($models, new Answer($item));
        }

        $question->answers()->saveMany($models);
    }
}
