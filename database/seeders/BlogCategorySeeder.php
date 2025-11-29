<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Theology',
                'slug' => 'theology',
                'description' => 'Deep dive into biblical doctrines, systematic theology, and theological discussions.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Christian Living',
                'slug' => 'christian-living',
                'description' => 'Practical guidance for living out your faith in everyday life.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Bible Study',
                'slug' => 'bible-study',
                'description' => 'In-depth exploration of Scripture, verse-by-verse studies, and biblical insights.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Church History',
                'slug' => 'church-history',
                'description' => 'Learn from the past - exploring church history, early church fathers, and reformation.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Apologetics',
                'slug' => 'apologetics',
                'description' => 'Defending the faith - answering tough questions about Christianity.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Prayer & Devotion',
                'slug' => 'prayer-devotion',
                'description' => 'Cultivate your relationship with God through prayer and daily devotions.',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }

        $this->command->info('✅ Created ' . count($categories) . ' blog categories successfully!');
    }
}