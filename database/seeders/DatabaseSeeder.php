<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create(
            [
                'name' => fake()->name(),
                'email' => 'ukei2021@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );

        \App\Models\Animal::factory()->create(
            [
                'user_id' => 1,
                'name' => 'ねこ',
                'subject' => 'ネコ科',
                'feature' => '動くものを捉える',
                'known_date' => Carbon::now(),
            ]
        );

        \App\Models\Animal::factory()->create(
            [
                'user_id' => 1,
                'name' => 'いぬ',
                'subject' => 'イヌ科',
                'feature' => '忠誠心がある',
                'known_date' => Carbon::now(),
            ]
        );

        \App\Models\Animal::factory()->create(
            [
                'user_id' => 1,
                'name' => 'うま',
                'subject' => 'ウマ科',
                'feature' => '走るのが速い',
                'known_date' => Carbon::now(),
            ]
        );

        \App\Models\Animal::factory()->create(
            [
                'user_id' => 1,
                'name' => 'ねずみ',
                'subject' => 'ネズミ科',
                'feature' => '小さい',
                'known_date' => Carbon::now(),
            ]
        );

        \App\Models\Animal::factory()->create(
            [
                'user_id' => 1,
                'name' => 'うし',
                'subject' => 'ウシ科',
                'feature' => '白黒',
                'known_date' => Carbon::now(),
            ]
        );
    }
}
