<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
        @php
            $mails = \App\Models\mail::all();

            $headers = [
                ['key' => 'id', 'label' => '#'],
                ['key' => 'name', 'label' => 'Name'],
                ['key' => 'email', 'label' => 'E-mail Address'],
                ['key' => 'phone', 'label' => 'Phone'],
                ['key' => 'actions', 'label' => 'Actions'],
            ];
        @endphp

        <x-header title="mails" with-anchor separator />
        <x-button wire:click="create" icon="o-plus" class="btn btn-primary" label="Add mail" spinner />
        <x-table :headers="$headers" :rows="$mails" striped>
            @foreach($mails as $mail)
                @scope('actions', $mail)
                <div class="flex">
                    <x-button icon="o-trash" wire:click="delete({{ $mail->id }})" spinner class="btn-sm" />
                    <x-button icon="o-pencil" wire:click="edit({{ $mail->id }})" spinner class="btn-sm" />
                </div>
                @endscope
            @endforeach
        </x-table>
</div>
