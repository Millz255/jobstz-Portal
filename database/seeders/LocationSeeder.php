<?php

namespace Database\Seeders;

use App\Models\Location; // Use the Location model directly
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks temporarily (if needed)
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the locations table (optional, use with caution in production!)
        // Location::truncate(); // Uncomment if you want to clear existing locations

        // Define location names directly in a simple array
        $locations = [
            'Arusha, Tanzania',
            'Dar es Salaam, Tanzania',
            'Dodoma, Tanzania',
            'Geita, Tanzania',
            'Iringa, Tanzania',
            'Kagera, Tanzania',
            'Katavi, Tanzania',
            'Kigoma, Tanzania',
            'Kilimanjaro, Tanzania',
            'Lindi, Tanzania',
            'Manyara, Tanzania',
            'Mara, Tanzania',
            'Mbeya, Tanzania',
            'Morogoro, Tanzania',
            'Mtwara, Tanzania',
            'Mwanza, Tanzania',
            'Njombe, Tanzania',
            'Pwani, Tanzania',
            'Rukwa, Tanzania',
            'Ruvuma, Tanzania',
            'Shinyanga, Tanzania',
            'Simiyu, Tanzania',
            'Singida, Tanzania',
            'Tabora, Tanzania',
            'Tanga, Tanzania',
            'Zanzibar, Tanzania',
            'New York, USA',
            'Los Angeles, USA',
            'Chicago, USA',
            'London, UK',
            'Manchester, UK',
            'Berlin, Germany',
            'Munich, Germany',
            'Paris, France',
            'Marseille, France',
            'Abu Dhabi, UAE',
            'Dubai, UAE',
            'Toronto, Canada',
            'Vancouver, Canada',
            'Sydney, Australia',
            'Melbourne, Australia',
            'New Delhi, India',
            'Mumbai, India',
            'São Paulo, Brazil',
            'Rio de Janeiro, Brazil',
            'Johannesburg, South Africa',
            'Cape Town, South Africa',
            'Rome, Italy',
            'Milan, Italy',
            'Madrid, Spain',
            'Barcelona, Spain',
            'Moscow, Russia',
            'Saint Petersburg, Russia',
            'Beijing, China',
            'Shanghai, China',
            'Tokyo, Japan',
            'Osaka, Japan',
            'Mexico City, Mexico',
            'Guadalajara, Mexico',
            'Buenos Aires, Argentina',
            'Córdoba, Argentina',
            'Cairo, Egypt',
            'Alexandria, Egypt',
            'Riyadh, Saudi Arabia',
            'Jeddah, Saudi Arabia',
            'Lagos, Nigeria',
            'Abuja, Nigeria',
            'Istanbul, Turkey',
            'Ankara, Turkey',
            'Karachi, Pakistan',
            'Lahore, Pakistan',
            'Seoul, South Korea',
            'Busan, South Korea',
            'Bogotá, Colombia',
            'Medellín, Colombia',
            'Bangkok, Thailand',
            'Chiang Mai, Thailand',
            'Kuala Lumpur, Malaysia',
            'George Town, Malaysia',
            // Add more locations as needed, in "City, Country" format or just "City" if country is not important
        ];

        // Loop through the location names and insert them into the database
        foreach ($locations as $locationName) {
            Location::create(['name' => $locationName]); // Directly create Location model with name
        }

        // Re-enable foreign key checks if you disabled them
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}