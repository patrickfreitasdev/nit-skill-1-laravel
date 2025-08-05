<?php

use App\Models\{Event, User};

use Illuminate\Pagination\LengthAwarePaginator;

use function Pest\Laravel\{actingAs, get};

it("Should be able to see the events", function () {

    $user   = User::factory()->create();
    $events = Event::factory()->count(4)->create(
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

it("Should be able to filter the events", function () {

    $user = User::factory()->create();

    actingAs($user);

    $correctEvent = Event::factory()->create(
        [
            'photo_path' => null,
            'location'   => 'London',
            'date'       => '2025-08-02',
        ]
    );

    $wrongEvent = Event::factory()->create(
        [
            'photo_path' => null,
            'location'   => 'Perth',
            'date'       => '2025-08-04',
        ]
    );

    $response = get(route('events.index', ['location' => $correctEvent->location]));

    $response->assertSee($correctEvent->title);
    $response->assertDontSee($wrongEvent->title);

    $response = get(route('events.index', ['date' => $correctEvent->date]));

    $response->assertSee($correctEvent->title);
    $response->assertDontSee($wrongEvent->title);

});
