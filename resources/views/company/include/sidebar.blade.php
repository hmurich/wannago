<section class="sidebar">
    <ul class="sidebar-menu">
        <li>
            <a href="{{ action('Company\NewObjectController@getIndex') }}">
                <i class="fa fa-pencil-square-o"></i> <span>Заявки </span>
            </a>
        </li>
        <li>
            <form action='{{ action("Company\AuthController@postChangeObject") }}' method='post'>
                <select name='object_id' class='form-control js_change_object' required="">
                    @foreach (App\Model\Object::where('user_id', Auth::user()->id)->orderBy('name', 'id')->with('relCat')->get() as $o)
                        @if (session()->has('object_id') && session()->get('object_id') == $o->id)
                            <option value="{{ $o->id }}" selected="">{{ $o->relCat->name }} "{{ $o->name }}"</option>
                        @else
                            <option value="{{ $o->id }}">{{ $o->relCat->name }} "{{ $o->name }}"</option>
                        @endif
                    @endforeach
                </select>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </li>
        <li>
            <a href="{{ action('Company\EditController@getIndex') }}">
                <i class="fa fa-pencil-square-o"></i> <span>Описание</span>
            </a>
        </li>
        <li>
            <a href="{{ action('Company\NewsController@getIndex') }}">
                <i class="fa fa-pencil-square-o"></i> <span>Новости</span>
            </a>
        </li>
        <li>
            <a href="{{ action('Company\EventController@getIndex') }}">
                <i class="fa fa-pencil-square-o"></i> <span>События</span>
            </a>
        </li>
        <li>
            <a href="{{ action('Company\CommentController@getIndex') }}">
                <i class="fa fa-pencil-square-o"></i> <span>Отзывы</span>
            </a>
        </li>
        <li>
            <a href="{{ action('Company\ReserveController@getIndex') }}">
                <i class="fa fa-pencil-square-o"></i> <span>Бронирование</span>
            </a>
        </li>

    </ul>
</section>
