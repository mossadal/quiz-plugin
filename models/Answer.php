<?php namespace Mossadal\Quiz\Models;

use Model;
use Mossadal\Quiz\Classes\MathjaxMarkdownFormatter;

/**
 * Answer Model
 */
class Answer extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mossadal_quiz_answers';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [ 'id', 'name', 'correct', 'comment' ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'question' => ['Mossadal\Quiz\Models\Question']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    /**
     * @var array Cache for nameList() method
     */
    protected static $nameList = [];

    public static function getNameList($questionId)
    {
        if (isset(self::$nameList[$questionId]))
            return self::$nameList[$questionId];

        return self::$nameList[$countryId] = self::whereQuestionId($questionId)->lists('name', 'id');
    }

    public function beforeSave()
    {
        $this->name_html = MathjaxMarkdownFormatter::Format($this->name);
        $this->comment_html = MathjaxMarkdownFormatter::Format($this->comment);
    }
}