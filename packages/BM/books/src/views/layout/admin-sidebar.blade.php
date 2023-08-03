<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item @yield('dashboard')">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link @yield('dashboard')" href="{{ route('admin.dashboard') }}" aria-expanded="false"><i class="me-3 far fa-clock fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="sidebar-item @yield('books')">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link @yield('books')" href="{{ route('admin.books') }}" aria-expanded="false">
                        <i class="me-3  fas fa-book" aria-hidden="true"></i><span class="hide-menu">Books</span>
                    </a>
                </li>
                <li class="sidebar-item @yield('categories')">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link @yield('categories')" href="{{ route('admin.categories') }}" aria-expanded="false"><i class="me-3 fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Categories</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
