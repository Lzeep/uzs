@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('employee.store') }}" method="post" class="col-10">
                @csrf

                <div class="form-group">
                    <label>ФИО</label>
                    <input type="text" class="form-control" name="Full_name">
                </div>
                <div class="form-group">
                    <label>Адрес</label>
                    <input type="text" class="form-control" name="Address">
                </div>
                <div class="form-group">
                    <label>Телефон</label>
                    <input type="text" class="form-control" name="Phone">
                </div>
                <div class="form-group">
                    <label>Район</label>
                    <select class="form-control" name="district_id" id="district">
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
