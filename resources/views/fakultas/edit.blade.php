@extends('main')

@section('title', 'Edit Fakultas')

@section('content')
    <form action="{{ route('fakultas.update', $fakultas->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_fakultas">Nama Fakultas</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama')?? $fakultas->nama }}">
            @error('nama_fakultas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="singkatan">Singkatan</label>
            <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan')?? $fakultas->singkatan }}">
            @error('singkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="dekan">Nama Dekan</label>
            <input type="text" name="dekan" class="form-control" value="{{ old('dekan')?? $fakultas->dekan }}">
            @error('dekan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection
