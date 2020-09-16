<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\Modules\EventRepository;
use App\Http\Requests\Modules\EventRequest;
use App\Models\Modules\Event;

class EventController extends Controller
{

    private $eventRepository;

    public function __construct(EventRepository $eventRepository){
        $this->eventRepository = $eventRepository;
    }


    public function index(){
        $events = $this->eventRepository->all();
        return view('backend.modules.events.index', compact('events'));
    }

    public function create() {
        return view('backend.modules.events.create');
    }

    public function store(EventRequest $request) {
        // dd($request);
        try{
            $input = $request->all();
            $input['user_id'] = Auth::user()->id;
            $create = Event::create($input);
            if($create){
                session()->flash('success','Event successfully created!');
                return redirect()->route('admin.events.index');
            }else{
                session()->flash('error','Event could not be created!');
                return back();
            }
        }catch (\Exception $e){
            $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
    }

    public function show($id) {
        $event = $this->eventRepository->findById($id);
        return view('backend.modules.events.show', compact('event'));
    }

    public function edit($id) {
        try{
            $id = (int)$id;
            $edits = $this->eventRepository->findById($id);
            if ($edits->count() > 0)
            {
                
                return view('backend.modules.events.edit', compact('edits'));
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

    public function update(EventRequest $request, $id) {
        
        $id = (int)$id;
        try{
            $event = $this->eventRepository->findById($id);

            if($event){
                $event->fill($request->all())->save();
                session()->flash('success','Event updated successfully!');

                return redirect(route('admin.events.index'));
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
      // dd($id);
        $id=(int)$id;
        try{
            $value = $this->eventRepository->findById($id);
            $value->delete();
            session()->flash('success','Event successfully deleted!');
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
            $event = Event::findOrFail($id);

            if ($event->status == 'inactive') {
                $event->status = 'active';
                $event->save();
                session()->flash('success', 'Event has been Activated!');
                return back();
            } else {
                $event->status = 'inactive';
                $event->save();
                session()->flash('success', 'Event Year has been Deactivated!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }

    
}
