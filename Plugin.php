<?php namespace Mossadal\Quiz;

use Backend;
use Controller;
use System\Classes\PluginBase;

/**
 * Quiz Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Quiz',
            'description' => 'Quiz plugin, mostly aimed for educational purposes',
            'author'      => 'Mossadal konsult och design',
            'icon'        => 'icon-key'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Mossadal\Quiz\Components\Quiz' => 'quiz',
            '\Mossadal\Quiz\Components\Quizlist' => 'quizlist',
            '\Mossadal\Quiz\Components\Question' => 'question'
        ];
    }

    public function registerNavigation()
    {
        return [
            'quiz' => [
                'label' => 'Quiz',
                'url' => Backend::url('mossadal/quiz/quiz'),
                'icon' => 'icon-key',
                'order' => 700,

                'sideMenu' => [
                    'quizzes' => [
                        'label' => 'Quizzes',
                        'icon' => 'icon-copy',
                        'url' => Backend::url('mossadal/quiz/quiz')
                    ],
                    'questions' => [
                        'label' => 'Questions',
                        'icon' => 'icon-question',
                        'url' => Backend::url('mossadal/quiz/question')
                    ],
                    'answers' => [
                        'label' => 'Answers',
                        'icon' => 'icon-check-square-o',
                        'url' => Backend::url('mossadal/quiz/answer')
                    ]
                ]
            ]
        ];
    }
}
