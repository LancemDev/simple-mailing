<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipient;

class RecipientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recipient::insert([
            ['email' => 'lance.munyao@strathmore.edu', 'first_name' => 'John', 'last_name' => 'Doe'],
            ['email' => 'munyaolance1@gmail.com', 'first_name' => 'Jane', 'last_name' => 'Smith'],
            ['email' => 'mwanialance@gmail.com', 'first_name' => 'Alice', 'last_name' => 'Jones'],
            ['email' => 'random1@example.com', 'first_name' => 'Michael', 'last_name' => 'Brown'],
            ['email' => 'random2@example.com', 'first_name' => 'Emily', 'last_name' => 'Davis'],
            ['email' => 'random3@example.com', 'first_name' => 'Chris', 'last_name' => 'Wilson'],
            ['email' => 'random4@example.com', 'first_name' => 'Sarah', 'last_name' => 'Taylor'],
            ['email' => 'random5@example.com', 'first_name' => 'David', 'last_name' => 'Anderson'],
            ['email' => 'random6@example.com', 'first_name' => 'Laura', 'last_name' => 'Thomas'],
            ['email' => 'random7@example.com', 'first_name' => 'James', 'last_name' => 'Jackson'],
            ['email' => 'random8@example.com', 'first_name' => 'Linda', 'last_name' => 'White'],
            ['email' => 'random9@example.com', 'first_name' => 'Robert', 'last_name' => 'Harris'],
            ['email' => 'random10@example.com', 'first_name' => 'Patricia', 'last_name' => 'Martin'],
            ['email' => 'random11@example.com', 'first_name' => 'Charles', 'last_name' => 'Clark'],
            ['email' => 'random12@example.com', 'first_name' => 'Barbara', 'last_name' => 'Lewis'],
            ['email' => 'random13@example.com', 'first_name' => 'Daniel', 'last_name' => 'Walker'],
            ['email' => 'random14@example.com', 'first_name' => 'Jessica', 'last_name' => 'Hall'],
            ['email' => 'random15@example.com', 'first_name' => 'Matthew', 'last_name' => 'Allen'],
            ['email' => 'random16@example.com', 'first_name' => 'Nancy', 'last_name' => 'Young'],
            ['email' => 'random17@example.com', 'first_name' => 'Anthony', 'last_name' => 'King'],
            ['email' => 'random18@example.com', 'first_name' => 'Karen', 'last_name' => 'Wright'],
            ['email' => 'random19@example.com', 'first_name' => 'Steven', 'last_name' => 'Scott'],
            ['email' => 'random20@example.com', 'first_name' => 'Betty', 'last_name' => 'Green'],
            ['email' => 'random21@example.com', 'first_name' => 'Paul', 'last_name' => 'Adams'],
            ['email' => 'random22@example.com', 'first_name' => 'Sandra', 'last_name' => 'Baker'],
            ['email' => 'random23@example.com', 'first_name' => 'Mark', 'last_name' => 'Gonzalez']
        ]);
    }
}