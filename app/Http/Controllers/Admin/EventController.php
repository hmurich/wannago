<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Event;

class EventController extends Controller{
    function getIndex (Request $request, $is_active = 0){
        $items = Event::where('is_active', $is_active);

        $ar = array();

        if (!$is_active)
            $ar['title'] = 'События на модерации';
        else
            $ar['title'] = 'События одобренные';

        $ar['items'] = $items->with('relObject')->orderBy('id', 'asc')->paginate(24);

        return view('admin.event.index', $ar);
    }

    function getActive($event_id){
        $event = Event::findOrFail($event_id);
        $event->is_active = ($event->is_active	? 0 : 1);
        $event->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getHot($event_id){
        $event = Event::findOrFail($event_id);
        $event->is_hot = ($event->is_hot ? 0 : 1);
        $event->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getDelete( $event_id){
        $event = Event::findOrFail($event_id);
        $event->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
