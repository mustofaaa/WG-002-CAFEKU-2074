@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Menu Index</div>

                <div class="card-body ">
                    <a href="{{ route('menu.create') }}" class="btn btn-primary mb-2">Add New Menu</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama }}</td>
                                <td><img src="{{ asset('storage/'.$d->foto) }}" style="height: 100px; width: 150px;">
                                </td>
                                <td>{{ $d->harga }}</td>
                                <td>{{ $d->keterangan }}</td>
                                <td>{{ $d->kategori->nama }}</td>
                                <td>
                                    <a href="{{ route('menu.edit', $d->id ) }}" class="btn btn-sm btn-primary mb-1">Edit</a>
                                    <form action="{{ route('menu.destroy', $d->id ) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                    </form>
                                </td>

                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
