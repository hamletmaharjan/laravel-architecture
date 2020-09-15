<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\Gallery;
use App\Repository\Modules\GalleryRepository;
use App\Http\Requests\Modules\GalleryRequest;

class GalleryController extends Controller
{
    
    private $galleryRepository;

    public function __construct(GalleryRepository $galleryRepository){
        $this->galleryRepository = $galleryRepository;
    }


    public function index(){
        $galleries = $this->galleryRepository->all();
        return view('backend.modules.galleries.index', compact('galleries'));
    }

    public function store(GalleryRequest $request) {
      
        try{
            $create = Gallery::create($request->all());
            
            if($create){
                session()->flash('success','Successfully created!');
                return back();
            }else{
                session()->flash('error','Could not be created!');
                return back();
            }
        }catch (\Exception $e){
            $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
    }

    public function edit($id) {
        // dd($id);
        try{
            $id = (int)$id;
            $edits = $this->galleryRepository->findById($id);
            if ($edits->count() > 0)
            {
                $galleries = $this->galleryRepository->all();
                return view('backend.modules.galleries.index', compact('edits','galleries'));
            }
            else{
                session()->flash('error','Id could not be obtained!');
                return back();
            }

        }catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }

    public function update(GalleryRequest $request, $id) {
        
        // dd($request);
        $id = (int)$id;
        try{
            $gallery = $this->galleryRepository->findById($id);

            if($gallery){
                $gallery->fill($request->all())->save();
                session()->flash('success','Gallery updated successfully!');

                return redirect(route('admin.galleries.index'));
            }else{

                session()->flash('error','No record with given id!');
                return back();
            }
        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION:'.$exception);
            return back();
        }
    }

    public function destroy($id) {
    //    dd($id);
        $id=(int)$id;
        try{
            $value = $this->galleryRepository->findById($id);
            $value->delete();
            session()->flash('success','Gallery successfully deleted!');
            return back();

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }

    public function getImages($id) {
        $gallery = Gallery::findOrFail($id);
        $galleryImages = $gallery->galleryImages()->where('status', 'active')->orderBy('display_order','asc')->get();
        return view('front.galleries.show', compact('gallery', 'galleryImages'));
    }
}
