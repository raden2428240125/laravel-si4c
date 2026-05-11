@extends('main')
@section('title', 'fakultas')
@section('content')
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Nama Fakultas</th>
        <th>Singkatan</th>
        <th>Dekan</th> 
    </tr>
    @foreach($result as $item)
    <tr>
        <td>{{ $loop-> iteration }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->singkatan }}</td>
        <td>{{ $item->dekan }}</td>
    </tr>
    @endforeach
</table>
@endsection