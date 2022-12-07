@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Menu</div>

                <div class="card-body">
                    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama menu"
                                value="{{ old('judul') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" placeholder="Pilih File" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga menu" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan menu"
                                value="{{ old('content') }}" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" aria-label="Default select example" name="kategori_id">
                                <option selected disabled>Pilih Kategori Menu</option>
                                @foreach ($data as $kt)
                                <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
