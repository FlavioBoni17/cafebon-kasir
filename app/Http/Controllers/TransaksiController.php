<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;
use App\Models\Menu;
use PDO;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Transaksi.laporan-transaksi');
    }

    public function menu_show($id){
        $data = Menu::findOrFail($id);
        return response()->json($data);
    }

    public function add_menu_to_cart(Request $request){
        $data = $request->all();
        $nama_menu = $data['nama_menu'];
        $qty = $data['qty'];
        $harga = $data['harga'];
        $row_id = md5($nama_menu . serialize($qty));
        $data = [
            $row_id = [
                'nama_menu' => $nama_menu,
                'qty' => $qty,
                'harga' => $harga,
                'row_id' => $row_id,
            ]
        ];

        if(!$request->session()->has('cart')){
            $request->session()->put('cart', $data);
        } else {
            $exist = 0;
            $cart = $request->session()->get('cart');

            foreach($cart as $cr => $carts){
                if($cart[$cr]['nama_menu'] == $nama_menu){
                    $cart[$cr]['qty'] += $qty;
                    $cart[$cr]['harga'] += $harga;
                    $exist++;
                }
            }

            if($exist == 0) {
                $newcart = array_merge_recursive($cart, $data);
                $request->session()->put('cart', $newcart);
                //dd($newcart);
            } else {
                // dd($cart);
                $request->session()->put('cart', $cart);
            }
        }
        return redirect()->back();
    }

    public function delete_menu_from_cart($row_id, Request $request){

        $newcart = $request->session()->get('cart');
        unset($newcart[$row_id]);

        if($newcart = []){
            $request->session()->forget('cart');
            return redirect()->route('input-transaksi');
        } else {
            $request->session()->put('cart', $newcart);
        }

        return redirect()->route('input-transaksi');

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inputtransaksi(Request $request)
    {
        $data = Menu::all();
        $invoice = rand(1000000, 9999999);
        $meja = Meja::all();
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            $total_harga = 0;
            foreach ($cart as $cr => $item){
                $total_harga += $cart[$cr]['harga'];
            }
            // return response()->json($cart);
            //dd($cart);
            return view('Transaksi.input-transaksi', [
                'data' => $data,
                'meja' => $meja,
                'cart' => $cart,
                'total_harga' => $total_harga,
                'invoice' => $invoice,
            ]);

        }
        return view('Transaksi.input-transaksi', compact('data', 'invoice', 'meja'));
    }

    public function simpan_transaksi(Request $request){
        $id_user = auth()->user()->id;
        $cart = $request->session()->get('cart');
        $total_harga = 0;
            foreach ($cart as $cr => $item){
                $total_harga += $cart[$cr]['harga'];
            }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
