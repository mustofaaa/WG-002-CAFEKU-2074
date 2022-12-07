@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (Auth::user()->role == 'admin')
            <div class="col-md-8">
                <form action="{{ route('dashboard.store', []) }}" method="post" class="card">
                    @csrf
                    <div class="card-header">
                        Order
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="">Pesanan</label>
                            <input type="text" class="form-control" name="pesanan">
                            <small class="form-text">Gunakan tanda (,) untuk menambah banyak menu</small>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="member">Member</option>
                                <option value="biasa">Biasa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                @isset($data)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Nama :  {{ $data['nama'] }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Jumlah Pesanan : {{ $data['jumlah_pesanan'] }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Total Pesanan : {{ $data['total_pesanan'] }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Status : {{ $data['status'] }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Diskon : {{ $data['diskon'] }}</th>
                        </tr>
                        <tr>
                            <th scope="row">Total Pembayaran : {{ $data['total_pembayaran'] }}</th>
                        </tr>
                    </tbody>
                </table>
                @endisset
            </div>
            @endif
        </div>
        @if (Auth::user()->role == 'owner')
            <div class="col-md-8">
            <p>Selamat Datang {{ Auth::user()->name }}</p>
        </div>
        @endif
    </div>
    @endsection
    