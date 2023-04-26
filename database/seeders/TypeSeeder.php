<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            "type" => "MTB"
        ]);
        Type::create([
            "type" => "Racing"
        ]);
        Type::create([
            "type" => "City"
        ]);
        Type::create([
            "type" => "Trekking"
        ]);
    }
}
