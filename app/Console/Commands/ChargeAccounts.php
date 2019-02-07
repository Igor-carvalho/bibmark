<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AccountService;

class ChargeAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'charge:accounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Charge Accounts';

    protected $accountService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(AccountService $accountService)
    {
        parent::__construct();

        $this->accountService = $accountService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->accountService->chargeAccounts();
    }
}
