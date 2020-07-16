<?php

namespace Tests\Unit;

use App\Preferences;
use App\User;
use Illuminate\Database\QueryException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Preferences\Facades\Preferences as PreferencesFacade;

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

        $this->assertEquals($user->preferences->settings->theme, PreferencesFacade::defaults()->theme);
        $this->assertEquals($user->preferences->settings->timezone, PreferencesFacade::defaults()->timezone);
    }

    /** @test */
    public function it_has_a_user()
    {
        $user = factory(User::class)->create();

        $this->assertTrue( Preferences::first()->user->is($user) );
    }

    /** @test */
    public function it_can_set_settings_for_a_guest()
    {
        $this->assertFalse($this->isAuthenticated());

        PreferencesFacade::set('theme','Lorem');
        PreferencesFacade::set('timezone','America/Anchorage');

        $this->assertEquals('Lorem', PreferencesFacade::get('theme'));
        $this->assertEquals('America/Anchorage', PreferencesFacade::get('timezone'));
    }

    /** @test */
    public function it_can_get_settings_for_a_guest()
    {
        $this->assertFalse($this->isAuthenticated());

        $this->assertEquals( PreferencesFacade::get('theme'), PreferencesFacade::defaults()->theme );
        $this->assertEquals( PreferencesFacade::get('timezone'), PreferencesFacade::defaults()->timezone );
    }

    /** @test */
    public function it_can_set_settings_for_a_user()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue($this->isAuthenticated());

        PreferencesFacade::set('theme','Lorem');
        PreferencesFacade::set('timezone','America/Anchorage');

        $this->assertEquals('Lorem', $user->preferences->settings->theme);
        $this->assertEquals('America/Anchorage', $user->preferences->settings->timezone);
    }

    /** @test */
    public function it_can_get_settings_for_a_user()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue($this->isAuthenticated());

        $user->preferences->update([
            'settings->theme' => 'Lorem',
            'settings->timezone' => 'America/Anchorage'
        ]);

        $this->assertEquals('Lorem', PreferencesFacade::get('theme'));
        $this->assertEquals('America/Anchorage', PreferencesFacade::get('timezone'));
    }
}
