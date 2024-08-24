<div>
    @php
        $mails = \App\Models\Mail::paginate(10); // Use paginate instead of all
    
        $headers = [
            ['key' => 'id', 'label' => '#'],
            ['key' => 'created_at', 'label' => 'Sent At'],
            ['key' => 'subject', 'label' => 'Subject'],
            ['key' => 'content', 'label' => 'Content'],
            ['key' => 'actions', 'label' => ''],
        ];
    @endphp
    
    <x-header title="Mails" with-anchor separator />
    <x-button wire:click="create" icon="o-plus" class="btn btn-primary" label="Send new email" spinner />
    <x-table :headers="$headers" :rows="$mails" striped with-pagination>
        @foreach($mails as $mail)
            @scope('actions', $mail)
            <div class="flex">
                <x-button icon="o-pencil" wire:click="view({{ $mail->id }})" spinner class="btn-sm" />
            </div>
            @endscope
        @endforeach
        <x-slot:empty>
            <x-icon name="o-cube" label="No emails sent so far" />
        </x-slot:empty>
    </x-table>

    <!-- First Modal for Subject and Content -->
    <x-modal wire:model="mailModal">
        <x-form wire:submit.prevent="openSelectModal">
            <x-input inline label="Subject" hint="The Subject of your email" icon="o-user" wire:model="subject" />
            <x-textarea
                label="Content"
                wire:model="content"
                placeholder="Your story ..."
                hint="Max 1000 chars"
                rows="5"
                inline
            />
            <x-slot:actions>
                <x-button label="Next" type="submit" class="btn-success" wire:loading.attr="disabled" />
                <x-button label="Cancel" wire:click="closeModal" class="btn-danger" />
            </x-slot:actions>
        </x-form>
    </x-modal>

    <!-- Second Modal for Selecting Recipients -->
    <x-modal wire:model="selectModal">
        <x-form wire:submit.prevent="sendMail">
            <x-input inline label="Add New Recipient" wire:model="newRecipient"  />
            <x-button label="Add" wire:click="addRecipient" class="btn-primary" />
            @php
                $headers = [
                    ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
                    ['key' => 'email', 'label' => 'Email'],
                ];
            @endphp
            <x-table
                :headers="$headers"
                :rows="$allRecipients"
                wire:model="selectedRecipients"
                selectable
                @row-selection="console.log($event.detail)" />
            <div wire:loading wire:target="sendMail">
                <x-loading class="loading-ring" /> Sending emails, please wait...
            </div>
            <x-slot:actions>
                <x-button label="Send" type="submit" class="btn-success" wire:loading.attr="disabled" />
                <x-button label="Cancel" wire:click="closeModal" class="btn-danger" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>