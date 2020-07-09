<?php

namespace Tests\Unit;

use App\Preferences;
use App\User;
use Illuminate\Database\QueryException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PreferencesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_a_user_id()
    {
        $this->expectException(QueryException::class);

        factory(Preferences::class)->create([
            'user_id' => null
        ]);
    }

    /** @test */
    public function it_creates_a_preferences_model_when_a_user_is_created()
    {
        $user = factory(User::class)->create();

        $this->assertDatabaseHas('preferences',['user_id' => $user->id]);
    }

    /** @test */
    public function it_sets_default_settings()
    {
        $user = factory(User::class)->create();

        $this->assertEquals($user->preferences->settings->theme, \App\Repositories\Preferences::defaults()->theme);
        $this->assertEquals($user->preferences->settings->timezone, \App\Repositories\Preferences::defaults()->timezone);
    }

    /** @test */
    public function it_has_a_user()
    {
        $user = factory(User::class)->create();

        $this->assertTrue( Preferences::first()->user->is($user) );
    }
}
