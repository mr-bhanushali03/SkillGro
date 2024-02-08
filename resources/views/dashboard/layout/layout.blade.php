@include('dashboard.common.header')
@include('dashboard.sidebar.sidebar')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    @yield('content')
</div>
<!-- END wrapper -->
@include('dashboard.common.footer')
@yield('scripts')