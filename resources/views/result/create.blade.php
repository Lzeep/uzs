@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('result.store') }}" method="post" class="col-10">
                @csrf

                <div class="form-group">
                    <label>Результаты решений</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
