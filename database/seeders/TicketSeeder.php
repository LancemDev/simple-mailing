<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('seeders/participants.csv');
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
        $header = fgetcsv($file);
        if ($header === false) {
            Log::error("Failed to read header row from CSV file: $filePath");
            fclose($file);
            return;
        }

        $tickets = [];
        $rowCount = 0;
        $emails = [];

        while (($data = fgetcsv($file)) !== FALSE) {
            $rowCount++;
            // Ensure the row has the expected number of columns
            if (count($data) < 58) {
                // Fill missing columns with default values
                $data = array_pad($data, 58, null);
            }

            $email = $data[45];
            if (in_array($email, $emails)) {
                Log::warning("Duplicate email found and skipped: $email");
                continue;
            }

            $emails[] = $email;

            $tickets[] = [
                'type' => $data[0],
                'participant_last_name' => $data[1],
                'participant_first_name' => $data[2],
                'category' => $data[3],
                'subcategory' => $data[4],
                'price' => $data[5],
                'barcode' => $data[6],
                'composed' => $data[7],
                'order_date' => $data[8],
                'order_time' => $data[9],
                'payment_date' => $data[10],
                'payment_time' => $data[11],
                'order_number' => $data[12],
                'advanced_order_number' => $data[13],
                'ticket_number' => $data[14],
                'currency' => $data[15],
                'deleted' => $data[16],
                'source' => $data[17],
                'public_price' => $data[18],
                'total_fees' => $data[19],
                'discount_code' => $data[20],
                'discount' => $data[21],
                'total_price_paid_incl_tax' => $data[22],
                'commission' => $data[23],
                'total_price_without_commission_incl_tax' => $data[24],
                'price_paid_excl_tax' => $data[25],
                'tax_rate' => $data[26],
                'tax_for_tax_declarations' => $data[27],
                'counter' => $data[28],
                'counter_seller' => $data[29],
                'counter_payment' => $data[30],
                'counter_printing' => $data[31],
                'counter_operator' => $data[32],
                'buyer_last_name' => $data[33],
                'buyer_first_name' => $data[34],
                'buyer_email' => $data[35],
                'ticket_status' => $data[36],
                'refund_request_date_and_time' => $data[37],
                'ticket_deletion_date_and_time' => $data[38],
                'refund_request_source' => $data[39],
                'refund_request_amount' => $data[40],
                'buyer_mobile' => $data[41],
                'buyer_country' => $data[42],
                'buyer_company' => $data[43],
                'buyer_job_title' => $data[44],
                'participant_email' => $data[45],
                'marketing_source' => $data[46],
                'comments' => $data[47],
                'invoice_company' => $data[48],
                'invoice_vat_number' => $data[49],
                'invoice_address' => $data[50],
                'invoice_postal_code' => $data[51],
                'invoice_city' => $data[52],
                'invoice_province' => $data[53],
                'invoice_country' => $data[54],
                'additional_information' => $data[55],
                'buyer_language' => $data[56],
            ];
        }

        fclose($file);

        if (empty($tickets)) {
            Log::warning("No valid rows found in CSV file: $filePath");
        } else {
            // Insert the tickets into the database
            DB::table('tickets')->insert($tickets);
            Log::info("Inserted $rowCount rows into the tickets table.");
        }
    }
}