<?php

use Illuminate\Database\Seeder;

class OccupationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupations = [
            'Arquitecto',
            'Abogado',
            'Panadero',
            'Programador',
            'Herrero',
            'Artesano',
            'Ganadero',
            'Carpintero'
        ];

        DB::table('occupations')->insert(
            array_map(function ($occupation) {
                return [
                    'name' => $occupation,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ];
            }, $occupations)
        );
    }
}
