<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Filters\RideFilters;
use App\Filters\TripFilters;
use App\Http\Requests\SearchRidesRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Listings;
use App\Models\SearchTrips;
use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Helper;

// use App\Http\Requests\SearchRidesRequest;
// use App\Ride;

class SearchController extends Controller
{
    /**
     * @param \App\Http\Requests\SearchRidesRequest $request
     *
     * @param \App\Filters\RideFilters              $filters
     *
     * @return string
     */
    public function __construct()
    {
        $this->middleware(['simple_user']);
    }

    public function index(Request $request)
    {
        $cargotypes = DB::table('cargo_types')->get();
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $country = $geo["geoplugin_countryName"];
        if ($geo["geoplugin_city"] != '') {
            $city = $geo["geoplugin_city"];
        } else {
            $city = 'no result';
        }
        $trips = Listings::select('listings.*')
        ->leftjoin('locations as from_position', 'from_position.id', '=', 'listings.location_id')
        ->where('from_position.city', '=', $city)
        ->where('listings.starting_date', '>=', now())
        ->where('listings.active', '=', true)
        ->take(10)->get();
        $current_lat = session()->get('user-lang');
        $current_lng = session()->get('user-long');
        if(count($trips) > 0){
            for($i=0;$i<count($trips);$i++){
                $result = Helper::distance($current_lat,$trips[$i]->sourcecity->lat,$current_lng,$trips[$i]->sourcecity->lng, "K");
                if($result > 0){
                    $trips[$i]->distance_from_you = $result;
                }
            }
        }
        return view('search.index',compact('cargotypes', 'trips'));
    }


