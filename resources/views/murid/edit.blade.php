

@extends('layouts.index')

@section('content')
<div class="container">
    <h2>Edit Siswa</h2>
    <form action="{{ route('aksi_siswa') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="siswa" class="form-label">nama</label>
            <input type="text" value="{{ $datasiswa->nama }}" name="nama"  class="form-control" placeholder="Masukkan nama siswa" required>
        </div>
        <div class="mb-3">
            <label for="siswa" class="form-label">alamat</label>
            <input type="text" value="{{ $datasiswa->alamat }}" name="alamat"  class="form-control" placeholder="Masukkan nama siswa" required>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    
</div>
@endsection
