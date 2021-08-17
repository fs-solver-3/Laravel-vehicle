<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Listings;
use App\Models\Locations;
use App\Models\Stops;
use App\Models\Reviews;
use Helper;
use Hashids\Hashids;


class TripController extends Controller
{
    
    public function tripplan(Request $request)
    {
        $hashids = new Hashids();
        $id = $hashids->decode($request->t_id)[0];
        
        if($request->type == 'passenger'){
            $detail = Listings::findOrFail($id);
            if(!is_null($detail)){
                $stops = Stops::where('listing_id', '=', $id)->get();
                $position = Locations::where('locations.id', '=', $detail->location_id)->first();
                $total_score = 0;
                $average_score = 0;
                $reviews = Reviews::where('receiver_id', $detail->user_id)->get();
                if($reviews->count() > 0){
                    $total_score = Reviews::where('receiver_id', $detail->user_id)->sum('score');
                    $average_score = $total_score / $reviews->count();
                }
                $cargotypes = DB::table('cargo_types')->get();
                $complains = DB::table('complains')->get();
                return view('plan.plan-trip', compact(
                    'detail', 
                    'stops', 
                    'reviews', 
                    'total_score',
                    'average_score',
                    'cargotypes',
                    'complains'
                ));
            }
            else{
                return redirect()->route('/', app()->getLocale())
                ->with('success_message', 'This listing is not available');
            }

        }
        elseif($request->type == 'cargo'){
            $detail = Listings::select('listings.*', 'users.name AS User_name','trucks.model')
            ->join('users', 'users.id','=', 'listings.user_id')
            ->join('trucks', 'trucks.id','=', 'listings.truck_id')
            ->where('listings.id', '=', $id)
            ->first();
            if(!is_null($detail)){
                $stops = Stops::where('listing_id', '=', $id)->get();
                $total_score = 0;
                $average_score = 0;
                $reviews = Reviews::where('receiver_id', $detail->user_id)->get();
                if($reviews->count() > 0){
                    $total_score = Reviews::where('receiver_id', $detail->user_id)->sum('score');
                    $average_score = $total_score / $reviews->count();
                }
                $cargotypes = DB::table('cargo_types')->get();
                $complains = DB::table('complains')->get();
                return view('plan.plan-trip-cargo', compact(
                    'detail', 
                    'stops',
                    'reviews', 
                    'total_score', 
                    'average_score', 
                    'cargotypes',
                    'complains'
                ));
            }
            else{
                return redirect()->route('/', app()->getLocale())
                ->with('success_message', 'This listing is not available');
            }
        }
    }

    public function tripDetail(Request $request){
        $hashids = new Hashids();
        $id = $hashids->decode($request->t_id)[0];
        $detail = Listings::findOrFail($id);
        if(!is_null($detail)){
            $stops = Stops::where('listing_id', '=', $id)->get();
            $position = Locations::where('locations.id', '=', $detail->location_id)->first();
            $total_score = 0;
            $average_score = 0;
            $reviews = Reviews::where('receiver_id', $detail->user_id)->get();
            if($reviews->count() > 0){
                $total_score = Reviews::where('receiver_id', $detail->user_id)->sum('score');
                $average_score = $total_score / $reviews->count();
            }
            $cargotypes = DB::table('cargo_types')->get();
            $complains = DB::table('complains')->get();
            return view('trips.trip-detail', compact(
                'detail', 
                'stops', 
                'reviews', 
                'total_score',
                'average_score',
                'cargotypes',
                'complains'
            ));
        }
        else{
            return redirect()->route('/', app()->getLocale())
            ->with('success_message', 'This listing is not available');
        }
    }
}
