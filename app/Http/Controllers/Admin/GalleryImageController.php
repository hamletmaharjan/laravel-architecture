<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\ImageRepository;
use Illuminate\Support\Facades\File;
use App\Models\Modules\GalleryImage;
use App\Models\Modules\Gallery;

class GalleryImageController extends Controller
{
    private $imageRepository;


    public function __construct(ImageRepository $imageRepository){
        $this->imageRepository = $imageRepository;
    }

    public function index(){
        $galleryImages = GalleryImage::get();
        $galleries = Gallery::get();
        return view('backend.modules.galleryImages.index', compact('galleryImages','galleries'));
    }

    public function store(Request $request) {

    //    dd($request);
        try{
            $galleryImage = new GalleryImage();
            $galleryImage->title = $request->title;
            $galleryImage->display_order = $request->display_order;
            $galleryImage->gallery_id = $request->gallery_id;
            $galleryImage->status = $request->status;
            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = $this->imageRepository->moveImageWithName($image, 'galleryImages');
                //$location = public_path('user/images/'.$imageName);
                $galleryImage->image = $imageName;
            }
            //dd($post);
            
            
            if($galleryImage->save()){
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
            $edits = GalleryImage::findOrFail($id);
            if ($edits->count() > 0)
            {
                $galleryImages = GalleryImage::get();
                $galleries = Gallery::get();
                return view('backend.modules.galleryImages.index', compact('edits','galleryImages', 'galleries'));
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

        // dd($request);
        $id = (int)$id;
        try{
            $galleryImage =  GalleryImage::findOrFail($id);
            $galleryImage->title = $request->title;
            $galleryImage->display_order = $request->display_order;
            $galleryImage->gallery_id = $request->gallery_id;
            $galleryImage->status = $request->status;
            $imagePath = public_path()."/uploads/galleryImages/".$galleryImage->image;
        
            if($request->hasFile('image')){
                if(File::exists($imagePath)) {
                    File::delete($imagePath);
                }
    
                $image = $request->file('image');
                $imageName = $this->imageRepository->moveImageWithName($image, 'galleryImages');
                $galleryImage->image = $imageName;
            }
            
            if($galleryImage->save()){
               
                session()->flash('success','News updated successfully!');

                return redirect(route('admin.galleryImages.index'));
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
  
        $id=(int)$id;
        try{
            $galleryImage = GalleryImage::findOrFail($id);
            $imagePath = public_path()."/uploads/galleryImages/".$galleryImage->image;
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $galleryImage->delete();
            session()->flash('success','Gallery Image successfully deleted!');
            return back();

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }

    public function status($id)
    {
        try {
            $id = (int)$id;
            $galleryImage = GalleryImage::findOrFail($id);

            if ($galleryImage->status == 'inactive') {
                $galleryImage->status = 'active';
                $galleryImage->save();
                session()->flash('success', 'GalleryImage has been Activated!');
                return back();
            } else {
                $galleryImage->status = 'inactive';
                $galleryImage->save();
                session()->flash('success', 'GalleryImage has been Deactivated!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }
}
