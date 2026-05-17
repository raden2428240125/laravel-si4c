@extends('main')
@section('title', 'Tambah Data Periode')
@section('content')
    <form action="{{ route('periode.store') }}" method="post">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <for action="{{ route('periode.store') }}" method="post">
        @csrf

<div class="form-group">
  <label for="nama_periode" class="form-label">Nama Periode</label>
  <input name="nama_periode" type="text" class="form-control" value="{{ old('nama_periode') }}">
    @error('nama_periode')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>

<div class="form-group">
  <label for="singkatan" class="form-label">Tahun</label>
  <input name="singkatan" type="text" class="form-control" value="{{ old('singkatan') }}">
    @error('singkatan')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>

<div class="form-group">
    <label for="kaprodi" class="form-label">Nama Kaprodi</label>
    <input name="kaprodi" type="text" class="form-control" value="{{ old('kaprodi') }}">
    @error('kaprodi')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>

<div class="form-group">
    <label for="fakultas" class="form-label">Fakultas</label>
    <input name="fakultas" type="text" class="form-control" value="{{ old('fakultas') }}">
    @error('fakultas')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>

<button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>

@endsection
    
