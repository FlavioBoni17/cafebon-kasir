<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = User::where('name','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
            $data = User::paginate(5);
        }
        // $data = user::all();
        // dd($data);
        return view('Akun.crud-akun',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createakun()
    {
        return view('Akun.create-akun');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertdata(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('crud-akun')->with('success','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdata($id)
    {
        $data = User::find($id);
        // dd($data);
        return view('Akun.showdata', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedata(Request $request, $id)
    {
        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('crud-akun')->with('success','Data Berhasil Di Update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('crud-akun')->with('success','Data Berhasil Di Hapus');
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
