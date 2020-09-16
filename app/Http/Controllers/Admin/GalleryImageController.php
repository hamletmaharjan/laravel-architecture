<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\ImageRepository;
use Illuminate\Support\Facades\File;
use App\Models\Modules\GalleryImage;
use App\Repository\Modules\GalleryImageRepository;
use App\Repository\Modules\GalleryRepository;
use App\Http\Requests\Modules\GalleryImageRequest;
use App\Models\Modules\Gallery;

class GalleryImageController extends Controller
{
    private $imageRepository;
    private $galleryImageRepository;
    private $galleryRepository;

    public function __construct(ImageRepository $imageRepository,
    GalleryImageRepository $galleryImageRepository,
    GalleryRepository $galleryRepository){
        $this->imageRepository = $imageRepository;
        $this->galleryImageRepository = $galleryImageRepository;
        $this->galleryRepository = $galleryRepository;
    }

    public function index(){
        $galleryImages = $this->galleryImageRepository->all();
        $galleries = $this->galleryRepository->all();
        return view('backend.modules.galleryImages.index', compact('galleryImages','galleries'));
    }

    public function store(GalleryImageRequest $request) {
        
       
        try{
            $input = $request->except('image');
        
            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = $this->imageRepository->moveImageWithName($image, 'galleryImages');
                $input['image'] = $imageName;
            }
            
            $create = GalleryImage::create($input);
            
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

    public function show($id) {
        $galleryImage = $this->galleryImageRepository->findById($id);
        return view('backend.modules.galleryImages.show', compact('galleryImage'));
    }

    public function edit($id) {
        // dd($id);
        try{
            $id = (int)$id;
            $edits = $this->galleryImageRepository->findById($id);
            if ($edits->count() > 0)
            {
                $galleryImages = $this->galleryImageRepository->all();
                $galleries = $this->galleryRepository->all();
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

    public function update(GalleryImageRequest $request, $id) {
        
        $id = (int)$id;
        try{
            $galleryImage =  $this->galleryImageRepository->findById($id);
            $input = $request->except('image');
            $imagePath = public_path()."/uploads/galleryImages/".$galleryImage->image;
        
            if($request->hasFile('image')){
                if(File::exists($imagePath)) {
                    File::delete($imagePath);
                }
    
                $image = $request->file('image');
                $imageName = $this->imageRepository->moveImageWithName($image, 'galleryImages');
                $input['image'] = $imageName;
            }
            
            if($galleryImage){
                $galleryImage->fill($input)->save();
                session()->flash('success','Gallery Image updated successfully!');

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
            $value = $this->galleryImageRepository->findById($id);
            $imagePath = public_path()."/uploads/galleryImages/".$value->image;
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $value->delete();
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
