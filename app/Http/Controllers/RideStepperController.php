<?php

namespace App\Http\Controllers;

use App\City;
use App\EnrouteCity;
use App\Exceptions\CarMissingException;
use App\Http\Requests\StepTwoRequest;
use App\Ride;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RideStepperController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStepOne()
    {
        return view('rides.create.steps.one');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postStepOne(Request $request)
    {
        $request->validate([
            'time' => 'required|after:now',
            'source_city_id' => 'required|exists:cities,id',
            'destination_city_id' => 'required|exists:cities,id',
        ]);

        $request->session()->forget('enrouteCities');

        $ride = Ride::make([
            'time' => Carbon::parse($request->time),
            'source_city_id' => $request->source_city_id,
            'destination_city_id' => $request->destination_city_id,
        ]);

        $request->session()->put('ride', $ride);

        if ($request->enroute_city_id) {

            $enrouteCities = collect();

            foreach ($request->enroute_city_id as $key => $id) {

                if (City::find($id)) {

                    $enrouteCities->push(EnrouteCity::make([
                        'city_id' => $id,
                        'order_from_source' => $key + 1,
                    ]));
                }
            }

            $request->session()->put('enrouteCities', $enrouteCities);
        }

        return redirect()->route('offer.step.two');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStepTwo()
    {
        $ride = session()->get('ride');

        $enrouteCities = session()->get('enrouteCities');

        return view('rides.create.steps.two', compact('ride', 'enrouteCities'));
    }

    /**
     * @param \App\Http\Requests\StepTwoRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function postStepTwo(StepTwoRequest $request)
    {
        $ride = session()->get('ride');

        $ride->fill($request->only(['seats_offered', 'price_per_seat']));

        $request->session()->put('ride', $ride);

        $enrouteCities = session()->get('enrouteCities');

        if ($enrouteCities) {

            $enroutePricePerSeat = $request->enroute_price_per_seat;

            $enrouteCities->map(function ($item, $key) use ($enroutePricePerSeat) {
                $item->prorated_price = $enroutePricePerSeat[$item->city->name];
            });

            $request->session()->put('enrouteCities', $enrouteCities);
        }

        //        throw_if(auth()->user()->cars->isEmpty(), new CarMissingException);

        return redirect()->route('offer.step.three');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStepThree()
    {
        $ride = session()->get('ride');
        $enrouteCities = session()->get('enrouteCities');

        return view('rides.create.steps.three', compact('ride', 'enrouteCities'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function postStepThree(Request $request)
    {
        $request->validate([
            'car_user_id' => 'required|exists:car_user,id'
        ]);

        $ride = session()->get('ride');

        $ride->car_user_id = $request->car_user_id;
        $ride->save();

        if (session()->get('enrouteCities')) {
            $ride->enrouteCities()->saveMany(session()->get('enrouteCities'));
        }

        $request->session()->forget(['ride', 'enrouteCities']);

        flash()->success('Ride successfully posted.');

        return redirect('/');
    }
}
