<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Colors;
use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Exception;
use App\User;

class CarsController extends Controller
{

    /**
     * Display a listing of the cars.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $cars = Cars::get();
        $users = User::get();
        $colors = Colors::get();
        $brands = CarBrand::get();
        $models = CarModel::get();

        return view('admin.cars.index', compact('cars','users','colors','brands','models'));
    }

    /**
     * Show the form for creating a new car.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        $users = User::get();
        $colors = Colors::get();
        $brands = CarBrand::get();
        $models = CarModel::get();
        return view('admin.cars.create', compact('users','colors','brands','models'));
    }

    /**
     * Store a new car in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Cars::create($data);

            return redirect()->route('admin.car.index', app()->getLocale())
                ->with('success_message', trans('message.car.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }
    }

    /**
     * Display the specified car.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $car = Cars::findOrFail($id);

        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified car.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $car = Cars::findOrFail($id);
        $colors = Colors::get();
        $users = User::get();
        $brands = CarBrand::get();
        $models = CarModel::get();

        return view('admin.cars.edit', compact('car', 'users', 'colors','brands','models'));
    }

    /**
     * Update the specified car in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale, $id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $car = Cars::findOrFail($id);
            $car->update($data);

            return redirect()->route('admin.car.index', app()->getLocale())
                ->with('success_message', trans('message.car.success_uddate'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified car from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $car = Cars::findOrFail($id);
            $car->delete();

            return redirect()->route('admin.car.index', app()->getLocale())
                ->with('success_message', trans('message.car.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Cars::whereIn('id', $request->input('ids'))->get();

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
            'model' => 'string|min:1|nullable',
            'name' => 'string|min:1|max:255|nullable',
            'color' => 'string|min:1|nullable',
            'year' => 'string|min:1|nullable',
            'type' => 'string|min:1|nullable',
            'number' =>'string|min:1|nullable',
            'body_type' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function filter(Request $request)
    {
        $query= Cars::orderBy('id', 'ASC');
        if($request->car_id != null)
            $query->where('id','=',$request->car_id);
        if($request->user_id != null)
            $query->where('user_id','=',$request->user_id);
        if($request->car_bodytype!= null)
            $query->where('body_type','=',$request->car_bodytype);
        if($request->car_model!= null)
            $query->where('model','=',$request->car_model);
        if($request->car_name!= null)
            $query->where('name','=',$request->car_name);
        if($request->car_color!= null)
            $query->where('color','=',$request->car_color);
        if($request->car_year!= null)
            $query->where('year','=',$request->car_year);
        if($request->car_type!= null)
            $query->where('type','=',$request->car_type);
        if($request->car_number!= null)
            $query->where('number','=',$request->car_number);
        $cars = $query->get();

        $data['template'] = view('admin.cars.table_template', compact('cars'))->render();
        $data['template_mobile'] = view('admin.cars.table_template_mobile', compact('cars'))->render();
        return $data;
    }


}
