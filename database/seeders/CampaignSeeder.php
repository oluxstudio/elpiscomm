<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campaign;


class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campaign::create([
            'name' => 'give-african-childrens-a-good-education',
            'title' => 'Give african childrens a good education',
            'description' => "Aellentesque porttitor lacus quis enim varius sed efficitur...", 
            'content' => '<p>This is campaign 1 content.</p>',
            'status' => 'active',
            'image' => 'images/school-bus.jpg',
            'goal' => 7000
        ]);
        Campaign::create([
            'name' => 'campaign-2',
            'title' => 'Your little help can heal their pains',
            'description' => "Aellentesque porttitor lacus quis enim varius sed efficitur...", 
            'content' => '<p>This is campaign 1 content.</p>',
            'status' => 'active',
            'image' => 'images/help-poor-kids.jpg',
            'goal' => 7000
        ]);
    }
}
