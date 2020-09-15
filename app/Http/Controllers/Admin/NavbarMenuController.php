<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\NavbarMenu;
use App\Models\Modules\NavbarMenuType;
use App\Repository\Modules\NavbarMenuRepository;
use App\Repository\Modules\NavbarMenuTypeRepository;
use App\Http\Requests\Modules\NavbarMenuRequest;

class NavbarMenuController extends Controller
{

    private $navbarMenuRepository;
    private $navbarMenuTypeRepository;
    public function __construct(NavbarMenuRepository $navbarMenuRepository,
                                NavbarMenuTypeRepository $navbarMenuTypeRepository){
        $this->navbarMenuTypeRepository = $navbarMenuTypeRepository;
        $this->navbarMenuRepository = $navbarMenuRepository;
    }

    public function index(){
        $navbarMenus = $this->navbarMenuRepository->all();
        $navbarMenuTypes = $this->navbarMenuTypeRepository->all();
        // $parentMenus = NavbarMenu::where('parent_id','=',0)->get();
        return view('backend.modules.navbarMenus.index', compact('navbarMenus', 'navbarMenuTypes'));
    }

    public function store(NavbarMenuRequest $request) {

        try{
            $create = NavbarMenu::create($request->all());
            
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
            $edits = $this->navbarMenuRepository->findById($id);
            if ($edits->count() > 0)
            {
                $navbarMenus = $this->navbarMenuRepository->all();
                $navbarMenuTypes = $this->navbarMenuTypeRepository->all();
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

    public function update(NavbarMenuRequest $request, $id) {

        // dd($request);

        $id = (int)$id;
        try{
            $navbarMenu = $this->navbarMenuRepository->findById($id);
            
            if($navbarMenu){
                $navbarMenu->fill($request->all())->save();
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
            $value = $this->navbarMenuRepository->findById($id);
            $value->delete();
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
