@extends('main')

@section('title', 'Edit Periode')

@section('content')
    <form action="{{ route('periode.update', $periode->id) }}" method="post">
        @csrf
        @method('PUT')  
        <div class="form-group">
            <label for="tahun_akademik">Tahun Akademik</label>
            <input type="text" name="tahun_akademik" class="form-control" value="{{ old('tahun_akademik')?? $periode->tahun_akademik }}">
            @error('tahun_akademik')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-group">
            <label for="semster">Semester</label>
            <input type="text" name="semster" class="form-control" value="{{ old('semster') }}">
            @error('semster')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection
