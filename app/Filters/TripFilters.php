<?php
/**
 * Created by PhpStorm.
 * User: djaca
 * Date: 21.9.18.
 * Time: 20.23
 */

namespace App\Filters;


use App\Models\Locations;
use Illuminate\Support\Carbon;

class TripFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['before_time', 'after_time', 'selected_date', 'all_trip_checkbox', 'distance_from_you', 'from_position', 'to_position', 'from_price', 'to_price', 'allow_counts', 'driver_rating'];
    // protected $filters_cargo = ['fc', 'dc', 'date'];

    /**
     * Filter the query by a given source city.
     *
     * @param $name
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function from_position($name)
    {
        $sourceCity = $this->findCity($name);
        if ($sourceCity) {
            return $this->builder->where('location_id', $sourceCity->id);
        }
        else{
            return $this->builder->where('location_id', 0);
        }
    }

    /**
     * Filter the query by a given destination city.
     *
     * @param $name
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function to_position($name)
    { 
        $destinationCity = $this->findCity($name);

        if ($destinationCity) {
            return $this->builder->where('destination_id', $destinationCity->id);
        }
        else{
            return $this->builder->where('destination_id', 0);
        }
    }

    /**
     * Filter the query by a given date.
     *
     * @param $date
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function date($date)
    {
        $date = Carbon::parse($date);dd($date);
        $builder = $this->builder->where('starting_date', '>=', $date->toDateString());
        // if ($date->isToday()) {
        //     $builder = $builder->whereTime('starting_date', '>=', now()->toTimeString());
        // }
        return $builder;
    }


    public function count($count)
    {       
        if ($count) {
            $num = explode(" ", $count);
            $builder = $this->builder->where('max_occupants', '>=', (int)$num[0]);
        }
        else{
            $builder = $this->builder->where('max_occupants', '>=', 0);
        }
        return $builder;
    }
    /**
     * Find city by name.
     *
     * @param $name
     *
     * @return mixed
     */
    private function findCity($city)
    {
        return Locations::where(compact('city'))->first();
    }
}
