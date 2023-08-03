<!DOCTYPE html>
<html lang="en">

@include('books::layout.header-asset', [$title])

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('books::layout.header')
        @if(Auth::user()->user_type =="admin")
        @include('books::layout.admin-sidebar')
        @else
        @include('books::layout.sidebar')
        @endif
        <div class="page-wrapper">
            @yield ("content")

        </div>
    </div>
  

    <input type="hidden" value="{{url('/')}}" id="url">
    
    @include('books::layout.footer')
    @stack('script')
</body>

</html>
