<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Modules\Event;

class EventController extends Controller
{
    public function index(){
        $events = Event::get();
        return view('backend.modules.events.index', compact('events'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'max:30'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'venue' => ['required'],
        ]);
        // dd($request);
        try{
            $event = new Event();
            $event->title = $request->title;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->venue = $request->venue;
            $event->user_id = Auth::user()->id;
            $event->status = $request->status;
            
            
            if($event->save()){
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
        try{
            $id = (int)$id;
            $edits = Event::findOrFail($id);
            if ($edits->count() > 0)
            {
                $events = Event::get();
                return view('backend.modules.events.index', compact('edits','events'));
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
            'title' => ['required', 'max:30'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'venue' => ['required'],
        ]);
        // dd($request);
        $id = (int)$id;
        try{
            $event = Event::findOrFail($id);
            $event->title = $request->title;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->venue = $request->venue;
            $event->status = $request->status;
            if($event->save()){
               
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
            $event = Event::findOrFail($id);
            $event->delete();
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

    public function getAll() {
        $events = Event::where('status','active')->get();
        return view('front.events.index', compact('events'));
    }
}
