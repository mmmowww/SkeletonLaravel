<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User as Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::seed();
    }

    public static function seed(): void
    {
        DB::table(\App\Models\User::TABLE)->truncate();
        Model::factory()->create([
            Model::ID => 1,
            Model::LOGIN => 'test',
            Model::EMAIL => 'test@test.com',
            Model::FIRST_NAME => 'test',
            Model::LAST_NAME => 'test',
            Model::MIDDLE_NAME => 'test',
        ]);
    }
}
