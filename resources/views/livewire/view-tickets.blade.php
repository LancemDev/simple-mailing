<div>
    @php 
        $users = \App\Models\NewRecipients::paginate(10); // Use paginate instead of all
        $headers = [
            ['key' => 'id', 'label' => '#'],
            ['key' => 'first_name', 'label' => 'First Name'],
            ['key' => 'last_name', 'label' => 'Last Name'],
            ['key' => 'role', 'label' => 'Role'],
            ['key' => 'company', 'label' => 'Company'],
            ['key' => 'mobile_number', 'label' => 'Phone Number'],
            ['key' => 'email', 'label' => 'E-mail Address'],
            ['key' => 'actions', 'label' => ''],
        ];
    @endphp
    <x-header title="Recipients" with-anchor separator />
    <x-button wire:click="create" icon="o-plus" class="btn btn-primary" label="Add new recipient" spinner />
    <x-table :headers="$headers" :rows="$users" striped with-pagination>
        @foreach($users as $user)
            @scope('actions', $user)
            <div class="flex">
                <x-button icon="o-pencil" wire:click="update({{ $user->id }})" spinner class="btn-sm" />
                <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner class="btn-sm" />
            </div>
            @endscope
        @endforeach
        <x-slot:empty>
            <x-icon name="o-cube" label="No recipients added so far" />
        </x-slot:empty>
    </x-table>

    <x-modal wire:model="createModal" title="Create Recipient">
        <x-form wire:submit="store">
            <x-input inline label="Name" hint="The name of the recipient" icon="o-user" wire:model="name" error-field="name_error" />
            <x-input inline label="Position" hint="The position of the recipient" icon="o-user-circle" wire:model="position" error-field="position_error" />
            <x-input inline label="Company" hint="The company of the recipient" icon="o-building-office-2" wire:model="company" error-field="company_error" />
            <x-input inline label="Phone Number" hint="The phone number of the recipient" icon="o-phone" wire:model="phone_number" error-field="phone_number_error" />
            <x-input inline label="Email" hint="The email of the recipient" icon="o-envelope-open" wire:model="email" error-field="email_error" />
            <x-input inline label="Status" hint="The status of the recipient" icon="o-users" wire:model="status" error-field="status_error" />
            <x-slot:actions>
                <x-button label="Save" type="submit" class="btn-success" wire:loading.attr="disabled" />
                <x-button label="Cancel" wire:click="closeModal" class="btn-danger" />
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-modal wire:model="updateModal" title="Update Recipient">
        <x-form wire:submit="updateDetails">
            <x-input inline label="Name" hint="The name of the recipient" icon="o-user" wire:model="name" error-field="name_error" />
            <x-input inline label="Position" hint="The position of the recipient" icon="o-user-circle" wire:model="position" error-field="position_error" />
            <x-input inline label="Company" hint="The company of the recipient" icon="o-building-office-2" wire:model="company" error-field="company_error" />
            <x-input inline label="Phone Number" hint="The phone number of the recipient" icon="o-phone" wire:model="phone_number" error-field="phone_number_error" />
            <x-input inline label="Email" hint="The email of the recipient" icon="o-envelope-open" wire:model="email" error-field="email_error" />
            <x-input inline label="Status" hint="The status of the recipient" icon="o-users" wire:model="status" error-field="status_error" />
            <x-slot:actions>
                <x-button label="Save" type="submit" class="btn-success" wire:loading.attr="disabled" />
                <x-button label="Cancel" wire:click="closeModal" class="btn-danger" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>