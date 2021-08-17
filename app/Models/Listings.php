<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Filters\RideFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use App\User;
use App\Models\Locations;
use App\Models\Cars;
use App\Models\Preferences;

class Listings extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'max_occupants' => 'integer'
    ];

    protected $fillable = [
        'user_id',
        'location_id',
        'destination_id',
        'starting_date',
        'max_occupants',
        'additional_info',
        'active',
        'price_per_seat',
        'car_id',
        'truck_id',
        'covid19_title',
        'covid19_desc',
        'completed',
        'time',
        'distance',
        'slug',
        'delete',
        'currency',
        'end_date'
    ];


    /**
     * @var array
     */
    protected $with = ['sourceCity', 'destinationCity', 'carowner','user_preferences'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    // protected $dates = ['starting_date','ending_date'];

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('starting_date', '>=', now());
    }

    /**
     * Apply all relevant thread filters.
     *
     * @param  Builder     $query
     * @param  RideFilters $filters
     *
     * @return Builder
     */
    public function scopeFilter(Builder $query, RideFilters $filters)
    {
        return $filters->apply($query);
    }

    /**
     * @param bool $withTime
     *
     * @return string
     */
    public function getHumanReadableTime($withTime = true)
    {
        $day = $this->time->format('D');

        if ($this->time->isToday()) {
            $day = 'Today';
        }

        if ($this->time->isTomorrow()) {
            $day = 'Tomorrow';
        }

        if ($this->time->isYesterday()) {
            $day = 'Yesterday';
        }

        if ($withTime) {
            return "{$day} {$this->time->format('d M')} - {$this->time->format('H:i')}";
        }

        return "{$day} {$this->time->format('d M')}";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carUser()
    {
        return $this->belongsTo(CarUser::class);
    }

    /**
     * Get driver for this drive.
     *
     * @return mixed
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'avatar', 'rating']);
    }

    /**
     * Get car for this ride.
     *
     * @return mixed
     */
    public function car()
    {
        // return $this->carUser->car()->first();
        return $this->belongsTo(Cars::class, 'car_id')->select(['*']);
        // return $this->belongsTo(Cars::class);
    }

    public function truck()
    {
        // return $this->carUser->car()->first();
        return $this->belongsTo(Trucks::class, 'truck_id')->select(['*']);
        // return $this->belongsTo(Cars::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sourceCity()
    {
        return $this->belongsTo(Locations::class, 'location_id')->select(['id', 'city', 'lat', 'lng', 'state', 'district', 'street', 'building']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destinationCity()
    {
        return $this->belongsTo(Locations::class, 'destination_id')->select(['id', 'city', 'lat', 'lng', 'state', 'district', 'street', 'building']);
    }
    public function carowner()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'avatar', 'rating']);
    }
    public function user_preferences()
    {
        return $this->hasOne('App\Models\Preferences', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rideRequests()
    {
        return $this->hasMany(RideRequest::class, 'ride_id');
    }

    /**
     * @return bool
     */
    public function hasAvailableSeats()
    {
        return $this->seats_offered !== 0;
    }

    /**
     * @return mixed
     */
    public function passengers()
    {
        return $this->rideRequests()
                    ->approved()
                    ->with([
                        'requester' => function ($query) {
                            $query->select('id', 'name');
                        }
                    ])
                    ->select('id', 'requester_id')
                    ->get()
                    ->map(function ($item, $key) {
                        return $item->requester;
                    });
    }
    public function location()
    {
        // return Locations::where('id', $this->location_id)->first()->city;
        return $this->belongsTo(Locations::class, 'location_id')->select(['id', 'city', 'lat', 'lng', 'full']);
    }
    public function destination()
    {
        // return Locations::where('id', $this->destination_id)->first()->city;
        return $this->belongsTo(Locations::class, 'destination_id')->select(['id', 'city', 'lat', 'lng', 'full']);
    }

    public function location_address()
    {
        return $this->belongsTo(Locations::class, 'location_id');
    }

    public function destination_address()
    {
        return $this->belongsTo(Locations::class, 'destination_id');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Bookings', 'listing_id');
    }

    public function stop()
    {
        return $this->hasMany('App\Models\Stops', 'listing_id');
    }

    public function cargo_type()
    {
        return $this->belongsToMany('App\Models\CargoTypes', 'listing_cargotype', 'listing_id', 'cargo_type_id');
    }

    public function seats(){
        $bookings = Bookings::where('listing_id', $this->id)->get();
        $booking_seats = [];
        if($bookings->count() >0){
            foreach ($bookings as $item) {
                # code...
                $seats = BookingSeat::where('booking_id', $item->id)->get();
                if($seats->count() >0){
                    foreach ($seats as $seat) {
                        $booking_seats[] = $seat->seat_number;
                    }
                }
            }
        }
        $possible_seats = intval($this->max_occupants) - count($booking_seats);
        $possible_seats = $possible_seats < 0 ? 0 : $possible_seats;
        return $possible_seats;
    }

    public function commission(){
        $bookings = Bookings::where('listing_id', $this->id)->where('completed', true)->get();
        $commission = 0;
        $booking_seats = [];
        if($bookings->count() >0){
            foreach ($bookings as $item) {
                # code...
                $commission += intval($item->amount);
            }
        }
        $commission = $commission * 0.1;
        return $commission;
    }
}
