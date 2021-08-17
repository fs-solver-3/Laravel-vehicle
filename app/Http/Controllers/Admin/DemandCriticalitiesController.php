<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DemandCriticality;
use Illuminate\Http\Request;
use Exception;

class DemandCriticalitiesController extends Controller
{

    /**
     * Display a listing of the demand criticalities.
     *
     * @return Illuminate\View\View
     */

    public function index(Request $request)
    {
        $demandCriticalities = DemandCriticality::paginate(25);
        if ($request->ajax()) {
            $query = DemandCriticality::orderBy('id', 'desc');
            if ($request->id != null)
                $query->where('id', '=', $request->id);
            $query->Where('name', 'like', '%' . $request->name . '%')->get();
            $demandCriticalities = $query->get();
            $data['template'] = view('admin.demand_criticalities.table_template', compact('demandCriticalities'))->render();
            $data['template_mobile'] =  view('admin.demand_criticalities.table_template_mobile', compact('demandCriticalities'))->render();
            return $data;
            // return $data;
        } else {
            return view('admin.demand_criticalities.index', compact('demandCriticalities'));
        }
    }


    /**
     * Show the form for creating a new demand criticality.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.demand_criticalities.create');
    }

    /**
     * Store a new demand criticality in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            DemandCriticality::create($data);

            return redirect()->route('admin.demand_criticality.index', app()->getLocale())
                ->with('success_message', trans('message.demand_criticality.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified demand criticality.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $demandCriticality = DemandCriticality::findOrFail($id);

        return view('admin.demand_criticalities.show', compact('demandCriticality'));
    }

    /**
     * Show the form for editing the specified demand criticality.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $demandCriticality = DemandCriticality::findOrFail($id);
        

        return view('admin.demand_criticalities.edit', compact('demandCriticality'));
    }

    /**
     * Update the specified demand criticality in the storage.
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
            
            $demandCriticality = DemandCriticality::findOrFail($id);
            $demandCriticality->update($data);

            return redirect()->route('admin.demand_criticality.index', app()->getLocale())
                ->with('success_message', trans('message.demand_criticality.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified demand criticality from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $demandCriticality = DemandCriticality::findOrFail($id);
            $demandCriticality->delete();

            return redirect()->route('admin.demand_criticality.index', app()->getLocale())
                ->with('success_message', trans('message.demand_criticality.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = DemandCriticality::whereIn('id', $request->input('ids'))->get();

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
            'description' => 'string|min:1|max:1000|nullable',
            'grade' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
