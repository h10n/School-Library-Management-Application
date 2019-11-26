<?php

namespace App\Http\Controllers;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class VisitorsController extends Controller
{
  public function store(Request $request)
  {
    $this->validate($request,[
      'no_induk' => 'required',
      'name' => 'required',
      'keperluan' => 'required',
      'jenis_anggota' => 'required',
      'kelas' => 'nullable|required_unless:jenis_anggota,guru/staff|in:X,XI,XII'
    ]);

    //required_unless:jenis_anggota,guru/staff
      $visitor = Visitor::create($request->only('no_induk','name','keperluan','jenis_anggota','kelas'));
      Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Terimakasih $visitor->name, Selamat $visitor->keperluan !"
      ]);
      return redirect()->back();

  }
}
