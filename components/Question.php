<?php namespace Mossadal\Quiz\Components;

use Cms\Classes\ComponentBase;
use Mossadal\Quiz\models\quiz as QuizModel;
use Mossadal\Quiz\models\answer as AnswerModel;

class Question extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'question Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function question()
    {
        $id = $this->property('id');
        $question_id = $this->property('question');

        $quiz = QuizModel::find($id);
        $questions = $quiz->questions;

        if ($question_id == 'random') return $questions[array_rand($questions)];

        $q = $questions[$question_id-1];
        return $q;
    }

    public function next()
    {
        $id = $this->property('id');
        $question_id = $this->property('question');

        $quiz = QuizModel::find($id);
        $questions = $quiz->questions;

        if ($question_id == 'random') return 'random';

        if (count($questions) > $question_id) return $question_id + 1;
    }

    public function onRender()
    {
        $this->page['id'] = $this->property('id');
    }

    // AJAX handler to grade question

    public function onGrade()
    {
        $answer_id = post('answer');
        $answer = AnswerModel::find($answer_id);

        $this->page['correct'] = $answer->correct;
        $this->page['answer_comment'] = $answer->comment_html;

        return [
            'answer_comment' => $answer->comment_html,
            'answer_correct' => $answer->correct
        ];
    }
}