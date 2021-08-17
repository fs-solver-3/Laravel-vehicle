<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DemandStatus;
use Illuminate\Http\Request;
use Exception;

class DemandStatusesController extends Controller
{

    /**
     * Display a listing of the demand statuses.
     *
     * @return Illuminate\View\View
     */

    public function index(Request $request)
    {
        $demandStatuses = DemandStatus::paginate(25);
        if ($request->ajax()) {
            $query = DemandStatus::orderBy('id', 'desc');
            if ($request->id != null)
                $query->where('id', '=', $request->id);
            $query->Where('name', 'like', '%' . $request->name . '%')->get();
            $demandStatuses = $query->get();
            $data['template'] = view('admin.demand_statuses.table_template', compact('demandStatuses'))->render();
            $data['template_mobile'] =  view('admin.demand_statuses.table_template_mobile', compact('demandStatuses'))->render();
            return $data;
            // return $data;
        } else {
            return view('admin.demand_statuses.index', compact('demandStatuses'));
        }
    }

    /**
     * Show the form for creating a new demand status.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.demand_statuses.create');
    }

    /**
     * Store a new demand status in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            DemandStatus::create($data);

            return redirect()->route('admin.demand_status.index', app()->getLocale())
                ->with('success_message', trans('message.demand_status.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }
    }

    /**
     * Display the specified demand status.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $demandStatus = DemandStatus::findOrFail($id);

        return view('admin.demand_statuses.show', compact('demandStatus'));
    }

    /**
     * Show the form for editing the specified demand status.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $demandStatus = DemandStatus::findOrFail($id);
        

        return view('admin.demand_statuses.edit', compact('demandStatus'));
    }

    /**
     * Update the specified demand status in the storage.
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
            
            $demandStatus = DemandStatus::findOrFail($id);
            $demandStatus->update($data);

            return redirect()->route('admin.demand_status.index', app()->getLocale())
                ->with('success_message', trans('message.demand_status.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified demand status from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $demandStatus = DemandStatus::findOrFail($id);
            $demandStatus->delete();

            return redirect()->route('admin.demand_status.index', app()->getLocale())
                ->with('success_message', trans('message.demand_status.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = DemandStatus::whereIn('id', $request->input('ids'))->get();

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
