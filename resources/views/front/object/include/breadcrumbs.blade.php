<li><a href="/">Главная</a></li>
<li><a href="{{ action("Front\CatalogController@getIndex", $object->cat_id) }}">{{ $ar_object_type[$object->cat_id] }}</a></li>
<li><span>{{ $object->name }}</span></li>
