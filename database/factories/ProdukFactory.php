<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Restaurant;
use Illuminate\Support\Str;
use Faker\Provider\Image;

class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        
        return [
            'nama_produk' => $this->faker->foodName(),
            'harga_pokok' => $this->faker->randomNumber(3),
            'harga_jual' => $this->faker->randomNumber(5),
            'kode_produk' => $this->faker->ean13(),
            'konten' => $this->faker->paragraph(),
            'deskripsi' => $this->faker->word(),
            'foto_produk' => $this->faker->imageUrl(480, 480),
        ];
    }
}
