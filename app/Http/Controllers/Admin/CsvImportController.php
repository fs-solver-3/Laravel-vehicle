<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Roles;
use App\Models\DriverLisence;
use App\Models\Transactions;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use App\Models\Pages;
use App\Models\Posts;
use App\Models\News;
use App\Models\SeoAll;
use App\Models\SeoArea;


class CsvImportController extends Controller{
  
    public function UploadCsv_pages(Request $request){
  
        if (!empty($request->file('file'))){
            try {
                $file = $request->file('file');

                // File Details 
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();

                // Valid File Extensions
                $valid_extension = array("csv");

                // 2MB in Bytes
                $maxFileSize = 2097152;

                // Check file extension
                if (in_array(strtolower($extension), $valid_extension)) {

                    // Check file size
                    if ($fileSize <= $maxFileSize) {

                        // File upload location
                        $location = 'uploads/csv';
                        $filename = date('d-m-Y-H-i') . '_' . $filename;
                        // $filename = str_replace($extension, date('d-m-Y-H-i') . $extension, $file->getClientOriginalName());
                        // Upload file
                        $file->move($location, $filename);

                        // Import CSV to Database
                        $filepath = public_path($location . "/" . $filename);

                        // Reading file
                        $file = fopen($filepath, "r");

                        $importData_arr = array();
                        $i = 0;
                        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                            $num = count($filedata);

                            // Skip first row (Remove below comment if you want to skip the first row)
                            if ($i == 0) {
                                $header = $filedata;
                                $i++;
                                continue;
                            }
                            // for ($c=0; $c < $num; $c++) {
                            //     $importData_arr[$i][] = $filedata [$c];
                            // }
                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][$header[$c]] = $filedata[$c];
                            }
                            $i++;
                        }
                        fclose($file);
                        if ($request->table == 'pages') {
                            // dd($importData_arr);
                            try {
                                foreach ($importData_arr as $importData) {
                                    if($importData['publish'] == "") {
                                        $publish = 0;
                                    }
                                    else{
                                        $publish = $importData['publish'];
                                    }
                                    $insertData = array(
                                        "title" => $importData['title'],
                                        "h1_header" => $importData['h1_header'],
                                        "page_title" => $importData['page_title'],
                                        "page_logo" => $importData['page_logo'],
                                        "url" => $importData['url'],
                                        "keywords" => $importData['keywords'],
                                        "des" => $importData['des'],
                                        "seo_text" => $importData['seo_text'],
                                        "publish" => $publish
                                    );
                                    if(Pages::where('id', $importData['id'])->count() > 0){
                                        $page = Pages::findOrFail($importData['id']);
                                        $page->update($insertData);
                                    }
                                    else{
                                        Pages::create($insertData);
                                    }
                                }
                                return redirect()->route('admin.pages.index', app()->getLocale())
                                    ->with('success_message', trans('message.csv.success_import'));
                            } catch (\Throwable $th) {
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => trans('message.error_request')]);
                            }
                        } else if ($request->table == 'posts') {
                            try {
                                foreach ($importData_arr as $importData) {
                                    if($importData['publish'] == "") {
                                        $publish = 0;
                                    }
                                    else{
                                        $publish = $importData['publish'];
                                    }

                                    $insertData = array(
                                        "name" => $importData['name'],
                                        "h1_header" => $importData['h1_header'],
                                        "url" => $importData['url'],
                                        "keywords" => $importData['keywords'],
                                        "short_des" => $importData['short_des'],
                                        "seo_text" => $importData['seo_text'],
                                        "publish" => $publish 
                                    );
                                    if(Posts::where('id', $importData['id'])->count() > 0){
                                        $page = Posts::findOrFail($importData['id']);
                                        $page->update($insertData);
                                    }
                                    else{
                                        Posts::create($insertData);
                                    }
                                }
                                return redirect()->route('admin.posts.index', app()->getLocale())
                                    ->with('success_message', trans('message.csv.success_import'));
                            } catch (\Throwable $th) {
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => trans('message.error_request')]);
                            }
                        } else if ($request->table == 'news') {
                            // dd($importData_arr);
                            try {
                                foreach ($importData_arr as $importData) {
                                    if($importData['publish'] == "") {
                                        $publish = 0;
                                    }
                                    else{
                                        $publish = $importData['publish'];
                                    }
                                    if($importData['publish_author'] == "") {
                                        $publish_author = 0;
                                    }
                                    else{
                                        $publish_author = $importData['publish_author'];
                                    }
                                    if($importData['page_included'] == "") {
                                        $page_included = 0;
                                    }
                                    else{
                                        $page_included = $importData['page_included'];
                                    }
                                    $insertData = array(
                                        "h1" => $importData['h1'],
                                        "url" => $importData['url'],
                                        "page_included" => $page_included,
                                        "h1_header" => $importData['h1_header'],
                                        "title" => $importData['title'],
                                        "page_url" => $importData['page_url'],
                                        "keywords" => $importData['keywords'],
                                        "description" => $importData['description'],
                                        "date" => $importData['date'],
                                        "image" => $importData['image'],
                                        "publish_author" => $publish_author,
                                        "author" => $importData['author'],
                                        "author_image" => $importData['author_image'],
                                        "short_des" => $importData['short_des'],
                                        "seo_text" => $importData['seo_text'],
                                        "publish" => $publish
                                    );
                                    if(News::where('id', $importData['id'])->count() > 0){
                                        $page = News::findOrFail($importData['id']);
                                        $page->update($insertData);
                                    }
                                    else{
                                        News::create($insertData);
                                    }
                                }
                                return redirect()->route('admin.news.index', app()->getLocale())
                                    ->with('success_message', trans('message.csv.success_import'));
                            } catch (\Throwable $th) {
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => $th]);
                            }
                        } else if ($request->table == 'seo_all') {
                            // dd($importData_arr);
                            try {
                                foreach ($importData_arr as $importData) {
                                    if($importData['indexing'] == "") {
                                        $indexing = 0;
                                    }
                                    else{
                                        $indexing = $importData['indexing'];
                                    }
                                    $insertData = array(
                                        "name" => $importData['name'],
                                        "indexing" => $indexing,
                                        "area1" => $importData['area1'],
                                        "area2" => $importData['area2'],
                                        "fias_code" => $importData['fias_code'],
                                        "settlement" => $importData['settlement'],
                                        "page_title" => $importData['page_title'],
                                        "des" => $importData['des'],
                                        "h1_header" => $importData['h1_header'],
                                        "url" => $importData['url'],
                                        "keywords" => $importData['keywords'],
                                        "seo_text" => $importData['seo_text']
                                    );
                                    if(SeoAll::where('id', $importData['id'])->count() > 0){
                                        $page = SeoAll::findOrFail($importData['id']);
                                        $page->update($insertData);
                                    }
                                    else{
                                        SeoAll::create($insertData);
                                    }
                                }
                                return redirect()->route('admin.seo_all.index', app()->getLocale())
                                    ->with('success_message', trans('message.csv.success_import'));
                            } catch (Exception $th) {
                                // echo ($th);
                                // exit;
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => $th]);
                            }
                        } else if ($request->table == 'seo_area') {
                            // dd($importData_arr);
                            try {
                                foreach ($importData_arr as $importData) {
                                    $insertData = array(
                                        "title" => $importData['title'],
                                        "h1_header" => $importData['h1_header'],
                                        "page_title" => $importData['page_title'],
                                        "url" => $importData['url'],
                                        "keywords" => $importData['keywords'],
                                        "des" => $importData['des'],
                                        "seo_text" => $importData['seo_text'],
                                        "type" => $importData['type']
                                    );
                                    if(SeoArea::where('id', $importData['id'])->count() > 0){
                                        $page = SeoArea::findOrFail($importData['id']);
                                        $page->update($insertData);
                                    }
                                    else{
                                        SeoArea::create($insertData);
                                    }
                                }
                                return redirect()->route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => $importData['type']])
                                    ->with('success_message', trans('message.csv.success_import'));
                            } catch (\Throwable $th) {
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => trans('message.error_request')]);
                            }
                        }
                    } else {
                        return back()->withInput()
                            ->withErrors(['unexpected_error' => trans('message.csv.file_less')]);
                    }
                } else {
                    return back()->withInput()
                        ->withErrors(['unexpected_error' => 'Invalid File Extension.']);
                }
            } catch (\Throwable $th) {
                return back()->withInput()
                    ->withErrors(['unexpected_error' => trans('message.error_request')]);
            }
        }
    
        return back()->withInput()
        ->withErrors(['unexpected_error' => trans('message.error_request')]);
    }

    public function export (Request $request){
        try {
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            switch ($request->table) {
                case 'seo_all':
                    $items = SeoAll::get();
                    $columns = array('id','name', 'indexing', 'area1', 'area2', 'fias_code', 'settlement', 'page_title', 'des', 'h1_header', 'url', 'keywords', 'seo_text');

                    $callback = function () use ($items, $columns) {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns);

                        foreach ($items as $item) {
                            fputcsv($file, array(
                                $item->id,
                                $item->name,
                                $item->indexing,
                                $item->area1,
                                $item->area2,
                                $item->fias_code,
                                $item->settlement,
                                $item->page_title,
                                $item->des,
                                $item->h1_header,
                                $item->url,
                                $item->keywords,
                                $item->seo_text
                            ));
                        }
                        fclose($file);
                    };
                    break;
                case 'seo_area':
                    $items = SeoArea::where('type', $request->input('type'))->get();
                    $columns = array('id','title', 'h1_header', 'page_title', 'url', 'keywords', 'des', 'seo_text', 'type');

                    $callback = function () use ($items, $columns) {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns);

                        foreach ($items as $item) {
                            fputcsv($file, array(
                                $item->id,
                                $item->title,
                                $item->h1_header,
                                $item->page_title,
                                $item->url,
                                $item->keywords,
                                $item->des,
                                $item->seo_text,
                                $item->type
                            ));
                        }
                        fclose($file);
                    };
                    break;
                case 'pages':
                    $items = Pages::get();
                    $columns = array('id', 'title', 'h1_header', 'page_title', 'page_logo', 'url', 'keywords', 'des', 'seo_text', 'publish');

                    $callback = function () use ($items, $columns) {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns);

                        foreach ($items as $item) {
                            fputcsv($file, array(
                                $item->id,
                                $item->title,
                                $item->h1_header,
                                $item->page_title,
                                $item->page_logo,
                                $item->url,
                                $item->keywords,
                                $item->des,
                                $item->seo_text,
                                $item->publish
                            ));
                        }
                        fclose($file);
                    };
                    break;
                case 'posts':
                    $items = Posts::get();
                    $columns = array('id', 'name', 'short_des', 'long_des', 'date', 'h1_header', 'url', 'keywords', 'seo_text', 'publish');

                    $callback = function () use ($items, $columns) {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns);

                        foreach ($items as $item) {
                            fputcsv($file, array(
                                $item->id,
                                $item->name,
                                $item->short_des,
                                $item->long_des,
                                $item->date,
                                $item->h1_header,
                                $item->url,
                                $item->keywords,
                                $item->seo_text,
                                $item->publish
                            ));
                        }
                        fclose($file);
                    };
                    break;
                case 'news':
                    $items = News::get();
                    $columns = array('id', 'title', 'date', 'image', 'description','h1_header', 'url', 'keywords', 'seo_text', 'publish', 'h1', 'page_url', 'author', 'author_image', 'short_des', 'page_included', 'publish_author');

                    $callback = function () use ($items, $columns) {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns);

                        foreach ($items as $item) {
                            fputcsv($file, array(
                                $item->id,
                                $item->title,
                                $item->date,
                                $item->image,
                                $item->description,
                                $item->h1_header,
                                $item->url,
                                $item->keywords,
                                $item->seo_text,
                                $item->publish,
                                $item->h1,
                                $item->page_url,
                                $item->author,
                                $item->author_image,
                                $item->short_des,
                                $item->page_included,
                                $item->publish_author,
                            ));
                        }
                        fclose($file);
                    };
                    break;
                
                default:
                    # code...
                    break;
            }

           
            return response()->stream($callback, 200, $headers);
        } catch (\Throwable $th) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
       
    }
}
