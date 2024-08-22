@extends('layouts.app')
@section('content')
    <div class="card mx-auto p-2 mt-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width: 36rem;">
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between">
                <h5 class="card-title">Contact Show Page</h5>
            </div>
            <hr>
            <div>
                <h6>Name : {{ $post->name }}</h6>
                <h6>Email : {{ $post->email }}</h6>
                <h6>Phone : {{ $post->phone }}</h6>
                <h6>Address : {{ $post->address }}</h6>
            </div>
            <a class="btn btn-primary" href="{{ route('contacts.index') }}">Back</a>
        </div>
    </div>
@endsection
