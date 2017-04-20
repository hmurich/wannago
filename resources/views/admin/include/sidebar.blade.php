<section class="sidebar">
    <ul class="sidebar-menu">
        <li class="header">Главное меню</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
            </ul>
        </li>
        <li>
            <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-green">new</small>
                </span>
            </a>
        </li>

        <li class="header">Справочники</li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-circle-o text-green"></i> <span>Оссобености</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ action('Admin\SpecailOption\PubController@getIndex') }}">
                        <i class="fa fa-circle-o text-green"></i> <span>Пабы и Бары</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\SpecailOption\KaraokeControlller@getIndex') }}">
                        <i class="fa fa-circle-o text-green"></i> <span>Караоке</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\SpecailOption\KofeController@getIndex') }}">
                        <i class="fa fa-circle-o text-green"></i> <span>Кофейни</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\SpecailOption\CafeController@getIndex') }}">
                        <i class="fa fa-circle-o text-green"></i> <span>Кафе</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\SpecailOption\RestoranController@getIndex') }}">
                        <i class="fa fa-circle-o text-green"></i> <span>Рестораны</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\SpecailOption\BanketController@getIndex') }}">
                        <i class="fa fa-circle-o text-green"></i> <span>Банкетные залы</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\SpecailOption\ClubController@getIndex') }}">
                        <i class="fa fa-circle-o text-green"></i> <span>Ночные клубы</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\SpecailOption\SummerResController@getIndex') }}">
                        <i class="fa fa-circle-o text-green"></i> <span>Летние площадки</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-circle-o text-yellow"></i> <span>Доп. св-ва</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ action('Admin\DopOption\PubController@getIndex') }}">
                        <i class="fa fa-circle-o text-yellow"></i> <span>Пабы и Бары</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\DopOption\KaraokeControlller@getIndex') }}">
                        <i class="fa fa-circle-o text-yellow"></i> <span>Караоке</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\DopOption\KofeController@getIndex') }}">
                        <i class="fa fa-circle-o text-yellow"></i> <span>Кофейни</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\DopOption\CafeController@getIndex') }}">
                        <i class="fa fa-circle-o text-yellow"></i> <span>Кафе</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\DopOption\RestoranController@getIndex') }}">
                        <i class="fa fa-circle-o text-yellow"></i> <span>Рестораны</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\DopOption\BanketController@getIndex') }}">
                        <i class="fa fa-circle-o text-yellow"></i> <span>Банкетные залы</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\DopOption\ClubController@getIndex') }}">
                        <i class="fa fa-circle-o text-yellow"></i> <span>Ночные клубы</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\DopOption\SummerResController@getIndex') }}">
                        <i class="fa fa-circle-o text-yellow"></i> <span>Летние площадки</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span>Остальные</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ action('Admin\CityController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Города</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\AvgPriceController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Средний счет</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\ObjectCatController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Категории заведений</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\PubTypeController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Типы пабов</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\KaraokeTypeController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Типы размешения караоке</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\KitchenController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Кухни</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\MusicController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Музыка</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\WhereGoController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Куда Сходить</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</section>
