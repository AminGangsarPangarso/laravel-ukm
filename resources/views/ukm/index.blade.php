
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar UKM Kampus</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ukm.create') }}" class="btn btn-primary mb-3">+ Tambah UKM</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Logo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ukms as $ukm)
                <tr>
                    <td>{{ $ukm->nama }}</td>
                    <td>{{ $ukm->deskripsi }}</td>
                    <td>
                        @if($ukm->logo)
                            <img src="{{ asset('storage/' . $ukm->logo) }}" width="50" alt="Logo UKM">
                        @else
                            Tidak ada logo
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('ukm.edit', $ukm->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('ukm.destroy', $ukm->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus UKM ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection