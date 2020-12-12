<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\Product;
use App\PesananDetail;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component
{
    public $product, $jumlah_pesanan, $nama, $nomor;

    public function mount($id)
    {
        $productDetail = Product::find($id);
        if($productDetail){
            $this->product = $productDetail;
        }

    }

    public function masukanKeranjang()
    {
       $this->validate([
            'jumlah_pesanan' => 'required'
       ]);

    //    Validasi Jika belum login
        if(!Auth::user()){
            return redirect()->route('login');
        }

        // Menghitung total harga
        if(!empty($this->nama)){
            $total_harga = $this->jumlah_pesanan*$this->product->harga+$this->product->harga_nameset;
        }else{
            $total_harga = $this->jumlah_pesanan*$this->product->harga;
        }

        // cek apakah user punya data pesanan utama yg statusnya 0
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        // Update Pesanan Utama
        if(empty($pesanan)){
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999),
            ]);

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            $pesanan->kode_pemesanan = 'JP-'.$pesanan->id;
            $pesanan->save();
        }else{
            $pesanan->total_harga = $pesanan->total_harga+$total_harga;
            $pesanan->update();
        }

        // menyimpan pesanan detail
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'nameset' => $this->nama ? true : false,
            'nama' => $this->nama,
            'nomor' =>$this->nomor,
            'total_harga' => $total_harga,
        ]);

        $this->emit('masukKeranjang');

        $this->emit('alert', ['type' => 'success', 'message' => 'Sukses Masuk Keranjang.']);

        return redirect()->back();
    }

    public function render()
    {
         return view('livewire.product-detail');
    }
}
