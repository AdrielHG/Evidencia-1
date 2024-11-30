<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'invoice_number' => $this->faker->unique()->numerify('INV-#####'),
            'fiscal_data' => $this->faker->text(50),
            'order_date' => $this->faker->dateTimeThisYear,
            'delivery_address' => $this->faker->address,
            'notes' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['Ordered', 'In Process', 'In Route', 'Delivered']),
        ];
    }
}
