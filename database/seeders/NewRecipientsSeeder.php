<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class NewRecipientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('seeders/new_recipients.xlsx');
        $rows = Excel::toArray([], $filePath)[0];

        // Skip the header row
        array_shift($rows);

        $recipients = [];

        foreach ($rows as $row) {
            $recipients[] = [
                'first_name'    => $row[0],
                'last_name'     => $row[1],
                'company'       => $row[2],
                'role'          => $row[3],
                'mobile_number' => $row[4],
                'email'         => $row[5],
            ];
        }

        // Insert the data into the database
        DB::table('new_recipients')->insert($recipients);
    }
}