<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Yajra\Datatables\Html\Builder;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Yajra\Datatables\Datatables;
use Session;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        
        if ($request->ajax()) {
          $categories = Category::select(['id','name']);
          return Datatables::of($categories)
          ->addColumn('action',function($category){
            return view('datatable._action',[
              'model' => $category,
              'form_url' => route('categories.destroy', $category->id),
              'edit_url' => route('categories.edit', $category->id),
              'title' => 'Kategori',
              'confirm_message' => 'Yakin ingin menghapus '.$category->name.' ?'
            ]);
          })->make(true);
        }        		
        $html = $htmlBuilder
        ->addColumn([
          'data' => 'name',
          'name' => 'name',
          'title' => 'Nama'
        ])
        ->addColumn([
          'data' => 'action',
          'name' => 'action',
          'title' => '',
          'orderable' => false,
          'searchable' => false
        ]);
        return view('categories.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->only('name'));
        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil menyimpan $category->name"
        ]);
        return redirect()->back();
        //->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('categories.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
      $category = Category::where('classification_code', $id)->first();
        $category->update($request->only('classification_code','name'));

        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil menyimpan $category->name"
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(!Category::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Kategori berhasi dihapus"
        ]);
          return redirect()->route('categories.index');

    }
}
