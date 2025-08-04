<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AustralianPhoneNumberTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_generates_australian_phone_numbers()
    {
        // Create 5 users
        $users = User::factory()->count(5)->create();

        foreach ($users as $user) {
            // Check that the phone number is in Australian format
            // Australian mobile numbers start with 04 or +61 4
            $this->assertTrue(
                preg_match('/^(\+61\s?4|\+61-4|\+61\.4|04)/', $user->phone) === 1,
                "Phone number {$user->phone} is not in Australian format"
            );

            // Output the phone number for manual verification
            echo "Generated phone number: {$user->phone}\n";
        }
    }
}
