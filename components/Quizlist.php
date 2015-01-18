<?php namespace Mossadal\Quiz\Components;

use Cms\Classes\ComponentBase;
use Mossadal\Quiz\models\quiz;

class Quizlist extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'quizlist Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function quizzes()
    {
        return Quiz::all();
    }
}