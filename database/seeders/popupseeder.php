<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Popup;
class popupseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Popup::create([
            'title' => 'Testing',
            'url' => 'Testing',
            'img' => 'Testing.png',
        ]);
    }
}
