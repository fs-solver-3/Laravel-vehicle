<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportLevels;
use Illuminate\Http\Request;
use Exception;
use App\User;

class SupportLevelsController extends Controller
{

    /**
     * Display a listing of the support levels.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $supportLevelsObjects = SupportLevels::paginate(25);

        return view('admin.support_levels.index', compact('supportLevelsObjects'));
    }

    /**
     * Show the form for creating a new support levels.
     *
     * @return Illuminate\View\View
     */
    public function create(Request $request)
    {
        $managers = User::whereHas(
            'role',
            function ($q) {
                $q->where('title', 'Support employee');
            }
        )->pluck('name', 'id')->all();
        
        return view('admin.support_levels.create', compact('managers'));
    }

    /**
     * Store a new support levels in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $support_level = SupportLevels::create($data);
            $support_level->manager()->sync(array_filter((array) $request->input('user_id')));
            return redirect()->route('admin.support_levels.index', app()->getLocale())
                ->with('success_message', trans('message.support_level.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }
    }

    /**
     * Display the specified support levels.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $supportLevels = SupportLevels::findOrFail($id);

        return view('admin.support_levels.show', compact('supportLevels'));
    }

    /**
     * Show the form for editing the specified support levels.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $managers = User::whereHas(
            'role',
            function ($q) {
                $q->where('title', 'Support employee');
            }
        )->pluck('name', 'id')->all();
        $supportLevels = SupportLevels::findOrFail($id);
        

        return view('admin.support_levels.edit', compact('supportLevels', 'managers'));
    }

    /**
     * Update the specified support levels in the storage.
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
            $supportLevel = SupportLevels::findOrFail($id);
            $supportLevel->update($data);
            $supportLevel->manager()->sync(array_filter((array) $request->input('user_id')));
            return redirect()->route('admin.support_levels.index', app()->getLocale())
                ->with('success_message', trans('message.support_level.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }        
    }

    /**
     * Remove the specified support levels from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $supportLevels = SupportLevels::findOrFail($id);
            $supportLevels->delete();

            return redirect()->route('admin.support_levels.index', app()->getLocale())
                ->with('success_message', trans('message.support_level.success_delete'));
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
            $entries = SupportLevels::whereIn('id', $request->input('ids'))->get();

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
                'reaction_time' => 'string|min:1|nullable',
                'default_support_id' => 'integer|nullable',
                'description' => 'string|min:1|max:1000|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
