<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Carousel;
use App\Http\Requests\CarouselRequest;
use App\Traits\FlashNotificationTrait;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    use FlashNotificationTrait,UploadFileTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*  public function index()
      {
        $carousels = Carousel::orderby('id', 'desc')->paginate(10);
        return view('carousels.index', compact('carousels')); //sementara view nya gk usah dipisah
      }*/
    //index with htmlBuilder

    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $carousels = Carousel::select(['id','title','text','img'])->latest('updated_at')->get();
            return Datatables::of($carousels)
    ->addColumn('image', function ($carousels) {
        if (!$carousels->img) {
            return '';
        }
        return view('carousels.img', ['imgcarousel' => $carousels->img]);
    })
    ->addColumn('action', function ($carousel) {
        return view('datatable._carousel-action', [
        'model' => $carousel,
        'form_url' => route('carousels.destroy', $carousel->id),
        'edit_url' => route('carousels.edit', $carousel->id),
        'title' => 'Slider',
        'confirm_message' => 'Yakin ingin menghapus '.$carousel->title.' ?'
      ]);
    })
    ->rawColumns(['image','action'])
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
  ->addColumn(['data' => 'title', 'name' => 'title', 'title' => 'Judul'])
  ->addColumn(['data' => 'text', 'name' => 'text', 'title' => 'Isi'])
  ->addColumn(['data' => 'image', 'name' => 'image', 'title' => 'Gambar','orderable' => false, 'searchable' => false])
  ->addColumn(['data' => 'action','name' => 'action','title' => '','orderable' => false,'searchable' => false]);
        return view('carousels.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carousels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarouselRequest $request)
    {     
        $carousel = Carousel::create($request->all());
        $this->uploadFile($request, $carousel, 'img_file', 'img', 'slider');
        // $carousel = new Carousel;
        // $carousel->title = $request->input('title');
        // $carousel->text = $request->input('text');
        // if ($request->hasFile('img')) {
        //     $img = $request->file('img');
        //     $filename = 'slide' . '-' . time() . '.' . $img->getClientOriginalExtension();
        //     $location = public_path('img/slider/');
        //     $request->file('img')->move($location, $filename);

        //     $carousel->img = $filename;
        // }
        // $carousel->save();


        $this->sendFlashNotification('menambah', $carousel->title);
        return redirect()->route('carousels.index');
    }
    
    // protected function uploadPhoto($request, $model, $tmpFileField, $fileField, $dir){
    //     if ($request->$tmpFileField) {
    //       $oldfilename = $model->$fileField;
    //       $fileName = $this->upload($dir, $request->$tmpFileField, $oldfilename);
    //       if ($fileName) {
    //           $model->$fileField = $fileName;
    //           $model->save();
    //       }            
    //   }
    //   }
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
        $carousel = Carousel::findOrFail($id);
        return view('carousels.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarouselRequest $request, $id)
    {
        $carousel = Carousel::find($id);                    
        if ($carousel->update($request->all())) {            
            $this->uploadFile($request, $carousel, 'img_file', 'img', 'slider');
            $this->sendFlashNotification('mengubah', $carousel->title);
        }

        // if ($request->hasFile('img')) {
        //     $img = $request->file('img');
        //     $filename = 'slide' . '-' . time() . '.' . $img->getClientOriginalExtension();
        //     $location = public_path('img/slider');
        //     $request->file('img')->move($location, $filename);

        //     $oldFilename = $carousel->img;
        //     $carousel->img= $filename;
        //     $carousel->save();

        //     if (!empty($carousel->img)) {
        //         Storage::delete($oldFilename);
        //     }
        // }

        return redirect()->route('carousels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Carousel::findOrFail($id);
        Storage::delete($item->img);
        if(!$item->delete()) return redirect()->back(); 
        $this->deleteFile('slider', $item->img);
        $this->sendFlashNotification('menghapus', $item->title);
        return redirect()->route('carousels.index');
    }
}
