<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Listings;
use App\Models\Locations;
use App\Models\Stops;
use App\Models\Cars;
use Helper;
use Session;
use Exception;
use Hashids\Hashids;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'active', 'simple_user']);
    }
    
    public function choosetype()
    {
        $this->clearSession();
        return view('listings.type-trip');
    }

    public function suggestFromCargo()
    {
        return view('listings.suggest-late-from-cargo');
    }

    public function suggestToCargo(Request $request)
    {
        session()->put('from-position-cargo', $request->fc);
        $fc = session()->get('from-position-cargo');
        session()->put('from-lat-cargo', $request->address_latitude);
        $lat = session()->get('from-lat-cargo');
        session()->put('from-lon-cargo', $request->address_longitude);
        $lng = session()->get('from-lon-cargo');
        session()->put('from-address-cargo', $request->address_component);
        $address = session()->get('from-address-cargo');
        if($fc != null && $lat != null && $lng != null && $address != null)
            return 'success';
        else
            return 'failed';
    }

    public function suggest_cargo_to(){
        return view('listings.suggest-late-to-cargo');
    }

    public function suggestFromPassenger()
    {
        return view('listings.suggest-late-from');
    }

    public function suggestToPassenger(Request $request)
    {
        try {
            session()->put('from-position-passenger', $request->fc);
            session()->put('from-lat-passenger', $request->address_latitude);
            session()->put('from-lon-passenger', $request->address_longitude);
            session()->put('from-address-passenger', $request->address_component);
            return response()->json(['state' => 'success', 'result' => 'ok']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['state' => 'success', 'result' => 'failed']);
        }
        // return view('listings.suggest-late-to');
    }

    public function suggest_late_to()
    {
        return view('listings.suggest-late-to');
    }


    public function deployPassenger(Request $request)
    {
        try {
            $position = session()->get('to-position-passenger');
            if($position == null || $position == '')session()->put('to-position-passenger', $request->dc);
            session()->put('to-lat-passenger', $request->address_latitude);
            session()->put('to-lon-passenger', $request->address_longitude);
            $address = session()->get('to-address-passenger');
            if($address == null || $address == '')session()->put('to-address-passenger', $request->address_component);

            $fc_address = json_decode($request->address_component);
            $lat_from = session()->get('from-lat-passenger');
            $lng_from = session()->get('from-lon-passenger');

            $street = '';
            $building = '';
            $district = '';
            $political = '';
            $city = '';
            $state = '';
            $country = '';
            $code = '';
            if(is_array($fc_address)){
                for ($i = 0; $i < count($fc_address); $i++) {
                    $data['key'] = $fc_address[$i]->types[0];
                    $data['name'] = $fc_address[$i]->long_name;
                    $result[$i] = $data;
                    // echo $data['key'].':';
                    // echo $data['name'].'\n';
                    switch ($data['key']) {
                        case "street_number":
                            $street = $data['name'];
                            break;
                        case "subpremise":
                            $building = $data['name'];
                            break;
                        case "route":
                            $district = $data['name'];
                            break;
                        case "political":
                            $political = $data['name'];
                            break;
                        case "locality":
                            $city = $data['name'];
                            break;
                        case "administrative_area_level_1":
                            $state = $data['name'];
                            break;
                        case "country":
                            $country = $data['name'];
                            break;
                        case "postal_code":
                            $code = $data['name'];
                            break;
                    }
                }
            }
            else{
                return response()->json(['state' => 'success', 'result' => 'failed']);
            }
            // echo 'street:'.$street.'sub:'.$building.'route'.$district.'code'.$code;
            if($street == "" && $building == "" && $district == "" && $code == "" && $political == ""){
                return response()->json(['state' => 'success', 'result' => 'draft', 'address' => $fc_address]);   
            }
            return response()->json(['state' => 'success', 'result' => 'ok']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'success', 'result' => 'failed']);
        }
    }

    public function deploy_passenger_to()
    {
        $lat_from = session()->get('to-lat-passenger');
        $lng_from = session()->get('to-lon-passenger');
        return view('listings.trip-map-deploy', compact('lat_from', 'lng_from'));
    }

    public function toDetail(){
        $lat_from = session()->get('to-lat-passenger');
        $lng_from = session()->get('to-lon-passenger');
        return view('listings.trip-map-deploy-to', compact('lat_from', 'lng_from'));
    }

    public function toDetailCargo(){
        $lat_from = session()->get('to-lat-cargo');
        $lng_from = session()->get('to-lon-cargo');
        // dd('test');
        return view('listings.trip-map-deploy-to-cargo', compact('lat_from', 'lng_from'));
    }

    public function deployCargo(Request $request)
    {
        $position = session()->get('to-position-cargo');
        if($position == null || $position == '')session()->put('to-position-cargo', $request->dc);
        $position = session()->get('to-position-cargo');
        session()->put('to-lat-cargo', $request->address_latitude);
        $lat = session()->get('to-lat-cargo');
        session()->put('to-lon-cargo', $request->address_longitude);
        $lon = session()->get('to-lon-cargo');
        $address = session()->get('to-address-cargo');
        if($address == null || $address == '')session()->put('to-address-cargo', $request->address_component);
        $address = session()->get('to-address-cargo');
        $fc_address = json_decode($request->address_component);
            $lat_from = session()->get('from-lat-cargo');
            $lng_from = session()->get('from-lon-cargo');

            $street = '';
            $building = '';
            $district = '';
            $political = '';
            $city = '';
            $state = '';
            $country = '';
            $code = '';
            if(is_array($fc_address)){
                for ($i = 0; $i < count($fc_address); $i++) {
                    $data['key'] = $fc_address[$i]->types[0];
                    $data['name'] = $fc_address[$i]->long_name;
                    $result[$i] = $data;
                    // echo $data['key'].':';
                    // echo $data['name'].'\n';
                    switch ($data['key']) {
                        case "street_number":
                            $street = $data['name'];
                            break;
                        case "subpremise":
                            $building = $data['name'];
                            break;
                        case "route":
                            $district = $data['name'];
                            break;
                        case "political":
                            $political = $data['name'];
                            break;
                        case "locality":
                            $city = $data['name'];
                            break;
                        case "administrative_area_level_1":
                            $state = $data['name'];
                            break;
                        case "country":
                            $country = $data['name'];
                            break;
                        case "postal_code":
                            $code = $data['name'];
                            break;
                    }
                }
            }
            else{
                return response()->json(['state' => 'success', 'result' => 'failed']);
            }
            if($street == "" && $building == "" && $district == "" && $code == "" && $political == ""){
                return response()->json(['state' => 'success', 'result' => 'draft', 'address' => $fc_address]);   
            }
            return response()->json(['state' => 'success', 'result' => 'ok']);
    }
    public function map_Deploy_Cargo(){
        $lat_from = session()->get('to-lat-cargo');
        $lng_from = session()->get('to-lon-cargo');
        return view('listings.trip-map-deploy-cargo', compact('lat_from', 'lng_from'));
    }

    public function stopsPassenger(Request $request)
    {
        if($request->drop_off != '' || $request->drop_off != null)
        {
            $from_lat = session()->get('from-lat-passenger');
            $from_lon = session()->get('from-lon-passenger');
            $data = collect();
            $data->drop_off = $request->drop_off;
            $data->address_component = json_decode($request->address_component);
            $data->lat = $request->address_latitude;
            $data->long = $request->address_longitude;
            $data->active = 1;
            $result_stop = Helper::GetDrivingDistance($from_lat,$request->address_latitude,$from_lon, $request->address_longitude);
            if($result_stop == "zero_result"){
                $distance = 0;
                $time = 0;
            }
            else{
                $distance = $result_stop['distance'];
                $time = $result_stop['time'];
            }
            $to_lat = session()->get('to-lat-passenger');
            $to_lon = session()->get('to-lon-passenger');
            $result_destination = Helper::GetDrivingDistance($from_lat,$to_lat,$from_lon, $to_lon);
            if($result_destination == "zero_result"){
                $distance_destination = 0;
            }
            else{
                $distance_destination = $result_destination['distance'];
            }
            $data->distance = $distance;
            $data->time = $time;
            $stops = session()->get('stops-passenger');
            if($distance != 0 && $distance_destination != 0 && $distance < $distance_destination){
                if($stops != null){
                    $stops[count($stops) + 1]  = $data;
                    session()->push('stops-passenger', $data);
                }
                else{
                    session()->push('stops-passenger', $data);
                }
            }else{
                return back()->withInput()
                ->withErrors(['unexpected_error' => 'Стоп следует выбирать между начальной и конечной позицией.']);
            }
        }
        return redirect()->route('stopsPassenger.show', app()->getLocale());
        // return view('listings.trip-stops');
    }

    public function toDetailUpdate(Request $request)
    {
        
        $fc_address = json_decode($request->address_component);
        $lat_from = session()->get('from-lat-passenger');
        $lng_from = session()->get('from-lon-passenger');

        $street = '';
        $building = '';
        $district = '';
        $city = '';
        $state = '';
        $country = '';
        $code = '';
        $political = "";
        if(is_array($fc_address)){
            for ($i = 0; $i < count($fc_address); $i++) {
                $data['key'] = $fc_address[$i]->types[0];
                $data['name'] = $fc_address[$i]->long_name;
                $result[$i] = $data;
                switch ($data['key']) {
                    case "street_number":
                        $street = $data['name'];
                        break;
                    case "subpremise":
                        $building = $data['name'];
                        break;
                    case "route":
                        $district = $data['name'];
                        break;
                    case "political":
                        $political = $data['name'];
                            break;
                    case "locality":
                        $city = $data['name'];
                        break;
                    case "administrative_area_level_1":
                        $state = $data['name'];
                        break;
                    case "country":
                        $country = $data['name'];
                        break;
                    case "postal_code":
                        $code = $data['name'];
                        break;
                }
            }
        }else{
            return back()->withInput()->withErrors(['unexpected_error' => 'Select Valid address']);
        }
        if($street == "" && $building == "" && $district == "" && $political == "" && $code == ""){
            return back()->withInput()->withErrors(['unexpected_error' => 'Введите подробный адрес']);
        }
        else{
            session()->put('to-lat-passenger', $request->address_latitude);
            session()->put('to-lon-passenger', $request->address_longitude);
            session()->put('to-address-passenger', $request->address_component);
            session()->put('to-position-passenger', $request->dc);
            return redirect()->route('stopsPassenger.show', app()->getLocale());
        }
    }

    public function toDetailUpdateCargo(Request $request)
    {
        $fc_address = json_decode($request->address_component);
        $lat_from = session()->get('from-lat-cargo');
        $lng_from = session()->get('from-lon-cargo');

        $street = '';
        $building = '';
        $district = '';
        $city = '';
        $state = '';
        $country = '';
        $code = '';
        $political = "";
        if(is_array($fc_address)){
            for ($i = 0; $i < count($fc_address); $i++) {
                $data['key'] = $fc_address[$i]->types[0];
                $data['name'] = $fc_address[$i]->long_name;
                $result[$i] = $data;
                switch ($data['key']) {
                    case "street_number":
                        $street = $data['name'];
                        break;
                    case "subpremise":
                        $building = $data['name'];
                        break;
                    case "route":
                        $district = $data['name'];
                        break;
                    case "political":
                        $political = $data['name'];
                         break;
                    case "locality":
                        $city = $data['name'];
                        break;
                    case "administrative_area_level_1":
                        $state = $data['name'];
                        break;
                    case "country":
                        $country = $data['name'];
                        break;
                    case "postal_code":
                        $code = $data['name'];
                        break;
                }
            }
            echo 'street:'.$street.'sub:'.$building.'route'.$district.'code'.$code;
        }else{
            return back()->withInput()->withErrors(['unexpected_error' => 'Select Valid Address']);
        }
        if($street == "" && $building == "" && $district == "" && $political == "" && $code == ""){
            return back()->withInput()->withErrors(['unexpected_error' => 'Введите подробный адрес']);
        }
        else{
            session()->put('to-lat-cargo', $request->address_latitude);
            session()->put('to-lon-cargo', $request->address_longitude);
            session()->put('to-address-cargo', $request->address_component);
            session()->put('to-position-cargo', $request->dc);
            return redirect()->route('stopsListings_cargo', app()->getLocale());
        }
    }

    public function stopsPassengerShow(Request $request)
    {
        
        return view('listings.trip-stops');
    }

    public function updateStops(Request $request)
    {
        $stops = session()->get('stops-passenger');
        $actives = $request->active;
        $times = $request->time;
        if($stops != null){
            for($i=0;$i<count($stops);$i++){
                $stops[$i]->active = $actives[$i];
                $stops[$i]->starting_hour = $times[$i];
            }
        }
        session()->put('stops-passenger', $stops);
        return response()->json(['state' => 'success']);;
    }

    public function updateStopsCargo(Request $request)
    {
        $stops = session()->get('stops-cargo');
        $actives = $request->active;
        $times = $request->time;
        if($stops != null){
            for($i=0;$i<count($stops);$i++){
                $stops[$i]->active = $actives[$i];
                $stops[$i]->starting_hour = $times[$i];
            }
        }
        session()->put('stops-cargo', $stops);
        return response()->json(['state' => 'success']);;
    }


    public function stopsCargo(Request $request)
    {
        if($request->drop_off != '' || $request->drop_off != null)
        {
            $from_lat = session()->get('from-lat-cargo');
            $from_lon = session()->get('from-lon-cargo');
            $data = collect();
            $data->drop_off = $request->drop_off;
            $data->address_component = json_decode($request->address_component);
            $data->lat = $request->address_latitude;
            $data->long = $request->address_longitude;
            $data->active = 1;
            $result_stop = Helper::GetDrivingDistance($from_lat,$request->address_latitude,$from_lon, $request->address_longitude);
            if($result_stop == "zero_result"){
                $distance = 0;
                $time = 0;
            }
            else{
                $distance = $result_stop['distance'];
                $time = $result_stop['time'];
            }
            $to_lat = session()->get('to-lat-cargo');
            $to_lon = session()->get('to-lon-cargo');
            $result_destination = Helper::GetDrivingDistance($from_lat,$to_lat,$from_lon, $to_lon);
            if($result_destination == "zero_result"){
                $distance_destination = 0;
            }
            else{
                $distance_destination = $result_destination['distance'];
            }
            $data->distance = $distance;
            $data->time = $time;
            $stops = session()->get('stops-cargo');
            if($distance != 0 && $distance_destination != 0 && $distance < $distance_destination){
                if($stops != null){
                    $stops[count($stops) + 1]  = $data;
                    session()->push('stops-cargo', $data);
                }
                else{
                    session()->push('stops-cargo', $data);
                }
                return redirect()->route('stopsListings_cargo', app()->getLocale());
            }else{
                return back()->withInput()
                ->withErrors(['unexpected_error' => 'Стоп следует выбирать между начальной и конечной позицией.']);
            }
            
        }else{
            return back()->withInput()
            ->withErrors(['unexpected_error' => 'Стоп следует выбирать между начальной и конечной позицией.']);
        }

    }
    public function stopsListings_cargo(){
        return view('listings.trip-stops-cargo');
    }

    public function stopPlacesPassenger()
    {
        $ride = session()->get('stops-passenger');
        if(is_array($ride)){
            usort($ride,function($first,$second){
                return strtolower($first->distance) > strtolower($second->distance);
            });
        }
        // dd(session()->get('to-position-passenger'));
        session()->put('stops-passenger-reserve', $ride);
        return view('listings.trip-stops-places');
    }

    public function stopPlacesCargo()
    {
        $ride = session()->get('stops-cargo');
        $from_lat = session()->get('from-lat-cargo');
        $to_lat = session()->get('to-lat-cargo');
        if(is_array($ride)){
            if($from_lat > $to_lat){
                usort($ride,function($first,$second){
                    return strtolower($first->lat) > strtolower($second->lat);
                });
            }else{
                usort($ride,function($first,$second){
                    return strtolower($first->lat) < strtolower($second->lat);
                });
            }
        }
        if($ride != null)
            // $ride = array_reverse($ride);
        session()->put('stops-cargo-reserve', $ride);
        return view('listings.trip-stops-places-cargo');
    }

    public function whenTripPassenger()
    {
        return view('listings.when-trip');
    }

    public function whenTripCargo()
    {
        return view('listings.when-trip-cargo');
    }

    public function chooseCarPassenger(Request $request)
    {
        if($request->date != null){
            session(['starting-date-passenger' => $request->date]);
            session(['starting-time-passenger' => $request->time]);
            session()->put('covid-passenger', $request->covid);
        }
        $cars = Cars::where('user_id', Auth::user()->id)->where('bus', false)->get();
        $lat1 = session()->get('from-lat-passenger');
        $lat2 = session()->get('to-lat-passenger');
        $long1 = session()->get('from-lon-passenger');
        $long2 = session()->get('to-lon-passenger');
        if($lat1 != null || $long1 != null || $lat2 != null || $long2 != null){
            $result = Helper::GetDrivingDistance($lat1,$lat2,$long1,$long2);
            session()->put('distance_time', $result);
        }
        else
            $result = '';
        $setprice_status = false;
        return view('listings.trip-choise-car', compact('cars', 'result', 'setprice_status'));
    }
    public function chooseCarPassengerAfterSetPrice()
    {
        $cars = Auth::user()->cars;
        $lat1 = session()->get('from-lat-passenger');
        $lat2 = session()->get('to-lat-passenger');
        $long1 = session()->get('from-lon-passenger');
        $long2 = session()->get('to-lon-passenger');
        $setprice_status = true;
        if($lat1 != null || $long1 != null || $lat2 != null || $long2 != null){
            $result = Helper::GetDrivingDistance($lat1,$lat2,$long1,$long2);
            session()->put('distance_time', $result);
        }
        else
            $result = '';
        return view('listings.trip-choise-car', compact('cars', 'result', 'setprice_status'));
    }

    public function saveDateCargo(Request $request)
    {
        if($request->date != null){
            session()->put('starting-date-cargo', $request->date);
            $date = session()->get('starting-date-cargo');
            session()->put('starting-time-cargo', $request->time);
            $time = session()->get('starting-time-cargo');
            session()->put('covid-cargo', $request->covid);
        }
        if($date == null || $time == null){
            return "failed";
        }
        else{
            return "success";
        }
    }

    public function chooseCarCargo(Request $request){
        $cars = DB::table('trucks')
                ->select('trucks.*')
                ->join('users','users.id','=','trucks.user_id')
                ->where('users.id', Auth::user()->id)
                ->get();
        $lat1 = session()->get('from-lat-cargo');
        $lat2 = session()->get('to-lat-cargo');
        $long1 = session()->get('from-lon-cargo');
        $long2 = session()->get('to-lon-cargo');
        $setprice_status = false;
        $cargotypes = DB::table('cargo_types')->get();
        if($lat1 != null || $long1 != null || $lat2 != null || $long2 != null){
            $result = Helper::GetDrivingDistance($lat1,$lat2,$long1,$long2);
            session()->put('distance_time_cargo', $result);
        }
        else
            $result = '';
        return view('listings.trip-choise-car-cargo', compact('cars', 'result','cargotypes','setprice_status'));
    }

    public function chooseCarCargoAfterSetPrice(){
        $cars = DB::table('trucks')
                ->select('trucks.*')
                ->join('users','users.id','=','trucks.user_id')
                ->where('users.id', Auth::user()->id)
                ->get();
        $lat1 = session()->get('from-lat-cargo');
        $lat2 = session()->get('to-lat-cargo');
        $long1 = session()->get('from-lon-cargo');
        $long2 = session()->get('to-lon-cargo');
        $cargotypes = DB::table('cargo_types')->get();
        if($lat1 != null || $long1 != null || $lat2 != null || $long2 != null){
            $result = Helper::GetDrivingDistance($lat1,$lat2,$long1,$long2);
            session()->put('distance_time_cargo', $result);
        }
        else
            $result = '';
        $setprice_status = true;
        return view('listings.trip-choise-car-cargo', compact('cars', 'result','cargotypes', 'setprice_status'));
    }

    public function changePrice()
    {
        $stops = session()->get('stops-passenger');
        $fc = session()->get('from-position-passenger');
        $dc = session()->get('to-position-passenger');
        return view('listings.remove-price', compact('stops', 'fc', 'dc'));
    }

    public function changePrice_cargo()
    {
        $stops = session()->get('stops-cargo');
        $fc = session()->get('from-position-cargo');
        $dc = session()->get('to-position-cargo');
        return view('listings.remove-price-cargo', compact('stops', 'fc', 'dc'));
    }

    public function savePrice(Request $request)
    {
        $stops = session()->get('stops-passenger');
        $prices = $request->prices;
        $total = 0;
        if(isset($prices[0]))
        $total = floatval($prices[0]);
        if($stops != null){
            if(is_array($prices))
            for($i=0;$i<count($stops);$i++){
                $stops[$i]->price = floatval($prices[$i+1]);
            }
        }
        session()->put('total-price', $total);
        session()->put('stops-passenger', $stops);
        return 'success';
    }

    public function savePrice_cargo(Request $request)
    {
        try {
            $stops = session()->get('stops-cargo');
            $prices = $request->prices;
            // session()->put('total-price-cargo', $prices[0]);
            // if($stops != null){
            //     for($i=0;$i<count($stops);$i++){
            //         $stops[$i]->price = $prices[$i+1];
            //     }
            // }
            $total = 0;
            if(isset($prices[0]))
            $total = floatval($prices[0]);
            if($stops != null){
                if(is_array($prices))
                for($i=0;$i<count($stops);$i++){
                    $stops[$i]->price = floatval($prices[$i+1]);
                }
            }
            session()->put('total-price-cargo', $total);
            session()->put('stops-cargo', $stops);
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
    }

    public function savePrice_total(Request $request)
    {
        $price = $request->price;
        session()->put('total-price', $price);
        $stops = session()->get('stops-passenger');
        if($stops != null){
            for($i=0;$i<count($stops);$i++){
                $stops[$i]->price = 0;
            }
            session()->put('stops-passenger', $stops);
        }
        return response()->json(['state' => 'success']);
    }

    public function savePrice_total_cargo(Request $request)
    {
        try {
            $price = $request->price;
            session()->put('total-price-cargo', $price);
            $stops = session()->get('stops-cargo');
            if(is_array($stops)){
                for($i=0;$i<count($stops);$i++){
                    $stops[$i]->price = 0;
                }
                session()->put('stops-cargo', $stops);
            }
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
        
    }

    public function saveCar_cargo(Request $request)
    {
        try {
            session()->put('car-id_cargo', $request->car_id);
            session()->put('capacity', $request->capacity);
            session()->put('place', $request->place);
            session()->put('max_size', $request->max_size);
            session()->put('cargo_type', $request->cargo_type);
            if(Auth::user()->avatar){
                return response()->json(['state' => 'success','photo_exist' => true]);
            }
            else{
                return response()->json(['state' => 'success','photo_exist' => false]);
            }
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
        
    }

    public function addPhoto(Request $request)
    {
        session()->put('car-id', $request->car_id);
        session()->put('count', $request->count);
        if(Auth::user()->avatar){
            return view('listings.trip-comment');
        }
        else{
            return view('listings.add-photo');
        }
    }

    public function addPhoto_cargo(Request $request)
    {
        session()->put('car-id_cargo', $request->car_id);
        session()->put('capacity', $request->capacity);
        session()->put('place', $request->place);
        session()->put('max_size', $request->max_size);
        session()->put('cargo_type', $request->cargo_type);
        if(Auth::user()->avatar){
            return view('listings.trip-comment-cargo');
        }
        else{
            return view('listings.add-photo-cargo');
        }
    }

    public function uploadphoto(Request $request)
    {
        try {
            if (!empty($request['upload_image'])) {
                $file = $request->file('upload_image');
                $destinationPath = 'uploads/photos';
                if (!File::isDirectory($destinationPath)) {

                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                // echo $name;
                $file->move($destinationPath, $name);
                $request['image'] = 'uploads/photos/' . $name;
                DB::table('users')->where('id', Auth::user()->id)->update(array('avatar' => $request['image']));
            }
            if ($request['return'] == '1')
                // return 1;
                return response()->json(['state' => 'success', 'result' => 1]);
            else
                return response()->json(['state' => 'success', 'result' => 0]);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
        
    }

    public function uploadphoto_cargo(Request $request)
    {
        try {
            if (!empty($request['upload_image'])) {
                $file = $request->file('upload_image');
                $destinationPath = 'uploads/photos';
                if (!File::isDirectory($destinationPath)) {

                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                // echo $name;
                $file->move($destinationPath, $name);
                $request['image'] = 'uploads/photos/' . $name;
                DB::table('users')->where('id', Auth::user()->id)->update(array('avatar' => $request['image']));
            }
            if ($request['return'] == '1')
                // return 1;
                return response()->json(['state' => 'success', 'result' => 1]);
            else
                return response()->json(['state' => 'success', 'result' => 0]);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
        
    }

    public function addComment()
    {
        return view('listings.trip-comment');
    }
    public function addComment_cargo()
    {
        return view('listings.trip-comment-cargo');
    }

    public function setReturn()
    {
        $list_startdate = session()->get('starting-date-passenger');
        return view('listings.when-return', compact('list_startdate'));
    }

    public function setReturn_cargo()
    {
        $list_startdate = session()->get('starting-date-cargo');
        return view('listings.when-return-cargo', compact('list_startdate'));
    }

    public function setReturntrip(Request $request)
    {
        if($request->date != null){
            session(['return' => true]);
            session(['return-date' => $request->date]);
            session(['return-time' => $request->time]);
        }
        
        return view('listings.trip-comment');
    }

    public function setReturntrip_cargo(Request $request)
    {
        if($request->date != null){
            session(['return-cargo' => true]);
            session(['return-date-cargo' => $request->date]);
            session(['return-time-cargo' => $request->time]);
        }
        
        return view('listings.trip-comment-cargo');
    }

    public function saveComment(Request $request)
    {
        try {
            $fc = session()->get('from-position-passenger');
            $fc_lnt = session()->get('from-lat-passenger');
            $fc_long = session()->get('from-lon-passenger');
            $fc_address = json_decode(session()->get('from-address-passenger'));
            $dc = session()->get('to-position-passenger');
            $dc_lnt = session()->get('to-lat-passenger');
            $dc_long = session()->get('to-lon-passenger');
            $dc_address = json_decode(session()->get('to-address-passenger'));
            $result = [];
            $street = '';
            $building = '';
            $district = '';
            $city = '';
            $state = '';
            $country = '';
            $code = '';
            if(is_array($fc_address) && is_array($dc_address)){
                for ($i = 0; $i < count($fc_address); $i++) {
                    $data['key'] = $fc_address[$i]->types[0];
                    $data['name'] = $fc_address[$i]->long_name;
                    $result[$i] = $data;
                    switch ($data['key']) {
                        case "street_number":
                            $street = $data['name'];
                            break;
                        case "subpremise":
                            $building = $data['name'];
                            break;
                        case "route":
                            $district = $data['name'];
                            break;
                        case "locality":
                            $city = $data['name'];
                            break;
                        case "administrative_area_level_1":
                            $state = $data['name'];
                            break;
                        case "country":
                            $country = $data['name'];
                            break;
                        case "postal_code":
                            $code = $data['name'];
                            break;
                    }
                }
                $fc_id = DB::table('locations')->insertGetId(
                    [
                        'building' => $building,
                        'street' => $street,
                        'district' => $district,
                        'city' => $city,
                        'state' => $state,
                        'zip' => $code,
                        'country' => $country,
                        'lat' => $fc_lnt,
                        'lng' => $fc_long,
                        'full' => $fc
                    ]
                );

                for ($i = 0; $i < count($dc_address); $i++) {
                    // echo($dc_address[$i]);
                    // exit;
                    $data['key'] = $dc_address[$i]->types[0];
                    $data['name'] = $dc_address[$i]->long_name;
                    $result[$i] = $data;
                    switch ($data['key']) {
                        case "street_number":
                            $street = $data['name'];
                            break;
                        case "subpremise":
                            $building = $data['name'];
                            break;
                        case "route":
                            $district = $data['name'];
                            break;
                        case "locality":
                            $city = $data['name'];
                            break;
                        case "administrative_area_level_1":
                            $state = $data['name'];
                            break;
                        case "country":
                            $country = $data['name'];
                            break;
                        case "postal_code":
                            $code = $data['name'];
                            break;
                    }
                }
                $dc_id = DB::table('locations')->insertGetId(
                    [
                        'building' => $building,
                        'street' => $street,
                        'district' => $district,
                        'city' => $city,
                        'state' => $state,
                        'zip' => $code,
                        'country' => $country,
                        'lat' => $dc_lnt,
                        'lng' => $dc_long,
                        'full' => $dc
                    ]
                );

                $list_startdate = session()->get('starting-date-passenger');
                $list_starttime = session()->get('starting-time-passenger');
                $combined_date_and_time = $list_startdate . ' ' . $list_starttime;
                $starting_date_timestamp = strtotime($combined_date_and_time);
                $starting_date = date('Y-m-d H:i:s', $starting_date_timestamp);
                $distance_time = session()->get('distance_time');
                $seconds_stop = $distance_time['time'];
                $hours_stop = floor($seconds_stop / 3600);
                $h_stop = floor($seconds_stop / 3600);
                $seconds_stop -= $hours_stop * 3600;
                $minutes_stop = floor($seconds_stop / 60);
                $arrival_time_stop  = date('Y-m-d H:i',strtotime('+'.$h_stop.' hours + '.$minutes_stop.'minutes',strtotime($starting_date)));
                
                $published_trips = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $starting_date)->where('end_date', '>=', $starting_date )->get();
                $published_trips_end = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $arrival_time_stop)->where('end_date', '>=', $arrival_time_stop )->get();
                $existing_trips = $published_trips->merge($published_trips_end);
                session()->put('starting_date', $starting_date);
                session()->put('arrival_time_stop', $arrival_time_stop);
                if(count($existing_trips) > 0){
                    return response()->json(['state' => 'success', 'message' => 'existing_trip']);
                }
                
                $max_occupants = session()->get('count');
                $price_per_seat = session()->get('total-price');
                $arr = explode(" ", $price_per_seat);
                $price_per_seat = (float)$arr[0];
                $car_id = session()->get('car-id');
                $currency = session()->get('currency');
                $currency == null && ($currency = 'UZS');
                // if($currency == 'RUB'){
                //     $price_per_seat = intval(Helper::convertCurrency($price_per_seat, 'RUB', 'UZS'));
                // }
                $listing_id = DB::table('listings')->insertGetId(
                    [
                        'user_id' => Auth::user()->id,
                        'location_id' => $fc_id,
                        'destination_id' => $dc_id,
                        'starting_date' => $starting_date,
                        'max_occupants' => $max_occupants,
                        'active' => true,
                        'price_per_seat' => $price_per_seat,
                        'distance' => $distance_time['distance'],
                        'time' => $distance_time['time'],
                        'car_id' => $car_id,
                        'additional_info' => $request['comment'],
                        'currency' => $currency,
                        'end_date' => $arrival_time_stop
                    ]
                );
                $stops = session()->get('stops-passenger');
                $result = [];
                $street = '';
                $building = '';
                $district = '';
                $city = '';
                $state = '';
                $country = '';
                $code = '';
                // var_dump($stops);
                // exit;
                if ($stops != null && is_array($stops)) {
                    for ($i = 0; $i < count($stops); $i++) {
                        if($stops[$i]->active == 1 && is_array($stops[$i]->address_component)){
                            for ($j = 0; $j < count($stops[$i]->address_component); $j++) {
                                $data['key'] = $stops[$i]->address_component[$j]->types[0];
                                $data['name'] = $stops[$i]->address_component[$j]->long_name;
                                $result[$i] = $data;
                                switch ($data['key']) {
                                    case "street_number":
                                        $street = $data['name'];
                                        break;
                                    case "subpremise":
                                        $building = $data['name'];
                                        break;
                                    case "route":
                                        $district = $data['name'];
                                        break;
                                    case "locality":
                                        $city = $data['name'];
                                        break;
                                    case "administrative_area_level_1":
                                        $state = $data['name'];
                                        break;
                                    case "country":
                                        $country = $data['name'];
                                        break;
                                    case "postal_code":
                                        $code = $data['name'];
                                        break;
                                }
                            }
                            if ($stops[$i]->price) {
                                // $arr = explode(" ", $stops[$i]->price);
                                // $stops[$i]->price = (float)$arr[0];
                                // DB::table('stops')->insert(
                                //     [
                                //         'listing_id' => $listing_id,
                                //         'location' => $stops[$i]->drop_off,
                                //         'price' => $stops[$i]->price,
                                //         'lat' => $stops[$i]->lat,
                                //         'lng' => $stops[$i]->long
                                //     ]
                                // );
                                $location = Locations::create(
                                    [
                                        'building' => $building,
                                        'street' => $street,
                                        'district' => $district,
                                        'city' => $city,
                                        'state' => $state,
                                        'zip' => $code,
                                        'country' => $country,
                                        'lat' => $stops[$i]->lat,
                                        'lng' => $stops[$i]->long,
                                        'price' => $stops[$i]->price,
                                        'full' => $stops[$i]->drop_off
                                    ]
                                );
                            } else {
                                $location = Locations::create(
                                    [
                                        'building' => $building,
                                        'street' => $street,
                                        'district' => $district,
                                        'city' => $city,
                                        'state' => $state,
                                        'zip' => $code,
                                        'country' => $country,
                                        'lat' => $stops[$i]->lat,
                                        'lng' => $stops[$i]->long,
                                        'price' => 0,
                                        'full' => $stops[$i]->drop_off
                                    ]
                                );
                            }
                            $result = Helper::GetDrivingDistance($fc_lnt,$stops[$i]->lat,$fc_long, $stops[$i]->long);
                            if($result == "zero_result"){
                                $distance = 0;
                                $time = 0;
                            }
                            else if(count($result) > 0){
                                $distance = $result['distance'];
                                $time = $result['time'];
                                DB::table('listing_stops')->insert(
                                    [
                                        'listing_id' => $listing_id,
                                        'location_id' => $location->id,
                                        'starting_hour' => $stops[$i]->starting_hour,
                                        'distance' => $distance,
                                        'time' => $time,
                                    ]
                                );
                            }

                        }
                    }
                }
                $return = session()->get('return');
                if( $return == true){
                    $returndate = session()->get('return-date');
                    $returntime = session()->get('return-time');
        
                    $data = DB::table('listings')->where('id', $listing_id)->first();
                    $stops = Stops::where('listing_id', $listing_id)->get();
                    $cargotypes = DB::table('listing_cargotype')->where('listing_id', $listing_id)->get();
                    $combined_date_and_time = $returndate . ' ' . $returntime;
                    $starting_date_timestamp = strtotime($combined_date_and_time);
                    $starting_date = date('Y-m-d H:i:s', $starting_date_timestamp);
                    $return_id = DB::table('listings')->insertGetId(
                        [
                            'user_id' => $data->user_id,
                            'location_id' => $data->destination_id,
                            'destination_id' => $data->location_id,
                            'starting_date' => $starting_date,
                            'capacity' => $data->capacity,
                            'max_occupants' => $data->max_occupants,
                            'place' => $data->place,
                            'max_size' => $data->max_size,
                            'active' => true,
                            'price_per_seat' => $data->price_per_seat,
                            'distance' => $data->distance,
                            'time' => $data->time,
                            'car_id' => $data->car_id,
                            'truck_id' => $data->truck_id,
                            'covid19_title' => $data->covid19_title,
                            'covid19_desc' => $data->covid19_desc
                        ]
                    );
                    if(count($stops)>0){
                        foreach ($stops as $stop) {

                            $result_return = Helper::GetDrivingDistance($dc_lnt,$stop->location->lat,$dc_long, $stop->location->lng);
                            if($result_return == "zero_result"){
                                $distanceresult_return = 0;
                                $timeresult_return = 0;
                            }
                            else if(count($result_return) > 0){
                                $distanceresult_return = $result_return['distance'];
                                $timeresult_return = $result_return['time'];
                                DB::table('listing_stops')->insert(
                                    [
                                        'listing_id' => $return_id,
                                        'location_id' => $stop->location_id,
                                        'distance' => $distanceresult_return,
                                        'time' => $timeresult_return
                                    ]
                                );
                            }

                        }
                    }
                    if(count($cargotypes)>0){
                        foreach ($cargotypes as $item) {
                            DB::table('listing_stops')->insert(
                                [
                                    'listing_id' => $return_id,
                                    'location_id' => $item->cargo_type_id
                                ]
                            );
                        }
                    }
                }
                
                session()->forget(['list_id', 'from-position-cargo', 'from-lat-cargo', 'from-lon-cargo', 'from-address-cargo', 
                'from-position-passenger', 'from-lat-passenger', 'from-lon-passenger', 'from-address-passenger', 'to-position-passenger', 
                'to-lat-passenger', 'to-lon-passenger', 'to-address-passenger', 'to-position-cargo', 'to-lat-cargo', 'to-lon-cargo', 'to-address-cargo', 'stops-passenger', 
                'stops-cargo', 'stops-passenger-reserve', 'stops-cargo-reserve', 'starting-date-passenger', 'starting-time', 'covid-passenger', 
                'starting-date-cargo', 'starting-time-cargo', 'covid-cargo', 'total-price', 'car-id', 'count', 'distance_time',
                'return','return-cargo','return-date','return-date-cargo','return-time','return-time-cargo']);
                return response()->json(['state' => 'success', 'message' => 'ok']);
            }

            return response()->json(['state' => 'error']);
            
        } catch (\Throwable $th) {
            echo $th;
            return response()->json(['state' => 'error']);
        }
    }

    public function existingTrips(Request $request){
        $combined_date_and_time =  session()->get('starting_date');
        $arrival_time_stop =  session()->get('arrival_time_stop');
        $published_trips = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $combined_date_and_time)->where('end_date', '>=', $combined_date_and_time )->get();
        $published_trips_end = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $arrival_time_stop)->where('end_date', '>=', $arrival_time_stop )->get();
        $published_trips_middle = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $combined_date_and_time)->where('end_date', '>=', $combined_date_and_time )->get();
        $trips = $published_trips->merge($published_trips_end);
        return view('trips.existing-trips', compact('trips', 'combined_date_and_time', 'arrival_time_stop'));
    }

    public function saveComment_cargo(Request $request){
        try {
            $fc = session()->get('from-position-cargo');
            $fc_lnt = session()->get('from-lat-cargo');
            $fc_long = session()->get('from-lon-cargo');
            $fc_address = json_decode(session()->get('from-address-cargo'));
            $dc = session()->get('to-position-cargo');
            $dc_lnt = session()->get('to-lat-cargo');
            $dc_long = session()->get('to-lon-cargo');
            $dc_address = json_decode(session()->get('to-address-cargo'));
            $result = [];
            $street = '';
            $building = '';
            $district = '';
            $city = '';
            $state = '';
            $country = '';
            $code = '';
            if(is_array($fc_address) && is_array($dc_address)){
                for ($i = 0; $i < count($fc_address); $i++) {
                    $data['key'] = $fc_address[$i]->types[0];
                    $data['name'] = $fc_address[$i]->long_name;
                    $result[$i] = $data;
                    switch ($data['key']) {
                        case "street_number":
                            $street = $data['name'];
                            break;
                        case "subpremise":
                            $building = $data['name'];
                            break;
                        case "route":
                            $district = $data['name'];
                            break;
                        case "locality":
                            $city = $data['name'];
                            break;
                        case "administrative_area_level_1":
                            $state = $data['name'];
                            break;
                        case "country":
                            $country = $data['name'];
                            break;
                        case "postal_code":
                            $code = $data['name'];
                            break;
                    }
                }
                $fc_id = DB::table('locations')->insertGetId(
                    [
                        'building' => $building,
                        'street' => $street,
                        'district' => $district,
                        'city' => $city,
                        'state' => $state,
                        'zip' => $code,
                        'country' => $country,
                        'lat' => $fc_lnt,
                        'lng' => $fc_long,
                        'full' => $fc
                    ]
                );
    
                for ($i = 0; $i < count($dc_address); $i++) {
                    // echo($dc_address[$i]);
                    // exit;
                    $data['key'] = $dc_address[$i]->types[0];
                    $data['name'] = $dc_address[$i]->long_name;
                    $result[$i] = $data;
                    switch ($data['key']) {
                        case "street_number":
                            $street = $data['name'];
                            break;
                        case "subpremise":
                            $building = $data['name'];
                            break;
                        case "route":
                            $district = $data['name'];
                            break;
                        case "locality":
                            $city = $data['name'];
                            break;
                        case "administrative_area_level_1":
                            $state = $data['name'];
                            break;
                        case "country":
                            $country = $data['name'];
                            break;
                        case "postal_code":
                            $code = $data['name'];
                            break;
                    }
                }
                $dc_id = DB::table('locations')->insertGetId(
                    [
                        'building' => $building,
                        'street' => $street,
                        'district' => $district,
                        'city' => $city,
                        'state' => $state,
                        'zip' => $code,
                        'country' => $country,
                        'lat' => $dc_lnt,
                        'lng' => $dc_long,
                        'full' => $dc
                    ]
                );
                $list_startdate = session()->get('starting-date-cargo');
                $list_starttime = session()->get('starting-time-cargo');
                $combined_date_and_time = $list_startdate . ' ' . $list_starttime;
                $starting_date_timestamp = strtotime($combined_date_and_time);
                $starting_date = date('Y-m-d H:i:s', $starting_date_timestamp);
                $capacity = session()->get('capacity');  
                $place = session()->get('place');
                $max_size = session()->get('max_size');
                $price_per_seat = session()->get('total-price-cargo');
                $arr = explode(" ", $price_per_seat);
                $price_per_seat = (float)$arr[0];
                $car_id = session()->get('car-id_cargo');
                $distance_time = session()->get('distance_time_cargo');
                $seconds_stop = $distance_time['time'];
                $hours_stop = floor($seconds_stop / 3600);
                $h_stop = floor($seconds_stop / 3600);
                $seconds_stop -= $hours_stop * 3600;
                $minutes_stop = floor($seconds_stop / 60);
                $arrival_time_stop  = date('Y-m-d H:i',strtotime('+'.$h_stop.' hours + '.$minutes_stop.'minutes',strtotime($starting_date)));
    
                $published_trips = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $starting_date)->where('end_date', '>=', $starting_date )->get();
                $published_trips_end = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $arrival_time_stop)->where('end_date', '>=', $arrival_time_stop )->get();
                $existing_trips = $published_trips->merge($published_trips_end);
                session()->put('starting_date', $starting_date);
                session()->put('arrival_time_stop', $arrival_time_stop);
                if(count($existing_trips) > 0){
                    return response()->json(['state' => 'success', 'message' => 'existing_trip']);
                }
    
                $listing_id = DB::table('listings')->insertGetId(
                    [
                        'user_id' => Auth::user()->id,
                        'location_id' => $fc_id,
                        'destination_id' => $dc_id,
                        'starting_date' => $starting_date,
                        'capacity' => $capacity,
                        'max_occupants' => 0,
                        'place' => $place,
                        'max_size' => $max_size,
                        'active' => true,
                        'price_per_seat' => $price_per_seat,
                        'distance' => $distance_time['distance'],
                        'time' => $distance_time['time'],
                        'truck_id' => $car_id,
                        'end_date' => $arrival_time_stop
                    ]
                );
                $cargo_type = session()->get('cargo_type');
                $types = explode(" ", $cargo_type);
                for($i = 0; $i < count($types); $i++){
                    $type_id = DB::table('cargo_types')->where('type_name', '=', $types[$i])->first();
                    if(!is_null($type_id)){
                        DB::table('listing_cargotype')->insert(
                            [
                                'listing_id' => $listing_id,
                                'cargo_type_id' => $type_id->id
                            ]
                        );
                    }
                }
                $stops = session()->get('stops-cargo');
                $result = [];
                $street = '';
                $building = '';
                $district = '';
                $city = '';
                $state = '';
                $country = '';
                $code = '';
                if ($stops != null && is_array($stops) && count($stops) > 0) {
                    for ($i = 0; $i < count($stops); $i++) {
                        for ($j = 0; $j < count($stops[$i]->address_component); $j++) {
                            $data['key'] = $stops[$i]->address_component[$j]->types[0];
                            $data['name'] = $stops[$i]->address_component[$j]->long_name;
                            $result[$i] = $data;
                            switch ($data['key']) {
                                case "street_number":
                                    $street = $data['name'];
                                    break;
                                case "subpremise":
                                    $building = $data['name'];
                                    break;
                                case "route":
                                    $district = $data['name'];
                                    break;
                                case "locality":
                                    $city = $data['name'];
                                    break;
                                case "administrative_area_level_1":
                                    $state = $data['name'];
                                    break;
                                case "country":
                                    $country = $data['name'];
                                    break;
                                case "postal_code":
                                    $code = $data['name'];
                                    break;
                            }
                        }
                        if ($stops[$i]->price) {
                            // $arr = explode(" ", $stops[$i]->price);
                            // $stops[$i]->price = (float)$arr[0];
                            $location_id = DB::table('locations')->insertGetId(
                                [
                                    'building' => $building,
                                    'street' => $street,
                                    'district' => $district,
                                    'city' => $city,
                                    'state' => $state,
                                    'zip' => $code,
                                    'country' => $country,
                                    'lat' => $stops[$i]->lat,
                                    'lng' => $stops[$i]->long,
                                    'price' => $stops[$i]->price,
                                    'full' => $stops[$i]->drop_off
                                ]
                            );
                        } else {
                            $location_id = DB::table('locations')->insertGetId(
                                [
                                    'building' => $building,
                                    'street' => $street,
                                    'district' => $district,
                                    'city' => $city,
                                    'state' => $state,
                                    'zip' => $code,
                                    'country' => $country,
                                    'lat' => $stops[$i]->lat,
                                    'lng' => $stops[$i]->long,
                                    'price' => 0,
                                    'full' => $stops[$i]->drop_off
                                ]
                            );
                        }
                        $result = Helper::GetDrivingDistance($fc_lnt,$stops[$i]->lat,$fc_long, $stops[$i]->long);
                        if($result == "zero_result"){
                            $distance = 0;
                            $time = 0;
                        }
                        else if(count($result) > 0){
                            $distance = $result['distance'];
                            $time = $result['time'];
                            DB::table('listing_stops')->insert(
                                [
                                    'listing_id' => $listing_id,
                                    'location_id' => $location_id,
                                    'starting_hour' => $stops[$i]->starting_hour,
                                    'distance' => $distance,
                                    'time' => $time
                                ]
                            );
                        }
                    }
                }
                $return = session()->get('return-cargo');
                if( $return == true){
                    $returndate = session()->get('return-date-cargo');
                    $returntime = session()->get('return-time-cargo');
        
                    $data = DB::table('listings')->where('id', $listing_id)->first();
                    $stops = Stops::where('listing_id', $listing_id)->where('listing_id', $listing_id)->get();
                    $cargotypes = DB::table('listing_cargotype')->where('listing_id', $listing_id)->get();
                    $combined_date_and_time = $returndate . ' ' . $returntime;
                    $starting_date_timestamp = strtotime($combined_date_and_time);
                    $starting_date = date('Y-m-d H:i:s', $starting_date_timestamp);
                    $return_id = DB::table('listings')->insertGetId(
                        [
                            'user_id' => $data->user_id,
                            'location_id' => $data->destination_id,
                            'destination_id' => $data->location_id,
                            'starting_date' => $starting_date,
                            'capacity' => $data->capacity,
                            'max_occupants' => $data->max_occupants,
                            'place' => $data->place,
                            'max_size' => $data->max_size,
                            'active' => true,
                            'price_per_seat' => $data->price_per_seat,
                            'distance' => $data->distance,
                            'time' => $data->time,
                            'car_id' => $data->car_id,
                            'truck_id' => $data->truck_id,
                            'covid19_title' => $data->covid19_title,
                            'covid19_desc' => $data->covid19_desc
                        ]
                    );
                    if(count($stops)>0){
                        foreach ($stops as $stop) {
                            $result_return = Helper::GetDrivingDistance($dc_lnt,$stop->location->lat,$dc_long, $stop->location->lng);
                            if($result_return == "zero_result"){
                                $distanceresult_return = 0;
                                $timeresult_return = 0;
                            }
                            else if(count($result_return) > 0){
                                $distanceresult_return = $result_return['distance'];
                                $timeresult_return = $result_return['time'];
                                DB::table('listing_stops')->insert(
                                    [
                                        'listing_id' => $return_id,
                                        'location_id' => $stop->location_id,
                                        'distance' => $distanceresult_return,
                                        'time' => $timeresult_return
                                    ]
                                );
                            }
                        }
                    }
                }
                session()->forget(['list_id', 'from-position-cargo', 'from-lat-cargo', 'from-lon-cargo', 'from-address-cargo', 
                'from-position-passenger', 'from-lat-passenger', 'from-lon-passenger', 'from-address-passenger', 'to-position-passenger', 
                'to-lat-passenger', 'to-lon-passenger', 'to-address-passenger', 'to-position-cargo', 'to-lat-cargo', 'to-lon-cargo', 'to-address-cargo', 'stops-passenger', 
                'stops-cargo', 'stops-passenger-reserve', 'stops-cargo-reserve', 'starting-date-passenger', 'starting-time', 'covid-passenger', 
                'starting-date-cargo', 'starting-time-cargo', 'covid-cargo', 'total-price', 'car-id', 'count', 'distance_time',
                'return','return-cargo','return-date','return-date-cargo','return-time','return-time-cargo']);
                
                return response()->json(['state' => 'success', 'message' => 'ok']);

            }else{
                
                return response()->json(['state' => 'error' ,'message' => 'Adress is wrong']);
            }

           
        } catch (\Throwable $th) {
            echo $th;
            exit;
            return response()->json(['state' => 'error']);
        }
    }
    public function clearSession()
    {
        session()->forget(['list_id', 'from-position-cargo', 'from-lat-cargo', 'from-lon-cargo', 'from-address-cargo', 
        'from-position-passenger', 'from-lat-passenger', 'from-lon-passenger', 'from-address-passenger', 'to-position-passenger', 
        'to-lat-passenger', 'to-lon-passenger', 'to-address-passenger', 'to-position-cargo', 'to-lat-cargo', 'to-lon-cargo', 'to-address-cargo', 'stops-passenger', 
        'stops-cargo', 'stops-passenger-reserve', 'stops-cargo-reserve', 'starting-date-passenger', 'starting-time', 'covid-passenger', 
        'starting-date-cargo', 'starting-time-cargo', 'covid-cargo', 'total-price', 'car-id', 'count', 'distance_time',
        'return','return-cargo','return-date','return-date-cargo','return-time','return-time-cargo']);
        return redirect(app()->getLocale());
    }

    public function destroy($locale, $id)
    {
        try {
            $listing = Listings::findOrFail($id);
            $listing->update(['delete' => true]);
            return redirect()->route('trips', app()->getLocale())
                ->with('success_message', 'Trip was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function edit($locale, $id)
    {
        
        try {
            $hashids = new Hashids();
            $id = $hashids->decode($id)[0];
            $listing = Listings::findOrFail($id);
            if($listing->car_id != null){
                return view('trips.edit', compact('listing'));
            }else{
                $listing_cargo_ypes = [];
                foreach ($listing->cargo_type as $item) {
                    $listing_cargo_ypes[] = $item->id;
                }
                $cargotypes = DB::table('cargo_types')->get();
                return view('trips.edit-cargo', compact('listing', 'cargotypes', 'listing_cargo_ypes'));
            }
        } catch (Exception $exception) {
            // echo $exception;
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function update($locale, $id, Request $request)
    {
        
        try {
            $listing = Listings::findOrFail($id);
            if($listing->location->lat != $request->address1_latitude || $listing->location->lng != $request->address1_longitude){
                $fc_lnt = $request->address1_latitude;
                $fc_long = $request->address1_longitude;
                $fc_address = json_decode($request->address1_component);
                $street = '';
                $building = '';
                $district = '';
                $city = '';
                $state = '';
                $country = '';
                $code = '';
                if($fc_address != 0){
                    for ($i = 0; $i < count($fc_address); $i++) {
                        $data['key'] = $fc_address[$i]->types[0];
                        $data['name'] = $fc_address[$i]->long_name;
                        switch ($data['key']) {
                            case "street_number":
                                $street = $data['name'];
                                break;
                            case "subpremise":
                                $building = $data['name'];
                                break;
                            case "route":
                                $district = $data['name'];
                                break;
                            case "locality":
                                $city = $data['name'];
                                break;
                            case "administrative_area_level_1":
                                $state = $data['name'];
                                break;
                            case "country":
                                $country = $data['name'];
                                break;
                            case "postal_code":
                                $code = $data['name'];
                                break;
                        }
                    }
                    $location = Locations::findOrFail($listing->location->id);
                    $location = $location->update([
                        'building' => $building,
                        'street' => $street,
                        'district' => $district,
                        'city' => $city,
                        'state' => $state,
                        'zip' => $code,
                        'country' => $country,
                        'lat' => $fc_lnt,
                        'lng' => $fc_long,
                        'full' => $request->fc
                    ]);
                }

            }

            if ($listing->destination->lat != $request->address2_latitude || $listing->destination->lng != $request->address2_longitude) {
                $fc_lnt = $request->address2_latitude;
                $fc_long = $request->address2_longitude;
                $fc_address = json_decode($request->address2_component);
                $street = '';
                $building = '';
                $district = '';
                $city = '';
                $state = '';
                $country = '';
                $code = '';
                if($fc_address != 0){
                    for ($i = 0; $i < count($fc_address); $i++) {
                        $data['key'] = $fc_address[$i]->types[0];
                        $data['name'] = $fc_address[$i]->long_name;
                        switch ($data['key']) {
                            case "street_number":
                                $street = $data['name'];
                                break;
                            case "subpremise":
                                $building = $data['name'];
                                break;
                            case "route":
                                $district = $data['name'];
                                break;
                            case "locality":
                                $city = $data['name'];
                                break;
                            case "administrative_area_level_1":
                                $state = $data['name'];
                                break;
                            case "country":
                                $country = $data['name'];
                                break;
                            case "postal_code":
                                $code = $data['name'];
                                break;
                        }
                    }
                    $location = Locations::findOrFail($listing->destination->id);
                    $location = $location->update([
                        'building' => $building,
                        'street' => $street,
                        'district' => $district,
                        'city' => $city,
                        'state' => $state,
                        'zip' => $code,
                        'country' => $country,
                        'lat' => $fc_lnt,
                        'lng' => $fc_long,
                        'full' => $request->dc
                    ]);
                }
            }

            $location = $listing->location_address;
            $destination = $listing->destination_address;

            $distance_listing = $listing->distance;
            $time_listing = $listing->time;

            if(json_decode($request->address1_component) != 0 || json_decode($request->address2_component)){
                if ($location->lat != null || $location->lng != null || $destination->lat != null || $destination->lng != null) {
                    $result_listing = Helper::GetDrivingDistance($location->lat, $destination->lat, $location->lng, $destination->lng);
                    if ($result_listing != 'zero_result') {
                        $distance_listing = $result_listing['distance'];
                        $time_listing = $result_listing['time'];
                    }
                    else{
                        return back()->withInput()
                        ->withErrors(['unexpected_error' => 'Invalid locations.']);
                    }
                } 
            }

            $combined_date_and_time = $request->starting_date . ' ' . $request->starting_time;
            $starting_date_timestamp = strtotime($combined_date_and_time);
            $starting_date = date('Y-m-d H:i:s', $starting_date_timestamp);

            

            if (is_array($request->stops)) {
                foreach ($request->stops as  $key => $item) {
                    $stop_lnt = $request->address_stop_latitude[$key];
                    $stop_long = $request->address_stop_longitude[$key];
                    $stop_fc_address = json_decode($request->address_stop_component[$key]);
                    $stop_street = '';
                    $stop_building = '';
                    $stop_district = '';
                    $stop_city = '';
                    $stop_state = '';
                    $stop_country = '';
                    $stop_code = '';
                    if($stop_fc_address != 0){
                        for ($i = 0; $i < count($stop_fc_address); $i++) {
                            $data['key'] = $stop_fc_address[$i]->types[0];
                            $data['name'] = $stop_fc_address[$i]->long_name;
                            switch ($data['key']) {
                                case "street_number":
                                    $stop_street = $data['name'];
                                    break;
                                case "subpremise":
                                    $stop_building = $data['name'];
                                    break;
                                case "route":
                                    $stop_district = $data['name'];
                                    break;
                                case "locality":
                                    $stop_city = $data['name'];
                                    break;
                                case "administrative_area_level_1":
                                    $stop_state = $data['name'];
                                    break;
                                case "country":
                                    $stop_country = $data['name'];
                                    break;
                                case "postal_code":
                                    $stop_code = $data['name'];
                                    break;
                            }
                        }
                        $location = Locations::findOrFail($item);
                        $location = $location->update([
                            'building' => $stop_building,
                            'street' => $stop_street,
                            'district' => $stop_district,
                            'city' => $stop_city,
                            'state' => $stop_state,
                            'zip' => $stop_code,
                            'country' => $stop_country,
                            'lat' => $stop_lnt,
                            'lng' => $stop_long,
                            'full' => $request->stop[$key],
                            'price' => $request->stop_price_per_seat[$key]
                        ]);
                    }
                    $location = Locations::findOrFail($listing->location->id);

                    $result_stop = Helper::GetDrivingDistance($location->lat,$stop_lnt,$location->lng,$stop_long);
                    if($result_stop == "zero_result"){
                        $distance = 0;
                        $time = 0;
                    }
                    else if(count($result_stop) > 0){
                        $distance = $result_stop['distance'];
                        $time = $result_stop['time'];
                        if(!is_null($request->stops_id[$key])){
                            $stop = Stops::where('id', $request->stops_id[$key])->first();
                            if(!is_null($stop)){
                                $stop->update([
                                    'starting_hour' => $request->stop_starting_time[$key], 
                                    'max_occupants' => $request->stop_max_occupants[$key],
                                    'distance' => $distance,
                                    'time' => $time
                                ]);
                            }
                        }
                    }
                    $stop = Stops::where('id', $request->stops_id[$key])->first();
                    if(!is_null($stop)){
                        $stop->update([
                            'starting_hour' => $request->stop_starting_time[$key], 
                            'max_occupants' => $request->stop_max_occupants[$key],
                        ]);
                    }
                    if(!is_null($request->stop_price_per_seat[$key])){
                        // echo $request->stop_price_per_seat[$key];
                        // echo $stop->location->price;
                        $stop_location = Locations::findOrFail($item);
                        $stop_location->price = $request->stop_price_per_seat[$key];
                        $stop_location->save();
                    }
                    
                }
            } 
            if(!is_null($request->delete_stops)){
                foreach ($request->delete_stops as $item) {
                    if(!is_null($item)){
                        $stop = Stops::where('id', $request->stops_id[$key])->first();
                        if(!is_null($stop)){
                            $stop->delete();
                        }
                    }
                }
            }

            if (is_array($request->new_stop)) {
                foreach ($request->new_stop as  $key => $item) {
                    $stop_lnt = $request->address_new_stop_latitude[$key];
                    $stop_long = $request->address_new_stop_longitude[$key];
                    $stop_fc_address = json_decode($request->address_new_stop_component[$key]);
                    $stop_street = '';
                    $stop_building = '';
                    $stop_district = '';
                    $stop_city = '';
                    $stop_state = '';
                    $stop_country = '';
                    $stop_code = '';
                    if($stop_fc_address != 0){
                        for ($i = 0; $i < count($stop_fc_address); $i++) {
                            $data['key'] = $stop_fc_address[$i]->types[0];
                            $data['name'] = $stop_fc_address[$i]->long_name;
                            switch ($data['key']) {
                                case "street_number":
                                    $stop_street = $data['name'];
                                    break;
                                case "subpremise":
                                    $stop_building = $data['name'];
                                    break;
                                case "route":
                                    $stop_district = $data['name'];
                                    break;
                                case "locality":
                                    $stop_city = $data['name'];
                                    break;
                                case "administrative_area_level_1":
                                    $stop_state = $data['name'];
                                    break;
                                case "country":
                                    $stop_country = $data['name'];
                                    break;
                                case "postal_code":
                                    $stop_code = $data['name'];
                                    break;
                            }
                        }
                        $info = [
                            'building' => $stop_building,
                            'street' => $stop_street,
                            'district' => $stop_district,
                            'city' => $stop_city,
                            'state' => $stop_state,
                            'zip' => $stop_code,
                            'country' => $stop_country,
                            'lat' => round($stop_lnt, 8),
                            'lng' => round($stop_long, 8),
                            'price' => 0,
                            'full' => $request->new_stop[$key]
                        ];
                        $location_id = DB::table('locations')->insertGetId(
                            [
                                'building' => $stop_building,
                                'street' => $stop_street,
                                'district' => $stop_district,
                                'city' => $stop_city,
                                'state' => $stop_state,
                                'zip' => $stop_code,
                                'country' => $stop_country,
                                'lat' => round($stop_lnt, 8),
                                'lng' => round($stop_long, 8),
                                'price' => $request->new_stop_price_per_seat[$key],
                                'full' => $request->new_stop[$key]
                            ]
                        );
                        $result_new_stop = Helper::GetDrivingDistance($location->lat,$request->address_new_stop_latitude[$key],$location->lng,$request->address_new_stop_longitude[$key]);
                        if($result_new_stop == "zero_result"){
                            $distance = 0;
                            $time = 0;
                        }
                        else if(count($result_new_stop) > 0){
                            $distance = $result_new_stop['distance'];
                            $time = $result_new_stop['time'];
                            DB::table('listing_stops')->insert(
                                [
                                    'listing_id' => $id,
                                    'location_id' => $location_id,
                                    'starting_hour' => $request->new_stop_starting_time[$key], 
                                    'max_occupants' => $request->new_stop_max_occupants[$key],
                                    'distance' => $distance,
                                    'time' => $time
                                ]
                            );
                        }
                    }
                }
            } 

            if ($request->listing_type == 'passenger') {
                if ($request->car_id != null) {
                    $listing->update([
                        'user_id' => Auth::user()->id,
                        'starting_date' => $starting_date,
                        'max_occupants' => $request->max_occupants,
                        'price_per_seat' => $request->price_per_seat,
                        'distance' => $distance_listing,
                        'time' => $time_listing,
                        'car_id' => $request->car_id,
                        'additional_info' => $request->additional_info
                    ]);
                } else {
                    session()->forget(['edit-stops-passenger']);
                    return back()->withInput()
                        ->withErrors(['unexpected_error' => trans('message.listing.car_not_selected')]);
                }
            } else if ($request->listing_type == 'cargo') {
                if ($request->truck_id != null) {
                    $listing->update(
                        [
                            'user_id' => Auth::user()->id,
                            'starting_date' => $starting_date,
                            'max_occupants' => 0,
                            'price_per_seat' => $request->price_per_seat,
                            'distance' => $distance_listing,
                            'time' => $time_listing,
                            'additional_info' => $request->additional_info,
                            'truck_id' => $request->truck_id,
                            'capacity' => $request->capacity,
                            'place' => $request->place,
                            'max_size' => $request->max_size
                        ]
                    );
                    $cargo_types = explode(",", $request->cargo_type);
                    $listing->cargo_type()->sync(array_filter((array) $cargo_types));

                } else {
                    return back()->withInput()
                        ->withErrors(['unexpected_error' => 'Truck is not selected.']);
                }
            } else {
                return back()->withInput()
                    ->withErrors(['unexpected_error' => trans('message.error_request')]);
            }

            session()->forget(['edit-stops-passenger']);

            $hashids = new Hashids();
            $id = $hashids->encode($listing->id);
            return redirect()->route('trip-detail', [app()->getLocale(), 't_id'=>$id])
                ->with('success_message', trans('message.listing.success_update'));
        } catch (Exception $exception) {
            echo $exception;
            exit;
            session()->forget(['edit-stops-passenger']);
            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }    
    }

    public function edit_map_Deploy_Cargo($locale, $id)
    {
        $listing = Listings::findOrFail($id);
        $lat_from = $listing->location_address->lat;
        $lng_from = $listing->location_address->lng;
        return view('trips.map-deploy-add', compact('lat_from', 'lng_from', 'listing'));
    }

    public function edit_stopsPassenger(Request $request)
    {
        try {
            if($request->drop_off != '' || $request->drop_off != null)
            {
                $data = collect();
                $data->drop_off = $request->drop_off;
                $data->address_component = $request->address_component;
                $data->lat = $request->address_latitude;
                $data->long = $request->address_longitude;
                // session()->push('edit-stops-passenger', $data);
                $new_stops = session()->get('stops-passenger');
                if($new_stops != null){
                    $new_stops[count($new_stops) + 1]  = $data;
                    session()->push('edit-stops-passenger', $data);
                }
                else{
                    session()->push('edit-stops-passenger', $data);
                }
            }
            // dd(session()->get('edit-stops-passenger'));
            $listing = Listings::findOrFail($request->listing_id);
            $hashids = new Hashids();
            return redirect()->route('trip.edit', [app()->getLocale(), 't_id'=>$hashids->encode($listing->id)]);
        } catch (\Throwable $th) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => $th]);
        }
    }

    public function copy($locale, $id)
    {
        
        try {
            $listing = Listings::findOrFail($id);
            $listing = $listing->replicate();
            $listing->save();

            return redirect()->route('trips', [app()->getLocale()]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function return($locale, $id)
    {
        
        try {
            $listing = Listings::findOrFail($id);
            $listing_return = $listing->replicate();
            $listing_return->save();
            $listing_return->update(['destination_id' => $listing->location_id, 'location_id' => $listing->destination_id]);
            return redirect()->route('trips', [app()->getLocale()]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function endTrip($locale, $id)
    {
        
        try {
            $listing = Listings::findOrFail($id);
            $listing->update(['active' => false]);
            return redirect()->route('trips', [app()->getLocale()]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }
}
