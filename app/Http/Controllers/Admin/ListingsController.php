<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Cars;
use App\Models\Destinations;
use App\Models\Listings;
use App\Models\Locations;
use App\Models\ListingCargotype;
use App\Models\Trucks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Exception;
use Helper;

class ListingsController extends Controller
{

    /**
     * Display a listing of the listings.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $listings = Listings::whereNull('delete')->with('user')->orderBy('id', 'desc')->get();
        $listings = [];
        $users = User::get();

        return view('admin.listing.index', compact('listings','users'));
    }

    public function filter(Request $request)
    {
        $combined_date_and_time1 = $request->from_date . ' ' . '00:00';
        $starting_date_timestamp1 = strtotime($combined_date_and_time1);
        $combined_date_and_time2 = $request->to_date . ' ' . '24:00';
        $starting_date_timestamp2 = strtotime($combined_date_and_time2);
        $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
        $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);
        switch ($request->type) {
            case 'all':
                $query= Listings::whereNull('listings.delete')->with('user')->orderBy('id', 'desc');
                if($request->from_date != null)
                    $query->where('starting_date','>=',$from_date)
                        ->where('starting_date','<=',$to_date);
                $listings = $query->get();
                break;
            case 'passenger':
                $query = Listings::whereNull('listings.delete')->with('user')->whereNotNull('car_id')->orderBy('id', 'desc');
                if($request->from_date != null)
                    $query->where('starting_date','>=',$from_date)
                        ->where('starting_date','<=',$to_date);
                $listings = $query->get();
                break;
            case 'cargo':
                $query = Listings::whereNull('listings.delete')->with('user')->whereNotNull('truck_id')->orderBy('id', 'desc');
                if($request->from_date != null)
                    $query->where('starting_date','>=',$from_date)
                        ->where('starting_date','<=',$to_date);
                $listings = $query->get();
                break;
            case 'active':
                $query = Listings::whereNull('listings.delete')->with('user')->where('active', '=', true)->orderBy('id', 'desc');
                if($request->from_date != null)
                    $query->where('starting_date','>=',$from_date)
                        ->where('starting_date','<=',$to_date);
                $listings = $query->get();
                break;
            case 'archive':
                $query = Listings::whereNull('listings.delete')->with('user')->where('active', '=', false)->orderBy('id', 'desc');
                if ($request->from_date != null)
                    $query->where('starting_date', '>=', $from_date)
                    ->where('starting_date', '<=', $to_date);
                break;
            case 'new':
                $query = Listings::whereNull('listings.delete')->with('user')->where('active', '=', true)->orderBy('id', 'desc');
                $from_date = Carbon::now();
                $to_date = Carbon::now()->addDays(7);
                $query->where('starting_date', '>=', $from_date)
                    ->where('starting_date', '<=', $to_date);
                break;
            case 'complete':
                $query = Listings::whereNull('listings.delete')->with('user')->where('completed', '=', true)->orderBy('id', 'desc');
                if ($request->from_date != null)
                    $query->where('starting_date', '>=', $from_date)
                        ->where('starting_date', '<=', $to_date);
                break;
            case 'pre':
                $query = Listings::with('user')->where('active', '=', true)->orderBy('id', 'desc');
                $from_date = Carbon::now();
                if ($request->from_date != null)
                    $query->where('starting_date', '>=', $from_date);
                break;
            
            default:
                # code...
                break;
        }
        if ($request->listing_id != null)
            $query->where('id', '=', $request->listing_id);
        if ($request->selected_user != null)
            $query->where('user_id', '=', $request->selected_user);
        $listings = $query->get();

        $data['template'] = view('admin.listing.table_template', compact('listings'))->render();
        $data['template_mobile'] = view('admin.listing.table_template_mobile', compact('listings'))->render();
        return $data;
    }

    /**
     * Show the form for creating a new listing.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::get();
        $locations = Locations::get();
        $destinations = locations::get();
        $cars = Cars::get();
        $trucks = Trucks::get();
        $cargotypes = DB::table('cargo_types')->get();
        
        return view('admin.listing.create', compact('users','locations','destinations','cars','trucks','cargotypes'));
    }

    /**
     * Store a new listing in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            // $data = $this->getData($request);

            $fc_lnt = $request->address1_latitude;
            $fc_long = $request->address1_longitude;
            $fc_address = json_decode($request->address1_component);
            
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

            $fc_id = Locations::create([
                'building' => $building,
                'street' => $street,
                'district' => $district,
                'city' => $city,
                'state' => $state,
                'zip' => $code,
                'country' => $country,
                'lat' => $fc_lnt,
                'lng' => $fc_long
            ]);

            echo $fc_id;

            // Listings::create($data);

            return redirect()->route('listings.listing.index', app()->getLocale())
                ->with('success_message', trans('message.listing.success_add'));
        } catch (Exception $exception) {
            echo $exception;
            exit;
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function store_listing(Request $request)
    {
        try {
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

            $location = Locations::create([
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

            $dc_lnt = $request->address2_latitude;
            $dc_long = $request->address2_longitude;
            $dc_address = json_decode($request->address2_component);

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

            $destination = Locations::create([
                'building' => $building,
                'street' => $street,
                'district' => $district,
                'city' => $city,
                'state' => $state,
                'zip' => $code,
                'country' => $country,
                'lat' => $dc_lnt,
                'lng' => $dc_long,
                'full' => $request->dc
            ]);

            if($location->lat != null || $location->lng != null || $destination->lat != null || $destination->lng != null){
                $result = Helper::GetDrivingDistance($location->lat,$destination->lat,$location->lng,$destination->lng);
                if($result == null){
                    $result['distance'] = 0;
                    $result['time'] = 0;
                }
            }
            else
                $result = 'zero_result';
            $combined_date_and_time = $request->starting_date . ' ' . $request->starting_time;
            $starting_date_timestamp = strtotime($combined_date_and_time);
            $starting_date = date('Y-m-d H:i:s', $starting_date_timestamp);

            if($result == 'zero_result'){
                return back()->withInput()
                ->withErrors(['unexpected_error' => 'Invalid locations.']);
            }
            if($request->user_id != null && $result != 'zero_result'){
                if($request->listing_id == null){
                    if($request->listing_type == 'passenger'){
                        if($request->car_id != null){
                            $listing = Listings::create([
                                'user_id' => $request->user_id,
                                'location_id' => $location->id,
                                'destination_id' => $destination->id,
                                'starting_date' => $starting_date,
                                'max_occupants' => $request->max_occupants,
                                'active' => $request->active,
                                'price_per_seat' => $request->price_per_seat,
                                'distance' => floatval($result['distance']),
                                'time' => floatval($result['time']),
                                'car_id' => $request->car_id
                            ]);
                        }
                        else{
                            return back()->withInput()
                                ->withErrors(['unexpected_error' => trans('message.listing.car_not_selected')]);
                        }
                    }
                    else if($request->listing_type == 'cargo'){
                        if($request->truck_id != null){
                            $listing_id = DB::table('listings')->insertGetId(
                                [
                                    'user_id' => $request->user_id,
                                    'location_id' => $location->id,
                                    'destination_id' => $destination->id,
                                    'starting_date' => $starting_date,
                                    'max_occupants' => 0,
                                    'active' => $request->active,
                                    'price_per_seat' => $request->price_per_seat,
                                    'distance' => $result['distance'],
                                    'time' => $result['time'],
                                    'truck_id' => $request->truck_id
                                ]
                            );
                            $cargotype = explode(" ", $request->cargotype);
                            $cargo_types = DB::table('cargo_types')->get();
                            $out=array();
                            foreach($cargo_types as $arr){
                                foreach($cargotype as $key){
                                    if($key == $arr->type_name){
                                        array_push($out, $arr->id);
                                    }
                                }
                            }
                            foreach($out as $type){
                                DB::table('listing_cargotype')->insert(
                                    [
                                        'listing_id' => $listing_id,
                                        'cargo_type_id' => $type
                                    ]
                                );
                            }
                        }
                        else{
                            return back()->withInput()
                                ->withErrors(['unexpected_error' => 'Truck is not selected.']);
                        }
                    }
                    else{
                        return back()->withInput()
                        ->withErrors(['unexpected_error' => trans('message.error_request')]);
                    }
                    return redirect()->route('admin.listing.index', app()->getLocale())
                    ->with('success_message', 'Listing was successfully added.');
                }
                else{
                    if($request->listing_type == 'passenger'){
                        if($request->car_id != null){
                            DB::table('listings')->where('id', $request->listing_id)->update(array('user_id' => $request->user_id,
                                'location_id' => $location->id,
                                'destination_id' => $destination->id,
                                'starting_date' => $starting_date,
                                'max_occupants' => $request->max_occupants,
                                'active' => $request->active,
                                'price_per_seat' => $request->price_per_seat,
                                'distance' => $result['distance'],
                                'time' => $result['time'],
                                'car_id' => $request->car_id
                            ));
                        }
                        else{
                            return back()->withInput()
                                ->withErrors(['unexpected_error' => trans('message.listing.car_not_selected')]);
                        }
                    }
                    else if($request->listing_type == 'cargo'){
                        if($request->truck_id != null){
                            DB::table('listings')->where('id', $request->listing_id)->update(array('user_id' => $request->user_id,
                                'location_id' => $location->id,
                                'destination_id' => $destination->id,
                                'starting_date' => $starting_date,
                                'max_occupants' => 0,
                                'active' => $request->active,
                                'price_per_seat' => $request->price_per_seat,
                                'distance' => $result['distance'],
                                'time' => $result['time'],
                                'truck_id' => $request->truck_id
                            ));
                            $cargotype = explode(" ", $request->cargotype);
                            $cargo_types = DB::table('cargo_types')->get();
                            $out=array();
                            foreach($cargo_types as $arr){
                                foreach($cargotype as $key){
                                    if($key == $arr->type_name){
                                        array_push($out, $arr->id);
                                    }
                                }
                            }
                            DB::table('listing_cargotype')->where('listing_id', '=', $request->listing_id)->delete();
                            foreach($out as $type){
                                DB::table('listing_cargotype')->insert(
                                    [
                                        'listing_id' => $request->listing_id,
                                        'cargo_type_id' => $type
                                    ]
                                );
                            }
                        }
                    }
                    else{
                        return back()->withInput()
                        ->withErrors(['unexpected_error' => trans('message.error_request')]);
                    }
                    return redirect()->route('admin.listing.index', app()->getLocale())
                    ->with('success_message', trans('message.listing.success_update'));
                }
            }
            else{
                return back()->withInput()
                    ->withErrors(['unexpected_error' => trans('message.error_request')]);
            }

        } catch (Exception $exception) {
            echo $exception;
            exit;

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified listing.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $listing = Listings::with('user','location','destination','car','truck')->findOrFail($id);
        $stops = DB::table('listing_stops')->select('locations.*')
        ->leftjoin('locations','locations.id','=','listing_stops.location_id')
        ->where('listing_id', '=', $id)
        ->get();
        // $listing = Listings::findOrFail($id);

        return view('admin.listing.show', compact('listing','stops'));
    }

    /**
     * Show the form for editing the specified listing.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $listing = Listings::findOrFail($id);
        $users = User::pluck('name','id')->all();
        $locations = Locations::pluck('id','id')->all();
        $destinations = Locations::pluck('id','id')->all();
        $cars = Cars::pluck('id','id')->all();
        $trucks = Trucks::pluck('id','id')->all();
        $cargotypes = DB::table('cargo_types')->get();
        $cargos = Listings::select('listings.id', 'cargo_types.type_name')
        ->join('listing_cargotype','listings.id','=','listing_cargotype.listing_id')
        ->join('cargo_types','listing_cargotype.cargo_type_id','=','cargo_types.id')
        ->where('listings.id','=',$id)
        ->get();

        return view('admin.listing.edit', compact('listing','users','locations','destinations','cars','trucks','cargotypes','cargos'));
    }

    /**
     * Update the specified listing in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale, $id, Request $request)
    {
        try {
            
            // $data = $this->getData($request);
            
            // $listing->update($data);
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

            $location = $listing->location_address;
            $destination = $listing->destination_address;

            if ($location->lat != null || $location->lng != null || $destination->lat != null || $destination->lng != null) {
                $result = Helper::GetDrivingDistance($location->lat, $destination->lat, $location->lng, $destination->lng);
                if ($result == null) {
                    $result['distance'] = 0;
                    $result['time'] = 0;
                }
            } else
            $result = 'zero_result';
            $combined_date_and_time = $request->starting_date . ' ' . $request->starting_time;
            $starting_date_timestamp = strtotime($combined_date_and_time);
            $starting_date = date('Y-m-d H:i:s', $starting_date_timestamp);

            if ($result == 'zero_result') {
                return back()->withInput()
                ->withErrors(['unexpected_error' => 'Invalid locations.']);
            }

            if ($request->listing_type == 'passenger') {
                if ($request->car_id != null) {
                    $listing->update([
                        'user_id' => $request->user_id,
                        'starting_date' => $starting_date,
                        'max_occupants' => $request->max_occupants,
                        'active' => $request->active,
                        'price_per_seat' => $request->price_per_seat,
                        'distance' => floatval($result['distance']),
                        'time' => floatval($result['time']),
                        'car_id' => $request->car_id
                    ]);
                } else {
                    return back()->withInput()
                        ->withErrors(['unexpected_error' => trans('message.listing.car_not_selected')]);
                }
            } else if ($request->listing_type == 'cargo') {
                if ($request->truck_id != null) {
                    $listing->update(
                        [
                            'user_id' => $request->user_id,
                            'starting_date' => $starting_date,
                            'max_occupants' => 0,
                            'active' => $request->active,
                            'price_per_seat' => $request->price_per_seat,
                            'distance' => $result['distance'],
                            'time' => $result['time'],
                            'truck_id' => $request->truck_id
                        ]
                    );
                    $cargotype = explode(" ", $request->cargotype);
                    $cargo_types = DB::table('cargo_types')->get();
                    $out = array();
                    foreach ($cargo_types as $arr) {
                        foreach ($cargotype as $key) {
                            if ($key == $arr->type_name) {
                                array_push($out, $arr->id);
                            }
                        }
                    }

                    // /$entries = ListingCargotype::where('listing_id', $listing->id)->get();
                    DB::table('listing_cargotype')->where('listing_id', '=', $listing->id)->delete();
                    
                    foreach ($out as $type) {
                        DB::table('listing_cargotype')->insert(
                            [
                                'listing_id' => $listing->id,
                                'cargo_type_id' => $type
                            ]
                        );
                    }
                } else {
                    return back()->withInput()
                        ->withErrors(['unexpected_error' => 'Truck is not selected.']);
                }
            } else {
                return back()->withInput()
                    ->withErrors(['unexpected_error' => trans('message.error_request')]);
            }


            return redirect()->route('admin.listing.index', app()->getLocale())
                ->with('success_message', 'Listing was successfully updated.');
        } catch (Exception $exception) {
            echo $exception;
            exit;
            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }        
    }

    /**
     * Remove the specified listing from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $listing = Listings::findOrFail($id);
            // $listing->delete();
            $listing->update(['delete' => true]);
            return redirect()->route('admin.listing.index', app()->getLocale())
                ->with('success_message', 'Listing was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {
        // if (!Gate::allows('user_delete')) {
        //     return abort(401);
        // }
        if ($request->input('ids')) {
            $entries = Listings::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'user_id' => 'nullable',
            'location_id' => 'nullable',
            'destination_id' => 'nullable',
            'starting_date' => 'nullable',
            'max_occupants' => 'string|min:1|nullable',
            'additional_info' => 'string|min:1|nullable',
            'active' => 'string|min:1|nullable',
            'price_per_seat' => 'string|min:1|nullable',
            'car_id' => 'nullable',
            'truck_id' => 'nullable',
            'covid19_title' => 'string|min:1|nullable',
            'covid19_desc' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function fetchCar(Request $request)
    {
        if ($request->ajax()) {

            $query = $request->get('query');
            $cars = Cars::where('user_id', $query)->get();
            $trucks = Trucks::where('user_id', $query)->get();
            // return view('admin.listing.cars', compact('cars'))->render();
            $data['cars'] = view('admin.listing.cars', compact('cars'))->render();
            $data['trucks'] = view('admin.listing.trucks', compact('trucks'))->render();
            return $data;
        }
    }

}
