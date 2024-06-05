@extends('layouts.index')

@section('content')
<div class="container">
    <h2>edit</h2>
<form action="{{ route('aksi_edit',$datakelas->id) }}" method="post">
   @csrf
    <div class="mb-3">
         <label class="form-label">Kelas</label>
         <input type="text" value="{{ $datakelas->kelas }}" name="kelas" class="form-control"  placeholder="Masukan kelas">
    </div>
      <button type="submit" class="btn btn-primary">tambah</button>
</form>
</div>
@endsection