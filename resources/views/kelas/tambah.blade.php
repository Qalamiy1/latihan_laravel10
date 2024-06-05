@extends('layouts.index')
@section('content')
<div class="container">
    <h2>tambah kelas</h2>
    @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $item)
        <li>
        <div class="alert alert-danger" role="alert">
        {{$item}}
        </div>
        </li>
      @endforeach
    </ul>
    @endif
<form action="{{ route('aksi_tambah') }}" method="post">
   @csrf
    <div class="mb-3">
         <label class="form-label">Kelas</label>
         <input type="text" name="kelas" class="form-control"  placeholder="Masukan kelas">
    </div>
      <button type="submit" class="btn btn-primary">tambah</button>
</form>
</div>
@endsection