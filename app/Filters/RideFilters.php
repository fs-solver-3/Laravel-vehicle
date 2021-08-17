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

class RideFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['fc', 'dc', 'date', 'count'];
    // protected $filters_cargo = ['fc', 'dc', 'date'];

    /**
     * Filter the query by a given source city.
     *
     * @param $name
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function fc($name)
    {
        $sourceCity = $this->findCity($name);
        dd($sourceCity);
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
    public function dc($name)
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
        $date = Carbon::parse($date);
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
