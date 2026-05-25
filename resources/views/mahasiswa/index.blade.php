@extends('main')

@section('title', 'Mahasiswa')

@section('content')
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    @session('success')
            <div class="alert alert-success">
                {{ $value }}
            </div>
    @endsession
    <table class="table table-bordered table-hover">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        @foreach ($request as $item)
            <tr>
                <td>{{ $item->npm }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->prodi->nama }}</td>
                <td><img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" width="100"></td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-xs btn-warning btn-rounded">Edit</a>
                    <form method="POST" action="{{ route('mahasiswa.destroy', $item->id) }}" class="d-inline">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm" data-toggle="tooltip"
                            title='Delete' data-nama='{{ $item->nama }}'>Hapus</button>
                    </form>
            </tr>
        @endforeach

    </table>
@endsection