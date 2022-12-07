@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kategori</div>

                <div class="card-body">
                    <form action="{{ route('kategori.update', $kategori->id ) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                          <label class="form-label">Nama Kategori</label>
                          <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kategori" value="{{ $kategori->nama }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
