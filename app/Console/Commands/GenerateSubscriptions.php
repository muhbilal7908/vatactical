<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ProcessSubscriptionsJob;
use App\Service\BankfulService;

class GenerateSubscriptions extends Command
{
    protected $signature = 'app:generate-subscriptions';
    protected $description = 'Generate and process upcoming course subscriptions';

    protected $bankful;

    public function __construct(BankfulService $bankful)
    {
        parent::__construct();
        $this->bankful = $bankful;
    }

    public function handle()
    {
        // Dispatch the job to the queue
        ProcessSubscriptionsJob::dispatch($this->bankful);

        $this->info('Subscription processing job dispatched.');
    }
}
