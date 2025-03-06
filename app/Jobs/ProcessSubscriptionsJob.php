<?php
namespace App\Jobs;

use App\Mail\Subscribe;
use App\Mail\SubscribeAdmin;
use App\Models\Course;
use App\Models\CourseSubscribe;
use App\Models\SettingModel;
use App\Service\BankfulService;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessSubscriptionsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $bankful;

    public function __construct(BankfulService $bankful)
    {
        $this->bankful = $bankful;
    }

    public function handle()
    {
        // Fetch subscriptions that have a repeating schedule
     
        $subscriptions = CourseSubscribe::with('slot')->get();
        
        foreach ($subscriptions as $subscription) {
            $course=Course::find($subscription->course_id);
            $repeatType = $subscription->repeat;
            $nextDate = null;

            

            // Check if the next subscription date is upcoming
            if ($nextDate && Carbon::now()->greaterThanOrEqualTo($nextDate)) {
                // Process the payment and create a new subscription
                $transactionSuccess = $this->bankful->transaction($subscription, $nextDate);
               
                if ($transactionSuccess === "APPROVED") {
                    $newSubscription = $subscription->replicate();
                    $newSubscription->slot_date = $nextDate;
                    $newSubscription->total = $subscription->total;
                    $newSubscription->save();
                    Mail::to($newSubscription->email)->send(new Subscribe($newSubscription, $course));
                    $admin_mail = SettingModel::find(1);
                    Mail::to($admin_mail->mailer_email_id)->send(new SubscribeAdmin($newSubscription, $course));
                    // Optionally, log or send a notification
                } else {
                    // Handle failed transaction
                    // Optionally, log or send a notification
                }
            }
        }
    }
}
