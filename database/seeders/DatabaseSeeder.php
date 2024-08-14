<?php


namespace Database\Seeders;





use App\Models\Reservation;
use App\Models\User;
use App\Models\Tag;
use App\Models\Article;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('migrate:fresh');

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
        ]);

        $tags = ['ngo', 'seniors', 'teens', 'biznes', 'parents', 'shop'];
        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }

        Article::factory(200)->create();
        $this->call(RoomsTableSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
