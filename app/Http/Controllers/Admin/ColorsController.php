<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use Illuminate\Http\Request;
use Exception;

class ColorsController extends Controller
{

    /**
     * Display a listing of the colors.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $colors = Colors::paginate(25);

        return view('admin.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new colors.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.colors.create');
    }

    /**
     * Store a new colors in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // try {
            
            $data = $this->getData($request);
            
            Colors::create($data);

            return redirect()->route('admin.colors.index', app()->getLocale())
                ->with('success_message', trans('message.color.success_create'));
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => trans('message.error_request')]);
        // }
    }

    /**
     * Display the specified colors.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $colors = Colors::findOrFail($id);

        return view('admin.colors.show', compact('colors'));
    }

    /**
     * Show the form for editing the specified colors.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $colors = Colors::findOrFail($id);
        

        return view('admin.colors.edit', compact('colors'));
    }

    /**
     * Update the specified colors in the storage.
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
            
            $colors = Colors::findOrFail($id);
            $colors->update($data);

            return redirect()->route('admin.colors.index', app()->getLocale())
                ->with('success_message', trans('message.color.success_update'));
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => trans('message.error_request')]);
        // }        
    }

    /**
     * Remove the specified colors from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $colors = Colors::findOrFail($id);
            $colors->delete();

            return redirect()->route('admin.colors.index', app()->getLocale())
                ->with('success_message', trans('message.color.success_delete'));
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
            $entries = Colors::whereIn('id', $request->input('ids'))->get();

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
                'color' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
