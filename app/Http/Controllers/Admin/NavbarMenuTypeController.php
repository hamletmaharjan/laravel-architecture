<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\NavbarMenuType;
use App\Repository\Modules\NavbarMenuTypeRepository;
use App\Http\Requests\Modules\NavbarMenuTypeRequest;

class NavbarMenuTypeController extends Controller
{


    private $navbarMenuTypeRepository;

    public function __construct(NavbarMenuTypeRepository $navbarMenuTypeRepository){
        $this->navbarMenuTypeRepository = $navbarMenuTypeRepository;
    }


    public function index(){
        $navbarMenuTypes = $this->navbarMenuTypeRepository->all();
        return view('backend.modules.navbarMenuTypes.index', compact('navbarMenuTypes'));
    }

    public function store(NavbarMenuTypeRequest $request) {
        
      // dd($request);
        try{
            $create = NavbarMenuType::create($request->all());
            
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
            $edits = $this->navbarMenuTypeRepository->findById($id);
            if ($edits->count() > 0)
            {
                $navbarMenuTypes = $this->navbarMenuTypeRepository->all();
                return view('backend.modules.navbarMenuTypes.index', compact('edits','navbarMenuTypes'));
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

    public function update(NavbarMenuTypeRequest $request, $id) {
        // dd($request);
        $id = (int)$id;
        try{
            $navbarMenuType = $this->navbarMenuTypeRepository->findById($id);
            
            if($navbarMenuType){
                $navbarMenuType->fill($request->all())->save();
                session()->flash('success','NavbarMenuType updated successfully!');

                return redirect(route('admin.navbarMenuTypes.index'));
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
            $value = $this->navbarMenuTypeRepository->findById($id);
            $value->delete();
            session()->flash('success','NavbarMenuType successfully deleted!');
            return back();

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }
}
