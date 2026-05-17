@extends('main')

@section('title', 'Periode')
@section('content')
<a href="{{ route('periode.create') }}" class="btn btn-primary mb-3">Tambah Data Periode</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Prodi</th>
            <th>Singkatan</th>
            <th>Nama Kaprodi</th>
            <th>Fakultas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_prodi }}</td>
            <td>{{ $item->singkatan }}</td>
            <td>{{ $item->kaprodi }}</td>
            <td>{{ $item->fakultas }}</td>
        </tr>
        @endforeach
    </table>
    @endsection

    {{--<h2>Data Periode</h2>})
@foreach ($result as $item)
    {{$item->tahun_akademik  }} - {{$item->semester  }} <br/>
    
@endforeach--}}