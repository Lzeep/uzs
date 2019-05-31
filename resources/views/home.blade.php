<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="{{asset('images/favicon_1.ico')}}">
    <title>УЗС</title>

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

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
    <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>
</head>
    <div class="wrapper">
        <header>
            <div class="search">
                <div class="container">
                    <div class="pull-left">
                        <h2>УЗС</h2>
                        <span>Управление землепользования и строительства мэрии города Бишкек</span>

                    </div>
                    <div class="pull-right">





                            <a href="{{ route('login') }}">Войти</a>

                                @if (Route::has('register'))

                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>

                            @endif


                                {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                                    {{--{{ Auth::user()->name }} <span></span>--}}
                                {{--</a>--}}

                                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                                    {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                                       {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                        {{--{{ __('Выйти') }}--}}
                                    {{--</a>--}}

                                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}



                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <header id="home">
                <div class="header">

                    <!-- START carousel-->
                    <div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide position-relative">
                        <div class="backdrop">

                        </div>
                        <div role="listbox" class="carousel-inner">
                            <div class="item active">
                                <img src="images/citty.jpg" alt="First slide image">
                            </div>
                            <div class="item">
                                <img src="images/city3.jpg" alt="Second slide image">
                            </div>
                            <div class="item">
                                <img src="images/cit.jpg" alt="Third slide image">
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
                            <li><a href="/yandex">Карта города</a></li>
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
        </div>
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

                </div>
            </div>
        </footer>
    </div>

    {{--@push('styles')--}}
        {{--<link rel="shortcut icon" href="{{asset('images/favicon_1.ico')}}">--}}
        {{--<link href="{{ asset('assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{ asset('assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />--}}

        {{--<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />--}}
        {{--<link rel="stylesheet" href="{{ asset('css/main2.css') }}">--}}

        {{--<script src="{{ asset('assets/js/modernizr.min.js') }}"></script>--}}
    {{--@endpush--}}

       {{--@push('scripts')--}}
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
        </script>

               </body>
               </html>
       {{--@endpush--}}
{{--@endsection--}}
