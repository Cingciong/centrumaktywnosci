<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Sala Parkowa - Planty Małe',
                'description' => 'Mniejsza część Sali Parkowej (ruchoma ścianka działowa zamknięta, wejście od Strefy Wspólnej).
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                 dolorem eum fugiat quo voluptas nulla pariatur?',
                'localization' => 'ul. Jana Pawła II 4 (I piętro)',
                'img' => 'Male-Planty.jpg',
                'numberOfPeople' => 20,
                'size' => 33,
                'price' => 160,
                'utilities' => json_encode(['wifi', 'projector', 'charBoard', 'disability']),
            ],
            [
                'name' => 'Sala Parkowa - Planty Duże',
                'description' => 'Większa część Sali Parkowej (ruchoma ścianka działowa zamknięta, wejście od klatki schodowej).
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                 dolorem eum fugiat quo voluptas nulla pariatur?',
                'localization' => 'ul. Jana Pawła II 4 (I piętro)',
                'img' => 'Duze-Planty.png',
                'numberOfPeople' => 50,
                'size' => 46,
                'price' => 160,
                'utilities' => json_encode(['wifi', 'projector', 'disability', 'charBoard']),
            ],
            [
                'name' => 'Sala Wapienniki',
                'description' => 'Salka spotkań
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                 dolorem eum fugiat quo voluptas nulla pariatur?',
                'localization' => 'ul. Jana Pawła II 4 (II piętro)',
                'img' => 'sala-23.jpg',
                'numberOfPeople' => 8,
                'size' => 15,
                'price' => 50,
                'utilities' => json_encode(['wifi', 'disability']),
            ],
            [
                'name' => 'Sala Ratuszowa',
                'description' => 'Sala przystosowana do prowadzenia spotkań i wideokonferencji Wyposażenie salidotykowy monitor intera.
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                 dolorem eum fugiat quo voluptas nulla pariatur?',
                'localization' => 'Rynek 2 (I piętro)',
                'img' => 'Ratuszowa-scaled.jpg',
                'numberOfPeople' => 12,
                'size' => 32,
                'price' => 160,
                'utilities' => json_encode(['wifi', 'disability', 'speaker', 'chalkboard', 'projector']),
            ],
            [
                'name' => 'Sala Dworcowa',
                'description' => 'Sala przystosowana do prowadzenia spotkań i wideokonferencji.Wyposażenie salidotykowy monitor intera.
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                 dolorem eum fugiat quo voluptas nulla pariatur?',
                'localization' => 'Rynek 2 (II piętro)',
                'img' => 'Dworcowa-scaled.jpg',
                'numberOfPeople' => 24,
                'size' => 52,
                'price' => 235,
                'utilities' => json_encode(['wifi', 'disability', 'speaker', 'chalkboard', 'projector']),
            ],
            [
                'name' => 'Sala Botaniczna',
                'description' => 'Sala kreatywna przystosowana do prowadzenia spotkań i wideokonferencji
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                 dolorem eum fugiat quo voluptas nulla pariatur?',
                'localization' => 'Rynek 2 (III piętro)',
                'img' => 'Botaniczna-scaled.jpg',
                'numberOfPeople' => 48,
                'size' => 195,
                'price' => 310,
                'utilities' => json_encode(['projector', 'wifi', 'chalkboard', 'speaker', 'stairs']),
            ],
            [
                'name' => 'Sala Leśna',
                'description' => 'Sala przystosowana do prowadzenia spotkań
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                 dolorem eum fugiat quo voluptas nulla pariatur?',
                'localization' => 'Wojciecha 14',
                'img' => 'Sala-Lesna.jpg',
                'numberOfPeople' => 20,
                'size' => 38,
                'price' => 50,
                'utilities' => json_encode(['wifi', 'disability']),
            ],
            [
                'name' => 'Sala Polna',
                'description' => 'Sala przystosowana do prowadzenia spotkań animacyjnych
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                 dolorem eum fugiat quo voluptas nulla pariatur?',
                'localization' => 'Wojciecha 14',
                'img' => 'Sala-Polna.jpg',
                'numberOfPeople' => 15,
                'size' => 31,
                'price' => 50,
                'utilities' => json_encode(['wifi', 'disability']),
            ],
            [
                'name' => 'Studio Podcastowe',
                'description' => 'Studio przystosowane do nagrywania podcastów .
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                 dolorem eum fugiat quo voluptas nulla pariatur?',
                'localization' => 'Rynek 2 (I piętro)',
                'img' => 'studio_podcastowe.jpg',
                'numberOfPeople' => 3,
                'size' => 12,
                'price' => 160,
                'utilities' => json_encode(['wifi', 'projector', 'charBoard', 'disability']),
            ],
        ];

        DB::table('rooms')->insert($rooms);
    }
}
