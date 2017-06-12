<!-- Logo -->
<a href="/company/" class="logo">
    <span class="logo-mini"></span>
    <span class="logo-lg">Личный кабинет</span>
</a>

<nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li>
                <a href="{{ action('Company\AuthController@getProfile') }}"><i class="fa fa-user"></i></a>
            </li>
            <li>
                <a href="{{ action('Company\AuthController@getLogout') }}"><i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
</nav>
