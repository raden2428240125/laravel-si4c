@extends('main')

@section('title', 'prodi')

@section('content')
    <a href="{{ route('prodi.create') }}" class="btn btn-primary mb-3">Tambah Prodi</a>
    @session('success')
            <div class="alert alert-success">
                {{ $value }}
            </div>
    @endsession
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Singkatan</th>
        <th>Kaprodi</th>
        <th>Fakultas</th>
    </tr>

    @foreach($result as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_prodi }}</td>
        <td>{{ $item->singkatan }}</td>
        <td>{{ $item->kaprodi }}</td>
        <td>{{ $item->fakultas->nama ?? '-' }}</td>
            <td>
                <a href="{{ route('prodi.edit', $item->id) }}" class="btn btn-xs btn-warning btn-rounded">Edit</a>
                <form method="POST" action="{{ route('prodi.destroy', $item->id) }}" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm" data-toggle="tooltip"
                        title='Delete' data-nama='{{ $item->nama_prodi }}'>Hapus</button>
                </form>
    </tr>
    @endforeach

</table>
@endsection