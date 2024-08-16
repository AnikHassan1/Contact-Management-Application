@extends('layouts.app')
@section('content')

<form action="{{ route('contacts.store') }}" method="POST">
  @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email </label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"> Address</label>
      <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection()