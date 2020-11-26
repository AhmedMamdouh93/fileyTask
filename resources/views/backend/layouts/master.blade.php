<!doctype html>
<html lang="en">

@include('backend.components.head')

<body class="theme-cyan font-montserrat ltr">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<div id="wrapper">
    
    @include('backend.components.topnav')
    @include('backend.components.menu')

    
    <div id="main-content">
        <div class="container-fluid">
            
            @include('backend.components.breadcrumb')
            @yield('content')

        </div>
    </div>    
</div>

@include('backend.components.scripts')

</body>
</html>
