<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\contact;
use Illuminate\Database\Eloquent\Builder;
class contacts extends Controller
{

  //index
  function index(Request $request)
  {
    $search = $request->input('search');

    $sortby = 'name';
    $sortDirection = 'asc';
    if($request->filled('sort_by')){
        switch($request->input('sort_by')){
          case 'name_asc':
            $sortby = 'name';
            $sortDirection = 'asc';
            break;
          case 'name_desc':
            $sortby = 'name';
            $sortDirection = 'desc';
            break;
          case 'create_at_asc':
            $sortby = 'create_at';
            $sortDirection = 'asc';
            break;
          case 'create_at_desc':
            $sortby = 'create_at';
            $sortDirection = 'desc';
            break;
        }
    };
    $datas =contact::query()
      ->when($request->search,function(Builder $builder) use ($request){
        return   $builder->where('name','like',"%{$request->search}%")
       ->orWhere("email","like","%{$request->search}%");
      
      })->orderBy( $sortby,$sortDirection)->paginate(5);

    return view('contacts.index', compact('datas','sortby','sortDirection'));
  }

  // create 
  function create()
  {
    return view('contacts.create');
  }
  function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required',
      'email' => 'required|unique:_contacts',
      'phone' => 'required',
      'address' => 'required',
    ]);
    $data = array([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'address' => $request->address,
    ]);

    DB::table('_contacts')->insert($data);
    return redirect('contacts');
  }
  //edit
  function edit(Request $request, $id)
  {
    $post = DB::table('_contacts')->find($id);
    return view('contacts.edit', compact('post'));
  }

  //update
  function update(Request $request, $id)
  {
    // $data=array([
    //   'name' => $request->name,
    //   'email'=> $request->email,
    //   'phone' => $request->phone,
    //   'address' => $request->address,
    // ]);
    DB::table('_contacts')->where('id', $id)->update([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'address' => $request->address,
    ]);

    return redirect('contacts');
  }

  //delete
  function delete(Request $request, $id)
  {
    DB::table('_contacts')->where('id', $id)->delete();
    return redirect('contacts');
  }
  function show(Request $request, $id)
  {
    $post = DB::table('_contacts')->where('id', $id)->first();
    return view('contacts.show', compact('post'));
  }
}
