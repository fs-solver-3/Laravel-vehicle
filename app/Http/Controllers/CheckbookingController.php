<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listings;
use App\Models\Transactions;
use App\Models\Bookings;
use App\Models\BookingSeat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class CheckbookingController extends Controller
{
    public function car_place(Request $request)
    {
        $trip_id = $request->trip_id;
        $trip = Listings::findOrfail($trip_id);
        $bookings = Bookings::where('listing_id', $trip_id)->get();
        $booking_seats = [];
        if($bookings->count() >0){
            foreach ($bookings as $item) {
                $seats = BookingSeat::where('booking_id', $item->id)->get();
                foreach ($seats as $seat) {
                    $booking_seats[] = $seat->seat_number;

                }
            }
        }
        $trips = [];
        $listing = Listings::findOrfail($trip_id);
        $starting_date = $listing->starting_date;
        $end_date = $listing->end_date;
        $published_trips = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $starting_date)->where('end_date', '>=', $starting_date )->get();
        $published_trips_end = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $end_date)->where('end_date', '>=', $end_date )->get();
        $trips = $published_trips->merge($published_trips_end);
        return view('checkbooking.car-place', compact('trip_id', 'booking_seats', 'trips', 'trip'));
    }

    public function truck_place(Request $request)
    {
        $trip_id = $request->trip_id;
        return view('checkbooking.truck-place', compact('trip_id'));
    }

    public function checkbooking(Request $request)
    {
        $trip = Listings::where('id', '=', $request->trip_id)->first();
        $place = $request->place;
        $last_transaction = DB::table('transactions')->latest('created_at')->first();
        if($last_transaction == null){
            $order_number = 1;
        }else{
            $order_number = $last_transaction->id + 1;
        }
        if(Bookings::where('user_id', Auth::user()->id)->where('listing_id', $trip->id)->count() > 0){
            return redirect()->route('bookings', app()->getLocale());
        }
        $trips = [];
        $starting_date = $trip->starting_date;
        $end_date = $trip->end_date;
        $published_trips = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $starting_date)->where('end_date', '>=', $starting_date )->get();
        $published_trips_end = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $end_date)->where('end_date', '>=', $end_date )->get();
        $trips = $published_trips->merge($published_trips_end);

        return view('checkbooking.carbook', compact('trip', 'place', 'order_number', 'trips'));
    }
    public function checkbookingcargo(Request $request)
    {
        $trip = Listings::where('id', '=', $request->trip_id)->first();
        $last_transaction = DB::table('transactions')->latest('created_at')->first();
        $place = null;
        if($last_transaction == null){
            $order_number = 1;
        }else{
            $order_number = $last_transaction->id + 1;
        }
        if(Bookings::where('user_id', Auth::user()->id)->where('listing_id', $trip->id)->count() > 0){
            return redirect()->route('bookings', app()->getLocale());
        }

        $trips = [];
        $starting_date = $trip->starting_date;
        $end_date = $trip->end_date;
        $published_trips = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $starting_date)->where('end_date', '>=', $starting_date )->get();
        $published_trips_end = Listings::where('user_id', Auth::user()->id)->where('active', true)->where('starting_date', '<=', $end_date)->where('end_date', '>=', $end_date )->get();
        $trips = $published_trips->merge($published_trips_end);
        return view('checkbooking.carbook', compact('trip', 'place', 'order_number', 'trips'));
    }

    public function cancelBook($locale, $id){
        $booking = Bookings::findOrfail($id);
        $booking->update(['canceled' => true]);
        if(BookingSeat::where('booking_id', $booking->id)->count() > 0){
            $seats = BookingSeat::where('booking_id', $booking->id)->get();
            foreach ($seats  as $item) {
               $item->delete();
            }
        }
        return  redirect()->route('bookings', app()->getLocale())->with('success_message', 'Бронирование было отменено');
    }
}
