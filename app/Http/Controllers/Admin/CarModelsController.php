<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\CarBrand;
use Illuminate\Http\Request;
use Exception;

class CarModelsController extends Controller
{

    /**
     * Display a listing of the car brands.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $carModels = CarModel::paginate(25);

        return view('admin.car_models.index', compact('carModels'));
    }

    /**
     * Show the form for creating a new car brand.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        $carBrands = CarBrand::get();
        return view('admin.car_models.create', compact('carBrands'));
    }

    /**
     * Store a new car brand in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            CarModel::create($data);

            return redirect()->route('admin.car_model.index', app()->getLocale())
                ->with('success_message', trans('message.car_model.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified car brand.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $carModel = CarModel::findOrFail($id);

        return view('admin.car_models.show', compact('carModel'));
    }

    /**
     * Show the form for editing the specified car brand.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $carModel = CarModel::findOrFail($id);
        $carBrands = CarBrand::get();

        return view('admin.car_models.edit', compact('carModel', 'carBrands'));
    }

    /**
     * Update the specified car brand in the storage.
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
            
            $carModel = CarModel::findOrFail($id);
            $carModel->update($data);

            return redirect()->route('admin.car_model.index', app()->getLocale())
                ->with('success_message', trans('message.car_model.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified car brand from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $carModel = CarModel::findOrFail($id);
            $carModel->delete();

            return redirect()->route('admin.car_model.index', app()->getLocale())
                ->with('success_message', trans('message.car_model.success_delete'));
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
            $entries = CarModel::whereIn('id', $request->input('ids'))->get();

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
                'car_brand_id' => 'string|min:1|max:255|nullable', 
                'template' => 'string|min:1|max:255|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function search(Request $request)
    {
        $carModels = CarModel::where('name', 'ilike', '%' . $request->term . '%')->where('car_brand_id', $request->brand)
            ->get();
        // return 'test';
        $data['template'] = view('profile.car_model_template', compact('carModels'))->render();
        return $data;
        // return ['results' => $carModels];
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {

            $query = $request->get('query');
            if ($request->get('query') == 'all') {
                $models = CarModel::get();
            }
            else{
                $models = CarModel::where('car_brand_id', $query)->get();
            }
            return view('includes.car_models', compact('models'))->render();
        }
    }

    public function fetch2(Request $request)
    {
        if ($request->ajax()) {

            $query = $request->get('query');
            if ($request->get('query') == 'all') {
                $carModels = CarModel::get();
            }
            else{
                $carModels = CarModel::where('car_brand_id', $query)->get();
            }
            return view('profile.car_model_template', compact('carModels'))->render();
        }
    }

}
