@extends('layouts.app')



@section('content')
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Управление землепользования и строительства мэрии города Бишкек
        </div>

        <div class="links">
            <a href="/map">Карта</a>
            <a href="{{ route('tObject.index') }}">Объекты</a>
            <a href="{{ route('employee.index') }}">Сотрудники</a>
            <a href="#">О нас</a>
            <a href="#">Справочник</a>

        </div>
    </div>
</div>


        @yield('content')
            <script crossorigin="anonymous" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" src="https://code.jquery.com/jquery-3.1.0.min.js">
            </script>

            {{--    Googlee maps api    --}}


            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXF7WoUMA7Jog6TZY6GaCQrbyU99pS4Rk">
            </script>
            <script src="{{asset('js/script.js')}}"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
            </script>

        @yield('js')
@endsection
