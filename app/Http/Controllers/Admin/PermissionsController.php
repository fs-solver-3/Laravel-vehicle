<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permissions;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Gate;

class PermissionsController extends AdminController
{

    /**
     * Display a listing of the permissions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        // if (!Gate::allows('permission_access')) {
        //     return abort(401);
        // }
        $permissionsObjects = Permissions::all();

        return view('admin.permissions.index', compact('permissionsObjects'));
    }

    /**
     * Show the form for creating a new permissions.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        // if (!Gate::allows('permission_create')) {
        //     return abort(401);
        // }

        return view('admin.permissions.create');
    }

    /**
     * Store a new permissions in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // if (!Gate::allows('permission_create')) {
        //     return abort(401);
        // }
        try {

            $data = $this->getData($request);

            Permissions::create($data);

            return redirect()->route('admin.permissions.index', app()->getLocale())
                ->with('success_message', trans('message.permission.success_add'));
        } catch (Exception $exception) {

            echo $exception;

            // return back()->withInput()
            //     ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified permissions.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {

        // if (!Gate::allows('permission_view')) {
        //     return abort(401);
        // }
        $permissions = Permissions::findOrFail($id);

        return view('admin.permissions.show', compact('permissions'));
    }

    /**
     * Show the form for editing the specified permissions.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        // if (!Gate::allows('permission_edit')) {
        //     return abort(401);
        // }
        $permissions = Permissions::findOrFail($id);


        return view('admin.permissions.edit', compact('permissions'));
    }

    /**
     * Update the specified permissions in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale, $id, Request $request)
    {

        // if (!Gate::allows('permission_edit')) {
        //     return abort(401);
        // }

        try {

            $data = $this->getData($request);

            $permissions = Permissions::findOrFail($id);
            $permissions->update($data);

            return redirect()->route('admin.permissions.index', app()->getLocale())
                ->with('success_message', trans('message.permission.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Remove the specified permissions from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        // if (!Gate::allows('permission_delete')) {
        //     return abort(401);
        // }
        try {
            $permissions = Permissions::findOrFail($id);
            $permissions->delete();

            return redirect()->route('admin.permissions.index')
                ->with('success_message', trans('message.permission.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {
        // if (!Gate::allows('permission_delete')) {
        //     return abort(401);
        // }
        if ($request->input('ids')) {
            $entries = Permissions::whereIn('id', $request->input('ids'))->get();

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
            'des' => 'string|nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }
}