<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BodyTypes;
use App\Models\CargoTypes;
use App\Models\Trucks;
use App\Models\Colors;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\User;
use Illuminate\Http\Request;
use Exception;

class TrucksController extends Controller
{

    /**
     * Display a listing of the admin.trucks.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $trucks = Trucks::with('user','bodytype','cargotype')->get();
        $users = User::get();
        $bodytypes = BodyTypes::get();
        $colors = Colors::get();
        $brands = CarBrand::get();
        $models = CarModel::get();

        return view('admin.trucks.index', compact('trucks','users','bodytypes','brands','models','colors'));
    }

    /**
     * Show the form for creating a new truck.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::get();
        $bodyTypes = BodyTypes::get();
        $cargoTypes = CargoTypes::pluck('id','id')->all();
        $colors = Colors::get();
        $brands = CarBrand::get();
        $models = CarModel::get();
        
        return view('admin.trucks.create', compact('users','bodyTypes','cargoTypes','brands','models','colors'));
    }

    /**
     * Store a new truck in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Trucks::create($data);

            return redirect()->route('admin.truck.index', app()->getLocale())
                ->with('success_message', trans('message.truck.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }
    }

    /**
     * Display the specified truck.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $truck = Trucks::with('user','bodytype','cargotype')->findOrFail($id);

        return view('admin.trucks.show', compact('truck'));
    }

    /**
     * Show the form for editing the specified truck.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $truck = Trucks::findOrFail($id);
        $users = User::get();
        $bodyTypes = BodyTypes::get();
        $cargoTypes = CargoTypes::pluck('id','id')->all();
        $colors = Colors::get();
        $brands = CarBrand::get();
        $models = CarModel::get();

        return view('admin.trucks.edit', compact('truck','users','bodyTypes','cargoTypes','brands','models','colors'));
    }

    /**
     * Update the specified truck in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale, $id, Request $request)
    {
        // try {
            
            $data = $this->getData($request);
            $truck = Trucks::findOrFail($id);
            $truck->update($data);

            return redirect()->route('admin.truck.index', app()->getLocale())
                ->with('success_message', trans('message.truck.success_update'));
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => trans('message.error_request')]);
        // }        
    }

    /**
     * Remove the specified truck from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $truck = Trucks::findOrFail($id);
            $truck->delete();

            return redirect()->route('admin.truck.index', app()->getLocale())
                ->with('success_message', trans('message.truck.success_delete'));
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
            $entries = Trucks::whereIn('id', $request->input('ids'))->get();

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
            'name' => 'string|min:1|max:255|nullable',
            'model' => 'string|min:1|nullable',
            'year' => 'string|min:1|nullable',
            'color' => 'string|min:1|nullable',
            'user_id' => 'nullable',
            'body_type_id' => 'nullable',
            'cargo_type_id' => 'nullable',
            'number' => 'string|min:1|nullable',
            'carcase_type' => 'string|min:1|nullable',
            'capacity' => 'string|min:1|nullable',
            'place' => 'string|min:1|nullable',
            'max_size' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }


    public function filter(Request $request)
    {
        $query= Trucks::orderBy('id', 'ASC');
        if($request->truck_id != null)
            $query->where('id','=',$request->truck_id);
        if($request->user_id != null)
            $query->where('user_id','=',$request->user_id);
        if($request->truck_model!= null)
            $query->where('model','=',$request->truck_model);
        if($request->truck_name!= null)
            $query->where('name','=',$request->truck_name);
        if($request->truck_color!= null)
            $query->where('color','=',$request->truck_color);
        if($request->truck_year!= null)
            $query->where('year','=',$request->truck_year);
        if($request->truck_type!= null)
            $query->where('carcase_type','=',$request->truck_type);
        if($request->truck_number!= null)
            $query->where('number','=',$request->truck_number);
        if($request->truck_place!= null)
            $query->where('place','=',$request->truck_place);
        if($request->truck_max_size!= null)
            $query->where('max_size','=',$request->truck_max_size);
        if($request->truck_capacity!= null)
            $query->where('capacity','=',$request->truck_capacity);
        if($request->truck_bodytype!= null)
            $query->where('body_type_id','=',$request->truck_bodytype);
        $trucks = $query->get();

        $data['template'] = view('admin.trucks.table_template', compact('trucks'))->render();
        $data['template_mobile'] = view('admin.trucks.table_template_mobile', compact('trucks'))->render();
        return $data;
    }

}
