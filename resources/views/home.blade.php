@extends('layouts.app')



@section('content')
    {{--<div class="wrapper">--}}
        {{--<header>--}}
            {{--<div class="search">--}}
                {{--<div class="container">--}}
                    {{--<div class="pull-left">--}}
                        {{--<h2>cherry</h2>--}}
                        {{--<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>--}}
                    {{--</div>--}}
                    {{--<div class="pull-right">--}}
                        {{--<form action="">--}}
                            {{--<input type="text" placeholder="Search..." class="srch-control">--}}
                            {{--<a href="#"><i class="fa fa-search"></i></a>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </header>
        <div class="container">
            <header id="home">
                <div class="header">
                    <!-- START carousel-->
                    <div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
                        <div role="listbox" class="carousel-inner">
                            <div class="item active">
                                <img src="images/1.jpg" alt="First slide image">
                            </div>
                            <div class="item">
                                <img src="images/2.jpg" alt="Second slide image">
                            </div>
                            <div class="item">
                                <img src="images/3.jpg" alt="Third slide image">
                            </div>
                        </div>

                    </div>
                    <!-- END carousel-->

                    <div class="header-caption">
                        <img src="images/p1.jpg" alt="Admin panel" style="width: 100px; height: auto">
                        <img src="images/p2.jpg" alt="Admin panel" style="width: 150px; height: auto">
                        <h3 style="color: #FFFFFF;">Управление землепользования и строительства мэрии города Бишкек</h3>
                    </div>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Новости</a></li>
                            <li><a href="#">Об управлении</a></li>
                            <li><a href="#">История города</a></li>
                            <li><a href="/map">Карта города</a></li>
                            <li><a href="#">Контакты</a></li>
                            @if(Auth::user())
                            <li><a href="{{route('subject.index')}}">Объекты</a></li>
                            <li><a href="{{route('employee.index')}}">Сотрудники</a></li>
                            @endif
                        </ul>
                    </div>
                    {{--<div class="breadcrums">--}}
                        {{--<a href="#">Home</a>/--}}
                        {{--<a href="#">Another page</a>/--}}
                        {{--<span>This page</span>--}}
                    {{--</div>--}}
                </div>
            </header>
            {{--<section id="content">--}}
                {{--<div class="container">--}}
                    {{--<div class="general">--}}
                        {{--<div class="col-md-3">--}}
                            {{--<div class="contact-us">--}}
                                {{--<form action="">--}}
                                    {{--<span>Contact us</span><br>--}}
                                    {{--<input type="text" placeholder="Your Name" name="Name" class="form-control"><br>--}}
                                    {{--<input type="text" placeholder="Daytime Number" name="day-number" class="form-control"><br>--}}
                                    {{--<input type="email" placeholder="Email Address" name="email" class="form-control"><br>--}}
                                    {{--<input type="text" placeholder="City" name="city" class="form-control"><br>--}}
                                    {{--<select class="form-control">--}}
                                        {{--<option>Problem with</option>--}}
                                        {{--<option>2</option>--}}
                                        {{--<option>3</option>--}}
                                        {{--<option>4</option>--}}
                                        {{--<option>5</option>--}}
                                    {{--</select><br>--}}
                                    {{--<select class="form-control">--}}
                                        {{--<option>Brand</option>--}}
                                        {{--<option>2</option>--}}
                                        {{--<option>3</option>--}}
                                        {{--<option>4</option>--}}
                                        {{--<option>5</option>--}}
                                    {{--</select><br>--}}
                                    {{--<div class="btn btn-red">--}}
                                        {{--<a href="">Lorem ipsum dolor</a>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                            {{--<div class="headline">--}}
                                {{--<h4><b>Headline</b></h4>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias provident id et laborum, illo ipsum dolorem labore unde dolor amet, voluptatem vel quis ex quaerat natus eligendi iusto maxime aliquid.</p>--}}
                                {{--<a href="#">More about</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-9">--}}
                            {{--<div class="we-do">--}}
                                {{--<h1>What we do...</h1>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, facilis minus. Quas laborum ipsa assumenda excepturi, ut consequatur commodi necessitatibus, quidem eius ea sit molestiae, molestias culpa et nostrum modi. Lorem ipsum dolor sit amet, <a href="">consectetur adipisicing elit</a>. Doloremque optio qui accusantium similique explicabo ad adipisci eos id! Illo saepe aliquid temporibus, est. Distinctio harum molestias delectus minus cum expedita. </p>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<h4>Admin panel</h4>--}}
                                        {{--<img src="images/s1.jpg" alt="Admin panel">--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<h4>Short codes</h4>--}}
                                        {{--<img src="images/s2.jpg" alt="Short codes">--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<h4>Videos</h4>--}}
                                        {{--<img src="images/s3.jpg" alt="Videos">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="lists">--}}
                                {{--<h1>Lists</h1>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<b>List style type circle <span>&lt;ul&gt;</span></b>--}}
                                        {{--<ul>--}}
                                            {{--<li>Lorem ipsum dolor sit amet</li>--}}
                                            {{--<li>Consectetur adipiscing elit</li>--}}
                                            {{--<li>Facilisis in pretium nisl aliquet</li>--}}
                                            {{--<li>Nulla volutpataliquam velit</li>--}}
                                            {{--<ul type="disc">--}}
                                                {{--<li>Phasellus iaculis neque</li>--}}
                                                {{--<li>Purus sodales ultricies</li>--}}
                                                {{--<li>Vestibulum loareet porttitor</li>--}}
                                            {{--</ul>--}}
                                            {{--<li>Faucibus porta lacus fringilla vel</li>--}}
                                            {{--<li>Aenean sit amet erat nunc</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<ul class="none-list">--}}
                                            {{--<li><b>Unstyled <span>&lt;ul class=""&gt;</span></b></li>--}}

                                            {{--<li>Lorem ipsum dolor sit amet</li>--}}
                                            {{--<li>Consectetur adipiscing elit</li>--}}
                                            {{--<li>Facilisis in pretium nisl aliquet</li>--}}
                                            {{--<li>Nulla volutpataliquam velit</li>--}}
                                            {{--<ul type="disc">--}}
                                                {{--<li>Phasellus iaculis neque</li>--}}
                                                {{--<li>Purus sodales ultricies</li>--}}
                                                {{--<li>Vestibulum loareet porttitor</li>--}}
                                            {{--</ul>--}}
                                            {{--<li>Faucibus porta lacus fringilla vel</li>--}}
                                            {{--<li>Aenean sit amet erat nunc</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<ol>--}}
                                            {{--<li style="list-style:none;"><b>Ordered <span>&lt;ol&gt;</span></b></li>--}}
                                            {{--<li>Lorem ipsum dolor sit amet</li>--}}
                                            {{--<li>Consectetur adipiscing elit</li>--}}
                                            {{--<li>Facilisis in pretium nisl aliquet</li>--}}
                                            {{--<li>Nulla volutpataliquam velit</li>--}}
                                            {{--<li>Faucibus porta lacus fringilla vel</li>--}}
                                            {{--<li>Aenean sit amet erat nunc</li>--}}
                                        {{--</ol>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="table">--}}
                                {{--<h1>Table</h1>--}}
                                {{--<table>--}}
                                    {{--<tr>--}}
                                        {{--<th>№</th>--}}
                                        {{--<th>Toranton rate</th>--}}
                                        {{--<th>Puranocak var berond</th>--}}
                                        {{--<th>Intime modular to cavan</th>--}}
                                        {{--<th>Language</th>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>1</td>--}}
                                        {{--<td>Lorem ipsum</td>--}}
                                        {{--<td>Consectetur adipiscing elit</td>--}}
                                        {{--<td>Consectetur adipiscing</td>--}}
                                        {{--<td><a href="#">Lorem ipsum</a></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>2</td>--}}
                                        {{--<td>Lorem ipsum</td>--}}
                                        {{--<td>Consectetur adipiscing elit</td>--}}
                                        {{--<td>Consectetur adipiscing</td>--}}
                                        {{--<td><a href="#">Lorem ipsum</a></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>3</td>--}}
                                        {{--<td>Lorem ipsum</td>--}}
                                        {{--<td>Consectetur adipiscing elit</td>--}}
                                        {{--<td>Consectetur adipiscing</td>--}}
                                        {{--<td><a href="#">Lorem ipsum</a></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>4</td>--}}
                                        {{--<td>Lorem ipsum</td>--}}
                                        {{--<td>Consectetur adipiscing elit</td>--}}
                                        {{--<td>Consectetur adipiscing</td>--}}
                                        {{--<td><a href="#">Lorem ipsum</a></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>5</td>--}}
                                        {{--<td>Lorem ipsum</td>--}}
                                        {{--<td>Consectetur adipiscing elit</td>--}}
                                        {{--<td>Consectetur adipiscing</td>--}}
                                        {{--<td><a href="#">Lorem ipsum</a></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>6</td>--}}
                                        {{--<td>Lorem ipsum</td>--}}
                                        {{--<td>Consectetur adipiscing elit</td>--}}
                                        {{--<td>Consectetur adipiscing</td>--}}
                                        {{--<td><a href="#">Lorem ipsum</a></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>7</td>--}}
                                        {{--<td>Lorem ipsum</td>--}}
                                        {{--<td>Consectetur adipiscing elit</td>--}}
                                        {{--<td>Consectetur adipiscing</td>--}}
                                        {{--<td><a href="#">Lorem ipsum</a></td>--}}
                                    {{--</tr>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</section>--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<nav class="mav nav-tabs" id="myTab" role="tablist">--}}
                        {{--<a class="nav-item nav-link active" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="news">--}}

                        {{--<h6>Новости</h6>--}}
                        {{--</a>--}}
                    {{--</nav>--}}

            {{--</div>--}}
                {{--<div class="col-12 mt-4">--}}
                    {{--<div class="tab-content" id="nav-tabContent">--}}
                        {{--<div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="news-tab">--}}
                            {{--<div class="newservice-news">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-4 col-sm-12">--}}
                                        {{--<div class="card">--}}
                                            {{--<a href="http://meria.kg/ru/structures/object/post/17160">--}}
                                                {{--<img class="card-img-top" src="http://meria.kg/assets/img/posts/1533714992_small.jpeg" alt="">--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
        {{--</div>--}}
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 foot-style">
                        <h3><span class="red">Контакты</span></h3>
                        <span class="foot-line"></span>
                        <span>Адрес:г.Бишкек, мкр. Тунгуч-2, дом №57</span>
                        <p><span>E-mail:uzs@meria.kg</span></p>

                        <span>Телефон:   </span>
                        <ul>
                            <li>0 312 97 51 22 (приемная)</li>
                            <li>0 312 89 51 23 (общий отдел)</li>
                            <li>0 312 97 51 27 Отдел контроля западной зоны</li>
                            <li>0 312 97 51 24 Отдел контроля восточной зоны</li>
                        </ul>
                    </div>
                    {{--<div class="col-sm-4 foot-style m-l-r-54">--}}
                        {{--<h3>Local <span class="red">C</span>HERRY</h3>--}}
                        {{--<span class="foot-line"></span>--}}
                        {{--<ul>--}}
                            {{--<li>West Hollywood (323) 221-1107</li>--}}
                            {{--<li>Beverly Hills (310) 202-5428</li>--}}
                            {{--<li>Pasadena (626) 296-2664</li>--}}
                            {{--<li>West Hills (805) 531-5083</li>--}}
                            {{--<li>Los Angeles (213) 389-4381</li>--}}
                        {{--</ul>--}}
                        {{--<strong>Call Us Toll Free 1-800-287-0919</strong>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-4 foot-last-style">--}}
                        {{--<h3>Our Los Angeles Location</h3>--}}
                        {{--<span class="foot-line"></span>--}}
                        {{--<span>Steve Smith</span><br>--}}
                        {{--<span>Hi-Tech Cherry Company</span><br>--}}
                        {{--<a href="#">info@cherrycompany.com</a><br>--}}
                        {{--<span>5104 W.Washington Blvd</span><br>--}}
                        {{--<span>Los Angeles, CA, 90016 United States</span><br>--}}
                        {{--<span>(800) 287-0919</span>--}}

                    {{--</div>--}}
                </div>
            </div>
        </footer>
    </div>

    @push('styles')
        <link rel="shortcut icon" href="{{asset('images/favicon_1.ico')}}">
        <link href="{{ asset('assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/main2.css') }}">

        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    @endpush

       @push('scripts')
           <script>
               var resizefunc = [];
           </script>

           <!-- jQuery  -->
           <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
           <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
           <script src="{{ asset('assets/js/detect.js') }}"></script>
           <script src="{{ asset('assets/js/fastclick.js') }}"></script>
           <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
           <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
           <script src="{{ asset('assets/js/waves.js') }}"></script>
           <script src="{{ asset('assets/js/wow.min.js') }}"></script>
           <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
           <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

           <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>

           <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
           <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

           <script src="{{ asset('assets/plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>

           <script src="{{ asset('js/main.js') }}"></script>
           <script type="text/javascript">
               jQuery(document).ready(function($) {


               });

       @endpush
@endsection
