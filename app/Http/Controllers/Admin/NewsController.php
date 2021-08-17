<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;
use Illuminate\Support\Facades\Gate;

class NewsController extends AdminController
{

    /**
     * Display a listing of the blogs.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {

        // if (!Gate::allows('event_access')) {
        //     return abort(401);
        // }

        $blogsObjects = News::get();

        if ($request->ajax()) {
            $query = News::orderBy('id', 'desc');
            $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);

            if ($request->name != null)
                $query->where('title', '=', $request->name);
            if ($request->from_date != null)
            $query->where('created_at', '<=', $from_date)
            ->where('created_at', '>=', $to_date);
            $blogsObjects = $query->get();
            // return view('admin.news.table_template_mobile', compact('blogsObjects'))->render();
            $data['template'] = view('admin.news.table_template', compact('blogsObjects'))->render();
            $data['template_mobile'] = view('admin.news.table_template_mobile', compact('blogsObjects'))->render();
            return $data;
        } else {
            return view('admin.news.index', compact('blogsObjects'));
        }
    }

    /**
     * Show the form for creating a new blogs.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('admin.news.create');
    }

    /**
     * Store a new blogs in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // try {
            $data = $this->getData($request);
            if($request->publish == null) $data['publish'] = false;
            else $data['publish'] = true;
            if($request->page_included == null) $data['page_included'] = false;
            else $data['page_included'] = true;
            if($request->publish_author == null) $data['publish_author'] = false;
            else $data['publish_author'] = true;
            if (!empty($request['image'])) {
                $file = $request->file('image');
                $destinationPath = 'uploads';
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                // echo $name;
                $file->move($destinationPath, $name);
                $data['image'] = 'uploads/' . $name;
            }
            if (!empty($request['author_image'])) {
                $file = $request->file('author_image');
                $destinationPath = 'uploads';
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                // echo $name;
                $file->move($destinationPath, $name);
                $data['author_image'] = 'uploads/' . $name;
            }
            News::create($data);

            return redirect()->route('admin.news.index', app()->getLocale())
                ->with('success_message', trans('message.blog.success_add'));
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => trans('message.error_request')]);
        // }
    }

    /**
     * Display the specified blogs.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified blogs.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $news = News::findOrFail($id);


        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified blogs in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale, $id, Request $request)
    {


        $news = News::findOrFail($id);

        try {
            $data = $this->getData($request);
            if($request->publish == null) $data['publish'] = false;
            else $data['publish'] = true;
            if($request->page_included == null) $data['page_included'] = false;
            else $data['page_included'] = true;
            if($request->publish_author == null) $data['publish_author'] = false;
            else $data['publish_author'] = true;
            if (!empty($request['image'])) {
                $file = $request->file('image');
                $destinationPath = 'uploads';
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                // echo $name;
                $file->move($destinationPath, $name);
                $data['image'] = 'uploads/' . $name;
            }
            if (!empty($request['author_image'])) {
                $file = $request->file('author_image');
                $destinationPath = 'uploads';
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                // echo $name;
                $file->move($destinationPath, $name);
                $data['author_image'] = 'uploads/' . $name;
            }

            $news->update($data);

            return redirect()->route('admin.news.index', app()->getLocale())
                ->with('success_message', trans('message.blog.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Remove the specified blogs from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $news = News::findOrFail($id);
            $news->delete();

            return redirect()->route('admin.news.index', app()->getLocale())
                ->with('success_message', trans('message.news.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = News::whereIn('id', $request->input('ids'))->get();

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
            'date' => 'string|min:1|nullable',
            'url' => 'string|nullable',
            'page_url' => 'string|nullable',
            'h1' => 'string|nullable',
            'h1_header' => 'string|nullable',
            'keywords' => 'string|nullable',
            'author' => 'string|nullable',
            'short_des' => 'string|nullable',
            'seo_text' => 'string|nullable',
            'description' => 'string|min:1|max:1000|nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }
}