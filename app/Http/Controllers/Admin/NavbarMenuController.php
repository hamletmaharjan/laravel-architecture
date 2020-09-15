<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\NavbarMenu;
use App\Models\Modules\NavbarMenuType;

class NavbarMenuController extends Controller
{
    public function index(){
        $navbarMenus = NavbarMenu::get();
        $navbarMenuTypes = NavbarMenuType::get();
        // $parentMenus = NavbarMenu::where('parent_id','=',0)->get();
        //dd($parentMenus);
        return view('backend.modules.navbarMenus.index', compact('navbarMenus', 'navbarMenuTypes'));
    }

    public function store(Request $request) {

        $request->validate([
            'menu_name' => ['required', 'max:30'],
            'page_slug' => ['required']
        ]);
        
        try{
            $navbarMenu = new NavbarMenu();
            $navbarMenu->menu_name = $request->menu_name;
            $navbarMenu->navbar_menu_type_id = $request->navbar_menu_type_id;
            $navbarMenu->page_slug = $request->page_slug;
            $navbarMenu->parent_id = $request->parent_id;
            $navbarMenu->status = $request->status;
            
            if($navbarMenu->save()){
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
            $edits = NavbarMenu::findOrFail($id);
            if ($edits->count() > 0)
            {
                $navbarMenus = NavbarMenu::get();
                $navbarMenuTypes = NavbarMenuType::get();
                // $parentMenus = NavbarMenu::where('parent_id',0)->get();
                return view('backend.modules.navbarMenus.index', compact('edits','navbarMenus','navbarMenuTypes'));
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

        $request->validate([
            'menu_name' => ['required', 'max:30'],
            'page_slug' => ['required']
        ]);

        $id = (int)$id;
        try{
            $navbarMenu = NavbarMenu::findOrFail($id);
            $navbarMenu->menu_name = $request->menu_name;
            $navbarMenu->navbar_menu_type_id = $request->navbar_menu_type_id;
            $navbarMenu->page_slug = $request->page_slug;
            $navbarMenu->parent_id = $request->parent_id;
            $navbarMenu->status = $request->status;
            
            if($navbarMenu->save()){
               
                session()->flash('success','NavbarMenu updated successfully!');

                return redirect(route('admin.navbarMenus.index'));
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
            $navbarMenu = NavbarMenu::findOrFail($id);
            $navbarMenu->delete();
            session()->flash('success','NavbarMenu successfully deleted!');
            return back();

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }

    public function status($id) {
        try {
            $id = (int)$id;
            $navbarMenu = NavbarMenu::findOrFail($id);

            if ($navbarMenu->status == 'inactive') {
                $navbarMenu->status = 'active';
                $navbarMenu->save();
                session()->flash('success', 'NnavbarMenu has been Activated!');
                return back();
            } else {
                $navbarMenu->status = 'inactive';
                $navbarMenu->save();
                session()->flash('success', 'NavbarMenu Year has been Deactivated!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }
}
