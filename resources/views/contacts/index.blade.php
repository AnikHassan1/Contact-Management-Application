@extends('layouts.app')
@section('content')

<table class="table table-dark table-striped-columns">
    <a class="btn btn-primary text-end" href="{{ route('contacts.create') }}" role="button">Create</a>
    <tr class="table-primary">
        <th class="table-primary">ID</th>
        <th class="table-primary">Name</th>
        <th class="table-primary">Email</th>
        <th class="table-primary">Phone</th>
        <th class="table-primary">Address</th>
        <th class="table-primary">Action</th>
    </tr>
    
    @foreach ($datas as $data )
    <tr>
        <td class="table-primary">{{ $data->id }}</td>
        <td class="table-primary">{{ $data->name }}</td>
        <td class="table-primary">{{ $data->email  }}</td>
        <td class="table-primary">{{ $data->phone }}</td>
        <td class="table-primary">{{ $data->address }}</td>
       
            <td class="table-primary">
                <a href="{{ route('contact.edit',$data->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('contact.show',$data->id) }}" class="btn btn-primary">Show</a>
                <a href="{{ route('contact.delete',$data->id) }}" class="btn btn-danger">Delete</a>
                
                </td>
           
       
    </tr>
    @endforeach
  </table>


@endsection()