<section class="sidebar">
    <ul class="sidebar-menu">
        <li>
            <a href="{{ action('Admin\IndexController@getIndex') }}">
                <i class="fa  fa-desktop "></i> <span>Главная</span>
            </a>
        </li>

        <li>
            <a href="{{ action('Admin\NewObjectController@getIndex') }}">
                <i class="fa fa-arrow-right "></i> <span>Заявки</span>
            </a>
        </li>
        
        <li>
            <a href="{{ action('Admin\AnketaController@getIndex') }}">
                <i class="fa fa-arrow-right "></i> <span>Анкеты</span>
            </a>
        </li>

        <li>
            <a href="{{ action('Admin\Company\ListController@getIndex') }}">
                <i class="fa fa-users "></i> <span>Владельцы заведений</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-bullhorn"></i> <span>События</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ action('Admin\EventController@getIndex', 0) }}">
                        <i class="fa fa-question"></i> <span>На модерации</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\EventController@getIndex', 1) }}">
                        <i class="fa fa-check"></i> <span>Действующие</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-thumbs-o-up"></i> <span>Куда Сходить</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @foreach (App\Model\SysDirectoryName::where('parent_id', 8)->pluck('name', 'id') as $id=>$name)
                    <li>
                        <a href="{{ action('Admin\WhereGoController@getIndex', $id) }}">
                            <i class="fa fa-thumbs-o-up"></i> <span>{{ $name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
<!--         <li>
            <a href="{{ action('Admin\BannerController@getIndex') }}">
                <i class="fa fa-dollar "></i> <span>Баннеры(реклама)</span>
            </a>
        </li> -->
        <li>
            <a href="{{ action('Admin\PageController@getIndex') }}">
                <i class="fa fa-file-text-o "></i> <span>Страницы</span>
            </a>
        </li>

        <li class="header">Организации</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-plus"></i> <span>Добавить</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @foreach (App\Model\SysDirectoryName::where('parent_id', 3)->pluck('name', 'id') as $id=>$name)
                    <li>
                        <a href="{{ action('Admin\Object\AddController@getIndex', $id) }}">
                            <i class="fa fa-plus"></i> <span>{{ $name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-list-ul"></i> <span>Список</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @foreach (App\Model\SysDirectoryName::where('parent_id', 3)->pluck('name', 'id') as $id=>$name)
                    <li>
                        <a href="{{ action('Admin\Object\ListController@getIndex', $id) }}">
                            <i class="fa fa-list-ul"></i> <span>{{ $name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="header">Справочники</li>

        <li>
            <a href="{{ action('Admin\Directory\ModeratorController@getIndex') }}">
                <i class="fa fa-circle-o text-red"></i> <span>Модераторы</span>
            </a>
        </li>

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
                    <a href="{{ action('Admin\Directory\AstanaAreaController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Районы Астаны</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\Directory\CityController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Города</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\Directory\AvgPriceController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Средний счет</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\Directory\ObjectCatController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Категории заведений</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\Directory\PubTypeController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Типы пабов</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\Directory\KaraokeTypeController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Типы размешения караоке</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\Directory\KitchenController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Кухни</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\Directory\MusicController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Музыка</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('Admin\Directory\WhereGoController@getIndex') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Куда Сходить</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</section>
