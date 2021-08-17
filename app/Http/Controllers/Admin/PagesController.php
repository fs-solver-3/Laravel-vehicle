<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;

class PagesController extends Controller
{

    /**
     * Display a listing of the pages.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Pages::orderBy('id', 'desc');
            if ($request->menu_item != null)
                $query->where('title', '=', $request->menu_item);
            $pagesObjects = $query->get();
            $data['template'] = view('admin.pages.table_template', compact('pagesObjects'))->render();
            $data['template_mobile'] = view('admin.pages.table_template_mobile', compact('pagesObjects'))->render();
            return $data;
        }
        else{
            $pagesObjects = Pages::paginate(25);
            return view('admin.pages.index', compact('pagesObjects'));
        }
    }

    /**
     * Show the form for creating a new pages.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.pages.create');
    }

    /**
     * Store a new pages in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $data = $this->getData($request);
            if($request->publish == null) $data['publish'] = false;
            else $data['publish'] = true;
            $id = Pages::create($data)->id;
            if (!empty($request['page_logo'])) {
                $file = $request->file('page_logo');
                $destinationPath = 'uploads/page_logos';
                if (!File::isDirectory($destinationPath)) {

                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                // echo $name;
                $file->move($destinationPath, $name);
                $path = 'uploads/page_logos/' . $name;
                Pages::where('id', $id)->update(array('page_logo' => $path));
            }

            return redirect()->route('admin.pages.index', app()->getLocale())
                ->with('success_message', trans('message.page.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified pages.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale,$id)
    {
        $pages = Pages::findOrFail($id);

        return view('admin.pages.show', compact('pages'));
    }

    /**
     * Show the form for editing the specified pages.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale,$id)
    {
        $pages = Pages::findOrFail($id);
        

        return view('admin.pages.edit', compact('pages'));
    }

    /**
     * Update the specified pages in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale,$id, Request $request)
    {
        try {
            $data = $this->getData($request);
            if($request->publish == null) $data['publish'] = false;
            else $data['publish'] = true;
            $pages = Pages::findOrFail($id);
            $pages->update($data);
            if (!empty($request['page_logo'])) {
                $file = $request->file('page_logo');
                $destinationPath = 'uploads/page_logos';
                if (!File::isDirectory($destinationPath)) {

                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                // echo $name;
                $file->move($destinationPath, $name);
                $path = 'uploads/page_logos/' . $name;
                Pages::where('id', $id)->update(array('page_logo' => $path));
            }elseif ($request['delete_image'] == 'delete') {

                $pages->update(array('page_logo' => null));
                $image_path = $pages->page_logo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            return redirect()->route('admin.pages.index', app()->getLocale())
                ->with('success_message', trans('message.page.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }        
    }

    /**
     * Remove the specified pages from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale,$id)
    {
        try {
            $pages = Pages::findOrFail($id);
            $pages->delete();

            return redirect()->route('admin.pages.index', app()->getLocale())
                ->with('success_message', trans('message.page.success_delete'));
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
            $entries = Pages::whereIn('id', $request->input('ids'))->get();

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
            'h1_header' => 'string|min:1|nullable',
            'page_title' => 'string|nullable',
            'url' => 'string|min:1|nullable',
            'keywords' => 'string|min:1|nullable',
            'seo_text' => 'string|min:1|nullable',
            // 'publish' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
