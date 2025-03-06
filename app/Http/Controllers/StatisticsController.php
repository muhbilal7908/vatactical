<?php
namespace App\Http\Controllers;

use App\Models\CourseSubscribe;
use App\Models\LotteryOrder;
use App\Models\Order;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
class StatisticsController extends Controller
{
    public function webStats(){
        $user_types = Analytics::fetchUserTypes(Period::months(12));
        $fetchTopReferrers = Analytics::fetchTopReferrers(Period::months(12));
        $fetchTopBrowsers = Analytics::fetchTopBrowsers(Period::months(12));

        $fetchTopCountries = Analytics::fetchTopCountries(Period::months(12));
        

        $fetchMostVisitedPages=Analytics::fetchVisitorsAndPageViews(Period::months(12));
        $fetchVisitorsAndPageViewsByDate = Analytics::fetchVisitorsAndPageViewsByDate(Period::months(12));
        $fetchTopOperatingSystems=Analytics::fetchTopOperatingSystems(Period::months(12));

    //    Sales

    $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();

        // Get orders, subscriptions, and lottery orders within the last 30 days
        $orders = Order::whereBetween('created_at', [$startDate, $endDate])->get();
        $subscriptions = CourseSubscribe::whereBetween('created_at', [$startDate, $endDate])->get();
        $lotteries = LotteryOrder::whereBetween('created_at', [$startDate, $endDate])->get();

        // Initialize arrays to hold the counts
        $orderCounts = [];
        $subscriptionCounts = [];
        $lotteryCounts = [];
        $dates = [];

        // Loop through each day in the last 30 days
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $formattedDate = $date->format('m/d'); // Format date as month/day

            $dates[] = $formattedDate;
            $orderCounts[] = $orders->where('created_at', '>=', $date->startOfDay())
                                    ->where('created_at', '<=', $date->endOfDay())
                                    ->count();
            $subscriptionCounts[] = $subscriptions->where('created_at', '>=', $date->startOfDay())
                                                  ->where('created_at', '<=', $date->endOfDay())
                                                  ->count();
            $lotteryCounts[] = $lotteries->where('created_at', '>=', $date->startOfDay())
                                         ->where('created_at', '<=', $date->endOfDay())
                                         ->count();
        }
    //
    return view('backend_app.statistics.seo', compact('user_types','fetchTopBrowsers','dates', 'orderCounts', 'subscriptionCounts', 'lotteryCounts','fetchTopCountries','fetchVisitorsAndPageViewsByDate','fetchTopOperatingSystems'));
    }
}
