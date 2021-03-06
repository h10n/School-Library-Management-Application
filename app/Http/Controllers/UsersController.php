<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UsersRequest;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Traits\FlashNotificationTrait;
use App\Role;
use App\Traits\UploadFileTrait;

class UsersController extends Controller
{
  use FlashNotificationTrait, UploadFileTrait;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, Builder $htmlBuilder)
  {
    if ($request->ajax()) {
      $items = User::whereHas('roles', function ($q) {
        $q->where('name', '!=', 'member');
      })->latest('updated_at')->get();
      return Datatables::of($items)
        ->addColumn('action', function ($item) {
          return view('datatable._carousel-action', [
            'model' => $item,
            'form_url' => route('users.destroy', $item->id),
            'edit_url' => route('users.edit', $item->id),
            'title' => 'Pengguna'            
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
        'data' => 'username',
        'name' => 'username',
        'title' => 'Username'
      ])
      ->addColumn([
        'data' => 'role_name',
        'name' => 'role_name',
        'title' => 'Role',
      ])
      ->addColumn([
        'data' => 'action',
        'name' => 'action',
        'title' => '',
        'orderable' => false,
        'searchable' => false
      ]);
    return view('users.index')->with(compact('html'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UsersRequest $request)
  {
    $request['password'] = bcrypt($request->password);
    $user = User::create($request->all());

    if ($user) {
      $this->uploadFile($request, $user, 'photo_file', 'photo', 'user');
      $role = Role::where('name', '=', $request->role)->first();
      $user->attachRole($role);
      $this->sendFlashNotification('menambah', $user->username);
    }

    return redirect()->route('users.index');
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

  public function profile()
  {
    $item = auth()->user();
    return view('users.profile', ['item' => $item]);
  }

  public function editPassword()
  {
    $item = auth()->user();
    return view('users.password-edit', ['item' => $item]);
  }
  public function updatePassword(ChangePasswordRequest $request)
  {
    $item = auth()->user();
    $item->update(['password' => bcrypt($request->new_password)]);
    return view('users.profile', ['item' => $item]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $item = User::findOrFail($id);
    return view('users.edit', compact('item'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UsersRequest $request, User $user)
  {
    if ($user->update($request->except(['role', 'password']))) {
      if ($request->password) {
        $user->update([
          'password' => bcrypt($request->password)
        ]);
      }

      $this->uploadFile($request, $user, 'photo_file', 'photo', 'user');
      $role = Role::where('name', '=', $request->role)->first();
      $user->detachRoles($user->roles);
      $user->attachRole($role);
      $this->sendFlashNotification('mengubah', $user->username);
    }

    return redirect()->route('users.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $item = User::findOrFail($id);
    if (!$item->delete()) return redirect()->back();
    $this->deleteFile('user', $item->photo);
    $this->sendFlashNotification('menghapus', $item->username);
    return redirect()->route('users.index');
  }
}
