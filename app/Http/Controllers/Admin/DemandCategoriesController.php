<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandCategory;
use App\Models\DemandCategoryManager;
use Illuminate\Http\Request;
use App\User;
use Exception;

class DemandCategoriesController extends Controller
{

    /**
     * Display a listing of the demand categories.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $demandCategories = DemandCategory::paginate(25);
        if ($request->ajax()) {
            $query = DemandCategory::orderBy('id', 'desc');
            if ($request->id != null)
            $query->where('id', '=', $request->id);
            $query->Where('name', 'like', '%' . $request->name . '%')->get();
            $demandCategories = $query->get();
            $data['template'] = view('admin.demand_categories.table_template', compact('demandCategories'))->render();
            $data['template_mobile'] =  view('admin.demand_categories.table_template_mobile', compact('demandCategories'))->render();
            return $data;
        }
        else{
            return view('admin.demand_categories.index', compact('demandCategories'));
        }

    }

    /**
     * Show the form for creating a new demand category.
     *
     * @return Illuminate\View\View
     */
    public function create(Request $request)
    {

        $managers = User::whereHas(
            'role',
            function ($q) {
                $q->where('title', 'Support employee');
            }
        )->pluck('name', 'id')->all();
        // dd($managers);
        return view('admin.demand_categories.create', compact('managers'));
    }

    /**
     * Store a new demand category in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $demandCategory = DemandCategory::create($data);
            $demandCategory->manager()->sync(array_filter((array) $request->input('user_id')));
            return redirect()->route('admin.demand_categories.index', app()->getLocale())
                ->with('success_message', trans('message.demand_category.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }
    }

    /**
     * Display the specified demand category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $demandCategory = DemandCategory::findOrFail($id);

        return view('admin.demand_categories.show', compact('demandCategory'));
    }

    /**
     * Show the form for editing the specified demand category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $demandCategory = DemandCategory::findOrFail($id);
        $managers = User::whereHas(
            'role',
            function ($q) {
                $q->where('title', 'Support employee');
            }
        )->pluck('name', 'id')->all();

        return view('admin.demand_categories.edit', compact('demandCategory', 'managers'));
    }

    public function right($locale, $id)
    {
        $demandCategory = DemandCategory::findOrFail($id);
        $managers = User::whereHas(
            'role',
            function ($q) {
                $q->where('title', 'Support employee');
            }
        )->pluck('name', 'id')->all();

        return view('admin.demand_categories.right', compact('demandCategory', 'managers'));
    }

    /**
     * Update the specified demand category in the storage.
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
            
            $demandCategory = DemandCategory::findOrFail($id);
            $demandCategory->update($data);
            $demandCategory->manager()->sync(array_filter((array) $request->input('user_id')));
            return redirect()->route('admin.demand_categories.index', app()->getLocale())
                ->with('success_message', trans('message.demand_category.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception]);
        }        
    }

    public function updateRight($locale, $id, Request $request)
    {
        foreach ($request->manager_id as $key => $item) {
            # code...
            $demandCategoryManager = DemandCategoryManager::findOrFail($item);
            $demandCategoryManager->update([
                'see_message' => $request->see_message[$key],
                'receive_notification' => $request->receive_notification[$key],
                'receive_update_notification' => $request->receive_update_notification[$key],
            ]);
            // echo ($key);

        }
        return redirect()->route('admin.demand_categories.index', app()->getLocale())
            ->with('success_message', trans('message.demand_category.success_update'));
    }

    /**
     * Remove the specified demand category from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $demandCategory = DemandCategory::findOrFail($id);
            $demandCategory->delete();

            return redirect()->route('admin.demand_categories.index', app()->getLocale())
                ->with('success_message', trans('message.demand_category.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = DemandCategory::whereIn('id', $request->input('ids'))->get();

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
                'description' => 'string|min:1|max:1000|nullable', 
                'grade' => 'string|min:1|max:1000|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
