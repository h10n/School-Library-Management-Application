<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Yajra\Datatables\Html\Builder;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Publisher;
use Yajra\Datatables\Datatables;
use Session;



class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
          $authors = Author::select(['id','name','singkatan']);
          return Datatables::of($authors)
          ->addColumn('action',function($author){
            return view('datatable._action',[
              'model' => $author,
              'form_url' => route('authors.destroy', $author->id),
              'edit_url' => route('authors.edit', $author->id),
              'title' => 'Penulis',
              'confirm_message' => 'Yakin ingin menghapus '.$author->name.' ?'
            ]);
          })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn([
          'data' => 'name',
          'name' => 'name',
          'title' => 'Nama'
        ])
        ->addColumn([
          'data' => 'singkatan',
          'name' => 'singkatan',
          'title' => 'Singkatan'
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
        //
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
        $author = Author::create($request->only('name','singkatan'));
        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil menyimpan $author->name"
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
        //
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
        $author->update($request->only('name','singkatan'));

        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil menyimpan $author->name"
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
        //
        if(!Author::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Penulis berhasi dihapus"
        ]);
          return redirect()->route('authors.index');

    }
    public function tes(){
      $penerbit = [
        'Prof.Dr. Slamet Muljana',
        'Prof.Dr. Slamet Muljana',
        'Leo agung, Dwi Ari L',
        'Louis Gottschalk',
        'Sadali',
        'I wayan Badrika',
        'I wayan Badrika',
        'I wayan Badrika',
        'Suka mitra kompetensi',
        'Siti Warida Q, Sunarto sunardi, Rubiyatno',
        'Sarbani B.A',
        'Sarbani. B. A',
        'prof Dr Sudarsono',
        'Winarno',
        'Winarno',
        'Magdalia Alfan, Nano Nurliana, Dkk',
        'Magdalia Alfan, Nano Nurliana, Dkk',
        'Magdalia Alfan, Nano Nurliana, Dkk',
        'S.Sartono,S.Pd, Sujito, BA, Drs. Bambang Sugeng M.',
        'Ratna Hapsari & M. Adil',
        'Ratna Hapsari & M. Adil',
        'Ratna Hapsari & M. Adil',
        'Samsul Farid',
        'Marlon Peranginangin, N,Otorino,Dkk',
        'poliyama',
        'Amin Suprihartini,S.pd',
        'Wahjudi Djaja',
        'Sidik kertapati',
        'Alam S. Henri Hidayat',
        'Sri Nuraini',
        'Sri Nuraini',
        'Nur wahyu Rohmadi',
        'Nur wahyu Rohmadi',
        'Endah Dumilah,DKK',
        'Endah Dumilah,DKK',
        'Atep Adya Barata,Dkk',
        'E. Juhana Wijaya',
        'Hamid Jabbar',
        'Endar wismulyani,S.Pd',
        'Anna Mariana',
        'Anna Mariana',
        'Wahjudi djaja',
        'winarti',
        'Johansyah Balham',
        'Sari Pusparini Soleh',
        'Sari Pusparini Soleh',
        'Sari Pusparini Soleh',
        'Sari Pusparini Soleh',
        'Sari Pusparini Soleh',
        'Sari Pusparini Soleh',
        'Sari Pusparini Soleh',
        'Sari Pusparini Soleh',
        'Sari Pusparini Soleh',
        'Bahrudin Supardi',
        'Bahrudin Supardi',
        'Bahrudin Supardi',
        'Bahrudin Supardi',
        'Bahrudin Supardi',
        'Bahrudin Supardi',
        'Bahrudin Supardi',
        'Bahrudin Supardi',
        'Bahrudin Supardi',
        'Ramadhan S. Pernyata',
        'Zaenuddin HM',
        'H. Syaharie Jaang, SH, M.Si',
        'H.M. Ridwan Tasa & Umar Vaturasi',
        '',
        'Drs. H. Achmad Amins, MM',
        'Suwelo Hadiwijoyo',
        'bartolomeus Samho',
        'Drs. Amrin Imran',
        'Paul Strathern',
        'Stave Parker',
        'Stave Parker',
        'Stave Parker',
        'Xu Zi Niaga',
        'Yin Lin Jun',
        'Rayani sriwidodo',
        'Suryati,Dkk',
        'Caroline arnold',
        'sari B.Kusumayudha',
        'sari B.Kusumayudha',
        'karmila',
        'westriningsih',
        'M.Th.kristianti',
        'K. Wardiyatmoko',
        'Bintang Indonesia Jakarta',              
      ];
      $hasil = "";
      // foreach ($penerbit as $key => $pb) {
      //   if (Publisher::where('name', $pb)->get(['id']) ->count() > 0 ) {
      //       $hasil .= Publisher::where('name', $pb)->pluck('id')[0]."<br>";
      //   }else{
      //     $hasil .= "<br>";
      //   }
      // }

      foreach ($penerbit as $key => $pb) {
        if (Author::where('name', $pb)->get(['id']) ->count() > 0 ) {
            $hasil .= Author::where('name', $pb)->pluck('id')[0]."<br>";
        }else{
          $hasil .= "<br>";
        }
      }
      return $hasil;
    }
}
