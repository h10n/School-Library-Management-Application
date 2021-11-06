<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Setting;
use App\Traits\FlashNotificationTrait;
use App\Traits\UploadFileTrait;
use Yajra\Datatables\Html\Builder;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
  use FlashNotificationTrait, UploadFileTrait;
  public function index(Request $request, Builder $htmlBuilder)
  {
    if ($request->ajax()) {
      $members = Member::with('user')->latest('updated_at')->get();
      return Datatables::of($members)
        ->addColumn('action', function ($member) {
          return view('datatable._member-action', [
            'model' => $member,
            'form_url' => route('members.destroy', $member->id),
            'edit_url' => route('members.edit', $member->id),
            'detail_url' => route('members.show', $member->id),
            'title' => 'Member',
            'confirm_message' => 'Yakin ingin menghapus ' . $member->title . ' ?'
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
        'data' => 'jenis_anggota',
        'name' => 'jenis_anggota',
        'title' => 'Jenis Anggota'
      ])
      ->addColumn([
        'data' => 'kelas',
        'name' => 'kelas',
        'title' => 'Kelas'
      ])
      ->addColumn([
        'data' => 'jurusan',
        'name' => 'jurusan',
        'title' => 'Jurusan'
      ])
      ->addColumn([
        'data' => 'user.username',
        'name' => 'user.username',
        'title' => 'Username'
      ])
      ->addColumn([
        'data' => 'tgl_terdaftar',
        'name' => 'tgl_terdaftar',
        'title' => 'Terdaftar'
      ])
      ->addColumn([
        'data' => 'action',
        'name' => 'action',
        'title' => '',
        'orderable' => false,
        'searchable' => false
      ]);

    return view('members.index', compact('html'));
  }
  public function create()
  {
    return view('members.create');
  }
  public function store(StoreMemberRequest $request)
  {
    if ($member = Member::create($request->except('photo'))) {
      $this->uploadFile($request, $member, 'photo_file', 'photo', 'anggota');
      $request['member_id'] = $member->id;
      $request['password'] = bcrypt($request['password']);
      $user = User::create($request->only(['name', 'username', 'password', 'member_id']));
      $role = Role::where('name', '=', 'member')->first();
      $user->attachRole($role);

      Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Berhasil menambah $member->name"
      ]);
    }

    return redirect()->route('members.index');
  }

  public function show($id)
  {
    $member = Member::find($id);
    return view('members.show', compact('member'));
  }

  public function statusRiwayat()
  {
    $member = Auth::user()->member;
    return view('members.status-history', compact('member'));
  }

  public function edit($id)
  {
    $member = Member::find($id);
    return view('members.edit')->with(compact('member'));
  }

  public function update(UpdateMemberRequest $request, $id)
  {
    $member = Member::find($id);
    $request['kelas'] = $request['kelas'] ?? '';
    $request['jurusan'] = $request['jurusan'] ?? '';

    if (!$member->update($request->all())) return redirect()->back();
    $this->uploadFile($request, $member, 'photo_file', 'photo', 'anggota');

    if ($user = $member->user) {
      $request['member_id'] = $id;
      if ($request->password) {
        $request['password'] = bcrypt($request['password']);
        if (!$user->update($request->only(['name', 'username', 'password', 'member_id']))) {
          return redirect()->back();
        }
      } else {
        if (!$user->update($request->only(['name', 'username', 'member_id']))) {
          return redirect()->back();
        }
      }
    }

    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Berhasil mengubah $member->name"
    ]);

    return redirect()->route('members.index');
  }


  public function destroy(Request $request, $id)
  {
    $member = Member::find($id);
    if (!$member->delete()) {
      return redirect()->back();
    }

    $this->deleteFile('anggota', $member->photo);

    $this->sendFlashNotification('menghapus', $member->name);
    return redirect()->route('members.index');
  }

  public function printCard($id)
  {
    $member = Member::find($id);
    $setting =  Setting::first();
    $announcements = Announcement::all();

    if (!$member) {
      Session::flash("flash_notification", [
        "level" => "danger",
        "message" => "Gagal mencetak kartu!"
      ]);
      return redirect()->back();
    } else {
      $pdf = PDF::loadview('pdf.members-card', ['member' => $member, 'setting' => $setting, 'announcements' => $announcements])->setPaper('a4', 'potrait');
      return $pdf->stream("members-card.pdf", array("Attachment" => false));
    }
  }
}
