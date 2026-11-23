<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\listing;

class ListingSeeder extends Seeder
{
    public function run(): void
    {
        listing::factory(20)->create();
    }
}