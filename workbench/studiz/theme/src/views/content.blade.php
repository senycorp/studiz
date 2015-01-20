<!--
    This file includes the content area of our theme.
-->

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$pageHeader}}
            <small>{{$pageSubHeader}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <br/>
        @yield('content')
    </section><!-- /.content -->
</aside><!-- /.right-side -->