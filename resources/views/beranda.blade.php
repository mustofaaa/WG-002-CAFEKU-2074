@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>List Menu Cafeku</h1>
        @foreach ($data as $dt)
        <div class="col-3 mt-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/'. $dt->foto) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $dt->nama }}</h5>
                    <p class="card-text"> {{ Str::limit($dt->keterangan, 120) }}</p>
                </div>
                <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $dt->harga }}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
