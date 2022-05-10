<?php

namespace Database\Seeders;

use App\Models\MaxClaimableToken;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaxTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MaxClaimableToken::insert([
            'max_tokens' => '100'
        ]);
    }
}
