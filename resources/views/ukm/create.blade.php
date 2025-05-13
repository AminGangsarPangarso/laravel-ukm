@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah UKM</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ukm.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama">Nama UKM:</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="logo">Logo UKM:</label>
            <input type="file" name="logo" id="logo" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('ukm.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
