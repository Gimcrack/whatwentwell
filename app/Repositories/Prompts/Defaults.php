<?php

namespace App\Repositories\Prompts;

use App\Prompt;

class Defaults
{
    public static function get()
    {
        return collect([
            static::makeDaily('What went well today?'),
            static::makeDaily('What could have gone better today?'),
            static::makeDaily('What did you learn today?'),
            static::makeWeekly('What did you accomplish this week?'),
            static::makeWeekly('What did you decide this week?'),
            static::makeWeekly('What are you looking forward to?'),
            static::makeMonthly('What do you want to accomplish this month?'),
        ]);
    }

    public static function makeDaily($question, $interval = 'DAILY')
    {
        return static::make(compact('question', 'interval'));
    }

    public static function makeWeekly($question, $interval = 'WEEKLY')
    {
        return static::make(compact('question', 'interval'));
    }

    public static function makeMonthly($question, $interval = 'MONTHLY')
    {
        return static::make(compact('question', 'interval'));
    }

    public static function make($atts = [])
    {
        return new Prompt( array_merge([
            'interval' => 'DAILY',
            'enabled' => true
        ],$atts));
    }
}
