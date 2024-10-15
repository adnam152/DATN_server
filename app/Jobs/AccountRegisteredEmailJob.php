<?php

namespace App\Jobs;

use App\Events\AccountRegistered;
use App\Models\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AccountRegisteredEmailJob implements ShouldQueue
{
    use Dispatchable, 
    InteractsWithQueue, 
    Queueable, 
    SerializesModels;

    protected $account;

    /**
     * Create a new job instance.
     */
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->account->email->send(new AccountRegistered($this->account)));
    }
}
