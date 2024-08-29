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
        $file = fopen(database_path('seeders/participants.csv'), 'r');

        // Skip the header row
        $header = fgetcsv($file);

        $tickets = [];

        while (($data = fgetcsv($file)) !== FALSE) {
            // Ensure the row has the expected number of columns
            if (count($data) >= 58) {
                $tickets[] = [
                    'type' => $data[1],
                    'participant_last_name' => $data[2],
                    'participant_first_name' => $data[3],
                    'category' => $data[4],
                    'subcategory' => $data[5],
                    'price' => $data[6],
                    'barcode' => $data[7],
                    'composed' => $data[8],
                    'order_date' => $data[9],
                    'order_time' => $data[10],
                    'payment_date' => $data[11],
                    'payment_time' => $data[12],
                    'order_number' => $data[13],
                    'advanced_order_number' => $data[14],
                    'ticket_number' => $data[15],
                    'currency' => $data[16],
                    'deleted' => $data[17],
                    'source' => $data[18],
                    'public_price' => $data[19],
                    'total_fees' => $data[20],
                    'discount_code' => $data[21],
                    'discount' => $data[22],
                    'total_price_paid_incl_tax' => $data[23],
                    'commission' => $data[24],
                    'total_price_without_commission_incl_tax' => $data[25],
                    'price_paid_excl_tax' => $data[26],
                    'tax_rate' => $data[27],
                    'tax_for_tax_declarations' => $data[28],
                    'counter' => $data[29],
                    'counter_seller' => $data[30],
                    'counter_payment' => $data[31],
                    'counter_printing' => $data[32],
                    'counter_operator' => $data[33],
                    'buyer_last_name' => $data[34],
                    'buyer_first_name' => $data[35],
                    'buyer_email' => $data[36],
                    'ticket_status' => $data[37],
                    'refund_request_date_and_time' => $data[38],
                    'ticket_deletion_date_and_time' => $data[39],
                    'refund_request_source' => $data[40],
                    'refund_request_amount' => $data[41],
                    'buyer_mobile' => $data[42],
                    'buyer_country' => $data[43],
                    'buyer_company' => $data[44],
                    'buyer_job_title' => $data[45],
                    'participant_email' => $data[46],
                    'marketing_source' => $data[47],
                    'comments' => $data[48],
                    'invoice_company' => $data[49],
                    'invoice_vat_number' => $data[50],
                    'invoice_address' => $data[51],
                    'invoice_postal_code' => $data[52],
                    'invoice_city' => $data[53],
                    'invoice_province' => $data[54],
                    'invoice_country' => $data[55],
                    'additional_information' => $data[56],
                    'buyer_language' => $data[57],
                ];
            } else {
                // Log or handle any row that has issues
                Log::warning('Row skipped due to insufficient columns: ' . json_encode($data));
            }
        }

        // Insert the tickets into the database
        DB::table('tickets')->insert($tickets);
    }
}