@extends('main')
@section('title', 'Edit Data Program Studi')
@section('content')
    <form action="{{ route('prodi.update', $prodi->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_prodi">Nama Program Studi</label>
            <input type="text" name="nama_prodi" class="form-control" value="{{ old('nama_prodi')?? $prodi->nama_prodi }}">
            @error('nama_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label for="singkatan">Singkatan Program Studi</label>
            <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan')?? $prodi->singkatan }}">
            @error('singkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="kaprodi">Nama Kaprodi</label>
            <input type="text" name="kaprodi" class="form-control" value="{{ old('kaprodi')?? $prodi->kaprodi }}">
            @error('kaprodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fakultas_id">Fakultas</label>
            <select class="form-control" id="fakultas_id" name="fakultas_id">
                <option value="">Pilih Fakultas</option>

                @foreach ($fakultas as $f)
                    <option value="{{ $f->id }}" {{ (old('fakultas_id') ?? $prodi->fakultas_id) == $f->id ? 'selected' : '' }}>
                        {{ $f->nama }}</option>
                @endforeach

            </select>
            @error('fakultas_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    </body>

    </html>

@endsection
