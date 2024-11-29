<?php

namespace Database\Factories;

use App\Models\TitikPembuangan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TitikPembuanganFactory extends Factory
{
    protected $model = TitikPembuangan::class;

    public function definition()
    {
        return [
            'alamat' => $this->faker->address,
            'url' => $this->faker->url,
        ];
    }
}
