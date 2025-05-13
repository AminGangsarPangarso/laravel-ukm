
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit UKM</h1>

    <form action="{{ route('ukm.edit', $ukm->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama UKM</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $ukm->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $ukm->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control">
            @if($ukm->logo)
                <img src="{{ asset('storage/' . $ukm->logo) }}" width="100" alt="Logo UKM">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection