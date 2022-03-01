<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Menu::where('nama_menu','LIKE','%' .$request->search.'%')->paginate(10);
        }else{
            $data = Menu::paginate(10);
        }


        // dd($data);
        return view('Menu.crud-menu',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createmenu()
    {
        return view('Menu.create-menu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertdatamenu(Request $request)
    {
        // dd($request->all());
        $data = Menu::create($request->all());
         if($request->hasFile('foto')){
             $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
             $data->foto = $request->file('foto')->getClientOriginalName();
             $data->save();
         }
        return redirect()->route('crud-menu')->with('success','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdatamenu($id)
    {
        $data = Menu::find($id);
        // dd($data);
        return view('Menu.showdatamenu',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedatamenu(Request $request, $id)
    {
        $data = Menu::find($id);
        $data->update($request->all());
        return redirect()->route('crud-menu')->with('success','Data Berhasil Di Update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletemenu($id)
    {
        $data = Menu::find($id);
        $data->delete();
        return redirect()->route('crud-menu')->with('success','Data Berhasil Di Hapus');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
