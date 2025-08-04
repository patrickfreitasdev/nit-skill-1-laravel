<?php

use App\Models\{Event, User};

use function Pest\Laravel\{actingAs, get};

it("Should be able to see the events", function () {

    $user   = User::factory()->create();
    $events = Event::factory()->count(10)->create(
        [
            'photo_path' => '',
        ]
    );

    actingAs($user);

    $response = get(route('events.index'));

    /** @var Event $e */
    foreach ($events as $e) {
        $response->assertSee($e->getAttributeValue('title'));
    }

});
