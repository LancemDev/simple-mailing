<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ContactListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen(database_path('seeders/contacts.csv'), 'r');

        // Skip the header row
        fgetcsv($file);

        $contacts = [];

        while (($data = fgetcsv($file)) !== FALSE) {
            $contacts[] = [
                'name' => $data[1],
                'position' => $data[2],
                'company' => $data[3],
                'phone_number' => $data[4],
                'email' => $data[5],
                'status' => $data[6],
            ];
        }

        fclose($file);

        // Insert contacts into the database
        DB::table('contacts')->insert($contacts);
    }
}
