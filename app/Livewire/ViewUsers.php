<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;
use App\Models\Contact;

class ViewUsers extends Component
{
    use WithPagination, Toast;
    public $name, $email, $position, $company, $phone_number, $status;

    // public int $perPage = 3;
    public bool $createModal = false;
    public bool $updateModal = false;

    public function create(){
        $this->createModal = true;
    }

    public function closeModal(){
        $this->createModal = false;
        $this->updateModal = false;
    }

    public function store(){
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'position' => $this->position,
            'company' => $this->company,
            'phone_number' => $this->phone_number,
            'status' => $this->status,
        ]);

        $this->closeModal();
        $this->success('Recipient added successfully');
        $this->reset();
    }

    public function update($id){
        $recipient = Contact::find($id);
        $this->name = $recipient->name;
        $this->email = $recipient->email;
        $this->position = $recipient->position;
        $this->company = $recipient->company;
        $this->phone_number = $recipient->phone_number;
        $this->status = $recipient->status;
        $this->updateModal = true;
    }

    public function delete($id){
        Contact::destroy($id);
        $this->success('Recipient deleted successfully');
    }

    public function updateDetails($id){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Contact::find($id)->update([
            'name' => $this->name,
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
