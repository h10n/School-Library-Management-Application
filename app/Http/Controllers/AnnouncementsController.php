<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Announcement;
use App\Http\Requests\AnnouncementRequest;
use App\Traits\FlashNotificationTrait;

class AnnouncementsController extends Controller
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
            $announcements = Announcement::select(['id','text'])->latest('updated_at')->get();
            return Datatables::of($announcements)
         ->addColumn('action', function ($announcement) {
             return view('datatable._action', [
             'model' => $announcement,
             'form_url' => route('announcements.destroy', $announcement->id),
             'edit_url' => route('announcements.edit', $announcement->id),
             'title' => 'Pengumuman',
             'confirm_message' => 'Yakin ingin menghapus '.$announcement->title.' ?'
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
    public function store(AnnouncementRequest $request)
    {        
        $announcement = new Announcement;
        $announcement->text = $request->input('text');
        $announcement->save();

        $this->sendFlashNotification('menambah', $announcement->text);
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
    public function update(AnnouncementRequest $request, $id)
    {
        $announcement = Announcement::find($id);
        $announcement->update($request->only('text'));

        $this->sendFlashNotification('mengubah', $announcement->text);
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
        $item = Announcement::findOrFail($id);
        if (!$item->delete()) {
            return redirect()->back();
        }

        $this->sendFlashNotification('menghapus', $item->text);
        return redirect()->route('announcements.index');
    }
}
