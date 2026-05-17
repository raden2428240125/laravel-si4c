@extends('main')
@section('title', 'Tambah Data Fakultas')
@section('content')
    <form action="{{ route('fakultas.store') }}" method="post">
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

    <for action="{{ route('fakultas.store') }}" method="post">
        @csrf

<div class="form-group">
  <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
  <input type="text" class="form-control" value="{{ old('nama_fakultas') }}" placeholder="masukkan nama fakultas.." name="nama_fakultas">
  @error('nama_fakultas')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
  <label for="singkatan" class="form-label">Singkatan Fakultas</label>
  <input type="text" class="form-control" id="singkatan" value="{{ old('singkatan') }}" placeholder="masukkan singkatan fakultas.." name="singkatan">
  @error('singkatan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
  <label for="dekan" class="form-label">Nama Dekan</label>
  <input type="text" class="form-control" id="dekan" value="{{ old('dekan') }}" placeholder="masukkan nama dekan fakultas.." name="dekan">
  @error('dekan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</div>

</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

@endsection