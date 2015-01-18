<?php namespace Mossadal\Quiz\Models;

use Model;
use Mossadal\Quiz\Classes\MathjaxMarkdownFormatter;

/**
 * Quiz Model
 */
class Quiz extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mossadal_quiz_quizzes';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [ 'questions' => ['Mossadal\Quiz\Models\Question'] ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function beforeSave()
    {
        $this->name_html = MathjaxMarkdownFormatter::Format($this->name);
        $this->description_html = MathjaxMarkdownFormatter::Format($this->description);
        $this->comment_html = MathjaxMarkdownFormatter::Format($this->comment);
    }

}