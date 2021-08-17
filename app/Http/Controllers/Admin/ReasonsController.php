<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reasons;
use Illuminate\Http\Request;
use Exception;

class ReasonsController extends Controller
{

    /**
     * Display a listing of the reasons.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $reasons = Reasons::paginate(25);

        return view('admin.reasons.index', compact('reasons'));
    }

    /**
     * Show the form for creating a new reason.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.reasons.create');
    }

    /**
     * Store a new reason in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Reasons::create($data);

            return redirect()->route('admin.reason.index', app()->getLocale())
                ->with('success_message', trans('message.reason.success_add'));
        } catch (Exception $exception) {

            echo $exception;
            exit;

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified reason.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $reason = Reasons::findOrFail($id);

        return view('admin.reasons.show', compact('reason'));
    }

    /**
     * Show the form for editing the specified reason.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $reason = Reasons::findOrFail($id);
        

        return view('admin.reasons.edit', compact('reason'));
    }

    /**
     * Update the specified reason in the storage.
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
            
            $reason = Reasons::findOrFail($id);
            $reason->update($data);

            return redirect()->route('admin.reason.index', app()->getLocale())
                ->with('success_message', trans('message.reason.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified reason from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $reason = Reasons::findOrFail($id);
            $reason->delete();

            return redirect()->route('reasons.reason.index', app()->getLocale())
                ->with('success_message', trans('message.reason.success_delete'));
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
            $entries = Reasons::whereIn('id', $request->input('ids'))->get();

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
                'text' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
