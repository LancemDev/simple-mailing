<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use Mary\Traits\Toast;
use Livewire\WithPagination;


class ViewTickets extends Component
{
    use WithPagination, Toast;
    public $type, $participant_last_name, $participant_first_name, $category, $subcategory, $price, $barcode, $composed, $order_date, $order_time, $payment_date, $payment_time, $order_number, $advanced_order_number, $ticket_number, $currency, $deleted, $source, $public_price, $total_fees, $discount_code, $discount, $total_price_paid_incl_tax, $commission, $total_price_without_commission_incl_tax, $price_paid_excl_tax, $tax_rate, $tax_for_tax_declarations, $counter, $counter_seller, $counter_payment, $counter_printing, $counter_operator, $buyer_last_name, $buyer_first_name, $buyer_email, $ticket_status, $refund_request_date_and_time, $ticket_deletion_date_and_time, $refund_request_source, $refund_request_amount, $buyer_mobile, $buyer_country, $buyer_company, $buyer_job_title, $participant_email, $marketing_source, $comments, $invoice_company, $invoice_vat_number, $invoice_address, $invoice_postal_code, $invoice_city, $invoice_province, $invoice_country, $additional_information, $buyer_language;

    public $createModal = false;
    public $updateModal = false;

    public function render()
    {
        return view('livewire.view-tickets', [
            'tickets' => Ticket::paginate(10),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->createModal = true;
    }

    public function store()
    {

        Ticket::create($this->all());

        $this->success('Ticket added successfully');

        $this->resetInputFields();
        $this->createModal = false;
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $this->fill($ticket->toArray());
        $this->updateModal = true;
    }

    public function update()
    {
        $ticket = Ticket::findOrFail($this->id);
        $ticket->update($this->all());

        $this->success('Ticket updated successfully');

        $this->resetInputFields();
        $this->updateModal = false;
    }

    public function delete($id)
    {
        Ticket::findOrFail($id)->delete();
        session()->flash('message', 'Ticket Deleted Successfully.');
    }

    private function resetInputFields()
    {
        $this->type = '';
        $this->participant_last_name = '';
        $this->participant_first_name = '';
        $this->category = '';
        $this->subcategory = '';
        $this->price = '';
        $this->barcode = '';
        $this->composed = '';
        $this->order_date = '';
        $this->order_time = '';
        $this->payment_date = '';
        $this->payment_time = '';
        $this->order_number = '';
        $this->advanced_order_number = '';
        $this->ticket_number = '';
        $this->currency = '';
        $this->deleted = '';
        $this->source = '';
        $this->public_price = '';
        $this->total_fees = '';
        $this->discount_code = '';
        $this->discount = '';
        $this->total_price_paid_incl_tax = '';
        $this->commission = '';
        $this->total_price_without_commission_incl_tax = '';
        $this->price_paid_excl_tax = '';
        $this->tax_rate = '';
        $this->tax_for_tax_declarations = '';
        $this->counter = '';
        $this->counter_seller = '';
        $this->counter_payment = '';
        $this->counter_printing = '';
        $this->counter_operator = '';
        $this->buyer_last_name = '';
        $this->buyer_first_name = '';
        $this->buyer_email = '';
        $this->ticket_status = '';
        $this->refund_request_date_and_time = '';
        $this->ticket_deletion_date_and_time = '';
        $this->refund_request_source = '';
        $this->refund_request_amount = '';
        $this->buyer_mobile = '';
        $this->buyer_country = '';
        $this->buyer_company = '';
        $this->buyer_job_title = '';
        $this->participant_email = '';
        $this->marketing_source = '';
        $this->comments = '';
        $this->invoice_company = '';
        $this->invoice_vat_number = '';
        $this->invoice_address = '';
        $this->invoice_postal_code = '';
        $this->invoice_city = '';
        $this->invoice_province = '';
        $this->invoice_country = '';
        $this->additional_information = '';
        $this->buyer_language = '';
    }

    public function closeModal()
    {
        $this->createModal = false;
        $this->updateModal = false;
        $this->resetInputFields();
    }
}
