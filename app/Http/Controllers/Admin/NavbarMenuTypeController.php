<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\NavbarMenuType;

class NavbarMenuTypeController extends Controller
{
    public function index(){
        $navbarMenuTypes = NavbarMenuType::get();
        return view('backend.modules.navbarMenuTypes.index', compact('navbarMenuTypes'));
    }

    public function store(Request $request) {

      // dd($request);
        try{
            $navbarMenuType = new NavbarMenuType();
            $navbarMenuType->type_name = $request->type_name;
            
            if($navbarMenuType->save()){
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
            $edits = NavbarMenuType::findOrFail($id);
            if ($edits->count() > 0)
            {
                $navbarMenuTypes = NavbarMenuType::get();
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

    public function update(Request $request, $id) {

        // dd($request);
        $id = (int)$id;
        try{
            $navbarMenuType = NavbarMenuType::findOrFail($id);
            $navbarMenuType->type_name = $request->type_name;
            
            if($navbarMenuType->save()){
               
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
            $navbarMenuType = NavbarMenuType::findOrFail($id);
            $navbarMenuType->delete();
            session()->flash('success','NavbarMenuType successfully deleted!');
            return back();

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }
}
