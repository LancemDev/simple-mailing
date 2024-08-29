<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable =[
        'type',
        'participant_last_name',
        'participant_first_name',
        'category',
        'subcategory',
        'price',
        'barcode',
        'composed',
        'order_date',
        'order_time',
        'payment_date',
        'payment_time',
        'order_number',
        'advanced_order_number',
        'ticket_number',
        'currency',
        'deleted',
        'source',
        'public_price',
        'total_fees',
        'discount_code',
        'discount',
        'total_price_paid_incl_tax',
        'commission',
        'total_price_without_commission_incl_tax',
        'price_paid_excl_tax',
        'tax_rate',
        'tax_for_tax_declarations',
        'counter',
        'counter_seller',
        'counter_payment',
        'counter_printing',
        'counter_operator',
        'buyer_last_name',
        'buyer_first_name',
        'buyer_email',
        'ticket_status',
        'refund_request_date_and_time',
        'ticket_deletion_date_and_time',
        'refund_request_source',
        'refund_request_amount',
        'buyer_mobile',
        'buyer_country',
        'buyer_company',
        'buyer_job_title',
        'participant_email',
        'marketing_source',
        'comments',
        'invoice_company',
        'invoice_vat_number',
        'invoice_address',
        'invoice_postal_code',
        'invoice_city',
        'invoice_province',
        'invoice_country',
        'additional_information',
        'buyer_language',
    ];
}
