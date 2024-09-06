<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use App\Models\Contact;

class NewRecipientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('seeders/new_recipients.csv');
        if (!file_exists($filePath)) {
            Log::error("CSV file not found: $filePath");
            return;
        }

        $file = fopen($filePath, 'r');
        if ($file === false) {
            Log::error("Failed to open CSV file: $filePath");
            return;
        }

        // Skip the header row
        fgetcsv($file);

        $recipients = [];
        $emails = [];

        while (($data = fgetcsv($file)) !== FALSE) {
            // Ensure the row has the expected number of columns
            if (count($data) < 7) {
                // Fill missing columns with default values
                $data = array_pad($data, 7, null);
            }

            $email = $data[6];

            // Check for duplicate email
            if (in_array($email, $emails)) {
                Log::warning("Duplicate email found and skipped: $email");
                continue;
            }

            $emails[] = $email;

            $recipients[] = [
                'name'          => $data[1] . ' ' . $data[2], // Combine first name and last name
                'company'       => $data[4],
                'position'      => $data[3],
                'phone_number'  => $data[5],
                'email'         => $data[6],
                'status'        => 'new' // Assuming a default status for new recipients
            ];
        }

        fclose($file);

        if (empty($recipients)) {
            Log::warning("No valid rows found in CSV file: $filePath");
        } else {
            // Insert the recipients into the contacts table using the Contact model
            Contact::insert($recipients);
            Log::info("Inserted " . count($recipients) . " rows into the contacts table.");
        }
    }
}