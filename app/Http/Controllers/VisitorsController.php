<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitorMemberRequest;
use App\Http\Requests\VisitorRequest;
use App\Member;
use App\Traits\FlashNotificationTrait;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class VisitorsController extends Controller
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
      $items = Visitor::latest('updated_at')->get();
      return Datatables::of($items)
        ->addColumn('action', function ($item) {
          return view('datatable._carousel-action', [
            'model' => $item,
            'form_url' => route('visitors.destroy', $item->id),
            'edit_url' => route('visitors.edit', $item->id),
            'title' => 'Pengunjung'            
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
        'data' => 'no_induk',
        'name' => 'no_induk',
        'title' => 'NIS/NIP'
      ])
      ->addColumn([
        'data' => 'name',
        'name' => 'name',
        'title' => 'Nama'
      ])
      ->addColumn([
        'data' => 'jenis',
        'name' => 'jenis',
        'title' => 'Jenis Pengunjung'
      ])
      ->addColumn([
        'data' => 'kelas',
        'name' => 'kelas',
        'title' => 'Kelas'
      ])
      ->addColumn([
        'data' => 'keperluan',
        'name' => 'keperluan',
        'title' => 'Keperluan'
      ])
      ->addColumn([
        'data' => 'tgl_terdaftar',
        'name' => 'tgl_terdaftar',
        'title' => 'Tanggal'
      ])
      ->addColumn([
        'data' => 'action',
        'name' => 'action',
        'title' => '',
        'orderable' => false,
        'searchable' => false
      ]);
    return view('visitors.index')->with(compact('html'));
  }

  public function create()
  {
    return view('visitors.create');
  }

  public function guestBook()
  {
    return view('visitors.guest-book');
  }
  public function store(VisitorRequest $request)
  {
    $item = Visitor::create($request->all());
    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Berhasil menambah $item->name"
    ]);
    return redirect()->route('visitors.index');
  }

  public function storeGuestBook(VisitorRequest $request)
  {
    $item = Visitor::create($request->all());
    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Terimakasih $item->name, Selamat $item->keperluan !"
    ]);
    return redirect()->route('visitors.guest-book');
  }

  public function storeGuestBookMember(VisitorMemberRequest $request)
  {
    $member = Member::where('no_induk', $request->no_anggota)->firstOrFail();
    $data = [
      'no_induk' => $member->no_induk,
      'name' => $member->name,
      'jenis' => $member->jenis_anggota,
      'kelas' => $member->kelas,
      'keperluan' => $request->keperluan,
    ];

    $item = Visitor::create($data);
    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Terimakasih $item->name, Selamat $item->keperluan !"
    ]);
    return redirect()->route('visitors.guest-book');
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
    $item = Visitor::find($id);
    return view('visitors.edit')->with(compact('item'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(VisitorRequest $request, $id)
  {
    $request['kelas'] = $request['kelas'] ?? '';

    $item = Visitor::find($id);
    $item->update($request->all());

    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Berhasil mengubah $item->name"
    ]);
    return redirect()->route('visitors.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $item = Visitor::findOrFail($id);
    if (!$item->delete()) {
      return redirect()->back();
    }
    $this->sendFlashNotification('menghapus', $item->name);
    return redirect()->route('visitors.index');
  }
}
