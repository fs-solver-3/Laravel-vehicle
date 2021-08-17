<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use App\User;
use Exception;

class InfoController extends Controller
{

    /**
     * Display a listing of the reviews.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $infoObjects = Info::get();
        $users = User::get();

        return view('admin.info.index', compact('infoObjects','users'));
    }

    /**
     * Show the form for creating a new reviews.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $writers = User::pluck('name','id')->all();
        $receivers = User::pluck('name','id')->all();
        
        return view('admin.reviews.create', compact('writers','receivers','bookings'));
    }

    /**
     * Store a new reviews in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Reviews::create($data);

            return redirect()->route('admin.reviews.index', app()->getLocale())
                ->with('success_message', trans('message.review.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }
    }

    /**
     * Display the specified reviews.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $reviews = Reviews::with('writer','receiver','booking')->findOrFail($id);

        return view('admin.reviews.show', compact('reviews'));
    }

    /**
     * Show the form for editing the specified reviews.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $reviews = Reviews::findOrFail($id);
        $writers = User::pluck('name','id')->all();
        $receivers = User::pluck('name','id')->all();
        $bookings = Bookings::pluck('id','id')->all();

        return view('admin.reviews.edit', compact('reviews','writers','receivers','bookings'));
    }

    /**
     * Update the specified reviews in the storage.
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
            
            $reviews = Reviews::findOrFail($id);
            $reviews->update($data);

            return redirect()->route('admin.reviews.index', app()->getLocale())
                ->with('success_message', trans('message.review.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified reviews from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $reviews = Reviews::findOrFail($id);
            $reviews->delete();

            return redirect()->route('admin.reviews.index', app()->getLocale())
                ->with('success_message', trans('message.review.success_delete'));
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
            $entries = Reviews::whereIn('id', $request->input('ids'))->get();

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
            'writer_id' => 'nullable',
            'title' => 'string|min:1|max:255|nullable',
            'type' => 'string|min:1|nullable',
            'comment' => 'string|min:1|nullable',
            'score' => 'string|min:1|nullable',
            'receiver_id' => 'nullable',
            'booking_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function filter(Request $request)
    {
        $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
        $starting_date_timestamp1 = strtotime($combined_date_and_time1);
        $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
        $starting_date_timestamp2 = strtotime($combined_date_and_time2);
        $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
        $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);

        $query= Reviews::orderBy('id', 'desc');
        if($request->selected_user != null){
            // $query->where('receiver_id','=',$request->selected_user);
            $query->where(function ($query) use ($request) {
                $query->where('receiver_id', $request->selected_user)
                    ->orWhere('writer_id', $request->selected_user);
            });
                // ->orwhere('writer_id','=',$request->selected_user);
        }
        if($request->selected_rating != null){
            switch ($request->selected_rating) {
                case '0':
                    $query->where('score','>=',0)->where('score','<',1.5);
                    break;
                case '1':
                    $query->where('score','>=',0)->where('score','<',1.5);
                    break;
                case '2':
                    $query->where('score','>=',1.5)->where('score','<',2.5);
                    break;
                case '3':
                    $query->where('score','>=',2.5)->where('score','<',3.5);
                    break;
                case '4':
                    $query->where('score','>=',3.5)->where('score','<',4.5);
                    break;
                case '5':
                    $query->where('score','>=',4.5)->where('score','<=',5);
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        if($request->from_date != null){
            $query->whereBetween('created_at',[$to_date, $from_date]);
        }
        $reviewsObjects = $query->get();

        $data['template'] = view('admin.reviews.table_template', compact('reviewsObjects'))->render();
        $data['template_mobile'] = view('admin.reviews.table_template_mobile', compact('reviewsObjects'))->render();
        return $data;
    }

}
