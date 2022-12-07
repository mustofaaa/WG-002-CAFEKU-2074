                    @extends('layouts.app')
                    @section('content')
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Edit Menu</div>

                                    <div class="card-body">
                                        <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="nama"
                                                    placeholder="Masukan nama menu" required value="{{ $menu->nama }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Foto</label>
                                                <img src="{{ asset('storage/'.$menu->foto) }}" alt="" width="100px" class="mb-3">
                                                <input type="file" class="form-control" name="foto"
                                                    placeholder="Pilih File">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga</label>
                                                <input type="text" class="form-control" name="harga"
                                                    placeholder="Masukkan Harga" required value="{{ $menu->harga }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Keterangan</label>
                                                <input type="text" class="form-control" name="keterangan"
                                                    placeholder="Masukkan keterangan" required value="{{ $menu->keterangan }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kategori</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="kategori_id">
                                                    <option selected>Pilih Kategori Menu</option>
                                                    @foreach ($data as $kt)
                                                    <option value="{{ $kt->id }}" @selected($menu->
                                                        kategori_id==$kt->id)>{{ $kt->nama }}</option>
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
