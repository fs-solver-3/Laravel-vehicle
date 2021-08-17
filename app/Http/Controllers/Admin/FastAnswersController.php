<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandCategory;
use App\Models\FastAnswer;
use Illuminate\Http\Request;
use Exception;

class FastAnswersController extends Controller
{

    /**
     * Display a listing of the fast answers.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fastAnswers = FastAnswer::with('demandcategory')->paginate(25);
        if ($request->ajax()) {
            $query = FastAnswer::orderBy('id', 'desc');
            if ($request->id != null)
            $query->where('id', '=', $request->id);
            $query->Where('name', 'like', '%' . $request->name . '%')->get();
            $fastAnswers = $query->get();
            $data['template'] = view('admin.fast_answers.table_template', compact('fastAnswers'))->render();
            $data['template_mobile'] =  view('admin.fast_answers.table_template_mobile', compact('fastAnswers'))->render();
            return $data;
        }
        else{
            return view('admin.fast_answers.index', compact('fastAnswers'));
        }
    }

    /**
     * Show the form for creating a new fast answer.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $demandCategories = DemandCategory::pluck('name','id')->all();
        
        return view('admin.fast_answers.create', compact('demandCategories'));
    }

    /**
     * Store a new fast answer in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            FastAnswer::create($data);

            return redirect()->route('admin.fast_answers.index', app()->getLocale())
                ->with('success_message', trans('message.fast_answer.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified fast answer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $fastAnswer = FastAnswer::with('demandcategory')->findOrFail($id);

        return view('admin.fast_answers.show', compact('fastAnswer'));
    }

    /**
     * Show the form for editing the specified fast answer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $fastAnswer = FastAnswer::findOrFail($id);
        $demandCategories = DemandCategory::pluck('name','id')->all();

        return view('admin.fast_answers.edit', compact('fastAnswer','demandCategories'));
    }

    /**
     * Update the specified fast answer in the storage.
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
            
            $fastAnswer = FastAnswer::findOrFail($id);
            $fastAnswer->update($data);

            return redirect()->route('admin.fast_answer.index', app()->getLocale())
                ->with('success_message', trans('message.fast_answer.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified fast answer from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $fastAnswer = FastAnswer::findOrFail($id);
            $fastAnswer->delete();

            return redirect()->route('admin.fast_answer.index', app()->getLocale())
                ->with('success_message', trans('message.fast_answer.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = FastAnswer::whereIn('id', $request->input('ids'))->get();

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
                'demand_category_id' => 'nullable',
                'link' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
