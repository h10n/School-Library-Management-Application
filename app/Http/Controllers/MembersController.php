<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User; //delete this when not needed anymore
use App\Member;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Yajra\Datatables\Html\Builder;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Session;

class MembersController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
      if ($request->ajax()) {
        $members = Member::select(['id','nis','name','kelas','jurusan','address','email','phone','photo'])->latest('updated_at')->get();
        return Datatables::of($members)
        ->addColumn('action', function($member){
          return view('datatable._member-action', [
            'model' => $member,
            'form_url' => route('members.destroy',$member->id),
            'edit_url' => route('members.edit',$member->id),
            'detail_url' => route('members.show',$member->id),
            'title' => 'Member',
            'confirm_message' => 'Yakin ingin menghapus '.$member->title.' ?'
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
        'data' => 'nis',
        'name' => 'nis',
        'title' => 'NIS'
      ])
      ->addColumn([
        'data' => 'name',
        'name' => 'name',
        'title' => 'Nama'
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
        'data' => 'address',
        'name' => 'address',
        'title' => 'Alamat'
      ])
      ->addColumn([
        'data' => 'email',
        'name' => 'email',
        'title' => 'Email'
      ])
      ->addColumn([
        'data' => 'phone',
        'name' => 'phone',
        'title' => 'No Telepon'
      ])
      /*->addColumn([
        'data' => 'photo',
        'name' => 'photo',
        'title' => 'Foto'
      ])*/
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
        //
        return view('members.create');
    }
    public function store(StoreMemberRequest $request)
    {
      $member = Member::create($request->except('photo'));
      if ($request->hasFile('photo')) {
        //ngambil filenya
        $uploaded_cover = $request->file('photo');
        //ngambil extensinya
        $extension = $uploaded_cover->getClientOriginalExtension();
        //buat nama random+extensi filenya
        $filename = md5(time()).'.'.$extension;
        //simpan ke public/image
        $destinatonPath = public_path('img/members_photo');
        $uploaded_cover->move($destinatonPath, $filename);
        //isi filed photo dengan filename yang baru dibuat
        $member->photo = $filename;
      }
      $request['member_id'] = $member->id;
      $request['password'] = bcrypt($request['password']);
      $user = User::create($request->only(['name','username','email','password','member_id']));
      $role = Role::where( 'name', '=', 'member' )->first();
      $user->attachRole( $role );
      
      // dd($member->id);
      Session::flash("flash_notification",[
        "level" => "success",
        "message" => "Berhasil menyimpan $member->name"
      ]);
      return redirect()->route('members.index');
    }

    public function show($id)
    {
      $member = Member::find($id); //member bukan user
      return view('members.show', compact('member'));
    }

    public function edit($id)
    {
      $member = Member::find($id);      
      return view('members.edit')->with(compact('member'));
    }

    public function update(UpdateMemberRequest $request, $id)
    {
      // code...
      $member = Member::find($id);
      $photo = $member->photo;

if(!$member->update($request->all())) return redirect()->back();

if ($request->hasFile('photo')) {
    $filename = null;
    $uploaded_cover = $request->file('photo');
    $extension = $uploaded_cover->getClientOriginalExtension();

    // membuat nama file random dengan extension
    $filename = md5(time()) . '.' . $extension;
    $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/members_photo';

    // memindahkan file ke folder public/img
    $uploaded_cover->move($destinationPath, $filename);

    // hapus photo lama, jika ada
    $this->deletePhoto($photo);

    // ganti field photo dengan photo yang baru
    $member->photo = $filename;
    $member->save();
}      
      if($user = $member->user){        
        $request['member_id'] = $id;  
        if($request->password){            
            $request['password'] = bcrypt($request['password']);
            if (!$user->update($request->only(['name','username','email','password','member_id']))) {
              return redirect()->back();
            }
        }else{
            if (!$user->update($request->only(['name','username','email','member_id']))) {
            return redirect()->back();
            }
        }
      }

Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menyimpan $member->name"
]);

return redirect()->route('members.index');
    }


    public function destroy(Request $request, $id)
    {
      $member = Member::find($id);
      $photo = $member->photo;
      if (!$member->delete()) return redirect()->back();
      //handle deleting books via ajax
      if ($request->ajax()) return response()->json(['id' => $id]);
      //hapus cover jika ada
      $this->deletePhoto($photo);
      Session::flash("flash_notification",[
        "level" => "success",
        "message" => "$member->name berhasil dihapus"
      ]);
      return redirect()->route('members.index');
    }

    private function deletePhoto($photo)
    {
      if ($photo) {
      $old_photo = $photo;
      $filepath = public_path().DIRECTORY_SEPARATOR.'img/members_photo'.DIRECTORY_SEPARATOR.$photo;

      try {
        File::delete($filepath);
      } catch (FileNotFoundException $e) {
        //file sudah dihapus/tidak ada
      }
    }
    }

    public function printCard($id)
    {

      
      $members = Member::find($id);
      // dd($members);
      if (!$members) {
        Session::flash("flash_notification",[
          "level" => "danger",
          "message" => "Gagal mencetak kartu!"
        ]);
        return redirect()->back();
      }else {
        $pdf = PDF::loadview('pdf.members-card', compact('members'));
        return $pdf->stream("members-card.pdf", array("Attachment" => false));
      }

    }
}
