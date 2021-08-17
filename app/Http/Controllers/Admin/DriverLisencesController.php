<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DriverLisence;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

class DriverLisencesController extends Controller
{

    /**
     * Display a listing of the driver  lisences.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $driverLisences = DriverLisence::with('user')->paginate(25);
        $users = User::get();
        // $lisence_categories = DB::table('driverlisence')->select('lisence_categories.*')
        // ->join('driverlisence_categories','driverlisence_categories.driverlisence_id','=','driverlisence.id')
        // ->join('lisence_categories','lisence_categories.id','=','driverlisence_categories.lisence_category_id')
        // ->where('driverlisence.user_id', '=', $id)->get();
        // dd($driverLisences);

        return view('admin.driver__lisences.index', compact('driverLisences','users'));
    }

    /**
     * Show the form for creating a new driver  lisence.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
        
        return view('driver__lisences.create', compact('users'));
    }

    /**
     * Store a new driver  lisence in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            DriverLisence::create($data);

            return redirect()->route('driver__lisences.driver__lisence.index')
                ->with('success_message', trans('message.driver_license.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function store_lisence($locale, Request $request)
    {
        try {
            if($request['lisence_verified'] == null) $verified = false;
            else $verified = true;
            DriverLisence::where('id', $request['lisence_id'])->update(array('document_no' => $request['document_no'],'verified' => $verified));
            $categories = explode(" ", $request->categories);
            $categoty = DB::table('lisence_categories')->get();
            $out=array();
            foreach($categoty as $arr){
                foreach($categories as $key){
                    if($key == $arr->title){
                        array_push($out, $arr->id);
                    }
                }
            }
            DB::table('driver_lisence_categories')->where('driver_lisence_id', '=', $request['lisence_id'])->delete();
            foreach($out as $type){
                DB::table('driver_lisence_categories')->insert(
                    [
                        'driver_lisence_id' => $request['lisence_id'],
                        'lisence_category_id' => $type
                    ]
                );
            }
            return redirect()->route('admin.driver__lisence.index', app()->getLocale())
                ->with('success_message', trans('message.driver_license.success_create'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified driver  lisence.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $driverLisence = DriverLisence::with('user')->findOrFail($id);

        return view('admin.driver__lisences.show', compact('driverLisence'));
    }

    /**
     * Show the form for editing the specified driver  lisence.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $driverLisence = DriverLisence::findOrFail($id);
        $categories = DB::table('lisence_categories')->get();

        return view('admin.driver__lisences.edit', compact('driverLisence','categories'));
    }

    /**
     * Update the specified driver  lisence in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $driverLisence = DriverLisence::findOrFail($id);
            $driverLisence->update($data);

            return redirect()->route('driver__lisences.driver__lisence.index')
                ->with('success_message', trans('message.driver_license.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified driver  lisence from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $driverLisence = DriverLisence::findOrFail($id);
            $driverLisence->delete();

            return redirect()->route('admin.driver__lisence.index', app()->getLocale())
                ->with('success_message', trans('message.driver_license.success_delete'));
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
            $entries = DriverLisence::whereIn('id', $request->input('ids'))->get();

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
            'document_no' => 'string|min:1|nullable',
            'pdf' => 'string|min:1|nullable',
            'verified' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function filter(Request $request)
    {
        $query= DriverLisence::select('driver_lisence.*')->orderBy('id', 'ASC');
        if($request->license_id != null)
            $query->where('id','=',$request->license_id);
        if($request->user_name != null)
            $query->where('user_id','=',$request->user_name);
        $driverLisences = $query->get();

        $data['template'] = view('admin.driver__lisences.table_template', compact('driverLisences'))->render();
        $data['template_mobile'] = view('admin.driver__lisences.table_template_mobile', compact('driverLisences'))->render();
        return $data;
    }


}
