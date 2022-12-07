<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // deklarasi variabel
         $data = Menu::all();
         //mengembalikan view ke halaman index dengan membawa data kategori
         return view('menu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //deklarasi variabel
        $data = Kategori::all();
        //mengembalikan view ke halaman create
        return view('menu.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //deklarasi variabel
        $data = $request->all();
        $data['foto'] = Storage::put('menu/foto',  $request->file('foto'));
        // fungsi create data
        Menu::create($data);
        //mengembalikan view ke halaman menu
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //deklarasi variabel
        $data = Kategori::all();
        //mengembalikan view ke halaman edit
        return view('menu.edit', compact('data', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        // mengubah data didalam database dengan data dalam form
        $data = $request->all();

        //fungsi untuk update foto dan update data
        try {
            $data['foto'] = Storage::put('menu/foto',  $request->foto);
            $menu->update($data);
        } catch (\Throwable $th) {
            $data['foto'] = $menu->foto;
            $menu->update($data);
        }
        //mengembalikan view ke halaman menu
        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        // menghapus data di database berdasarkan id yang dipilih di tabel
        $menu['foto'] = Storage::delete($menu->foto);
        $menu->delete();
        //mengembalikan view ke halaman menu
        return redirect('menu');
    }
    public function beranda()
    {
        //deklarasi variabel
        $data = Menu::all();
        //mengembalikan view ke halaman blog
        return view('beranda', compact('data'));
    }
}
