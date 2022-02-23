<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{

    protected $model= 'App\Domains\Customer\Models\Customer';
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'desired_budget' => $this->faker->numberBetween(1000,100000),
            'message' => $this->faker->text(500),
            'description' => $this->faker->text(500),
        ];
    }

}
