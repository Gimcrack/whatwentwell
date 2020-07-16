<?php

namespace Tests\Unit;

use App\Prompt;
use App\Repositories\Preferences\Facades\Preferences;
use App\Repositories\Prompts\Prompts;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PromptTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_a_user_id()
    {
        $this->expectException(QueryException::class);

        factory(Prompt::class)->create([
            'user_id' => null
        ]);
    }

    /** @test */
    public function it_has_a_user()
    {
        $prompt = factory(Prompt::class)->create();

        $this->assertTrue($prompt->user->is(User::first()));
    }

    /** @test */
    public function it_has_a_question()
    {
        $this->expectException(QueryException::class);

        factory(Prompt::class)->create([
            'question' => null
        ]);
    }

    /** @test */
    public function it_has_a_interval()
    {
        $this->expectException(QueryException::class);

        factory(Prompt::class)->create([
            'interval' => null
        ]);
    }

    /** @test */
    public function it_has_a_valid_interval()
    {
        $this->expectException(QueryException::class);

        factory(Prompt::class)->create([
            'interval' => 'invalid'
        ]);
    }

    /** @test */
    public function it_sets_up_default_prompts_when_a_user_is_created()
    {
        $user = factory(User::class)->create();

        $this->assertCount(Prompts::defaults()->count(), $user->prompts);
    }

    /** @test */
    public function it_can_get_the_prompts_for_today()
    {
        $user = factory(User::class)->create();

        Carbon::setTestNow('2020-07-01');

        $this->assertCount(4, Prompts::forToday() );

        Preferences::set('monthly_day','last');

        $this->assertCount(3, Prompts::forToday());

        Preferences::set('weekly_day','Wednesday');

        $this->assertCount(6, Prompts::forToday());
    }
}
