<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Government',
            'Technology',
            'Finance',
            'Healthcare',
            'Education',
            'Engineering',
            'Marketing',
            'Sales',
            'Customer Service',
            'Human Resources',
            'Accounting',
            'Legal',
            'Manufacturing',
            'Retail',
            'Hospitality',
            'Transportation',
            'Construction',
            'Real Estate',
            'Telecommunications',
            'Media & Entertainment',
            'Agriculture',
            'Energy',
            'Science & Research',
            'Non-Profit & NGOs',
            'Sports & Recreation'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
