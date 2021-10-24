<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use Yajra\Datatables\Html\Builder;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Traits\FlashNotificationTrait;
use Yajra\Datatables\Datatables;
use Session;

class PublishersController extends Controller
{
  use FlashNotificationTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            $publishers = Publisher::select(['id','name'])->latest('updated_at')->get();
            return Datatables::of($publishers)
          ->addColumn('action', function ($publisher) {
              return view('datatable._action', [
              'model' => $publisher,
              'form_url' => route('publishers.destroy', $publisher->id),
              'edit_url' => route('publishers.edit', $publisher->id),
              'title' => 'Penerbit',
              'confirm_message' => 'Yakin ingin menghapus '.$publisher->name.' ?'
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
          'title' => 'Nama'
        ])
        ->addColumn([
          'data' => 'action',
          'name' => 'action',
          'title' => '',
          'orderable' => false,
          'searchable' => false
        ]);
        return view('publishers.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublisherRequest $request)
    {
        $publisher = Publisher::create($request->only('name'));
        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil menambah $publisher->name"
        ]);
        return redirect()->back();
        //->route('publishers.index');
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
        $publisher = Publisher::find($id);
        return view('publishers.edit')->with(compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublisherRequest $request, $id)
    {
        $publisher = Publisher::find($id);
        $publisher->update($request->only('name'));

        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil mengubah $publisher->name"
        ]);
        return redirect()->route('publishers.index');
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
        // if(!Publisher::destroy($id)) return redirect()->back();
        // Session::flash("flash_notification", [
        //   "level" => "success",
        //   "message" => "Penerbit berhasil dihapus"
        // ]);
        $item = Publisher::findOrFail($id);
        if (!$item->delete()) {
            return redirect()->back();
        }
        $this->sendFlashNotification('menghapus', $item->name);
        return redirect()->route('publishers.index');
    }
}
