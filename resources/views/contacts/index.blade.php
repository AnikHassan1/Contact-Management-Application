@extends('layouts.app')
@section('content')
    <div class="card ms-5 mt-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width: 84rem;">
        <div class="card-body">
            <form action="">
            <div class="mb-3 d-flex justify-content-between">
                <h5 class="card-title">Contact List</h5>
                <a class="btn btn-primary text-end" href="{{ route('contacts.create') }}" role="button">Create</a>
            </div>
            <div class="d-flex gap-5">
                <div class="w-100">
                    <label class="form-label" for="sort_by">Sort By</label>
                    <select class="form-select form-select-lg mb-3" name="sort_by" id="sort_by" onchange="this.form.submit()">
                        <option value="name_asc"{{request('sort_by')==='name_asc'? 'selected':'' }}>Name Ascending</option>
                        <option value="name_desc" {{request('sort_by')==='name_desc'? 'selected':'' }}>Name Descending</option>
                        <option value="create_at_asc" {{request('sort_by')==='create_at_asc'? 'selected':'' }}>Created At Ascending</option>
                        <option value="create_at_desc"{{request('sort_by')==='create_at_desc'? 'selected':'' }}>Created At Descending</option>
                    </select>
                </div>
                <div class="w-100">
                    <label class="form-label" for="search">Search</label>
                    <div class="d-flex gap-2">
                        <input type="text" value=" " class="form-control" name="search" id="search" placeholder="search">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </form>
            <hr>
            <table class="table table-dark table-striped-columns">

                <tr class="table-primary">
                    <th class="table-primary">ID</th>
                    <th class="table-primary">Name</th>
                    <th class="table-primary">Email</th>
                    <th class="table-primary">Create</th>
                   
                    <th class="table-primary">Action</th>
                </tr>

                @foreach ($datas as $data)
                    <tr>
                        <th scope="row"  class="table-primary">{{ $loop->iteration }}</th>
                        <td class="table-primary">{{ $data->name }}</td>
                        <td class="table-primary">{{ $data->email }}</td>
                        <td class="table-primary">{{ $data->create_at }}</td>
                     

                        <td class="table-primary">
                            <a href="{{ route('contact.show', $data->id) }}" class="btn btn-success">Show</a>
                            <a href="{{ route('contact.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('contact.delete', $data->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$datas->appends(request()->query())->links('pagination::bootstrap-5')  }}
        </div>
    </div>
@endsection()
