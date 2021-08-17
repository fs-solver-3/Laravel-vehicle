<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Permissions;
use Exception;

class RolesController extends AdminController
{

    /**
     * Display a listing of the roles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        // if (!Gate::allows('role_access')) {
        //     return abort(401);
        // }
        $rolesObjects = Roles::paginate(25);
        $permissions = Permissions::all();

        return view('admin.roles.index', compact('rolesObjects', 'permissions'));
    }

    /**
     * Show the form for creating a new roles.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        // if (!Gate::allows('role_create')) {
        //     return abort(401);
        // }
        $permissions = Permissions::get()->pluck('title', 'id');
        $methods = "create";

        return view('admin.roles.create', compact('permissions', 'methods'));
    }

    /**
     * Store a new roles in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // if (!Gate::allows('role_create')) {
        //     return abort(401);
        // }
        try {

            $data = $this->getData($request);

            $role = Roles::create($data);
            $role->permission()->sync(array_filter((array) $request->input('permission')));
            return redirect()->route('admin.roles.index', app()->getLocale())
                ->with('success_message', trans('message.role.success_add'));
        } catch (Exception $exception) {
            echo $exception;
            // return back()->withInput()
            //     ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified roles.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        // if (!Gate::allows('role_view')) {
        //     return abort(401);
        // }

        $roles = Roles::findOrFail($id);

        return view('admin.roles.show', compact('roles'));
    }

    /**
     * Show the form for editing the specified roles.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {


        // if (!Gate::allows('role_edit')) {
        //     return abort(401);
        // }
        $roles = Roles::findOrFail($id);
        $permissions = Permissions::get()->pluck('title', 'id');
        $methods = "edit";
        return view('admin.roles.edit', compact('roles', 'permissions', 'methods'));
    }

    /**
     * Update the specified roles in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale, $id, Request $request)
    {


        // if (!Gate::allows('role_edit')) {
        //     return abort(401);
        // }
        try {

            $data = $this->getData($request);

            $roles = Roles::findOrFail($id);
            $roles->update($data);
            $roles->permission()->sync(array_filter((array) $request->input('permission')));

            return redirect()->route('admin.roles.index', app()->getLocale())
                ->with('success_message', trans('message.role.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Remove the specified roles from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        // if (!Gate::allows('role_delete')) {
        //     return abort(401);
        // }
        try {
            $roles = Roles::findOrFail($id);
            $roles->delete();

            return redirect()->route('admin.roles.index', app()->getLocale())
                ->with('success_message', trans('message.role.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {
        // if (!Gate::allows('role_delete')) {
        //     return abort(401);
        // }
        if ($request->input('ids')) {
            $entries = Roles::whereIn('id', $request->input('ids'))->get();

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
        ];

        $data = $request->validate($rules);


        return $data;
    }

    public function filter(Request $request)
    {
        if($request->permissions != null){
            $categories = explode(" ", $request->permissions);
            $out=array();
            $result=array();
            $rolesObject=array();
            $rolesObjects=array();
            $roles = Roles::get();
            $rolesObject= Roles::select('roles.id','permissions.title')
            ->join('permission_role','roles.id','=','permission_role.roles_id')
            ->join('permissions','permission_role.permissions_id','=','permissions.id')
            ->get();

            foreach($rolesObject as $arr){
                foreach($categories as $key){
                    if($key == $arr->title){
                        array_push($out, $arr->id);
                    }
                }
            }
            $count = array_count_values($out);
            foreach($roles as $ride){
                if(isset($count[$ride->id])){
                    if($count[$ride->id] == count($categories))
                        array_push($result, $ride);
                }
            }
            $rolesObjects = $result;
        }
        else{
            $rolesObjects = Roles::get();
        }
        $data['template'] = view('admin.roles.table_template', compact('rolesObjects'))->render();
        $data['template_mobile'] = view('admin.roles.table_template_mobile', compact('rolesObjects'))->render();
        return $data;
    }
}