<?php
use Illuminate\Http\Request;
use App\Model\SysDirectory;
use App\Model\SysDirectoryName;
use App\Model\Reserve;
use App\Model\Object;
use App\Model\Event;
use App\Model\Comment;
use App\User;
use App\Model\ObjectScoreVote;

Route::get('get-city-ar', function () {
    $elems = SysDirectoryName::where('parent_id', 1)->select('id', 'name')->orderBy('id', 'asc')->get()->toJson();
    echo $elems;
});

Route::get('get-ar-directory', function () {
    $elems = SysDirectory::select('id', 'name')->orderBy('id', 'asc')->get()->toJson();
    echo $elems;
});

Route::get('get-ar-directory-elem/{id?}', function ($id = 0) {
    $elems = SysDirectoryName::select('id', 'name');

    if ($id)
        $elems = $elems->where('parent_id', $id);

    $elems = $elems->orderBy('id', 'asc')->get()->toJson();
    echo $elems;
});

Route::get('get-ar-object/{id?}', function (Request $request, $id = 0) {
    if ($id)
        $items = Object::where('id', $id);
    else
        $items = Object::where('id', '>', 0);

    if ($request->has('name')){
        //echo $request->input('name'); exit();
        $items = $items->where('name', 'like', '%'.$request->input('name').'%');
    }


    if ($request->has('tag')){
        $items = $items->whereHas('relTag', function($q) use ($request){
            $q->where('note', 'like', '%'.$request->input('tag').'%');
        });
    }


    if ($request->has('cat_id'))
        $items = $items->where('cat_id', $request->input('cat_id'));

    if ($request->has('city_id'))
        $items = $items->where('city_id', $request->input('city_id'));

    if ($request->has('avg_price_id') || $request->has('price_for_hout')){
        $items = $items->whereHas('relStandartData', function($q) use ($request) {
            if ($request->has('avg_price_id'))
                $q = $q->where('avg_price_id', $request->input('avg_price_id'));

            if ($request->has('price_for_hout'))
                $q = $q->where('price_for_hout', $request->input('price_for_hout'));
        });
    }

    if ($request->has('main_option_id')){
        $items = $items->whereHas('relMainOptions', function($q) use ($request) {
            if (is_array($request->input('specail_option_id')))
                $q = $q->whereIn('option_id', $request->input('main_option_id'));
            else
                $q = $q->where('option_id', $request->input('main_option_id'));
        });
    }

    if ($request->has('specail_option_id') && $request->input('specail_option_id')!='all'){
        $items = $items->whereHas('relSpecialOption', function($q) use ($request) {
            if (is_array($request->input('specail_option_id')))
                $q = $q->whereIn('option_id', $request->input('specail_option_id'));
            else
                $q = $q->where('option_id', $request->input('specail_option_id'));
        });
    }

    if ($request->has('specail_option_sys_key')){
        $items = $items->whereHas('relSpecialOption', function($q) use ($request) {
            if (is_array($request->input('specail_option_sys_key')))
                $q = $q->whereIn('sys_key', $request->input('specail_option_sys_key'));
            else
                $q = $q->where('sys_key', $request->input('specail_option_sys_key'));
        });
    }
    /*
    print_r( $items->getBindings() );
    $items = $items->toSql();
    //

    dd($items); exit();
    */
    $items = $items->with('relMainOptions', 'relStandartData', 'relDopOption', 'relTag', 'relLocation', 'relScore',
                            'relSpecialOption', 'relUser', 'relNews', 'relComment', 'relEvent', 'relSlider', 'relGelerea')->paginate(12)->toJson();
    echo $items;
});

Route::get('get-object-event', function (Request $request) {
    $items = Event::where('is_active', 1);

    if ($request->has('city_id'))
        $items = $items->where('city_id', $request->input('city_id'));

    echo $items->get()->toJson();
});

Route::get('get-object-news/{id}', function ($id) {
    $object = Object::findOrFail($id);
    $news = $object->relNews()->get()->toJson();

    echo $news;
});

Route::get('get-object-comment/{id}', function ($id) {
    $object = Object::findOrFail($id);
    $news = $object->relComment()->get()->toJson();

    echo $news;
});

Route::get('get-object-event/{id}', function ($id) {
    $object = Object::findOrFail($id);
    $news = $object->relEvent()->get()->toJson();

    echo $news;
});

Route::get('get-object-galerea/{id}', function ($id) {
    $object = Object::findOrFail($id);
    $news = $object->relGelerea()->get()->toJson();

    echo $news;
});

Route::post('post-add-reserver', function(Request $request){
    if (!$request->has('object_id') || !$request->has('name') || !$request->has('phone') || !$request->has('email') || !$request->has('enter_date'))
        abort(400);

    $object = Object::findOrFail($request->input('object_id'));

    $el = new Reserve;
    $el->object_id  = $object->id;
    $el->name       = $request->input('name');
    $el->phone      = $request->input('phone');
    $el->email	    = $request->input('email');
    $el->note       = $request->input('note');
    $el->enter_date = $request->input('enter_date');
    $el->enter_time = $request->input('enter_time');
    $el->save();

    echo '1';
});

Route::post('post-add-comment', function(Request $request){
    if (!$request->has('object_id') || !$request->has('title') || !$request->has('note') || !$request->has('mobile_device_id'))
        abort(400);

    $object = Object::findOrFail($request->input('object_id'));
    $user = User::where('login', $request->input('mobile_device_id'))->where('type_id', 5)->first();
    if (!$user){
        $user = new User();
        $user->login = $request->input('mobile_device_id');
        $user->type_id = 5;
        $user->save();
    }

    if (Comment::where('object_id', $object->id)->where('mobile_user_id', $user->id)->count() > 0)
        return '0';

    $el = new Comment;
    $el->mobile_user_id = $user->id;
    $el->object_id  = $object->id;
    $el->title      = $request->input('title');
    $el->note       = $request->input('note');
    $el->had_answer = 0;
    $el->parent_id  = 0;
    $el->save();

    echo '1';
});

Route::post('post-raiting', function(Request $request){
    if (!$request->has('object_id') || !$request->has('score_val') || !$request->has('mobile_device_id'))
        abort(400);

    $object = Object::findOrFail($request->input('object_id'));
    $score = $object->relScore;
    if (!$score)
        abort(404);

    $user = User::where('login', $request->input('mobile_device_id'))->where('type_id', 5)->first();
    if (!$user){
        $user = new User();
        $user->login = $request->input('mobile_device_id');
        $user->type_id = 5;
        $user->save();
    }

    if (ObjectScoreVote::where('object_id', $object->id)->where('mobile_user_id', $user->id)->count() > 0)
        return '0';


    $vote = new ObjectScoreVote();
    $vote->object_id = $object->id;
    $vote->score_id = $score->id;
    $vote->is_admin = 0;
    $vote->mobile_user_id = $user->id;
    $vote->score_val = $request->input('score_val');
    $vote->save();

    $score->score_sum = $score->score_sum + $vote->score_val;
    $score->score_count = $score->score_count + 1;
    $score->score_avg = $score->score_sum / $score->score_count;
    $score->save();

    $object->raiting = round($score->score_avg, 2);
    $object->save();

    echo '1';
});
