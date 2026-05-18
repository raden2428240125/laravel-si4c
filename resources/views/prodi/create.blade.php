@extends('main')
@section('title', 'Tambah Data Program Studi')
@section('content')
    <form action="{{ route('prodi.store') }}" method="post">
        @csrf

<div class="form-group">
  <label for="nama_prodi" class="form-label">Nama Program Studi</label>
  <input type="text" class="form-control" value="{{ old('nama_prodi') }}" placeholder="masukkan nama program studi.." name="nama_prodi">
  @error('nama_prodi')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
  <label for="singkatan" class="form-label">Singkatan Program Studi</label>
  <input type="text" class="form-control" id="singkatan" value="{{ old('singkatan') }}" placeholder="masukkan singkatan program studi.." name="singkatan">
  @error('singkatan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
  <label for="kaprodi" class="form-label">Nama Kaprodi</label>
  <input type="text" class="form-control" id="kaprodi" value="{{ old('kaprodi') }}" placeholder="masukkan nama kaprodi.." name="kaprodi">
  @error('kaprodi')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
  <label for="fakultas_id" class="form-label">Fakultas</label>
  <select class="form-control" id="fakultas_id" name="fakultas_id">
    <option value="">Pilih Fakultas</option>
    @foreach($fakultas as $f)
      <option value="{{ $f->id }}" {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>{{ $f->nama }}</option>
    @endforeach
  </select>
  @error('fakultas_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</div>

</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

@endsection