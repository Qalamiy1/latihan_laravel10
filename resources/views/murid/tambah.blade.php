

@extends('layouts.index')

@section('content')
<div class="container">
    <h2>Tambah Siswa</h2>
    <form action="{{ route('aksi_siswa') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="siswa" class="form-label">nama</label>
            <input type="text" name="nama"  class="form-control" placeholder="Masukkan nama siswa" required>
        </div>
        <div class="mb-3">
            <label for="siswa" class="form-label">alamat</label>
            <input type="text" name="alamat"  class="form-control" placeholder="Masukkan nama siswa" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
