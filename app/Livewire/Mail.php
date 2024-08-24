<?php

namespace App\Livewire;

use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\Recipient;
use Illuminate\Support\Facades\Mail as Mailer;
use App\Mail\MassMail;
use Illuminate\Support\Collection;
use Livewire\WithPagination;

class Mail extends Component
{
    use Toast, WithPagination;

    public $content;
    public $subject;
    public $mailModal = false;
    public $selectModal = false;
    public $isSending = false;
    public $recipients;
    public $selectedRecipients = [];
    public $extraRecipients = [];
    public $newRecipient = '';

    public function mount()
    {
        $this->recipients = collect();
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
        $this->recipients = Recipient::all();
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
        $mail = \App\Models\Mail::find($id);
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

        // Insert email record into the mails table
        $mail = \App\Models\Mail::create([
            'subject' => $this->subject,
            'content' => $this->content,
        ]);

        foreach ($recipients as $recipient) {
            if (!empty($recipient)) {
                Mailer::to($recipient)->send(new MassMail($this->subject, $this->content));

                // Insert recipient record into the mail_recipients table
                \App\Models\MailRecipient::create([
                    'mail_id' => $mail->id,
                    'email' => $recipient,
                    'recipient_id' => Recipient::where('email', $recipient)->first()->id
                ]);
            }
        }

        $this->isSending = false;

        $this->success('Mail sent successfully to : ' . count($recipients) . ' recipients');
        $this->mailModal = false;
        $this->selectModal = false;
    }

    public function render()
    {
        return view('livewire.mail', [
            'allRecipients' => $this->recipients->merge(collect($this->extraRecipients))->toArray()
        ]);
    }
}