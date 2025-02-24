<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Konferans>
 */
class KonferansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'konferans_baslik' => $this->faker->sentence(),
            'konferans_icerik' => $this->faker->paragraph(),
            'konferans_adres' => $this->faker->sentence(),
            'konferans_kategori' => $this->faker->sentence(),
            'konferans_turu' => $this->faker->sentence(),
            'konferans_email' => $this->faker->sentence(),
            'konferans_tel' => $this->faker->randomNumber(),
            'konferans_date' => $this->faker->date(),
            'konferans_tarih' => $this->faker->date('d m Y'),
            'konferans_zaman' => $this->faker->time(),
            'konferans_taglar' => $this->faker->sentence(),
            'konferans_img' => $this->faker->imageUrl(900, 300),
        ];
    }
}
