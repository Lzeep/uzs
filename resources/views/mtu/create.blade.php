@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('mtu.store') }}" method="post" class="col-10">
                @csrf

                <div class="form-group">
                    <label>МТУ</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="'form-group">
                    <label>Район</label>
                    <select class="form-control" name="district_id">
                        @foreach($districts as $district)
                            <option value="{{$district->id}}">{{ $district->name }}</option>
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
