<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b class="logo-icon">
                    Books
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <!-- <span class="logo-text">
                    dark Logo text
                    Package

                </span> -->
            </a>
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"> <i class="ti-menu ti-close"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav me-auto mt-md-0 ">

            </ul>
            
            <ul class="navbar-nav">
                <a class="nav-link  waves-effect waves-dark" href="#" role="button">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </a>
                <a href="{{ Auth::user()->user_type == 'admin'? route('admin.logout') :route('logout') }}" class="btn cursor-pointer">
                    <i class=" fas fa-sign-out-alt color-red" aria-hidden="true"></i>
                </a>
            </ul>
        </div>
    </nav>
</header>
