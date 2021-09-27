<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Announcement;
use Illuminate\Support\Facades\Storage;
use Session;
class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
     {
       if ($request->ajax()) {
         $announcements = Announcement::select(['id','text']);
         return Datatables::of($announcements)
         ->addColumn('action',function($announcement){
           return view('datatable._action',[
             'model' => $announcement,
             'form_url' => route('announcements.destroy', $announcement->id),
             'edit_url' => route('announcements.edit', $announcement->id),
             'title' => 'Pengumuman',
             'confirm_message' => 'Yakin ingin menghapus '.$announcement->title.' ?'
           ]);
         })
         ->make(true);
       }

       $html = $htmlBuilder
       ->addColumn(['data' => 'text', 'name' => 'text', 'title' => 'Isi'])
       ->addColumn(['data' => 'action','name' => 'action','title' => '','orderable' => false,'searchable' => false]);
       return view('announcements.index')->with(compact('html'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, array(
          'text'=>'max:225',
        ));
        $announcements = new Announcement;
        $announcements->text = $request->input('text');
        $announcements->save();
        return redirect()->route('announcements.index');
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
      $announcement = Announcement::findOrFail($id);
      return view('announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $announcement = Announcement::find($id);
      $this->validate($request, array(
        'text' =>'max:255'
     ));

        $announcement->update($request->only('text'));

        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil mengubah $announcement->text"
        ]);
        return redirect()->route('announcements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $announcement = Announcement::findOrFail($id);
        Storage::delete($announcement->img);
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success','Announcement successfully deleted');
    }
}
