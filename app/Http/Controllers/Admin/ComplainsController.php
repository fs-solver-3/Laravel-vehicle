<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complains;
use App\Models\ComplainsUsers;
use Illuminate\Http\Request;
use Exception;

class ComplainsController extends Controller
{

    /**
     * Display a listing of the complains.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $complains = Complains::paginate(25);

        return view('admin.complains.index', compact('complains'));
    }

    public function all()
    {
        $complains = ComplainsUsers::get();

        return view('admin.complains.all', compact('complains'));
    }

    /**
     * Show the form for creating a new complains.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.complains.create');
    }

    /**
     * Store a new complains in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Complains::create($data);

            return redirect()->route('admin.complains.index', app()->getLocale())
                ->with('success_message', 'Complains was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified complains.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $complains = Complains::findOrFail($id);

        return view('admin.complains.show', compact('complains'));
    }

    /**
     * Show the form for editing the specified complains.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $complains = Complains::findOrFail($id);
        

        return view('admin.complains.edit', compact('complains'));
    }

    /**
     * Update the specified complains in the storage.
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
            
            $complains = Complains::findOrFail($id);
            $complains->update($data);

            return redirect()->route('admin.complains.index', app()->getLocale())
                ->with('success_message', 'Complains was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified complains from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $complains = Complains::findOrFail($id);
            $complains->delete();

            return redirect()->route('admin.complains.index', app()->getLocale())
                ->with('success_message', 'Complains was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function massDestroy(Request $request)
    {
        // if (!Gate::allows('user_delete')) {
        //     return abort(401);
        // }
        if ($request->input('ids')) {
            $entries = Complains::whereIn('id', $request->input('ids'))->get();

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
            'title' => 'string|min:1|max:255|nullable',
            'des' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
