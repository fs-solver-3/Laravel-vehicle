<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoAll;
use Illuminate\Http\Request;
use Exception;

class SeoAllController extends Controller
{

    /**
     * Display a listing of the seo alls.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $seoAlls = SeoAll::get();

        return view('admin.seo_all.index', compact('seoAlls'));
    }

    /**
     * Show the form for creating a new seo all.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.seo_all.create');
    }

    /**
     * Store a new seo all in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            SeoAll::create($data);

            return redirect()->route('admin.seo_all.index', app()->getLocale())
                ->with('success_message', trans('message.seo_all.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }
    }

    /**
     * Display the specified seo all.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $seoAll = SeoAll::findOrFail($id);

        return view('admin.seo_all.show', compact('seoAll'));
    }

    /**
     * Show the form for editing the specified seo all.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $seoAll = SeoAll::findOrFail($id);
        

        return view('admin.seo_all.edit', compact('seoAll'));
    }

    /**
     * Update the specified seo all in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale, $id, Request $request)
    {
        try {
            
            // dd($request->name);
            $data = $this->getData($request);
            $seoAll = SeoAll::findOrFail($id);
            $seoAll->update($data);

            return redirect()->route('admin.seo_all.index', app()->getLocale())
                ->with('success_message', trans('message.seo_all.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }        
    }

    /**
     * Remove the specified seo all from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $seoAll = SeoAll::findOrFail($id);
            $seoAll->delete();

            return redirect()->route('admin.seo_all.seo_all.index', app()->getLocale())
                ->with('success_message', trans('message.seo_all.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {
        // dd('ok');
        try {
            if ($request->input('ids')) {
                $entries = SeoAll::whereIn('id', $request->input('ids'))->get();

                foreach ($entries as $entry) {
                    $entry->delete();
                }
            }
            return redirect()->route('admin.seo_all.seo_all.index', app()->getLocale())
                ->with('success_message', 'Seo All was successfully deleted.');
        } catch (\Throwable $th) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
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
            'indexing' => 'nullable',
            'area1' => 'string|min:1|nullable',
            'area2' => 'string|min:1|nullable',
            'fias_code' => 'string|min:1|nullable',
            'settlement' => 'string|min:1|nullable',
            'page_title' => 'string|nullable',
            'des' => 'string|min:1|nullable',
            'h1_header' => 'string|min:1|nullable',
            'url' => 'string|min:1|nullable',
            'keywords' => 'string|min:1|nullable',
            'seo_text' => 'string|min:1|nullable'
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
