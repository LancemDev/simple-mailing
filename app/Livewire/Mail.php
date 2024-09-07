<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact as Recipients;
use App\Models\Mail as MailModel;
use Illuminate\Support\Facades\Mail as Mailer;
use App\Mail\MassMail;
use League\CommonMark\CommonMarkConverter;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class Mail extends Component
{
    use WithFileUploads, Toast;
    
    public $content;
    public $subject;
    public $mailModal = false;
    public $selectModal = false;
    public $isSending = false;
    public $recipients;
    public $selectedRecipients = [];
    public $extraRecipients = [];
    public $newRecipient = '';
    public $selectedCompany = null;
    public $companies;

    public function mount()
    {
        $this->recipients = collect();
        $this->companies = Recipients::select('company')->distinct()->get()->pluck('company');
    }

    public function create()
    {
        $this->content = '';
        $this->subject = '';
        
        $this->mailModal = true;
    }

    public function closeModal()
    {
        $this->mailModal = false;
        $this->selectModal = false;
    }

    public function openSelectModal()
    {
        $this->recipients = Recipients::where('email', 'LIKE', '%@%')->get();
        $this->selectModal = true;
    }    

    public function addRecipient()
    {
        if (!empty($this->newRecipient)) {
            $this->extraRecipients[] = (object) ['id' => 'extra_' . count($this->extraRecipients), 'email' => $this->newRecipient];
            $this->newRecipient = '';
        }
    }

    public function view($id)
    {
        $this->mailModal = true;
        $mail = MailModel::find($id);
        $this->subject = $mail->subject;
        $this->content = $mail->content;
    }

    public function sendMail()
    {
        $this->validate([
            'subject' => 'required',
            'content' => 'required'
        ]);
    
        $this->isSending = true;
    
        $selectedEmails = $this->recipients
            ->whereIn('id', $this->selectedRecipients)
            ->pluck('email')
            ->toArray();
    
        $extraEmails = collect($this->extraRecipients)
            ->whereIn('id', $this->selectedRecipients)
            ->pluck('email')
            ->toArray();
    
        $recipients = array_merge($selectedEmails, $extraEmails);
    
        // Convert markdown content to HTML
        $converter = new CommonMarkConverter();
        $htmlContent = $converter->convertToHtml($this->content);
    
        // Insert email record into the mails table
        $mail = MailModel::create([
            'subject' => $this->subject,
            'content' => $this->content,
        ]);
    
        // Send emails to recipients
        foreach ($recipients as $recipient) {
            if (!empty($recipient)) {
                Mailer::to($recipient)->send(new MassMail($this->subject, $htmlContent));
            }
        }
    
        $this->isSending = false;
    
        $this->success('Mail sent successfully to : ' . count($recipients) . ' recipients');
        $this->mailModal = false;
        $this->selectModal = false;
    }

    public function render()
    {
        $filteredRecipients = $this->selectedCompany 
            ? Recipients::where('company', $this->selectedCompany)->get() 
            : Recipients::all();

        return view('livewire.mail', [
            'mails' => MailModel::orderBy('id', 'asc')->get(),
            'allRecipients' => $filteredRecipients->merge(collect($this->extraRecipients))->toArray(),
            'companies' => $this->companies
        ]);
    }
}