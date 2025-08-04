<?php

use App\Models\{Event, User};

use Illuminate\Pagination\LengthAwarePaginator;

use function Pest\Laravel\{actingAs, get};

it("Should be able to see the events", function () {

    $user   = User::factory()->create();
    $events = Event::factory()->count(10)->create(
        [
            'photo_path' => null,
        ]
    );

    actingAs($user);

    $response = get(route('events.index'));

    /** @var Event $e */
    foreach ($events as $e) {
        $response->assertSee($e->getAttributeValue('title'));
    }

});

it("Should paginate the events", function () {

    $user = User::factory()->create();

    Event::factory()->count(20)->create(
        [
            'photo_path' => null,
        ]
    );

    actingAs($user);

    get(route('events.index'))->assertViewHas('events', function ($value) {
        return $value instanceof LengthAwarePaginator;
    });

});
