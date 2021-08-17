<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoArea;
use Illuminate\Http\Request;
use Exception;

class SeoAreasController extends Controller
{

    /**
     * Display a listing of the seo areas.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        
        if ($request->input('type')) {
            $seoAreas = SeoArea::where('type', $request->input('type'))->paginate(25);
            // echo $lessonsObjects;
            // exit;
        }
        else{
            $seoAreas = SeoArea::get();
        }
        return view('admin.seo_areas.index', compact('seoAreas'));
    }

    /**
     * Show the form for creating a new seo area.

     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.seo_areas.create');
    }

    /**
     * Store a new seo area in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            SeoArea::create($data);

            return redirect()->route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => $request->type])
                ->with('success_message', trans('message.seo_area.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified seo area.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $seoArea = SeoArea::findOrFail($id);

        return view('admin.seo_areas.show', compact('seoArea'));
    }

    /**
     * Show the form for editing the specified seo area.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $seoArea = SeoArea::findOrFail($id);
        

        return view('admin.seo_areas.edit', compact('seoArea'));
    }

    /**
     * Update the specified seo area in the storage.
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
            
            $seoArea = SeoArea::findOrFail($id);
            $seoArea->update($data);

            return redirect()->route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => $request->type])
                ->with('success_message', trans('message.seo_area.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }        
    }

    /**
     * Remove the specified seo area from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $seoArea = SeoArea::findOrFail($id);
            $seoArea->delete();

            return redirect()->route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => $request->type])
                ->with('success_message', trans('message.seo_area.success_delete'));
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
            $entries = SeoArea::whereIn('id', $request->input('ids'))->get();

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
            'type' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
