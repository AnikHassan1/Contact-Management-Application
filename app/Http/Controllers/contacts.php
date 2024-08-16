<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\contact;
class contacts extends Controller
{
    
    //index
    function index(){
        $datas = DB::table('_contacts')->get();
      return view('contacts.index',compact('datas'));
    }
    
    // create 
    function create(){
        return view('contacts.create');
    }
    function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:_contacts',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $data=array([
          'name' => $request->name,
          'email'=> $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
        ]);
        
       DB::table('_contacts')->insert($data);
        return redirect('contacts');
    }
    //edit
    function edit(Request $request, $id){
        $post = DB::table('_contacts')->find($id);
        return view('contacts.edit',compact('post'));
      }
      
      //update
      function update(Request $request, $id){
        // $data=array([
        //   'name' => $request->name,
        //   'email'=> $request->email,
        //   'phone' => $request->phone,
        //   'address' => $request->address,
        // ]);
         DB::table('_contacts')->where('id',$id)->update([
            'name' => $request->name,
          'email'=> $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
         ]);
        
        return redirect('contacts');
      }

      //delete
      function delete(Request $request, $id){
        DB::table('_contacts')->where('id',$id)->delete();
        return redirect('contacts');
      }
      function show(Request $request, $id){
       $post= DB::table('_contacts')->where('id',$id)->first();
        return view('contacts.show',compact('post'));
      }
}

