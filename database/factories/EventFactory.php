<?php

namespace Database\Factories;

use App\Models\{Event, User};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(2),
            'date'        => $this->faker->dateTimeBetween('+1 week', '+1 year')->format('Y-m-d'),
            'location'    => $this->faker->city(),
            'price'       => $this->faker->randomFloat(2, 0, 1000),
            'photo_path'  => function () {

                $directory = storage_path('app/public/events');

                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true);
                }

                // Generate and download image
                $image = $this->faker->image(
                    $directory,
                    640,
                    480,
                    true,
                    null,
                    true,
                    false,
                    null,
                    null
                );

                if ($image) {
                    // Return the relative path for storage
                    return 'events/' . basename($image);
                }

                return null;
            },
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
