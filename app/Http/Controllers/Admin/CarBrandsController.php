<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use Illuminate\Http\Request;
use Exception;

class CarBrandsController extends Controller
{

    /**
     * Display a listing of the car brands.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $carBrands = CarBrand::paginate(25);

        return view('admin.car_brands.index', compact('carBrands'));
    }

    /**
     * Show the form for creating a new car brand.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.car_brands.create');
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
            
            CarBrand::create($data);

            return redirect()->route('admin.car_brand.index', app()->getLocale())
                ->with('success_message', trans('message.car_brand.success_add'));
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
        $carBrand = CarBrand::findOrFail($id);

        return view('admin.car_brands.show', compact('carBrand'));
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
        $carBrand = CarBrand::findOrFail($id);
        

        return view('admin.car_brands.edit', compact('carBrand'));
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
            
            $carBrand = CarBrand::findOrFail($id);
            $carBrand->update($data);

            return redirect()->route('admin.car_brand.index', app()->getLocale())
                ->with('success_message', trans('message.car_brand.success_update'));
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
            $carBrand = CarBrand::findOrFail($id);
            $carBrand->delete();

            return redirect()->route('admin.car_brand.index', app()->getLocale())
                ->with('success_message', trans('message.car_brand.success_delete'));
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
            $entries = CarBrand::whereIn('id', $request->input('ids'))->get();

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
                'popular' => 'string|min:1|max:255|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function search(Request $request)
    {
        $carBrands = CarBrand::where('name', 'ilike', '%' . $request->term. '%')
            ->get();
        // return ['results' => $carBrands];
        $data['template'] = view('profile.car_brand_template', compact('carBrands'))->render();
        return $data;
    }

}
