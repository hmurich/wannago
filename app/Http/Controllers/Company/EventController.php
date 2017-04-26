<?php
namespace App\Http\Controllers\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Object;
use App\Model\Event;
use App\Model\Generators\ModelSnipet;

class EventController extends Controller{
    function getIndex(Request $request){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $items = Event::where('object_id', $object->id);

        $ar = array();
        $ar['title'] = 'События "'.$object->name.'"';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);

        return view('company.event.index', $ar);
    }

    function getDeleteImage(Request $request, $id){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $item = Event::where('id', $id)->where('object_id', $object->id)->first();
        if (!$item)
            abort(404);

        $item->image = null;
        $item->save();

        return redirect()->back()->with('success', 'Удалено');
    }

    function getItem(Request $request, $id = 0){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $item = Event::where('id', $id)->where('object_id', $object->id)->first();

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавить событие';
            $ar['action'] = action('Company\EventController@postItem');
        }
        else {
            $ar['title'] = 'Редактировать событие';
            $ar['action'] = action('Company\EventController@postItem', $item->id);
            $ar['item'] = $item;
        }


        return view('company.event.item', $ar);
    }

    function postItem(Request $request, $id = 0){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $item = Event::where('id', $id)->where('object_id', $object->id)->first();
        if (!$item){
            $item = new Event();
            $item->object_id = $object->id;
        }
        if ($request->hasFile('image'))
            $item->image = ModelSnipet::setImage($request->file('image'), 'image-event', 800, 600);

        $item->title = $request->input('title');
        $item->note = $request->input('note');
        $item->date_event = $request->input('date_event');
        $item->time_event = $request->input('time_event');
        $item->duration = $request->input('duration');
        $item->save();

        return redirect()->action('Company\EventController@getIndex')->with('success', 'Сохранено');
    }

    function getDelete(Request $request, $id){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $item = Event::where('id', $id)->where('object_id', $object->id)->first();
        if (!$item)
            abort(404);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
