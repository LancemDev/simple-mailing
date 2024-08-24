<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;
use App\Models\Recipient;

class ViewUsers extends Component
{
    use WithPagination, Toast;
    public $name, $email;

    // public int $perPage = 3;
    public bool $createModal = false;

    public function create(){
        $this->createModal = true;
    }

    public function closeModal(){
        $this->createModal = false;
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Recipient::create([
            'first_name' => $this->name,
            'email' => $this->email,
        ]);

        $this->closeModal();
        $this->success('Recipient added successfully');
        $this->reset();
    }

    public function update($id){
        $recipient = Recipient::find($id);
        $this->name = $recipient->first_name;
        $this->email = $recipient->email;
        $this->createModal = true;
    }

    public function delete($id){
        Recipient::destroy($id);
        $this->success('Recipient deleted successfully');
    }

    public function updateDetails($id){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Recipient::find($id)->update([
            'first_name' => $this->name,
            'email' => $this->email,
        ]);

        $this->closeModal();
        $this->success('Recipient updated successfully');
        $this->reset();
    } 

    public function render()
    {
        return view('livewire.view-users');
    }
}
