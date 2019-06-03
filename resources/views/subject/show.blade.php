@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5">
        <div class="row pb-5">
            <div class="col-auto">
                <p class="font-weight-bold h4 text-dark">Действия: </p>
            </div>
            <div class="col-auto">
                <a class="btn btn-success mr-4" href="{{ route('subject.edit', $subject) }}">Редактировать</a>
                <a class="btn btn-outline-danger mr-4" href="{{ route('subject.destroy', $subject) }}">Удалить</a>
            </div>
        </div>
        <div class="row pt-15">
            <div class="col-4 text-center row justify-content-center">
                <div class="col-auto">
                    <img class="img-container border-danger img-thumbnail w-100 rounded"
                         style="width: 300px; height: 300px;"
                         src="{{$subject->logo && file_exists(public_path('/uploads/'.$subject->logo)) ? asset('uploads/'.$subject->logo) : asset('images/noavatar.png')}}"
                         alt="">
                    @if (!$subject->images->isEmpty())

                        <div class="col-12 mt-3">
                            <a href="{{$subject->images->first()->image && file_exists(public_path('uploads/'.$subject->images->first()->image)) ? asset('uploads/'.$subject->images->first()->image) : asset('images/noavatar.png')}}"
                               class="elem text-dark"
                               data-lcl-thumb="{{ $subject->images->first()->image && file_exists(public_path('uploads/'.$subject->images->first()->image)) ? asset('uploads/'.$subject->images->first()->image) : asset('images/noavatar.png') }}">
                                Все фото объекта
                            </a>
                        </div>
                    @endif
                </div>

                <div class="content">
                    @foreach ($subject->images as $image)
                        @if (!$loop->first)
                            <a class="elem" href="{{ asset('uploads/'.$image->image) }}"
                               data-lcl-thumb="{{ asset('uploads/'.$image->image)}}">
                                <span style="background-image: url({{ asset('uploads/'.$image->image) }});"></span>
                            </a>
                        @endif
                    @endforeach
                </div>

                @if($subject->latitude && $subject->longitude)
                    <div class="col-12 mt-4">
                        <div id="map" style="width: 100%; height: 350px;"></div>
                    </div>
                @endif
            </div>

            <div class="col">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">Район</p>
                            <span class="mr-2 text-secondary">{{ $subject->district->name }}</span>
                        </div>
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">МТУ</p>
                            <div>
                                <span class="text-secondary">{{ $subject->mtu->name }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">Тип объекта</p>
                            <div>
                                <span class="text-secondary">{{ $subject->type->name }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">Адрес объекта</p>
                            <div>
                                <span class="text-secondary">{{ $subject->address }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">Наименование объекта</p>
                            <div>
                                <span class="text-secondary">{{ $subject->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">Владелец объекта</p>
                            <div>
                                <span class="text-secondary">{{ $subject->owner }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">Статус объекта</p>
                            <div>
                                <span class="text-secondary">{{ $subject->status->name }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">Нарушения</p>
                            <div>
                                <span class="text-secondary">{{ $subject->violation->name }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">Результаты принятых мер</p>
                            <div>
                                <span class="text-secondary">{{ $subject->result->name }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">Документ</p>
                            <div>
                                <span class="text-secondary">{{ $subject->document }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="text-dark font-weight-bold h4">Инспектор</p>
                            <div>
                                <span class="text-secondary">{{ $subject->employee->Full_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/lc_lightbox.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/skins/minimal.css') }}"/>

@endpush
@push('scripts')
    <script src='https://code.jquery.com/jquery-3.2.1.min.js' type='text/javascript'></script>
    <script src="{{asset("js/lightbox.min.js")}}"></script>
    <script type="text/javascript">
        // Функция ymaps.ready() будет вызвана, когда
        // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
        ymaps.ready(init);

        function init() {
            // Создание карты.
            var myMap = new ymaps.Map("map", {
                // Координаты центра карты.
                // Порядок по умолчанию: «широта, долгота».
                // Чтобы не определять координаты центра карты вручную,
                // воспользуйтесь инструментом Определение координат.
                center: [{{ $subject->latitude ?? 42.865388923088396 }}, {{ $subject->longitude ?? 74.60104350048829 }}],
                // Уровень масштабирования. Допустимые значения:
                // от 0 (весь мир) до 19.
                zoom: 17
            });
            myMap.geoObjects.add(new ymaps.Placemark([{{ $subject->latitude ?? 42.865388923088396 }}, {{ $subject->longitude ?? 74.60104350048829 }}], {
                balloonContent: '{{ $subject->fullName }}'
            }, {
                preset: 'islands#icon',
                iconColor: '#0095b6'
            }))
        }

        $(document).ready(function (e) {
            // live handler
            lc_lightbox('.elem', {
                wrap_class: 'lcl_fade_oc',
                gallery: true,
                thumb_attr: 'data-lcl-thumb',
                skin: 'minimal',
                radius: 0,
                padding: 0,
                border_w: 0,
            });
        });
    </script>
@endpush