    public function searchcar(Request $request, RideFilters $filters)
    {
        $current_time = $request->hour;
        $time = strtotime($current_time);
        $newformat = date('Y-m-d H:i:s', $time);
        if($request->search_type == 'draft'){
            $date = Carbon::parse($request->date)->toDateString();
            $rides = Listings::select('listings.*')
                ->leftjoin('locations as from_position', 'from_position.id', '=', 'listings.location_id')
                ->leftjoin('locations as to_position', 'to_position.id', '=', 'listings.destination_id')
                ->where('from_position.city', '=', $request->from)
                ->where('listings.price_per_seat', '>=', $request->min_price)
                ->where('to_position.city', '=', $request->to)
                ->whereNull('listings.delete')
                ->where('listings.starting_date', '>', $newformat)
                ->where('listings.starting_date', 'LIKE', '%' . $date . '%')
                ->whereNotNull('car_id')
                ->whereNull('truck_id')
                ->get();
            $noseattrip = Listings::select('listings.*')
            ->where('listings.max_occupants', '<', 1)
            ->where('listings.active', '=', true)
            ->whereNotNull('car_id')
            ->whereNull('truck_id')
            ->get();
            $request['fc'] = $request->from;
            $request['dc'] = $request->to;
            $request['date'] = $request->date;
            $request['min_price'] = $request->min_price;
            $request['max_price'] = $request->max_price;
            $filterdata = $request;
            // dd($request->fc);
            $trips = $rides;
            return view('search.trip', compact('rides', 'filterdata', 'trips', 'noseattrip'));
        }
        $street1 = '';
        $building1 = '';
        $district1 = '';
        $city1 = '';
        $state1 = '';
        $country1 = '';
        $street2 = '';
        $building2 = '';
        $district2 = '';
        $city2 = '';
        $state2 = '';
        $country2 = '';
        $address1 = json_decode($request->address1_component);
        for ($i = 0; $i < count($address1); $i++) {
            $data['key'] = $address1[$i]->types[0];
            $data['name'] = $address1[$i]->long_name;
            $result[$i] = $data;
            switch ($data['key']) {
                case "street_number":
                    $street1 = $data['name'];
                    break;
                case "subpremise":
                    $building1 = $data['name'];
                    break;
                case "route":
                    $district1 = $data['name'];
                    break;
                case "locality":
                    $city1 = $data['name'];
                    break;
                case "administrative_area_level_1":
                    $state1 = $data['name'];
                    break;
                case "country":
                    $country1 = $data['name'];
                    break;
            }
        }
        $full = $street1.':'.$building1.":".$district1.":".$city1.":".$state1.":".$country1.":";
        // echo $full;
        $address2 = json_decode($request->address2_component);
        for ($i = 0; $i < count($address2); $i++) {
            $data['key'] = $address2[$i]->types[0];
            $data['name'] = $address2[$i]->long_name;
            $result[$i] = $data;
            switch ($data['key']) {
                case "street_number":
                    $street2 = $data['name'];
                    break;
                case "subpremise":
                    $building2 = $data['name'];
                    break;
                case "route":
                    $district2 = $data['name'];
                    break;
                case "locality":
                    $city2 = $data['name'];
                    break;
                case "administrative_area_level_1":
                    $state2 = $data['name'];
                    break;
                case "country":
                    $country2 = $data['name'];
                    break;
            }
        }
        $full = $street2.':'.$building2.":".$district2.":".$city2.":".$state2.":".$country2.":";
        // echo $full;
        // exit;
        if ($request->count) {
            $num = explode(" ", $request->count);
            $count = (int)$num[0];
        }
        else{
            $count = 0;
        }
        $date = Carbon::parse($request->date);
        $date = $date->toDateString();
        $ride1 = Listings::select('listings.*')
                    ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                    ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.building', '=', $building1)
                    ->where('from_position.street', '=', $street1)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', 'LIKE', '%'.$city1.'%')
                    ->where('from_position.country', '=', $country1)
                    ->where('to_position.building', '=', $building2)
                    ->where('to_position.street', '=', $street2)
                    ->where('to_position.district', '=', $district2)
                    ->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2)
                    ->where('listings.starting_date', 'LIKE', '%' . $date . '%')
                    ->where('listings.max_occupants', '>=', $count)
                    ->whereNotNull('car_id')
                    ->whereNull('truck_id')
                    ->get();
        $ride_stops_1 = Listings::select('listings.*')
                    ->leftjoin('listing_stops as listing_stops','listings.id','=','listing_stops.listing_id')
                    ->leftjoin('locations as from_position','from_position.id','=','listing_stops.location_id')
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.building', '=', $building1)
                    ->where('from_position.street', '=', $street1)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->where('listings.starting_date', 'LIKE', '%' . $date . '%')
                    ->where('listings.max_occupants', '>=', $count)
                    ->whereNotNull('car_id')
                    ->whereNull('truck_id')
                    ->get();
        $ride2 = Listings::select('listings.*')
                    ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                    ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.street', '=', $street1)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->where('to_position.street', '=', $street2)
                    ->where('to_position.district', '=', $district2)
                    ->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2)
                    ->where('listings.starting_date','LIKE', '%' . $date . '%')
                    ->where('listings.max_occupants', '>=', $count)
                    ->whereNotNull('car_id')
                    ->whereNull('truck_id')
                    ->get();
        $ride_stops_2 = Listings::select('listings.*')
                    ->leftjoin('listing_stops as listing_stops','listings.id','=','listing_stops.listing_id')
                    ->leftjoin('locations as from_position','from_position.id','=','listing_stops.location_id')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.street', '=', $street1)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date', 'LIKE', '%' . $date . '%')
                    ->where('listings.max_occupants', '>=', $count)
                    ->whereNotNull('car_id')
                    ->whereNull('truck_id')
                    ->get();
        $ride3 = Listings::select('listings.*')
                    ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                    ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->where('to_position.district', '=', $district2)
                    ->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date','LIKE', '%' . $date . '%')
                    ->where('listings.max_occupants', '>=', $count)
                    ->whereNotNull('car_id')
                    ->whereNull('truck_id')
                    ->get();
        $ride_stops_3 = Listings::select('listings.*')
                    ->leftjoin('listing_stops as listing_stops','listings.id','=','listing_stops.listing_id')
                    ->leftjoin('locations as from_position','from_position.id','=','listing_stops.location_id')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date', 'LIKE', '%' . $date . '%')
                    ->where('listings.max_occupants', '>=', $count)
                    ->whereNotNull('car_id')
                    ->whereNull('truck_id')
                    ->get();
        $ride4 = Listings::select('listings.*')
                    ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                    ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2)
                    ->where('listings.starting_date', 'LIKE', '%' . $date . '%')
                    ->where('listings.max_occupants', '>=', $count)
                    ->whereNull('listings.delete')
                    ->whereNotNull('car_id')
                    ->whereNull('truck_id')
                    ->get();

        $ride_stops_4 = Listings::select('listings.*')
                    ->leftjoin('listing_stops as listing_stops','listings.id','=','listing_stops.listing_id')
                    ->leftjoin('locations as from_position','from_position.id','=','listing_stops.location_id')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date', 'LIKE', '%' . $date . '%')
                    ->where('listings.max_occupants', '>=', $count)
                    ->whereNotNull('car_id')
                    ->whereNull('truck_id')
                    ->get();
        $ride12 = $ride1->merge($ride2);
        $ride123 = $ride12->merge($ride3);
        $ride1234 = $ride123->merge($ride4);
        $ride1234 = $ride123->merge($ride4);
        $stops = $ride_stops_1->merge($ride_stops_2)->merge($ride_stops_3)->merge($ride_stops_4);
        $rides = $ride1234->merge($stops );
        $current_lat = session()->get('user-lang');
        $current_lng = session()->get('user-long');
        if(count($rides) > 0){
            for($i=0;$i<count($rides);$i++){
                if(!is_null($rides[$i]->sourcecity)){
                    $result = Helper::distance($current_lat,$rides[$i]->sourcecity->lat,$current_lng,$rides[$i]->sourcecity->lng, "K");
                }
                if($result > 0){
                    $rides[$i]->distance_from_you = $result;
                }
            }
        }
        $noseattrip = Listings::select('listings.*')
            ->where('listings.max_occupants', '<', 1)
            ->where('listings.active', '=', true)
            ->whereNotNull('car_id')
            ->whereNull('truck_id')
            ->get();
        $rides = $rides->sortBy(function ($ride, $key) {
            return $ride->price_per_seat;
        });
        $trips = $rides;
        $filterdata=$request;
        return view('search.trip', compact('rides','filterdata','trips','noseattrip'));
    }

    public function searchcar_whereleaving(Request $request)
    {
        $street1 = '';
        $building1 = '';
        $district1 = '';
        $city1 = '';
        $state1 = '';
        $country1 = '';
        $address1 = json_decode($request->address1_component);
        for ($i = 0; $i < count($address1); $i++) {
            $data['key'] = $address1[$i]->types[0];
            $data['name'] = $address1[$i]->long_name;
            $result[$i] = $data;
            switch ($data['key']) {
                case "street_number":
                    $street1 = $data['name'];
                    break;
                case "subpremise":
                    $building1 = $data['name'];
                    break;
                case "route":
                    $district1 = $data['name'];
                    break;
                case "locality":
                    $city1 = $data['name'];
                    break;
                case "administrative_area_level_1":
                    $state1 = $data['name'];
                    break;
                case "country":
                    $country1 = $data['name'];
                    break;
            }
        }
        $current_time = $request->hour;
        $time = strtotime($current_time);
        $newformat = date('Y-m-d H:i:s', $time);

        $alerts = SearchTrips::where('from_city', $city1)->get();
        $noseattrip = Listings::select('listings.*')
            ->where('listings.max_occupants', '<', 1)
            ->where('listings.active', '=', true)
            ->whereNotNull('car_id')
            ->whereNull('truck_id')
            ->get();
        $trips = [];
        $filterdata=$request;
        return view('search.alert-trip', compact('filterdata','noseattrip', 'alerts', 'trips'));
    }

    public function searchtrips(Request $request)
    {
        $street1 = '';
        $building1 = '';
        $district1 = '';
        $city1 = '';
        $state1 = '';
        $country1 = '';
        $street2 = '';
        $building2 = '';
        $district2 = '';
        $city2 = '';
        $state2 = '';
        $country2 = '';
        $allow_distance = $request->distance_from_you;
        if($request->type == 'all' || $request->type == 'bus'){
            $count = 0;
        }
        elseif($request->type == "passenger"){
            $count = 2;
        }
        else{
            $count = $request->allow_counts;
        }
        if($request->from_position != '0'){
            $address1 = json_decode($request->from_position);
            for ($i = 0; $i < count($address1); $i++) {
                $data['key'] = $address1[$i]->types[0];
                $data['name'] = $address1[$i]->long_name;
                $result[$i] = $data;
                switch ($data['key']) {
                    case "street_number":
                        $street1 = $data['name'];
                        break;
                    case "subpremise":
                        $building1 = $data['name'];
                        break;
                    case "route":
                        $district1 = $data['name'];
                        break;
                    case "locality":
                        $city1 = $data['name'];
                        break;
                    case "administrative_area_level_1":
                        $state1 = $data['name'];
                        break;
                    case "country":
                        $country1 = $data['name'];
                        break;
                }
            }
        }
        if($request->to_position != '0'){
            $address2 = json_decode($request->to_position);
            for ($i = 0; $i < count($address2); $i++) {
                $data['key'] = $address2[$i]->types[0];
                $data['name'] = $address2[$i]->long_name;
                $result[$i] = $data;
                switch ($data['key']) {
                    case "street_number":
                        $street2 = $data['name'];
                        break;
                    case "subpremise":
                        $building2 = $data['name'];
                        break;
                    case "route":
                        $district2 = $data['name'];
                        break;
                    case "locality":
                        $city2 = $data['name'];
                        break;
                    case "administrative_area_level_1":
                        $state2 = $data['name'];
                        break;
                    case "country":
                        $country2 = $data['name'];
                        break;
                }
            }
        }
        if($request->selected_date != null){
            $combined_before_time = $request->selected_date . ' ' . $request->before_time;
            $before_time_str = strtotime($combined_before_time);
            $before_time = date('Y-m-d H:i:s', $before_time_str);
            $combined_after_time = $request->selected_date . ' ' . $request->after_time;
            $after_time_str = strtotime($combined_after_time);
            $after_time = date('Y-m-d H:i:s', $after_time_str);
        }
        if($request->from_price == '')
            $from_price = 0;
        else
            $from_price = (int)$request->from_price;
        if($request->to_price == '')
            $to_price = 999999999;
        else
            $to_price = (int)$request->to_price;
        $query1 = Listings::select('listings.*', 'users.rating AS rating')
                ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                ->leftjoin('users','users.id','=','listings.user_id')
                ->leftjoin('cars','cars.id','=','listings.car_id')
                ->whereNull('listings.delete')
                ->where('listings.price_per_seat', '>=', $from_price)
                ->where('listings.price_per_seat', '<=', $to_price)
                ->where('listings.max_occupants', '>=', $count)
                ->where('listings.starting_date', '>=', now())
                ->where('users.rating', '>=', $request->driver_rating)
                ->whereNotNull('car_id')
                ->whereNull('truck_id');
        if($request->type == 'bus')
            $query1->where('cars.bus', '=', true);
        if($request->selected_date != null)
            $query1->where('listings.starting_date', '>=', $before_time)
                ->where('listings.starting_date', '<=', $after_time);
        if($request->from_position != '0')
            $query1->where('from_position.building', '=', $building1)
                ->where('from_position.street', '=', $street1)
                ->where('from_position.district', '=', $district1)
                ->where('from_position.city', '=', $city1)
                ->where('from_position.country', '=', $country1);
        if($request->to_position != '0')
            $query1->where('to_position.building', '=', $building2)
                ->where('to_position.street', '=', $street2)
                ->where('to_position.district', '=', $district2)
                ->where('to_position.city', '=', $city2)
                ->where('to_position.country', '=', $country2);
        if($request->sort_by == "price")
            $query1->orderBy('listings.price_per_seat', "ASC");
        if($request->sort_by == "rating")
            $query1->orderBy('users.rating', "ASC");
        $trip1 = $query1->get();
        $query2 = Listings::select('listings.*', 'users.rating AS rating')
                ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                ->leftjoin('cars','cars.id','=','listings.car_id')
                ->leftjoin('users','users.id','=','listings.user_id')
                ->whereNull('listings.delete')
                ->where('listings.price_per_seat', '>=', $from_price)
                ->where('listings.price_per_seat', '<=', $to_price)
                ->where('listings.max_occupants', '>=', $count)
                ->where('listings.starting_date', '>=', now())
                ->where('users.rating', '>=', $request->driver_rating)
                ->whereNotNull('car_id')
                ->whereNull('truck_id');
        if($request->type == 'bus')
            $query2->where('cars.bus', '=', true);
        if($request->selected_date != null)
            $query2->where('listings.starting_date', '>=', $before_time)
                ->where('listings.starting_date', '<=', $after_time);
        if($request->from_position != '0')
            $query2->where('from_position.street', '=', $street1)
                ->where('from_position.district', '=', $district1)
                ->where('from_position.city', '=', $city1)
                ->where('from_position.country', '=', $country1);
        if($request->to_position != '0')
            $query2->where('to_position.street', '=', $street2)
                ->where('to_position.district', '=', $district2)
                ->where('to_position.city', '=', $city2)
                ->where('to_position.country', '=', $country2);
        if($request->sort_by == "price")
            $query2->orderBy('listings.price_per_seat', "ASC");
        if($request->sort_by == "rating")
            $query2->orderBy('users.rating', "ASC");
        $trip2 = $query2->get();
        $query3 = Listings::select('listings.*', 'users.rating AS rating')
                ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                ->leftjoin('cars','cars.id','=','listings.car_id')
                ->leftjoin('users','users.id','=','listings.user_id')
                ->whereNull('listings.delete')
                ->where('listings.price_per_seat', '>=', $from_price)
                ->where('listings.price_per_seat', '<=', $to_price)
                ->where('listings.max_occupants', '>=', $count)
                ->where('listings.starting_date', '>=', now())
                ->where('users.rating', '>=', $request->driver_rating)
                ->whereNotNull('car_id')
                ->whereNull('truck_id');
        if($request->type == 'bus')
            $query3->where('cars.bus', '=', true);
        if($request->selected_date != null)
            $query3->where('listings.starting_date', '>=', $before_time)
                ->where('listings.starting_date', '<=', $after_time);
        if($request->from_position != '0')
            $query3->where('from_position.district', '=', $district1)
                ->where('from_position.city', '=', $city1)
                ->where('from_position.country', '=', $country1);
        if($request->to_position != '0')
            $query3->where('to_position.district', '=', $district2)
                ->where('to_position.city', '=', $city2)
                ->where('to_position.country', '=', $country2);
        if($request->sort_by == "price")
            $query3->orderBy('listings.price_per_seat', "ASC");
        if($request->sort_by == "rating")
            $query3->orderBy('users.rating', "ASC");
        $trip3 = $query3->get();
        $query4 = Listings::select('listings.*', 'users.rating AS rating')
                ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                ->leftjoin('users','users.id','=','listings.user_id')
                ->leftjoin('cars','cars.id','=','listings.car_id')
                ->whereNull('listings.delete')
                ->where('listings.price_per_seat', '>=', $from_price)
                ->where('listings.price_per_seat', '<=', $to_price)
                ->where('listings.max_occupants', '>=', $count)
                ->where('listings.starting_date', '>=', now())
                ->where('users.rating', '>=', $request->driver_rating)
                ->whereNotNull('car_id')
                ->whereNull('truck_id');
        if($request->type == 'bus')
            $query4->where('cars.bus', '=', true);
        if($request->selected_date != null)
            $query4->where('listings.starting_date', '>=', $before_time)
                ->where('listings.starting_date', '<=', $after_time);
        if($request->from_position != '0')
            $query4->where('from_position.city', '=', $city1)
                ->where('from_position.country', '=', $country1);
        if($request->to_position != '0')
            $query4->where('to_position.city', '=', $city2)
                ->where('to_position.country', '=', $country2);
        // if($request->sort_by == "distance")
        //     $query4->orderBy('listings.distance', "ASC");
        if($request->sort_by == "price")
            $query4->orderBy('listings.price_per_seat', "ASC");
        if($request->sort_by == "rating")
            $query4->orderBy('users.rating', "ASC");
        $trip4 = $query4->get();
        $trip12 = $trip1->merge($trip2);
        $trip123 = $trip12->merge($trip3);
        $trip = $trip123->merge($trip4);
        $current_lat = session()->get('user-lang');
        $current_lng = session()->get('user-long');
        if(count($trip) > 0){
            for($i=0;$i<count($trip);$i++){
                $result = Helper::distance($current_lat,$trip[$i]->sourcecity->lat,$current_lng,$trip[$i]->sourcecity->lng, "K");
                if($result > 0){
                    $trip[$i]->distance_from_you = $result;
                }
            }
        }
        if($allow_distance != null){
            $trip = $trip->reject(function ($trip,$request) use ($allow_distance) {
                return $trip->distance_from_you > $allow_distance;
            });
        }
        if($request->sort_by == "distance"){
            $trip = $trip->sortBy(function ($ride, $key) {
                return $ride->distance_from_you;
            });
        }
        if($request->sort_by == "price"){
            $trip = $trip->sortBy(function ($ride, $key) {
                return $ride->price_per_seat;
            });
        }
        if($request->sort_by == "rating"){
            $trip = $trip->sortBy(function ($ride, $key) {
                return $ride->rating;
            });
        }
        $trips = $trip;
        $data['template'] = view('search.trip_template', compact('trips'))->render();
        $data['result'] = count($trips);

        return $data;
    }

    public function search_cargo_trips(Request $request)
    { 
        $street1 = '';
        $building1 = '';
        $district1 = '';
        $city1 = '';
        $state1 = '';
        $country1 = '';
        $street2 = '';
        $building2 = '';
        $district2 = '';
        $city2 = '';
        $state2 = '';
        $country2 = '';
        $allow_distance = $request->distance_from_you;
        if($request->from_position != '0'){
            $address1 = json_decode($request->from_position);
            for ($i = 0; $i < count($address1); $i++) {
                $data['key'] = $address1[$i]->types[0];
                $data['name'] = $address1[$i]->long_name;
                $result[$i] = $data;
                switch ($data['key']) {
                    case "street_number":
                        $street1 = $data['name'];
                        break;
                    case "subpremise":
                        $building1 = $data['name'];
                        break;
                    case "route":
                        $district1 = $data['name'];
                        break;
                    case "locality":
                        $city1 = $data['name'];
                        break;
                    case "administrative_area_level_1":
                        $state1 = $data['name'];
                        break;
                    case "country":
                        $country1 = $data['name'];
                        break;
                }
            }
        }
        if($request->to_position != '0'){
            $address2 = json_decode($request->to_position);
            for ($i = 0; $i < count($address2); $i++) {
                $data['key'] = $address2[$i]->types[0];
                $data['name'] = $address2[$i]->long_name;
                $result[$i] = $data;
                switch ($data['key']) {
                    case "street_number":
                        $street2 = $data['name'];
                        break;
                    case "subpremise":
                        $building2 = $data['name'];
                        break;
                    case "route":
                        $district2 = $data['name'];
                        break;
                    case "locality":
                        $city2 = $data['name'];
                        break;
                    case "administrative_area_level_1":
                        $state2 = $data['name'];
                        break;
                    case "country":
                        $country2 = $data['name'];
                        break;
                }
            }
        }
        if($request->selected_date != null){
            $combined_before_time = $request->selected_date . ' ' . $request->before_time;
            $before_time_str = strtotime($combined_before_time);
            $before_time = date('Y-m-d H:i:s', $before_time_str);
            $combined_after_time = $request->selected_date . ' ' . $request->after_time;
            $after_time_str = strtotime($combined_after_time);
            $after_time = date('Y-m-d H:i:s', $after_time_str);
        }
        if($request->from_price == '')
            $from_price = 0;
        else
            $from_price = (int)$request->from_price;
        if($request->to_price == '')
            $to_price = 999999999;
        else
            $to_price = (int)$request->to_price;
        if($request->capacity == '')
            $capacity = 0;
        else
            $capacity = (int)$request->capacity;
        if($request->place == '')
            $place = 0;
        else
            $place = (int)$request->place;
        if($request->driver_rating == '')
            $driver_rating = 0;
        else
            $driver_rating = (int)$request->driver_rating;
        $query1 = Listings::select('listings.*', 'users.rating AS rating')
                ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                ->leftjoin('users','users.id','=','listings.user_id')
                ->leftjoin('trucks','trucks.id','=','listings.truck_id')
                ->leftjoin('body_types','body_types.id','=','trucks.body_type_id')
                ->whereNull('listings.delete')
                ->where('listings.price_per_seat', '>=', $from_price)
                ->where('listings.price_per_seat', '<=', $to_price)
                ->where('listings.capacity', '>=', $capacity)
                ->where('listings.place', '>=', $place)
                ->where('users.rating', '>=', $driver_rating)
                ->whereNull('car_id')
                ->whereNotNull('truck_id');
        if($request->selected_date != null)
            $query1->where('listings.starting_date', '>=', $before_time)
                ->where('listings.starting_date', '<=', $after_time);
        if($request->from_position != '0')
            $query1->where('from_position.building', '=', $building1)
                ->where('from_position.street', '=', $street1)
                ->where('from_position.district', '=', $district1)
                ->where('from_position.city', '=', $city1)
                ->where('from_position.country', '=', $country1);
        if($request->to_position != '0')
            $query1->where('to_position.building', '=', $building2)
                ->where('to_position.street', '=', $street2)
                ->where('to_position.district', '=', $district2)
                ->where('to_position.city', '=', $city2)
                ->where('to_position.country', '=', $country2);
        if($request->truck_type != '')
            $query1->where('body_types.name', '=', $request->truck_type);
        // if($request->sort_by == "distance")
        //         $query1->orderBy('listings.distance', "ASC");
        if($request->sort_by == "price")
                $query1->orderBy('listings.price_per_seat', "ASC");
        if($request->sort_by == "rating")
                $query1->orderBy('users.rating', "ASC");
        $trip1 = $query1->get();
        $query2 = Listings::select('listings.*', 'users.rating AS rating')
                ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                ->leftjoin('users','users.id','=','listings.user_id')
                ->leftjoin('trucks','trucks.id','=','listings.truck_id')
                ->leftjoin('body_types','body_types.id','=','trucks.body_type_id')
                ->whereNull('listings.delete')
                ->where('listings.price_per_seat', '>=', $from_price)
                ->where('listings.price_per_seat', '<=', $to_price)
                ->where('listings.capacity', '>=', $capacity)
                ->where('listings.place', '>=', $place)
                ->where('users.rating', '>=', $driver_rating)
                ->whereNull('car_id')
                ->whereNotNull('truck_id');
        if($request->selected_date != null)
                $query2->where('listings.starting_date', '>=', $before_time)
                    ->where('listings.starting_date', '<=', $after_time);
        if($request->from_position != '0')
                $query2->where('from_position.street', '=', $street1)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1);
        if($request->to_position != '0')
                $query2->where('to_position.street', '=', $street2)
                    ->where('to_position.district', '=', $district2)
                    ->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2);
        if($request->truck_type != '')
            $query2->where('body_types.name', '=', $request->truck_type);
        // if($request->sort_by == "distance")
        //         $query2->orderBy('listings.distance', "ASC");
        if($request->sort_by == "price")
                $query2->orderBy('listings.price_per_seat', "ASC");
        if($request->sort_by == "rating")
                $query2->orderBy('users.rating', "ASC");
        $trip2 = $query2->get();
        $query3 = Listings::select('listings.*', 'users.rating AS rating')
                ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                ->leftjoin('users','users.id','=','listings.user_id')
                ->leftjoin('trucks','trucks.id','=','listings.truck_id')
                ->leftjoin('body_types','body_types.id','=','trucks.body_type_id')
                ->whereNull('listings.delete')
                ->where('listings.price_per_seat', '>=', $from_price)
                ->where('listings.price_per_seat', '<=', $to_price)
                ->where('listings.capacity', '>=', $capacity)
                ->where('listings.place', '>=', $place)
                ->where('users.rating', '>=', $driver_rating)
                ->whereNull('car_id')
                ->whereNotNull('truck_id');
        if($request->selected_date != null)
                $query3->where('listings.starting_date', '>=', $before_time)
                    ->where('listings.starting_date', '<=', $after_time);
        if($request->from_position != '0')
                $query3->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1);
        if($request->to_position != '0')
                $query3->where('to_position.district', '=', $district2)
                    ->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2);
        if($request->truck_type != '')
        $query3->where('body_types.name', '=', $request->truck_type);
        // if($request->sort_by == "distance")
        //         $query3->orderBy('listings.distance', "ASC");
        if($request->sort_by == "price")
                $query3->orderBy('listings.price_per_seat', "ASC");
        if($request->sort_by == "rating")
                $query3->orderBy('users.rating', "ASC");
        $trip3 = $query3->get();
        $query4 = Listings::select('listings.*', 'users.rating AS rating')
                ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                ->leftjoin('users','users.id','=','listings.user_id')
                ->leftjoin('trucks','trucks.id','=','listings.truck_id')
                ->whereNull('listings.delete')
                ->leftjoin('body_types','body_types.id','=','trucks.body_type_id')
                ->where('listings.price_per_seat', '>=', $from_price)
                ->where('listings.price_per_seat', '<=', $to_price)
                ->where('listings.capacity', '>=', $capacity)
                ->where('listings.place', '>=', $place)
                ->where('users.rating', '>=', $driver_rating)
                ->whereNull('car_id')
                ->whereNotNull('truck_id');
        if($request->selected_date != null)
                $query4->where('listings.starting_date', '>=', $before_time)
                    ->where('listings.starting_date', '<=', $after_time);
        if($request->from_position != '0')
                $query4->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1);
        if($request->to_position != '0')
                $query4->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2);
        if($request->truck_type != '')
                $query4->where('body_types.id', '=', $request->truck_type);
        if($request->sort_by == "price")
                $query4->orderBy('listings.price_per_seat', "ASC");
        if($request->sort_by == "rating")
                $query4->orderBy('users.rating', "ASC");
        $trip4 = $query4->get();
        $trip12 = $trip1->merge($trip2);
        $trip123 = $trip12->merge($trip3);
        $trip = $trip123->merge($trip4);
        $current_lat = session()->get('user-lang');
        $current_lng = session()->get('user-long');
        if(count($trip) > 0){
            for($i=0;$i<count($trip);$i++){
                $result = Helper::distance($current_lat,$trip[$i]->sourcecity->lat,$current_lng,$trip[$i]->sourcecity->lng, "K");
                if($result > 0){
                    $trip[$i]->distance_from_you = $result;
                }
            }
        }
        if($allow_distance != null){
            $trip = $trip->reject(function ($trip,$request) use ($allow_distance) {
                return $trip->distance_from_you > $allow_distance;
            });
        }
        if($request->sort_by == "distance"){
            $trip = $trip->sortBy(function ($ride, $key) {
                return $ride->distance_from_you;
            });
        }
        if($request->sort_by == "price"){
            $trip = $trip->sortBy(function ($ride, $key) {
                return $ride->price_per_seat;
            });
        }
        if($request->sort_by == "rating"){
            $trip = $trip->sortBy(function ($ride, $key) {
                return $ride->rating;
            });
        }
        $trips = $trip;
        $data['template'] = view('search.trip_template', compact('trips'))->render();
        $data['result'] = count($trips);

        return $data;
    }

    public function searchcargo(SearchRidesRequest $request, RideFilters $filters_cargo)
    {
        $current_time = $request->hour;
        $time = strtotime($current_time);
        $newformat = date('Y-m-d H:i:s', $time);
        $street1 = '';
        $building1 = '';
        $district1 = '';
        $city1 = '';
        $state1 = '';
        $country1 = '';
        $street2 = '';
        $building2 = '';
        $district2 = '';
        $city2 = '';
        $state2 = '';
        $country2 = '';
        $address1 = json_decode($request->address3_component);
        for ($i = 0; $i < count($address1); $i++) {
            $data['key'] = $address1[$i]->types[0];
            $data['name'] = $address1[$i]->long_name;
            $result[$i] = $data;
            switch ($data['key']) {
                case "street_number":
                    $street1 = $data['name'];
                    break;
                case "subpremise":
                    $building1 = $data['name'];
                    break;
                case "route":
                    $district1 = $data['name'];
                    break;
                case "locality":
                    $city1 = $data['name'];
                    break;
                case "administrative_area_level_1":
                    $state1 = $data['name'];
                    break;
                case "country":
                    $country1 = $data['name'];
                    break;
            }
        }
        $address2 = json_decode($request->address4_component);
        for ($i = 0; $i < count($address2); $i++) {
            $data['key'] = $address2[$i]->types[0];
            $data['name'] = $address2[$i]->long_name;
            $result[$i] = $data;
            switch ($data['key']) {
                case "street_number":
                    $street2 = $data['name'];
                    break;
                case "subpremise":
                    $building2 = $data['name'];
                    break;
                case "route":
                    $district2 = $data['name'];
                    break;
                case "locality":
                    $city2 = $data['name'];
                    break;
                case "administrative_area_level_1":
                    $state2 = $data['name'];
                    break;
                case "country":
                    $country2 = $data['name'];
                    break;
            }
        }
        if ($request->capacity == '') {
            $request->capacity = 0;
        }
        if ($request->place == '') {
            $request->place = 0;
        }
        if ($request->max_size == '') {
            $request->max_size = 0;
        }
        // dd($street1,
        // $building1,
        // $district1,
        // $city1,
        // $state1,
        // $country1,
        // $street2,
        // $building2,
        // $district2,
        // $city2,
        // $state2,
        // $country2);
        $date = Carbon::parse($request->date);
        $date = $date->toDateString();
        $ride1 = Listings::select('listings.*','listings.id as listing_id', 'trucks.id AS truck_id', 'trucks.name AS truck_name')
                    ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                    ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                    ->leftjoin('trucks','trucks.id','=','listings.truck_id')
                    ->where('from_position.building', '=', $building1)
                    ->where('from_position.street', '=', $street1)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->where('to_position.building', '=', $building2)
                    ->where('to_position.street', '=', $street2)
                    ->where('to_position.district', '=', $district2)
                    ->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('listings.starting_date','LIKE', '%' . $date . '%')
                    ->where('listings.capacity', '>=', $request->capacity)
                    ->where('listings.place', '>=', $request->place)
                    ->where('listings.max_size', '>=', $request->max_size)
                    ->whereNull('car_id')
                    ->whereNotNull('truck_id')
                    ->get();

        $ride_stops_1 = Listings::select('listings.*')
                    ->leftjoin('listing_stops as listing_stops','listings.id','=','listing_stops.listing_id')
                    ->leftjoin('locations as from_position','from_position.id','=','listing_stops.location_id')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.building', '=', $building1)
                    ->where('from_position.street', '=', $street1)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date','LIKE', '%' . $date . '%')
                    ->where('listings.capacity', '>=', $request->capacity)
                    ->where('listings.place', '>=', $request->place)
                    ->where('listings.max_size', '>=', $request->max_size)
                    ->whereNull('car_id')
                    ->whereNotNull('truck_id')
                    ->get();

        $ride2 = Listings::select('listings.*','listings.id as listing_id', 'trucks.id AS truck_id', 'trucks.name AS truck_name')
                    ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                    ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                    ->leftjoin('trucks','trucks.id','=','listings.truck_id')
                    ->where('from_position.street', '=', $street1)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->where('to_position.street', '=', $street2)
                    ->where('to_position.district', '=', $district2)
                    ->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('listings.starting_date','LIKE', '%' . $date . '%')
                    ->where('listings.capacity', '>=', $request->capacity)
                    ->where('listings.place', '>=', $request->place)
                    ->where('listings.max_size', '>=', $request->max_size)
                    ->whereNull('car_id')
                    ->whereNotNull('truck_id')
                    ->get();
        $ride_stops_2 = Listings::select('listings.*')
                    ->leftjoin('listing_stops as listing_stops','listings.id','=','listing_stops.listing_id')
                    ->leftjoin('locations as from_position','from_position.id','=','listing_stops.location_id')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.street', '=', $street1)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date','LIKE', '%' . $date . '%')
                    ->where('listings.capacity', '>=', $request->capacity)
                    ->where('listings.place', '>=', $request->place)
                    ->where('listings.max_size', '>=', $request->max_size)
                    ->whereNull('car_id')
                    ->whereNotNull('truck_id')
                    ->get();
        $ride3 = Listings::select('listings.*','listings.id as listing_id', 'trucks.id AS truck_id', 'trucks.name AS truck_name')
                    ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                    ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                    ->leftjoin('trucks','trucks.id','=','listings.truck_id')
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->where('to_position.district', '=', $district2)
                    ->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2)
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('listings.starting_date','LIKE', '%' . $date . '%')
                    ->where('listings.capacity', '>=', $request->capacity)
                    ->where('listings.place', '>=', $request->place)
                    ->where('listings.max_size', '>=', $request->max_size)
                    ->whereNull('car_id')
                    ->whereNotNull('truck_id')
                    ->get();
        $ride_stops_3 = Listings::select('listings.*')
                    ->leftjoin('listing_stops as listing_stops','listings.id','=','listing_stops.listing_id')
                    ->leftjoin('locations as from_position','from_position.id','=','listing_stops.location_id')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.district', '=', $district1)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date','LIKE', '%' . $date . '%')
                    ->where('listings.capacity', '>=', $request->capacity)
                    ->where('listings.place', '>=', $request->place)
                    ->where('listings.max_size', '>=', $request->max_size)
                    ->whereNull('car_id')
                    ->whereNotNull('truck_id')
                    ->get();
        $ride4 = Listings::select('listings.*','listings.id as listing_id', 'trucks.id AS truck_id', 'trucks.name AS truck_name')
                    ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
                    ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
                    ->leftjoin('trucks','trucks.id','=','listings.truck_id')
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->where('to_position.city', '=', $city2)
                    ->where('to_position.country', '=', $country2)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('listings.starting_date','LIKE', '%' . $date . '%')
                    ->where('listings.capacity', '>=', $request->capacity)
                    ->where('listings.place', '>=', $request->place)
                    ->where('listings.max_size', '>=', $request->max_size)
                    ->whereNull('car_id')
                    ->whereNotNull('truck_id')
                    ->get();
        $ride_stops_4 = Listings::select('listings.*')
                    ->leftjoin('listing_stops as listing_stops','listings.id','=','listing_stops.listing_id')
                    ->leftjoin('locations as from_position','from_position.id','=','listing_stops.location_id')
                    ->where('listings.starting_date', '>', $newformat)
                    ->where('from_position.city', '=', $city1)
                    ->where('from_position.country', '=', $country1)
                    ->whereNull('listings.delete')
                    ->where('listings.starting_date','LIKE', '%' . $date . '%')
                    ->where('listings.capacity', '>=', $request->capacity)
                    ->where('listings.place', '>=', $request->place)
                    ->where('listings.max_size', '>=', $request->max_size)
                    ->whereNull('car_id')
                    ->whereNotNull('truck_id')
                    ->get();
        $ride12 = $ride1->merge($ride2);
        $ride123 = $ride12->merge($ride3);
        $ride1234 = $ride123->merge($ride4);
        $stops = $ride_stops_1->merge($ride_stops_2)->merge($ride_stops_3)->merge($ride_stops_4);
        $rides = $ride1234->merge($stops );
        $current_lat = session()->get('user-lang');
        $current_lng = session()->get('user-long');
        if(count($rides) > 0){
            for($i=0;$i<count($rides);$i++){
                $result = Helper::distance($current_lat,$rides[$i]->sourcecity->lat,$current_lng,$rides[$i]->sourcecity->lng, "K");
                if($result > 0){
                    $rides[$i]->distance_from_you = $result;
                }
            }
        }
        $cargo_types = Listings::select('listings.id', 'cargo_types.type_name')
        ->join('listing_cargotype','listings.id','=','listing_cargotype.listing_id')
        ->join('cargo_types','listing_cargotype.cargo_type_id','=','cargo_types.id')
        ->get();
        if($request->cargotype != null){
            $cargotype = explode(" ", $request->cargotype);
            $out=array();
            $result=array();
            foreach($cargo_types as $arr){
                foreach($cargotype as $key)
                if($key == $arr['type_name']){
                    array_push($out, $arr['id']);
                }
            }
            $count = array_count_values($out);
            // dd($rides);
            // dd($count);
            foreach($rides as $ride){
                if(isset($count[$ride->listing_id]) && $count[$ride->listing_id] == count($cargotype))
                    array_push($result, $ride);
            }
            $rides = $result;
        }
        else{
            $result=array();
            foreach($rides as $ride){
                    array_push($result, $ride);
            }
            $rides = $result;
        }
        usort($rides, function($a, $b) {
            return $a->price_per_seat > $b->price_per_seat ? 1 : -1;
        });
        $trips = $rides;
        $filterdata=$request;
        $cargotypes = DB::table('cargo_types')->get();
        $bodytypes = DB::table('body_types')->get();
        return view('search.cargo-trip', compact('rides', 'filterdata', 'trips', 'cargotypes', 'bodytypes'));
    }
}
