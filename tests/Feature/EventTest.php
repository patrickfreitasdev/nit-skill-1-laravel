<?php

use App\Models\{Event, User};

use Illuminate\Pagination\LengthAwarePaginator;

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, delete, get, post};

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

it("Should be able to create an event", function () {

    $user = User::factory()->create(['role' => 'admin']);

    $imageFile = Illuminate\Http\UploadedFile::fake()->image('event.jpg');

    $eventDetails = [
        'title'       => 'Event title',
        'description' => 'Event description',
        'date'        => now()->addDays(10)->format('Y-m-d'),
        'location'    => 'London',
        'price'       => 100,
        'event_image' => ($imageFile) ?? null,
    ];

    actingAs($user);

    get(route('events.create'))->assertSuccessful();

    post(route('events.store'), $eventDetails)->assertRedirect(route('events.index'));

    $response = get(route('events.index'));

    $response->assertSee($eventDetails['title']);

    assertDatabaseHas('events', [
        'title' => $eventDetails['title'],
    ]);

    assertDatabaseCount('events', 1);

});

it("Should be able to remove an event", function () {

    $user = User::factory()->create(['role' => 'admin']);

    $event = Event::factory()->create();

    actingAs($user);

    delete(route('events.destroy', $event))->assertRedirect(route('events.index'));

    assertDatabaseCount('events', 0);

});
