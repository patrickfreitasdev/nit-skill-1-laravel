<?php

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\{actingAs, get, post};

it("Should be able to login as admin", function () {

    $adminUser = User::factory()->create([
        'email_verified_at' => now(),
        'role'              => 'admin',
        'password'          => bcrypt('password'),
    ]);

    get(route('login'));

    $result = post(route('auth.login'), [
        'password' => 'password',
        'email'    => $adminUser->email,
    ]);

    $result->assertRedirect(route('home.index'));

});

it("Should not be able to login as member", function () {

    $memberUser = User::factory()->create([
        'role'     => 'member',
        'password' => bcrypt('password'),
    ]);

    get(route('login'))->assertSuccessful();

    $result = post(route('auth.login'), [
        'password' => 'password',
        'email'    => $memberUser->email,
    ]);

    $result->assertRedirect(route('login'));
    $result->assertSessionHasErrors('email');

});

it("Should be able to logout", function () {

    $user = User::factory()->create([
        'role' => 'admin',
    ]);

    actingAs($user);

    post(route('auth.logout'))->assertRedirect(route('login'));
    get(route('home.index'))->assertSuccessful();

});

it('Should be able to register a new user', function () {

    $user = User::factory()->create([
        'role' => 'admin',
    ]);

    $newUser = [
        'name'          => fake()->name(),
        'email'         => fake()->unique()->safeEmail(),
        'phone'         => fake()->e164PhoneNumber(),
        'address'       => fake()->address(),
        'password'      => Hash::make('password'),
        'date_of_birth' => fake()->dateTimeBetween('-80 years', '-16 years')->format('Y-m-d'),
    ];

    actingAs($user);

    get(route('user.create'))->assertSuccessful();

    post(route('user.store'), $newUser)
       ->assertRedirect(route('home.index'));

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
