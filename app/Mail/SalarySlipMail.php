<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\SalarySlip;

class SalarySlipMail extends Mailable
{
    use Queueable, SerializesModels;

    public $slip;

    public function __construct(SalarySlip $slip)
    {
        $this->slip = $slip;
    }

    public function build()
    {
        return $this->subject("Slip Gaji {$this->slip->periode}")
                    ->view('emails.salary_slip');
    }
}
