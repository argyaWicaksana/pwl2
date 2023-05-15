<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => $this->faker->numerify('##########'),
            'nama' => $this->faker->name(),
            'kelas' => $this->generateRandomClass(),
            'jurusan' => 'Teknologi Informasi',
            'no_hp' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'tgl_lahir' => $this->faker->date()
        ];
    }

    public function generateRandomClass(): string
    {
        $randomMajor = $this->faker->randomElement(['TI', 'SIB']);
        $randomClass = $this->faker->regexify('[1-4]{1}[A-I]{1}');

        return "$randomMajor-$randomClass";
    }
}
