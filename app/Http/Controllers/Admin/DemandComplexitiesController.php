<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandComplexity;
use Illuminate\Http\Request;
use Exception;

class DemandComplexitiesController extends Controller
{

    /**
     * Display a listing of the demand complexities.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $demandComplexities = DemandComplexity::paginate(25);
        if ($request->ajax()) {
            $query = DemandComplexity::orderBy('id', 'desc');
            if ($request->id != null)
                $query->where('id', '=', $request->id);
            $query->Where('name', 'like', '%' . $request->name . '%')->get();
            $demandComplexities = $query->get();
            $data['template'] = view('admin.demand_complexities.table_template', compact('demandComplexities'))->render();
            $data['template_mobile'] =  view('admin.demand_complexities.table_template_mobile', compact('demandComplexities'))->render();
            return $data;
            // return $data;
        } else {
            return view('admin.demand_complexities.index', compact('demandComplexities'));
        }

    }

    /**
     * Show the form for creating a new demand complexity.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.demand_complexities.create');
    }

    /**
     * Store a new demand complexity in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            DemandComplexity::create($data);

            return redirect()->route('admin.demand_complexity.index', app()->getLocale())
                ->with('success_message', trans('message.demand_complexity.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified demand complexity.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $demandComplexity = DemandComplexity::findOrFail($id);

        return view('admin.demand_complexities.show', compact('demandComplexity'));
    }

    /**
     * Show the form for editing the specified demand complexity.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $demandComplexity = DemandComplexity::findOrFail($id);
        

        return view('admin.demand_complexities.edit', compact('demandComplexity'));
    }

    /**
     * Update the specified demand complexity in the storage.
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
            
            $demandComplexity = DemandComplexity::findOrFail($id);
            $demandComplexity->update($data);

            return redirect()->route('admin.demand_complexity.index', app()->getLocale())
                ->with('success_message', trans('message.demand_complexity.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified demand complexity from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $demandComplexity = DemandComplexity::findOrFail($id);
            $demandComplexity->delete();

            return redirect()->route('admin.demand_complexity.index', app()->getLocale())
                ->with('success_message', trans('message.demand_complexity.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = DemandComplexity::whereIn('id', $request->input('ids'))->get();

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
