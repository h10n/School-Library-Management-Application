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
    use FlashNotificationTrait, UploadFileTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $carousels = Carousel::select(['id', 'title', 'text', 'img'])->latest('updated_at')->get();
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
                        'title' => 'Slider'                        
                    ]);
                })
                ->rawColumns(['image', 'action'])
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
            ->addColumn(['data' => 'image', 'name' => 'image', 'title' => 'Gambar', 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false]);
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
        $this->sendFlashNotification('menambah', $carousel->title);
        return redirect()->route('carousels.index');
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
        if (!$item->delete()) {
            return redirect()->back();
        }
        $this->deleteFile('slider', $item->img);
        $this->sendFlashNotification('menghapus', $item->title);
        return redirect()->route('carousels.index');
    }
}
