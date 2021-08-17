<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Passport;
use App\User;
use Illuminate\Http\Request;
use Exception;

class PassportsController extends Controller
{

    /**
     * Display a listing of the passports.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $passports = Passport::with('user')->paginate(25);
        $users = User::get();

        return view('admin.passports.index', compact('passports','users'));
    }

    /**
     * Show the form for creating a new passport.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
        
        return view('admin.passports.create', compact('users'));
    }

    /**
     * Store a new passport in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Passport::create($data);

            return redirect()->route('admin.passport.index', app()->getLocale())
                ->with('success_message', trans('message.passport.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }
    public function store_passport($locale, Request $request)
    {
        try {
            if($request['passport_verified'] == null) $verified = false;
            else $verified = true;
            if($request['passport_issued_date'] != null){
                $starting_date_timestamp = strtotime($request['passport_issued_date']);
                $date = date('Y-m-d H:i:s', $starting_date_timestamp);
            }
            else{
                $date = null;
            }
            Passport::where('id', $request['passport_id'])->update(array('series' => $request['passport_series'],'room' => $request['passport_room'],'department_code' => $request['passport_department_code'],
            'issued_by' => $request['passport_issued_by'],'place_residence' => $request['passport_place_residence'],'issued_date' => $date,
            'verified' => $verified));
            return redirect()->route('admin.passport.index', app()->getLocale())
                ->with('success_message', trans('message.passport.success_add'));
        } catch (Exception $exception) {
            // echo $exception;
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified passport.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $passport = Passport::with('user')->findOrFail($id);

        return view('admin.passports.show', compact('passport'));
    }

    /**
     * Show the form for editing the specified passport.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $passport = Passport::findOrFail($id);
        $users = User::findOrFail($passport->user_id);

        return view('admin.passports.edit', compact('passport','users'));
    }

    /**
     * Update the specified passport in the storage.
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
            
            $passport = Passport::findOrFail($id);
            $passport->update($data);

            return redirect()->route('admin.passport.index', app()->getLocale())
                ->with('success_message', trans('message.passport.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified passport from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $passport = Passport::findOrFail($id);
            $passport->delete();

            return redirect()->route('admin.passport.index', app()->getLocale())
                ->with('success_message', 'Passport was successfully deleted.');
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
            $entries = Passport::whereIn('id', $request->input('ids'))->get();

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
                'user_id' => 'nullable',
            'series' => 'string|min:1|nullable',
            'room' => 'string|min:1|nullable',
            'department_code' => 'string|min:1|nullable',
            'issued_by' => 'nullable',
            'place_residence' => 'string|min:1|nullable',
            'pdf1' => 'string|min:1|nullable',
            'pdf2' => 'string|min:1|nullable',
            'verified' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function filter(Request $request)
    {
        $query= Passport::select('passport.*')->orderBy('id', 'ASC');
        if($request->passport_id != null)
            $query->where('id','=',$request->passport_id);
        if($request->user_name != null)
            $query->where('user_id','=',$request->user_name);
        if($request->confirmed == '1')
            $query->where('verified','=',true);
        else if($request->confirmed == '0')
            $query->where('verified','=',false);
        $passports = $query->get();

        $data['template'] = view('admin.passports.table_template', compact('passports'))->render();
        $data['template_mobile'] = view('admin.passports.table_template_mobile', compact('passports'))->render();
        return $data;
    }

}
