<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('countries')->insert([
            [
                'country_id' => 1,
                'country_name' => 'Colombia',
                'country_code' => 'COL'
            ],
            [
                'country_id' => 2,
                'country_name' => 'Cuba',
                'country_code' => 'CUB'
            ],
            [
                'country_id' => 3,
                'country_name' => 'Brasil',
                'country_code' => 'BRA'
            ],
            [
                'country_id' => 4,
                'country_name' => 'México',
                'country_code' => 'MEX'
            ],
            [
                'country_id' => 5,
                'country_name' => 'España',
                'country_code' => 'ESP'
            ],
        ]);

        DB::table('competitors')->insert([
            [
                'competitor_id' => 1,
                'competitor_name' => 'Mariana',
                'competitor_lastname' => 'Pajón',
                'competitor_description' => 'Mariana Pajón Londoño (nacida el 10 de octubre de 1991 en Medellín, Colombia) es una destacada bicicrosista olímpica colombiana, reconocida mundialmente por su velocidad y técnica en el BMX. Ha sido doble medallista de oro olímpica y es considerada una de las mejores exponentes de su disciplina, inspirando a nuevas generaciones de deportistas en Latinoamérica.',
                'competitor_birthdate' => '1991-10-10',
                'country_id' => 1
            ],
            [
                'competitor_id' => 2,
                'competitor_name' => 'Mijaín',
                'competitor_lastname' => 'López',
                'competitor_description' => 'Mijaín López Núñez (nacido el 20 de agosto de 1982 en Pinar del Río, Cuba) es un legendario luchador grecorromano cubano, cuatro veces campeón olímpico y múltiple campeón mundial. Su dominio en la lucha lo ha convertido en una figura histórica del deporte, siendo admirado por su fuerza, técnica y longevidad en la élite internacional.',
                'competitor_birthdate' => '1982-08-20',
                'country_id' => 2
            ],
            [
                'competitor_id' => 3,
                'competitor_name' => 'Neymar',
                'competitor_lastname' => 'Júnior',
                'competitor_description' => 'Neymar da Silva Santos Júnior (nacido el 5 de febrero de 1992 en Mogi das Cruzes, Brasil) es un futbolista profesional brasileño, reconocido por su habilidad, creatividad y goles espectaculares. Ha jugado en clubes de élite como el FC Barcelona y el Paris Saint-Germain, y es una de las figuras más influyentes del fútbol mundial y de la selección brasileña.',
                'competitor_birthdate' => '1992-02-05',
                'country_id' => 3
            ],
            [
                'competitor_id' => 4,
                'competitor_name' => 'María',
                'competitor_lastname' => 'Espinoza',
                'competitor_description' => 'María del Rosario Espinoza Carranza (nacida el 27 de noviembre de 1987 en La Brecha, Sinaloa, México) es una taekwondoín mexicana, triple medallista olímpica y campeona mundial. Su perseverancia y logros la han convertido en un ícono del deporte mexicano, siendo ejemplo de disciplina y superación para jóvenes atletas.',
                'competitor_birthdate' => '1987-11-27',
                'country_id' => 4
            ],
            [
                'competitor_id' => 5,
                'competitor_name' => 'Ilia',
                'competitor_lastname' => 'Topuria',
                'competitor_description' => 'Ilia Topuria (nacido el 21 de enero de 1997 en Halle, Alemania, de ascendencia georgiana y española) es un peleador profesional de artes marciales mixtas (MMA). Conocido por su agresividad y técnica tanto en el striking como en el grappling, ha destacado en la UFC, posicionándose como uno de los prospectos más prometedores de su división.',
                'competitor_birthdate' => '1997-01-21',
                'country_id' => 5
            ],
        ]);

        DB::table('medals')->insert([
            [
                'medal_id' => 1,
                'medal_type' => 'gold',
                'medal_sport' => 'BMX',
                'medal_year' => 2012,
                'country_id' => 1
            ],
            [
                'medal_id' => 2,
                'medal_type' => 'gold',
                'medal_sport' => 'Lucha grecorromana',
                'medal_year' => 2016,
                'country_id' => 2
            ],
            [
                'medal_id' => 3,
                'medal_type' => 'gold',
                'medal_sport' => 'Fútbol',
                'medal_year' => 2016,
                'country_id' => 3
            ],
            [
                'medal_id' => 4,
                'medal_type' => 'bronze',
                'medal_sport' => 'Taekwondo',
                'medal_year' => 2008,
                'country_id' => 4
            ],
            [
                'medal_id' => 5,
                'medal_type' => 'gold',
                'medal_sport' => 'Artes marciales mixtas',
                'medal_year' => 2024,
                'country_id' => 5
            ],
        ]);

        DB::table('medal_competitors')->insert([
            [
                'medal_id' => 1,
                'competitor_id' => 1
            ],
            [
                'medal_id' => 2,
                'competitor_id' => 2
            ],
            [
                'medal_id' => 3,
                'competitor_id' => 3
            ],
            [
                'medal_id' => 4,
                'competitor_id' => 4
            ],
            [
                'medal_id' => 5,
                'competitor_id' => 5
            ],
        ]);
    }
}
