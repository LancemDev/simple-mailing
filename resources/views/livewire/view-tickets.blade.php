<div>
    @php
        $tickets = \App\Models\Ticket::paginate(7);
        $headers = [
            ['key' => 'id', 'label' => '#'],
            ['key' => 'type', 'label' => 'Type'],
            ['key' => 'participant_last_name', 'label' => 'Participant Last Name'],
            ['key' => 'participant_first_name', 'label' => 'Participant First Name'],
            ['key' => 'category', 'label' => 'Category'],
            ['key' => 'subcategory', 'label' => 'Subcategory'],
            ['key' => 'price', 'label' => 'Price'],
            ['key' => 'barcode', 'label' => 'Barcode'],
            ['key' => 'composed', 'label' => 'Composed'],
            ['key' => 'order_date', 'label' => 'Order Date'],
            ['key' => 'order_time', 'label' => 'Order Time'],
            ['key' => 'payment_date', 'label' => 'Payment Date'],
            ['key' => 'payment_time', 'label' => 'Payment Time'],
            ['key' => 'order_number', 'label' => 'Order Number'],
            ['key' => 'advanced_order_number', 'label' => 'Advanced Order Number'],
            ['key' => 'ticket_number', 'label' => 'Ticket Number'],
            ['key' => 'currency', 'label' => 'Currency'],
            ['key' => 'deleted', 'label' => 'Deleted'],
            ['key' => 'source', 'label' => 'Source'],
            ['key' => 'public_price', 'label' => 'Public Price'],
            ['key' => 'total_fees', 'label' => 'Total Fees'],
            ['key' => 'discount_code', 'label' => 'Discount Code'],
            ['key' => 'discount', 'label' => 'Discount'],
            ['key' => 'total_price_paid_incl_tax', 'label' => 'Total Price Paid Incl Tax'],
            ['key' => 'commission', 'label' => 'Commission'],
            ['key' => 'total_price_without_commission_incl_tax', 'label' => 'Total Price Without Commission Incl Tax'],
            ['key' => 'price_paid_excl_tax', 'label' => 'Price Paid Excl Tax'],
            ['key' => 'tax_rate', 'label' => 'Tax Rate'],
            ['key' => 'tax_for_tax_declarations', 'label' => 'Tax For Tax Declarations'],
            ['key' => 'counter', 'label' => 'Counter'],
            ['key' => 'counter_seller', 'label' => 'Counter Seller'],
            ['key' => 'counter_payment', 'label' => 'Counter Payment'],
            ['key' => 'counter_printing', 'label' => 'Counter Printing'],
            ['key' => 'counter_operator', 'label' => 'Counter Operator'],
            ['key' => 'buyer_last_name', 'label' => 'Buyer Last Name'],
            ['key' => 'buyer_first_name', 'label' => 'Buyer First Name'],
            ['key' => 'buyer_email', 'label' => 'Buyer Email'],
            ['key' => 'ticket_status', 'label' => 'Ticket Status'],
            ['key' => 'refund_request_date_and_time', 'label' => 'Refund Request Date and Time'],
            ['key' => 'ticket_deletion_date_and_time', 'label' => 'Ticket Deletion Date and Time'],
            ['key' => 'refund_request_source', 'label' => 'Refund Request Source'],
            ['key' => 'refund_request_amount', 'label' => 'Refund Request Amount'],
            ['key' => 'buyer_mobile', 'label' => 'Buyer Mobile'],
            ['key' => 'buyer_country', 'label' => 'Buyer Country'],
            ['key' => 'buyer_company', 'label' => 'Buyer Company'],
            ['key' => 'buyer_job_title', 'label' => 'Buyer Job Title'],
            ['key' => 'participant_email', 'label' => 'Participant Email'],
            ['key' => 'marketing_source', 'label' => 'Marketing Source'],
            ['key' => 'comments', 'label' => 'Comments'],
            ['key' => 'invoice_company', 'label' => 'Invoice Company'],
            ['key' => 'invoice_vat_number', 'label' => 'Invoice VAT Number'],
            ['key' => 'invoice_address', 'label' => 'Invoice Address'],
            ['key' => 'invoice_postal_code', 'label' => 'Invoice Postal Code'],
            ['key' => 'invoice_city', 'label' => 'Invoice City'],
            ['key' => 'invoice_province', 'label' => 'Invoice Province'],
            ['key' => 'invoice_country', 'label' => 'Invoice Country'],
            ['key' => 'additional_information', 'label' => 'Additional Information'],
            ['key' => 'buyer_language', 'label' => 'Buyer Language'],
            ['key' => 'actions', 'label' => ''],
        ];
    @endphp
    <x-header title="Tickets" with-anchor separator />
    <x-button wire:click="create" icon="o-plus" class="btn btn-primary" label="Add new ticket" spinner />
    <x-table :headers="$headers" :rows="$tickets" striped with-pagination>
        @foreach($tickets as $ticket)
            @scope('actions', $ticket)
            <div class="flex">
                <x-button icon="o-pencil" wire:click="edit({{ $ticket->id }})" spinner class="btn-sm" />
                <x-button icon="o-trash" wire:click="delete({{ $ticket->id }})" spinner class="btn-sm" />
            </div>
            @endscope
        @endforeach
        <x-slot:empty>
            <x-icon name="o-cube" label="No tickets added so far" />
        </x-slot:empty>
    </x-table>


    <x-modal wire:model="createModal">
        <x-form wire:submit.prevent="store">
            <x-input label="Type" wire:model="type" />
            <x-input label="Participant Last Name" wire:model="participant_last_name" />
            <x-input label="Participant First Name" wire:model="participant_first_name" />
            <x-input label="Category" wire:model="category" />
            <x-input label="Subcategory" wire:model="subcategory" />
            <x-input label="Price" wire:model="price" />
            <x-input label="Barcode" wire:model="barcode" />
            <x-input label="Composed" wire:model="composed" />
            <x-input label="Order Date" wire:model="order_date" />
            <x-input label="Order Time" wire:model="order_time" />
            <x-input label="Payment Date" wire:model="payment_date" />
            <x-input label="Payment Time" wire:model="payment_time" />
            <x-input label="Order Number" wire:model="order_number" />
            <x-input label="Advanced Order Number" wire:model="advanced_order_number" />
            <x-input label="Ticket Number" wire:model="ticket_number" />
            <x-input label="Currency" wire:model="currency" />
            <x-input label="Deleted" wire:model="deleted" />
            <x-input label="Source" wire:model="source" />
            <x-input label="Public Price" wire:model="public_price" />
            <x-input label="Total Fees" wire:model="total_fees" />
            <x-input label="Discount Code" wire:model="discount_code" />
            <x-input label="Discount" wire:model="discount" />
            <x-input label="Total Price Paid Incl Tax" wire:model="total_price_paid_incl_tax" />
            <x-input label="Commission" wire:model="commission" />
            <x-input label="Total Price Without Commission Incl Tax" wire:model="total_price_without_commission_incl_tax" />
            <x-input label="Price Paid Excl Tax" wire:model="price_paid_excl_tax" />
            <x-input label="Tax Rate" wire:model="tax_rate" />
            <x-input label="Tax For Tax Declarations" wire:model="tax_for_tax_declarations" />
            <x-input label="Counter" wire:model="counter" />
            <x-input label="Counter Seller" wire:model="counter_seller" />
            <x-input label="Counter Payment" wire:model="counter_payment" />
            <x-input label="Counter Printing" wire:model="counter_printing" />
            <x-input label="Counter Operator" wire:model="counter_operator" />
            <x-input label="Buyer Last Name" wire:model="buyer_last_name" />
            <x-input label="Buyer First Name" wire:model="buyer_first_name" />
            <x-input label="Buyer Email" wire:model="buyer_email" />
            <x-input label="Ticket Status" wire:model="ticket_status" />
            <x-input label="Refund Request Date and Time" wire:model="refund_request_date_and_time" />
            <x-input label="Ticket Deletion Date and Time" wire:model="ticket_deletion_date_and_time" />
            <x-input label="Refund Request Source" wire:model="refund_request_source" />
            <x-input label="Refund Request Amount" wire:model="refund_request_amount" />
            <x-input label="Buyer Mobile" wire:model="buyer_mobile" />
            <x-input label="Buyer Country" wire:model="buyer_country" />
            <x-input label="Buyer Company" wire:model="buyer_company" />
            <x-input label="Buyer Job Title" wire:model="buyer_job_title" />
            <x-input label="Participant Email" wire:model="participant_email" />
            <x-input label="Marketing Source" wire:model="marketing_source" />
            <x-input label="Comments" wire:model="comments" />
            <x-input label="Invoice Company" wire:model="invoice_company" />
            <x-input label="Invoice VAT Number" wire:model="invoice_vat_number" />
            <x-input label="Invoice Address" wire:model="invoice_address" />
            <x-input label="Invoice Postal Code" wire:model="invoice_postal_code" />
            <x-input label="Invoice City" wire:model="invoice_city" />
            <x-input label="Invoice Province" wire:model="invoice_province" />
            <x-input label="Invoice Country" wire:model="invoice_country" />
            <x-input label="Additional Information" wire:model="additional_information" />
            <x-input label="Buyer Language" wire:model="buyer_language" />
            
            <x-slot:actions>
                <x-button label="Save" type="submit" class="btn-success" />
                <x-button label="Cancel" wire:click="closeModal" class="btn-danger" />
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-modal wire:model="updateModal">
        <x-form wire:submit.prevent="updateDetails">
            <x-input label="Type" wire:model="type" />
            <x-input label="Participant Last Name" wire:model="participant_last_name" />
            <x-input label="Participant First Name" wire:model="participant_first_name" />
            <x-input label="Category" wire:model="category" />
            <x-input label="Subcategory" wire:model="subcategory" />
            <x-input label="Price" wire:model="price" />
            <x-input label="Barcode" wire:model="barcode" />
            <x-input label="Composed" wire:model="composed" />
            <x-input label="Order Date" wire:model="order_date" />
            <x-input label="Order Time" wire:model="order_time" />
            <x-input label="Payment Date" wire:model="payment_date" />
            <x-input label="Payment Time" wire:model="payment_time" />
            <x-input label="Order Number" wire:model="order_number" />
            <x-input label="Advanced Order Number" wire:model="advanced_order_number" />
            <x-input label="Ticket Number" wire:model="ticket_number" />
            <x-input label="Currency" wire:model="currency" />
            <x-input label="Deleted" wire:model="deleted" />
            <x-input label="Source" wire:model="source" inline />
            <x-input label="Public Price" wire:model="public_price" inline />
            <x-input label="Total Fees" wire:model="total_fees" inline />
            <x-input label="Discount Code" wire:model="discount_code" inline />
            <x-input label="Discount" wire:model="discount" inline />
            <x-input label="Total Price Paid Incl Tax" wire:model="total_price_paid_incl_tax" inline />
            <x-input label="Commission" wire:model="commission" inline />
            <x-input label="Total Price Without Commission Incl Tax" wire:model="total_price_without_commission_incl_tax" inline />
            <x-input label="Price Paid Excl Tax" wire:model="price_paid_excl_tax" inline />
            <x-input label="Tax Rate" wire:model="tax_rate" inline />
            <x-input label="Tax For Tax Declarations" wire:model="tax_for_tax_declarations" inline />
            <x-input label="Counter" wire:model="counter" inline />
            <x-input label="Counter Seller" wire:model="counter_seller" inline />
            <x-input label="Counter Payment" wire:model="counter_payment" inline />
            <x-input label="Counter Printing" wire:model="counter_printing" inline />
            <x-input label="Counter Operator" wire:model="counter_operator" inline />
            <x-input label="Buyer Last Name" wire:model="buyer_last_name" inline />
            <x-input label="Buyer First Name" wire:model="buyer_first_name" inline />
            <x-input label="Buyer Email" wire:model="buyer_email" inline />
            <x-input label="Ticket Status" wire:model="ticket_status" inline />
            <x-input label="Refund Request Date and Time" wire:model="refund_request_date_and_time" inline />
            <x-input label="Ticket Deletion Date and Time" wire:model="ticket_deletion_date_and_time" inline />
            <x-input label="Refund Request Source" wire:model="refund_request_source" inline />
            <x-input label="Refund Request Amount" wire:model="refund_request_amount" inline />
            <x-input label="Buyer Mobile" wire:model="buyer_mobile" inline />
            <x-input label="Buyer Country" wire:model="buyer_country" inline />
            <x-input label="Buyer Company" wire:model="buyer_company" inline />
            <x-input label="Buyer Job Title" wire:model="buyer_job_title" inline />
            <x-input label="Participant Email" wire:model="participant_email" inline />
            <x-input label="Marketing Source" wire:model="marketing_source" inline />
            <x-input label="Comments" wire:model="comments" inline />
            <x-input label="Invoice Company" wire:model="invoice_company" inline />
            <x-input label="Invoice VAT Number" wire:model="invoice_vat_number" inline />
            <x-input label="Invoice Address" wire:model="invoice_address" inline />
            <x-input label="Invoice Postal Code" wire:model="invoice_postal_code" inline />
            <x-input label="Invoice City" wire:model="invoice_city" inline />
            <x-input label="Invoice Province" wire:model="invoice_province" inline />
            <x-input label="Invoice Country" wire:model="invoice_country" inline />
            <x-input label="Additional Information" wire:model="additional_information" inline />
            <x-input label="Buyer Language" wire:model="buyer_language" inline />
            

            <x-slot:actions>
                <x-button label="Save" type="submit" class="btn-success" />
                <x-button label="Cancel" wire:click="closeModal" class="btn-danger" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>
