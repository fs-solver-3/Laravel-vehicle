<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Directions;
use App\Models\Posts;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class PostsController extends AdminController
{

    /**
     * Display a listing of the posts.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Posts::orderBy('id', 'desc');
            $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);

            if ($request->name != null)
                $query->where('name', '=', $request->name);
            if ($request->from_date != null)
                $query->where('created_at', '<=', $from_date)
                    ->where('created_at', '>=', $to_date);
            $postsObjects = $query->get();
            $data['template'] = view('admin.posts.table_template', compact('postsObjects'))->render();
            $data['template_mobile'] = view('admin.posts.table_template_mobile', compact('postsObjects'))->render();
            return $data;
        } else {
            $postsObjects = Posts::get();
            return view('admin.posts.index', compact('postsObjects'));
        }
    }

    /**
     * Show the form for creating a new posts.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        return view('admin.posts.create');
    }

    /**
     * Store a new posts in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {        
        try {
            $data = $this->getData($request);
            if (!empty($request['image'])) {
                $file = $request->file('image');
                $destinationPath = 'uploads';
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                // echo $name;
                $file->move($destinationPath, $name);
                $data['image'] = 'uploads/' . $name;
            }
            if($request->publish == null) $data['publish'] = false;
            else $data['publish'] = true;
            Posts::create($data);
            return redirect()->route('admin.posts.index', app()->getLocale())
                ->with('success_message', trans('message.post.success_add'));
         } catch (Exception $exception) {

           return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified posts.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $posts = Posts::findOrFail($id);

        return view('admin.posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified posts.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $posts = Posts::findOrFail($id);

        return view('admin.posts.edit', compact('posts'));
    }

    /**
     * Update the specified posts in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale, $id, Request $request)
    {

        $posts = Posts::findOrFail($id);
        if (!empty($request['image'])) {
            $file = $request->file('image');
            $destinationPath = 'uploads';
            $ext = '.' . $file->getClientOriginalExtension();
            $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
            // echo $name;
            $file->move($destinationPath, $name);
            $data['image'] = 'uploads/' . $name;
        }
        // }
        // try {
            $data = $this->getData($request);
            if($request->publish == null) $data['publish'] = false;
            else $data['publish'] = true;

            $posts->update($data);

            return redirect()->route('admin.posts.index', app()->getLocale())
                ->with('success_message', trans('message.post.success_update'));
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => trans('message.error_request')]);
        // }
    }

    /**
     * Remove the specified posts from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $posts = Posts::findOrFail($id);
            $posts->delete();

            return redirect()->route('admin.posts.index', app()->getLocale())
                ->with('success_message', trans('message.post.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Posts::whereIn('id', $request->input('ids'))->get();

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
            'short_des' => 'string|min:1|nullable',
            'h1_header' => 'string|min:1|nullable',
            'url' => 'string|min:1|nullable',
            'keywords' => 'string|min:1|nullable',
            'seo_text' => 'string|min:1|nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }
}