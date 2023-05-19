<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

use Faker\Generator as Faker;

use Illuminate\Support\Str;

use App\Models\Client;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // we are getting all User and Client IDs using the pluck method, which retrieves all values for a given column from all records in the table. We then pick a random ID from these arrays when creating a new Project record.
        $userIds = User::pluck('id')->toArray();
        $clientIds = Client::pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            Project::create([
                'name' => $name = $faker->sentence(3), // Store the generated name in a variable
                'slug' => Str::slug($name, '-'), // Use the stored name variable for slug generation
                'description' => $faker->text(),
                'start_date' => now(),
                'end_date' => $faker->dateTimeBetween('now', '+3 years'),
                'status' => ['pending', 'in progress', 'completed'][array_rand(['pending', 'in progress', 'completed'])],
                'budget' => $faker->randomFloat(2, 1, 9999999999999.99),
                'manager_id' => $userIds[array_rand($userIds)], // Random user ID
                'client_id' => $clientIds[array_rand($clientIds)], // Random client ID

            ]);
        }
    }
}
