<div class="header-bot">
	<div class="inner">
		<ul class="zaved-nav">
			<li class="zaved-nav__li {{ (isset($menu_cat) && $menu_cat->id == 9 ? 'zaved-nav__li--active' : null) }}">
				<a href="{{ action("Front\CatalogController@getIndex", 9) }}">
					Пабы,бары
				</a>
			</li>
			<li class="zaved-nav__li {{ (isset($menu_cat) && $menu_cat->id == 23 ? 'zaved-nav__li--active' : null) }}">
				<a href="{{ action("Front\CatalogController@getIndex", 23) }}">
					Караоке
				</a>
			</li>
			<li class="zaved-nav__li {{ (isset($menu_cat) && $menu_cat->id == 24 ? 'zaved-nav__li--active' : null) }}">
				<a href="{{ action("Front\CatalogController@getIndex", 24) }}">
					Кофейни
				</a>
			</li>
			<li class="zaved-nav__li {{ (isset($menu_cat) && $menu_cat->id == 28 ? 'zaved-nav__li--active' : null) }}">
				<a href="{{ action("Front\CatalogController@getIndex", 28) }}">
					Ночные клубы
				</a>
			</li>
			<li class="zaved-nav__li {{ (isset($menu_cat) && $menu_cat->id == 25 ? 'zaved-nav__li--active' : null) }} zaved-nav__li--right">
				<a href="{{ action("Front\CatalogController@getIndex", 25) }}">
					Кафе
				</a>
			</li>
			<li class="zaved-nav__li {{ (isset($menu_cat) && $menu_cat->id == 29 ? 'zaved-nav__li--active' : null) }} zaved-nav__li--right">
				<a href="{{ action("Front\CatalogController@getIndex", 29) }}">
					Летние площадки
				</a>
			</li>
			<li class="zaved-nav__li {{ (isset($menu_cat) && $menu_cat->id == 27 ? 'zaved-nav__li--active' : null) }} zaved-nav__li--right">
				<a href="{{ action("Front\CatalogController@getIndex", 27) }}">
					Банкетные залы
				</a>
			</li>
			<li class="zaved-nav__li {{ (isset($menu_cat) && $menu_cat->id == 26 ? 'zaved-nav__li--active' : null) }} zaved-nav__li--right">
				<a href="{{ action("Front\CatalogController@getIndex", 26) }}">
					Рестораны
				</a>
			</li>
		</ul>
		<div class="right-search">
			<form action="{{ action('Front\SearchController@getIndex') }}">
				<input class="right-search__input" name='name' type="search" placeholder="название заведения">
				<input class="right-search__submit" type="submit">
			</form>
		</div>
	</div>
</div>
