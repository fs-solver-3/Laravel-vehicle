<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DemandScore;
use Illuminate\Http\Request;
use Exception;

class DemandScoresController extends Controller
{

    /**
     * Display a listing of the demand scores.
     *
     * @return Illuminate\View\View
     */

    public function index(Request $request)
    {
        $demandScores = DemandScore::paginate(25);
        if ($request->ajax()) {
            $query = DemandScore::orderBy('id', 'desc');
            if ($request->id != null)
                $query->where('id', '=', $request->id);
            $query->Where('name', 'like', '%' . $request->name . '%')->get();
            $demandScores = $query->get();
            $data['template'] = view('admin.demand_scores.table_template', compact('demandScores'))->render();
            $data['template_mobile'] =  view('admin.demand_scores.table_template_mobile', compact('demandScores'))->render();
            return $data;
            // return $data;
        } else {
            return view('admin.demand_scores.index', compact('demandScores'));
        }
    }

    /**
     * Show the form for creating a new demand score.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.demand_scores.create');
    }

    /**
     * Store a new demand score in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            DemandScore::create($data);

            return redirect()->route('admin.demand_score.index', app()->getLocale())
                ->with('success_message', trans('message.demand_score.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }
    }

    /**
     * Display the specified demand score.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $demandScore = DemandScore::findOrFail($id);

        return view('admin.demand_scores.show', compact('demandScore'));
    }

    /**
     * Show the form for editing the specified demand score.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $demandScore = DemandScore::findOrFail($id);
        

        return view('admin.demand_scores.edit', compact('demandScore'));
    }

    /**
     * Update the specified demand score in the storage.
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
            
            $demandScore = DemandScore::findOrFail($id);
            $demandScore->update($data);

            return redirect()->route('admin.demand_score.index', app()->getLocale())
                ->with('success_message', trans('message.demand_score.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified demand score from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $demandScore = DemandScore::findOrFail($id);
            $demandScore->delete();

            return redirect()->route('admin.demand_score.index', app()->getLocale())
                ->with('success_message', trans('message.demand_score.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }
    }

    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = DemandScore::whereIn('id', $request->input('ids'))->get();

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
