<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\Gallery;

class GalleryController extends Controller
{
    

    public function index(){
        $galleries = Gallery::get();
        return view('backend.modules.galleries.index', compact('galleries'));
    }

    public function store(Request $request) {
        $request->validate([
            'gallery_name' => ['required', 'max:30']
            
        ]);
      // dd($request);
        try{
            $gallery = new Gallery();
            $gallery->gallery_name = $request->gallery_name;
            
            if($gallery->save()){
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
            $edits = Gallery::findOrFail($id);
            if ($edits->count() > 0)
            {
                $galleries = Gallery::get();
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

    public function update(Request $request, $id) {
        $request->validate([
            'gallery_name' => ['required', 'max:30']
            
        ]);
        // dd($request);
        $id = (int)$id;
        try{
            $gallery = Gallery::findOrFail($id);
            $gallery->gallery_name = $request->gallery_name;
            
            if($gallery->save()){
               
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
            $gallery = Gallery::findOrFail($id);
            $gallery->delete();
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
