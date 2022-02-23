<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteFactory extends Factory
{

    protected $model= 'App\Domains\Vulnerability\Models\Website';
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url(),
            'isConnected' => false,
            'isAccountCreated' => false,
            'description' => $this->faker->text(500),
        ];
    }
}
