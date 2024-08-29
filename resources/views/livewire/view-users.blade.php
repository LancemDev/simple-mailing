<div>
    @php 
        $users = \App\Models\Contact::paginate(10); // Use paginate instead of all
        $headers = [
            ['key' => 'id', 'label' => '#'],
            ['key' => 'name', 'label' => 'name'],
            ['key' => 'position', 'label' => 'Position'],
            ['key' => 'company', 'label' => 'Company'],
            ['key' => 'phone_number', 'label' => 'Phone Number'],
            ['key' => 'email', 'label' => 'E-mail Address'],
            ['key' => 'status', 'label' => 'Status'],
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

    <x-modal wire:model="createModal">
        <x-form wire:submit="store">
            <x-input inline label="Name" hint="The name of the recipient" icon="o-user" wire:model="name" />
            <x-input inline label="Email" hint="The email of the recipient" icon="o-users" wire:model="email" />
            <x-slot:actions>
                <x-button label="Save" type="submit" class="btn-success" wire:loading.attr="disabled" />
                <x-button label="Cancel" wire:click="closeModal" class="btn-danger" />
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-modal wire:model="updateModal">
        <x-form wire:submit="updateDetails">
            <x-input inline label="Name" hint="The name of the recipient" icon="o-user" wire:model="name" />
            <x-input inline label="Email" hint="The email of the recipient" icon="o-users" wire:model="email" />
            <x-slot:actions>
                <x-button label="Save" type="submit" class="btn-success" wire:loading.attr="disabled" />
                <x-button label="Cancel" wire:click="closeModal" class="btn-danger" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>