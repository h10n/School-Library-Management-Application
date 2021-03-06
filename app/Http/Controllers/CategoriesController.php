<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Yajra\Datatables\Html\Builder;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Traits\FlashNotificationTrait;
use Yajra\Datatables\Datatables;
use Session;

class CategoriesController extends Controller
{
  use FlashNotificationTrait;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, Builder $htmlBuilder)
  {
    if ($request->ajax()) {
      $categories = Category::select(['id', 'name'])->latest('updated_at')->get();
      return Datatables::of($categories)
        ->addColumn('action', function ($category) {
          return view('datatable._action', [
            'model' => $category,
            'form_url' => route('categories.destroy', $category->id),
            'edit_url' => route('categories.edit', $category->id),
            'title' => 'Category'            
          ]);
        })
        ->addIndexColumn()
        ->make(true);
    }
    $html = $htmlBuilder
      ->addColumn([
        'defaultContent' => '',
        'data'           => 'DT_Row_Index',
        'name'           => 'DT_Row_Index',
        'title'          => '',
        'render'         => null,
        'orderable'      => false,
        'searchable'     => false,
        'exportable'     => false,
        'printable'      => true,
        'footer'         => '',
      ])
      ->addColumn([
        'data' => 'name',
        'name' => 'name',
        'title' => 'Name'
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
      "message" => "Successfully added $category->name"
    ]);
    return redirect()->route('categories.index');
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
    $category = Category::findOrFail($id);
    $category->update($request->only('name'));

    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Successfully updated $category->name"
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
    $item = Category::findOrFail($id);
    if (!$item->delete()) return redirect()->back();
    $this->sendFlashNotification('menghapus', $item->name);
    return redirect()->route('categories.index');
  }
}
