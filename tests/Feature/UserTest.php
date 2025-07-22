<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, get, post};

it("Should be able to login", function () {

    User::factory()->create([
        'email'             => 'test@user.com',
        'email_verified_at' => now(),
        'password'          => bcrypt('password'),
    ]);

    get(route('login'))->assertSuccessful();

    $result = post(route('auth.login'), [
        'password' => 'password',
        'email'    => 'test@user.com',
    ]);

    $result->assertRedirect(route('home.index'));

});

it("Should be able to logout", function () {

    $user = User::factory()->create();

    actingAs($user);

    post(route('auth.logout'))->assertRedirect(route('login'));
    get(route('home.index'))->assertRedirect(route('login'));

});

it('Should list users on the home page', function () {

    $users = User::factory()->count(10)->create([
        'email_verified_at' => now(),
    ]);

    $user = $users->random();

    actingAs($user);

    $response = get(route('home.index'));

    /** @var User $u */
    foreach ($users as $u) {
        $response->assertSee($u->getAttributeValue('name'));
    }

});
