<?php

namespace App\Http\Controllers\Admin;

use Analytics;
use App\Models\Transactions;
use App\Models\Listings;
use App\Models\Bookings;
use App\Models\Reviews;
use App\Models\Withdraws;
use App\Models\BodyTypes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Spatie\Analytics\Period;
use Yandex\Metrica\Management\ManagementClient;
use Yandex\Metrica\Stat\StatClient;
use Yandex\Metrica\Analytics\AnalyticsClient;
use Yandex\OAuth\OAuthClient;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Carbon;

class DashboardController extends AdminController
{

    /**
     * Display a listing of the blogs.
     *
     * @return Illuminate\View\View
     */
    public function trips(Request $request)
    {
        $users = User::get();
        $body_types = BodyTypes::get();
        if ($request->ajax()) {
            $combined_date_and_time1 = $request->from_date . ' ' . '00:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->to_date . ' ' . '24:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);
            $type = $request->type;
            $body_type = $request->body_type;
            $user_id = $request->user_id;
            if($request->type == 'car_body'){
                $query1 = Listings::select(
                    'listings.id',
                    'listings.user_id',
                    'listings.car_id',
                    'cars.body_type',
                    'listings.starting_date'
                )
                    ->select(DB::raw('DATE(listings.starting_date) as date'), DB::raw('cars.body_type as body_type'), DB::raw('body_types.name as truck_body_type'),  DB::raw('count(*) as views'))
                    ->leftjoin('cars', 'cars.id', '=', 'listings.car_id')
                    ->leftjoin('trucks', 'trucks.id', '=', 'listings.truck_id')
                    ->leftjoin('body_types', 'body_types.id', '=', 'trucks.body_type_id');

                if ($request->to_date != null)

                $query1->whereBetween('listings.starting_date', [$from_date, $to_date]);
                else
                    $query1->where('listings.starting_date', '>', $from_date);

                if ($request->user_id != null){
                    $query1->where('listings.user_id', '=', $request->user_id);
                }

                if($request->body_type != 'все'){
                    $query1->where('cars.body_type', $request->body_type);
                }

                $listings = $query1->groupBy('date')
                ->groupBy('cars.body_type')
                ->groupBy('body_types.name')
                ->get();

                $query2 = Listings::select(
                    'listings.id',
                    'listings.user_id',
                    'cars.body_type',
                    'listings.starting_date'
                )->select(DB::raw('DATE(listings.starting_date) as date'), DB::raw('count(*) as views'))
                ->leftjoin('cars', 'cars.id', '=', 'listings.car_id')
                ->leftjoin('trucks', 'trucks.id', '=', 'listings.truck_id')
                ->leftjoin('body_types', 'body_types.id', '=', 'trucks.body_type_id');

                if ($request->to_date != null)
                $query2->whereBetween('listings.starting_date', [$from_date, $to_date]);
                else
                    $query2->where('listings.starting_date', '>', $from_date);

                if ($request->user_id != null) {
                    $query2->where('listings.user_id', '=', $request->user_id);
                }

                if($request->body_type != 'все'){
                    $query2->where('cars.body_type', $request->body_type);
                }
                
                $listings_date = $query2->groupBy('date')->orderBy('date')->get();
                // dd($listings_date);
                $filtered_listings = [];
                foreach ($listings as $item) {
                    if (!is_null($item->body_type) && !isset($filtered_listings[$item->body_type][$item->date])) {
                        $filtered_listings[$item->body_type][$item->date] = [];
                        $filtered_listings[$item->body_type][$item->date] = $item->views;
                    }
                    if (!is_null($item->truck_body_type) && !isset($filtered_listings[$item->truck_body_type])) {
                        $filtered_listings[$item->truck_body_type][$item->date] = [];
                        $filtered_listings[$item->truck_body_type][$item->date] = $item->views;
                    }
                    # code...
                }
            }
            else{
                $query1 = Listings::select(
                    'listings.id',
                    'listings.user_id',
                    'listings.car_id',
                    'locations.city',
                    'listings.starting_date'
                )
                    ->select(DB::raw('DATE(listings.starting_date) as date'), DB::raw('locations.city as city'), DB::raw('count(*) as views'))
                    ->leftjoin('locations', 'locations.id', '=', 'listings.location_id');

                if ($request->to_date != null)
                $query1->whereBetween('listings.starting_date', [$from_date, $to_date]);
                else
                    $query1->where('listings.starting_date', '>', $from_date);


                if ($request->user_id != null) {
                    $query1->where('listings.user_id', '=', $request->user_id);
                }

                $listings = $query1->groupBy('date')
                ->groupBy('locations.city')
                ->get();

                // dd($listings);

                $query2 = Listings::select(
                    'listings.id',
                    'listings.user_id',
                    'listings.starting_date'
                )
                ->select(DB::raw('DATE(listings.starting_date) as date'), DB::raw('count(*) as views'));
                if ($request->to_date != null)
                $query2->whereBetween('listings.starting_date', [$from_date, $to_date]);
                else
                    $query2->where('listings.starting_date', '>', $from_date);

                if ($request->user_id != null) {
                    $query2->where('listings.user_id', '=', $request->user_id);
                }

                $listings_date = $query2->groupBy('date')->orderBy('date')->get();
                // dd($listings_date);
                $filtered_listings = [];
                foreach ($listings as $item) {
                    if (!is_null($item->city) && !isset($filtered_listings[$item->city][$item->date])) {
                        $filtered_listings[$item->city][$item->date] = [];
                        $filtered_listings[$item->city][$item->date] = $item->views;
                    }
                    # code...
                }

                // dd($filtered_listings);
            }
           
            

            
            if ($request->type == 'car_body') {
                $data['template'] = view('admin.dashboard.trip_template', compact(
                    'listings', 
                    'filtered_listings', 
                    'listings_date', 
                    'type', 
                    'users', 
                    'user_id',
                    'body_types',
                    'body_type'
                ))->render();
            }
            else{
                $data['template'] = view('admin.dashboard.trip_template_region', compact(
                    'listings', 
                    'filtered_listings', 
                    'listings_date', 
                    'type', 
                    'users', 
                    'user_id',
                    'body_types',
                    'body_type'
                ))->render();
            }
            
            return $data;
        }
        else
        {
            $listings = Listings::select(
                'listings.id',
                'listings.car_id',
                'cars.body_type',
                'listings.starting_date'
            )
            ->select(DB::raw('DATE(listings.starting_date) as date'), DB::raw('cars.body_type as body_type'), DB::raw('body_types.name as truck_body_type'),  DB::raw('count(*) as views'))
            ->leftjoin('cars', 'cars.id', '=', 'listings.car_id')
            ->leftjoin('trucks', 'trucks.id', '=', 'listings.truck_id')
            ->leftjoin('body_types', 'body_types.id', '=', 'trucks.body_type_id')
            ->whereBetween('listings.starting_date', [Carbon::now(), Carbon::now()])
            ->groupBy('date')
            ->groupBy('cars.body_type')
            ->groupBy('body_types.name')
            ->get();

            $listings_date = Listings::select(
                'listings.id',
                'listings.starting_date'
            )
                ->select(DB::raw('DATE(listings.starting_date) as date'), DB::raw('count(*) as views'))
                // ->whereBetween('listings.starting_date', [Carbon::now()->addDays(-7), Carbon::now()])
                ->groupBy('date')
                ->get();
            // dd($listings_date);
            $filtered_listings = [];
            foreach ($listings as $item) {
                if (!is_null($item->body_type) && !isset($filtered_listings[$item->body_type][$item->date])){
                    $filtered_listings[$item->body_type][$item->date] = [];
                    $filtered_listings[$item->body_type][$item->date] = $item->views;
                }
                if (!is_null($item->truck_body_type) && !isset($filtered_listings[$item->truck_body_type])) {
                    $filtered_listings[$item->truck_body_type][$item->date] = [];
                    $filtered_listings[$item->truck_body_type][$item->date] = $item->views;
                }  
                # code...
            }
            $type = "car_body";
            // dd($filtered_listings);
            return view('admin.dashboard.trips', compact(
                'listings', 
                'filtered_listings', 
                'listings_date', 
                'type', 
                'users', 
                'body_types'
            ));
        }
    }

    public function profit(Request $request)
    {
        if ($request->ajax()) {
            $user_id = $request->user_id;
            $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);
            $query1 = Transactions::orderBy('created_at');
            $query2 = Bookings::where('status', 'released');
            $query3 = Bookings::where('status', 'released');
            $query4 = Bookings::where('status', 'released')
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(amount) as amount'))
                ->groupBy('date');
            if($request->user_id != null){
                $query1->where('user_id', '=', $user_id);
                $query2->where('user_id', '=', $user_id);
                $query3->where('user_id', '=', $user_id);
                $query4->where('user_id', '=', $user_id);
            }
            if($request->from_date != null){
                $query1->whereBetween('created_at', [$to_date, $from_date]);
                $query2->whereBetween('created_at', [$to_date, $from_date]);
                $query3->whereBetween('created_at', [$to_date, $from_date]);
                $query4->whereBetween('created_at', [$to_date, $from_date]);
            }
            $transactionsObjects = $query1->get();
            $bookings = $query2->get();
            $profit_total = $query3->sum('amount');
            $bookings_date = $query4->get();
            $data['template'] = view('admin.dashboard.profit_template', compact('bookings', 'profit_total', 'bookings_date'))->render();
            return $data;

        } else {
            $users = User::get();
            $transactionsObjects = Transactions::get();
            $bookings = Bookings::where('status', 'released')->get();
            $profit_total = Bookings::where('status', 'released')->sum('amount');
            $bookings_date = Bookings::where('status', 'released')->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(amount) as amount'))
                ->groupBy('date')
                ->get();
            // dd($bookings_date);
            return view('admin.dashboard.profit', compact('bookings', 'profit_total', 'bookings_date','users'));
        }

        // return view('admin.dashboard.profit');
    }

    public function google(Request $request)
    {
        if ($request->ajax()) {
            $period = $request->get('period');
            if ($period == 'all') {
                $now = time(); // or your date as well
                $start_date = strtotime("2020-5-30");
                $datediff = $now - $start_date;
                $period = round($datediff / (60 * 60 * 24));
            }
            $analyticsDatasEvent = Analytics::performQuery(
                Period::days(1),
                ' ga:userType',
                [
                    'metrics' => 'ga:users',
                    'dimensions' => 'ga:eventCategory',
                ]
            );

            $analyticsData = Analytics::performQuery(
                Period::days($period),
                ' ga:userType',
                [
                    'metrics' => 'ga:users',
                    'dimensions' => 'ga:date',
                ]
            );

            $analyticsDatasCity = Analytics::performQuery(
                Period::days($period),
                ' ga:userType',
                [
                    'metrics' => 'ga:users',
                    'dimensions' => 'ga:country',
                ]
            );

            $analyticsAverageTime = Analytics::performQuery(
                Period::days($period),
                'ga:sessionDuration',
                [
                    'metrics' => 'ga:users, ga:pageviews, ga:sessionDuration',
                    'dimensions' => 'ga:date',
                ]
            );

            $analyticsDatasByHour = Analytics::performQuery(
                Period::days(1),
                ' ga:userType',
                [
                    'metrics' => 'ga:users',
                    'dimensions' => 'ga:hour',
                ]
            );

            $analyticsAverageTimeDuringDay = Analytics::performQuery(
                Period::days(1),
                'ga:sessionDuration',
                [
                    'metrics' => 'ga:users, ga:pageviews, ga:sessionDuration',
                    'dimensions' => 'ga:hour'
                ]
            );

            $analyticsDatasBySource = Analytics::performQuery(
                Period::days($period),
                ' ga:userType',
                [
                    'metrics' => 'ga:users',
                    'dimensions' => 'ga:source',
                ]
            );

            return view('admin.dashboard.google_template', compact(
                'analyticsData',
                'analyticsDatasCity',
                'analyticsAverageTime',
                'analyticsDatasByHour',
                'analyticsAverageTimeDuringDay',
                'analyticsDatasBySource',
                'analyticsDatasEvent'
            ))->render();
        } else {
            // $now = time(); // or your date as well
            // $start_date = strtotime("2020-5-30");
            // $datediff = $now - $start_date;

            // $period = round($datediff / (60 * 60 * 24));
            $period = 6;
            // dd($period);


            $analyticsDatasEvent = Analytics::performQuery(
                Period::days($period),
                'ga:totalEvents',
                [
                    'metrics' => 'ga:users, ga:pageviews, ga:sessionDuration',
                    'dimensions' => 'ga:eventCategory',
                ]
            );

            // dd($analyticsDatasEvent);

            $analyticsData = Analytics::performQuery(
                Period::days($period),
                ' ga:userType',
                [
                    'metrics' => 'ga:users',
                    'dimensions' => 'ga:date',
                ]
            );

            $analyticsDatasCity = Analytics::performQuery(
                Period::days($period),
                ' ga:userType',
                [
                    'metrics' => 'ga:users',
                    'dimensions' => 'ga:country',
                ]
            );

            $analyticsAverageTime = Analytics::performQuery(
                Period::days(6),
                'ga:sessionDuration',
                [
                    'metrics' => 'ga:users, ga:pageviews, ga:sessionDuration',
                    'dimensions' => 'ga:date',
                ]
            );

            $analyticsDatasByHour = Analytics::performQuery(
                Period::days(1),
                ' ga:userType',
                [
                    'metrics' => 'ga:users',
                    'dimensions' => 'ga:hour',
                ]
            );

            $analyticsAverageTimeDuringDay = Analytics::performQuery(
                Period::days(1),
                'ga:sessionDuration',
                [
                    'metrics' => 'ga:users, ga:pageviews, ga:sessionDuration',
                    'dimensions' => 'ga:hour',
                ]
            );

            // dd($analyticsAverageTimeDuringDay);

            $analyticsDatasBySource = Analytics::performQuery(
                Period::days($period),
                ' ga:userType',
                [
                    'metrics' => 'ga:users',
                    'dimensions' => 'ga:source',
                ]
            );
        }
        // dd($analyticsDatasBySource);
        return view('admin.dashboard.google', compact(
            'analyticsData',
            'analyticsDatasCity',
            'analyticsAverageTime',
            'analyticsDatasByHour',
            'analyticsAverageTimeDuringDay',
            'analyticsDatasBySource',
            'analyticsDatasEvent'
        ));

        // $averageTime = $analyticsAverageTime['rows'][0][2] / $analyticsAverageTime['rows'][0][0];

        // dd($averageTime);
        // exit;
    }

    public function yandex(Request $request)
    {
        $errorMessage = false;
        $accessToken = 'AgAAAABGECllAAaanRuyGjr9Wk9Im-H8M2uKvRE';
        // $accessToken = 'ddd';
        $counterId = '67411513';

        // $client = new OAuthClient(env('YANDEX_USER_NAME'), env('YANDEX_PASSWORD'));
        // try {
        //     $client->requestAccessToken('7276155');
        // } catch (\Yandex\OAuth\Exception\AuthRequestException $ex) {
        //     echo '<p class="text-danger">' . $ex->getMessage() . '</p>';
        // }
        // if ($client->getAccessToken()) {
        //     // echo "<p>PHP: Access token from server is " . $client->getAccessToken() . '</p>';
        //     $accessToken = $client->getAccessToken();
        // }
        $statClient = new StatClient($accessToken);
        // exit;

        if ($request->ajax()) {
            try {
                // $period = $request->get('period');
                $start_date = $request->get('start_date');
                $from_date = $request->get('from_date');
                $paramsModel = new \Yandex\Metrica\Stat\Models\ByTimeParams();
                $period = $paramsModel
                    ->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_USERS)
                    ->setId($counterId)
                    ->setDate1($from_date)
                    ->setDate2($start_date)
                    ->setGroup('day');
                $data = $statClient->data()->getByTime($paramsModel);

                $paramsModel
                    ->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_AVG_VISIT_DURATION_SECONDS)
                    ->setId($counterId)
                    ->setDate1($from_date)
                    ->setDate2($start_date)
                    ->setGroup('day');
                $dataAverageTime = $statClient->data()->getByTime($paramsModel);

                // dd($dataAverageTime);



                $paramsModel
                ->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_AVG_VISIT_DURATION_SECONDS)
                ->setId($counterId)
                ->setDate1($start_date)
                ->setGroup('hours');
                $dataAverageTimeToday = $statClient->data()->getByTime($paramsModel);


                $paramsModel = new \Yandex\Metrica\Stat\Models\TableParams();
                $paramsModel->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_USERS)
                    ->setDimensions(\Yandex\Metrica\Stat\DimensionsConst::S_REGION_COUNTRY)
                    ->setId($counterId);
                $dataCity = $statClient->data()->getTable($paramsModel);

                $paramsModelTime = new \Yandex\Metrica\Stat\Models\ByTimeParams();
                $paramsModelTime
                    ->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_USERS)
                    ->setId($counterId)
                    ->setDate1($from_date)
                    ->setDate2($start_date)
                    ->setGroup('hours');
                $dataTimeTrafic = $statClient->data()->getByTime($paramsModelTime);

                $paramsObj = new \Yandex\Metrica\Analytics\Models\Params();
                $paramsObj
                    ->setMetrics(\Yandex\Metrica\Analytics\MetricConst::GA_SESSIONS)
                    ->setStartDate($from_date)
                    ->setEndDate($start_date)
                    ->setIds('ga:' . $counterId)
                    ->setDimensions(\Yandex\Metrica\Analytics\DimensionsConst::GA_SOURCE);
                $analyticsClient = new AnalyticsClient($accessToken);
                $dataSourceTrafic = $analyticsClient->ga()->getGaData($paramsObj);

                $paramsModel = new \Yandex\Metrica\Stat\Models\TableParams();
                $paramsModel->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_USERS)
                ->setDimensions(\Yandex\Metrica\Stat\DimensionsConst::S_GOAL_DIMENSION)
                ->setId($counterId);
                $dataGoal = $statClient->data()->getTable($paramsModel)->getData()->getAll();

                return view('admin.dashboard.yandex_template', compact(
                    'data',
                    'dataCity',
                    'dataAverageTime',
                    'dataTimeTrafic',
                    'dataSourceTrafic',
                    'dataAverageTimeToday',
                    'dataGoal'
                ))->render();
            } catch (\Exception $ex) {
                $errorMessage = $ex->getMessage();
                echo $errorMessage;
                // return abort(404);
            }
        } else {
            try {
              
                $paramsModel = new \Yandex\Metrica\Stat\Models\ByTimeParams();
                $paramsModel
                    ->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_USERS)
                    ->setId($counterId)
                    ->setDate1('6daysAgo')
                    ->setDate2('today')
                    ->setGroup('day');
                $data = $statClient->data()->getByTime($paramsModel);
                // dd($data);

                $paramsModel = new \Yandex\Metrica\Stat\Models\TableParams();
                $paramsModel->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_USERS)
                ->setDimensions(\Yandex\Metrica\Stat\DimensionsConst::S_GOAL_DIMENSION)
                ->setId($counterId);
                $dataGoal = $statClient->data()->getTable($paramsModel)->getData()->getAll();

                $paramsModel = new \Yandex\Metrica\Stat\Models\ByTimeParams();
                $paramsModel
                    ->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_AVG_VISIT_DURATION_SECONDS)
                    ->setId($counterId)
                    ->setDate1('6daysAgo')
                    ->setDate2('today')
                    ->setGroup('day');
                $dataAverageTime = $statClient->data()->getByTime($paramsModel);

                $paramsModel
                    ->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_AVG_VISIT_DURATION_SECONDS)
                    ->setId($counterId)
                    ->setDate1('today')
                    ->setGroup('hours');
                $dataAverageTimeToday = $statClient->data()->getByTime($paramsModel);

                $paramsModel = new \Yandex\Metrica\Stat\Models\TableParams();
                $paramsModel->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_USERS)
                    ->setDimensions(\Yandex\Metrica\Stat\DimensionsConst::S_REGION_COUNTRY)
                    ->setId($counterId);
                $dataCity = $statClient->data()->getTable($paramsModel);

                $paramsModelTime = new \Yandex\Metrica\Stat\Models\ByTimeParams();
                $paramsModelTime
                    ->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_USERS)
                    ->setId($counterId)
                    ->setDate1('1daysAgo')
                    ->setDate2('today')
                    ->setGroup('hours');
                $dataTimeTrafic = $statClient->data()->getByTime($paramsModelTime);

                $paramsObj = new \Yandex\Metrica\Analytics\Models\Params();
                $paramsObj
                    ->setMetrics(\Yandex\Metrica\Analytics\MetricConst::GA_SESSIONS)
                    ->setStartDate('6daysAgo')
                    ->setEndDate('today')
                    ->setIds('ga:' . $counterId)
                    ->setDimensions(\Yandex\Metrica\Analytics\DimensionsConst::GA_SOURCE);
                $analyticsClient = new AnalyticsClient($accessToken);
                $dataSourceTrafic = $analyticsClient->ga()->getGaData($paramsObj);

                return view('admin.dashboard.yandex', compact(
                    'data',
                    'dataCity',
                    'dataAverageTime',
                    'dataTimeTrafic',
                    'dataSourceTrafic',
                    'dataAverageTimeToday',
                    'dataGoal'
                ));
            } catch (\Exception $ex) {
                $errorMessage = $ex->getMessage();
                echo $errorMessage;

                // return abort(404);
            }
        }
    }

    public function withdraw(Request $request)
    {
        if ($request->ajax()) {
            $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);
            $withdrawObjects = Withdraws::with('user')
                ->where('status', 'complete')
                ->whereBetween('created_at', [$to_date, $from_date])
                ->get();
            $withdraws = Withdraws::where('status', 'complete')->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(amount) as amount'))
                ->groupBy('date')
                ->whereBetween('created_at', [$to_date, $from_date])
                ->get();
            $total = Withdraws::where('status', 'complete')->whereBetween('created_at', [$to_date, $from_date])->sum('amount');
            $data['template'] = view('admin.dashboard.withdraw_template', compact('withdrawObjects', 'withdraws','total'))->render();
            return $data;
        } else {
            $date = Carbon::now();
            $from_day = $date->format("Y-m-d");
            $to_day = Carbon::now()->subDays(6)->format("Y-m-d");
            $withdrawObjects = Withdraws::where('status', 'complete')->whereBetween('created_at', [$to_day, $from_day])->get();
            $withdraws = Withdraws::where('status', 'complete')->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(amount) as amount'))
                ->whereBetween('created_at', [$to_day, $from_day])
                ->groupBy('date')
                ->get();
            $total = Withdraws::where('status', 'complete')->whereBetween('created_at', [$to_day, $from_day])->sum('amount');
            // return view('admin.dashboard.withdraw', compact('withdrawObjects', 'withdraws'));
            // dd($withdrawObjects);
            return view('admin.dashboard.withdraw', compact('withdrawObjects', 'withdraws', 'total'));
        }
    }

    public function transaction(Request $request)
    {
        if ($request->ajax()) {

            $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);
            $query = Withdraws::orderBy('created_at','desc');
            if($request->user_id != null)
                $query->where('user_id', '=', $request->user_id);
            if($request->method != null)
                $query->where('method', '=', $request->method);
            if($request->from_date != null)
                $query->whereBetween('created_at', [$to_date, $from_date]);
            $withdraws = $query->get();
            $data['template'] = view('admin.dashboard.transaction_template', compact('withdraws'))->render();
            $data['template_mobile'] = view('admin.dashboard.transaction_template_mobile', compact('withdraws'))->render();
            return $data;
        }
        else{
            $users = User::get();
            $withdraws = Withdraws::get();
            return view('admin.dashboard.transaction', compact('withdraws','users'));
        }
    }

    public function reviews(Request $request)
    {
        if ($request->ajax()) {
            $results = DB::select(DB::raw("SELECT
                listings.id as listing_id,
                users.name as user_name,
                from_location.full as from_full,
                to_location.full as to_full
                FROM public.listings
                left JOIN locations AS from_location
                on from_location.id=listings.location_id
                left JOIN locations AS to_location
                on to_location.id=listings.destination_id
                left JOIN users
                ON users.id=listings.user_id
                left JOIN bookings
                On bookings.listing_id=listings.user_id
                Where (listings.user_id=$request->user_id) And (from_location.full LIKE '%$request->location%' OR to_location.full LIKE '%$request->location%');
                "
                ));
    
            foreach ($results as $key => $result) {
                $bookings = Bookings::where('listing_id', $result->listing_id)->get();
                $count = 0;
                foreach ($bookings as $key => $booking) {
                    $review = Reviews::where('booking_id', $booking->id)->first();
                    if($review != null){
                        $count += 1;
                    }
                }
                $result->count = $count;
            }
            $data['template'] = view('admin.dashboard.reviews_template', compact('results'))->render();
            return $data;
        }else{
            $results = DB::select(DB::raw("SELECT
                listings.id as listing_id,
                users.name as user_name,
                from_location.full as from_full,
                to_location.full as to_full
                FROM public.listings
                left JOIN locations AS from_location
                on from_location.id=listings.location_id
                left JOIN locations AS to_location
                on to_location.id=listings.destination_id
                left JOIN users
                ON users.id=listings.user_id
                left JOIN bookings
                On bookings.listing_id=listings.user_id"
            ));
    
            foreach ($results as $key => $result) {
                $bookings = Bookings::where('listing_id', $result->listing_id)->get();
                $count = 0;
                foreach ($bookings as $key => $booking) {
                    $review = Reviews::where('booking_id', $booking->id)->first();
                    if($review != null){
                        $count += 1;
                    }
                }
                $result->count = $count;
            }
            return view('admin.dashboard.reviews', compact('results'));
        }
    }

    public function reviewShow($locale, $id){
        $bookings = Bookings::where('listing_id', $id)->get();
        // dd($bookings);
        return view('admin.dashboard.trip_review', compact('bookings'));
    }

    public function completedTrips(Request $request){
        if ($request->ajax()) {

            $query1 = Listings::select('users.name as user_name', DB::raw('count(*) as total'))
            ->leftjoin('users', 'users.id', '=', 'listings.user_id');

            if($request->user_id != null){
                $query1->where('user_id', '=', $request->user_id);
            }
            
            $listings = $query1->groupBy('user_name')->get();
            $listings= collect($listings)->map(function($collection) use ($request) {
                $collect = (object)$collection;
                $completed_trips_total = Listings::where('user_id', $collection->user_id)->where('completed', true)->count();
                
                return [
                    'user_name' => $collect->user_name,
                    'total' => $collect->total,
                    'completed' => $completed_trips_total
                ];
            });

            if($request->max_trips != null){
                $filtered_listings = [];
                foreach ($listings as $key => $value) {
                    if($value['total'] > $request->max_trips){
                        $filtered_listings[$key] = $value;
                    }
                }
                $listings = $filtered_listings;
            }

            $data['template'] = view('admin.dashboard.completed_trips_template', compact('listings'))->render();
            return $data;

        }else{

            $listings = Listings::select('users.name as user_name', DB::raw('count(*) as total'))
            ->leftjoin('users', 'users.id', '=', 'listings.user_id')
            ->groupBy('user_name')
            ->get();
            
        }

        $listings = collect($listings)->map(function($collection, $key) {
            $collect = (object)$collection;
            $completed_trips_total = Listings::where('user_id', $collection->user_id)->where('completed', true)->count();
            return [
                    'user_name' => $collect->user_name,
                    'total' => $collect->total,
                    'completed' => $completed_trips_total
            ];
        });

        return view ('admin.dashboard.completed_trips', compact('listings'));
    }

}