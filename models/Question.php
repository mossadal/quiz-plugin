<?php namespace Mossadal\Quiz\Models;

use Model;
use October\Rain\Support\Markdown;

/**
 * Question Model
 */
class Question extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mossadal_quiz_questions';

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
    public $hasOne = [ ];
    public $hasMany = [
        'answers' => ['Mossadal\Quiz\Models\Answer']
    ];
    public $belongsTo = [
        'quiz' => ['Mossadal\Quiz\Models\Quiz']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function beforeSave()
    {
        $this->name_html = Markdown::parse($this->name);
        $this->comment_html = Markdown::parse($this->comment);
    }
}