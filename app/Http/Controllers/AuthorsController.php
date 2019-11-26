<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Yajra\Datatables\Html\Builder;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Traits\FlashNotificationTrait;
use Yajra\Datatables\Datatables;
use Session;

class AuthorsController extends Controller
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
      $authors = Author::select(['id', 'name', 'singkatan'])->latest('updated_at')->get();
      return Datatables::of($authors)
        ->addColumn('action', function ($author) {
          return view('datatable._action', [
            'model' => $author,
            'form_url' => route('authors.destroy', $author->id),
            'edit_url' => route('authors.edit', $author->id),
            'title' => 'Author'            
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
        'data' => 'singkatan',
        'name' => 'singkatan',
        'title' => 'Abbreviation'
      ])
      ->addColumn([
        'data' => 'action',
        'name' => 'action',
        'title' => '',
        'orderable' => false,
        'searchable' => false
      ]);
    return view('authors.index')->with(compact('html'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('authors.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreAuthorRequest $request)
  {
    $author = Author::create($request->only('name', 'singkatan'));
    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Successfully added $author->name"
    ]);
    return redirect()->back();
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
    $author = Author::find($id);
    return view('authors.edit')->with(compact('author'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateAuthorRequest $request, $id)
  {
    $author = Author::find($id);
    $author->update($request->only('name', 'singkatan'));

    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Successfully updated $author->name"
    ]);
    return redirect()->route('authors.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $item = Author::findOrFail($id);
    if (!$item->delete()) {
      return redirect()->back();
    }
    $this->sendFlashNotification('menghapus', $item->name);
    return redirect()->route('authors.index');
  }
}
