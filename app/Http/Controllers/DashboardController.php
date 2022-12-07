<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengembalikan view ke halaman dashboard
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Pendeklarasian Variabel
        $pesan = new TotalPembayaran;
        $status = $request->status;
        $pesanan = explode(',',$request->pesanan);
        $jumlah_pesanan = count($pesanan);
        $total_pesanan = $jumlah_pesanan * 50000;
        $bayar = $pesan->bayar($status,$total_pesanan);

        // parsing data
        $data = [
            'nama' => $request->nama,'jumlah_pesanan' => $jumlah_pesanan,'total_pesanan' => $total_pesanan,
            'status' => $status,'diskon' => $pesan->diskon($status,$total_pesanan),'total_pembayaran' => $bayar
        ];
        // mengembalikan view ke halaman dashboard dengan membawa data dari $ data
        return view('dashboard',compact('data'));
    }
}

// interface dengan method diskon sesuai soal nomor 12 poin e
interface Pesan{
    // method diskon
    public function diskon($status,$total_pesanan);
}

// class dengan implements interface pesan
class Diskon implements Pesan{
    // method diskon
    public function diskon($status,$total_pesanan)
    {
        // pengkondisian if else sesuai ketentuan soal nomor 12 poin f
        if($status == 'member' && $total_pesanan >=100000){
            return $total_pesanan * (20/100);
        }elseif($status == 'member' && $total_pesanan < 100000){
            return $total_pesanan * (10/100);
        }else{
            return $total_pesanan * (0/100);
        }
    }
}
class TotalPembayaran extends Diskon{
    public function bayar($status,$total_pesanan)
    {
        return (int)$total_pesanan - (int)$this->diskon($status,$total_pesanan);
    }
}