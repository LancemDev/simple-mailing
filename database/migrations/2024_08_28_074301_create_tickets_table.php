<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the table
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('participant_last_name');
            $table->string('participant_first_name');
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('barcode')->unique();
            $table->boolean('composed')->default(0);
            $table->date('order_date');
            $table->time('order_time');
            $table->date('payment_date');
            $table->time('payment_time');
            $table->string('order_number')->unique();
            $table->string('advanced_order_number')->nullable();
            $table->string('ticket_number')->unique();
            $table->string('currency');
            $table->boolean('deleted')->default(0);
            $table->string('source');
            $table->decimal('public_price', 8, 2);
            $table->decimal('total_fees', 8, 2);
            $table->string('discount_code')->nullable();
            $table->decimal('discount', 8, 2);
            $table->decimal('total_price_paid_incl_tax', 8, 2);
            $table->decimal('commission', 8, 2);
            $table->decimal('total_price_without_commission_incl_tax', 8, 2);
            $table->decimal('price_paid_excl_tax', 8, 2);
            $table->decimal('tax_rate', 5, 2);
            $table->decimal('tax_for_tax_declarations', 8, 2);
            $table->string('counter');
            $table->string('counter_seller');
            $table->string('counter_payment');
            $table->string('counter_printing');
            $table->string('counter_operator');
            $table->string('buyer_last_name');
            $table->string('buyer_first_name');
            $table->string('buyer_email')->unique();
            $table->string('ticket_status');
            $table->timestamp('refund_request_date_and_time')->nullable();
            $table->timestamp('ticket_deletion_date_and_time')->nullable();
            $table->string('refund_request_source')->nullable();
            $table->decimal('refund_request_amount', 8, 2)->nullable();
            $table->string('buyer_mobile')->nullable();
            $table->string('buyer_country');
            $table->string('buyer_company')->nullable();
            $table->string('buyer_job_title')->nullable();
            $table->string('participant_email')->unique();
            $table->string('marketing_source')->nullable();
            $table->text('comments')->nullable();
            $table->string('invoice_company')->nullable();
            $table->string('invoice_vat_number')->nullable();
            $table->string('invoice_address')->nullable();
            $table->string('invoice_postal_code')->nullable();
            $table->string('invoice_city')->nullable();
            $table->string('invoice_province')->nullable();
            $table->string('invoice_country')->nullable();
            $table->text('additional_information')->nullable();
            $table->string('buyer_language')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};