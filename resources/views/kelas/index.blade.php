@extends('layouts.index')
@section('title','kelas')
@section('content')

<div class="container mt-5">
<form class="d-flex" role="search">
      <input class="form-control me-2" type="text" name="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <p>data yang dicari : {{$Search}} </p>
  <a href="{{route('tambah_kelas')}}" class="btn btn-primary">Tambah Data</a>
  <a href="{{route ('faslun')}}" class="btn btn-primary">Refresh</a>
<div class="container" >
<table class="table mt-3 border">
  <thead>
    <tr>
      <th scope="col">nomor</th>
      <th scope="col">kelas</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  @php
  $no=1;
  @endphp
  <tbody>
    @foreach($datakelas as $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->kelas}}</td>
        <td>
            <a href="{{ route('edit_kelas',$item->id) }}" class="btn btn-warning">Edit</a>
           <form action="{{ route('hapus',$item->id) }}" method="post">
           @csrf
            <button type="submit" class="btn btn-danger">hapus</button>
           </form>
        </td>
      </tr>
    @endforeach
    
  </tbody>
</table>
{{ $datakelas->links('vendor.pagination.bootstrap-5') }}
</div>
</div>


@php
$kelas =11; 

@endphp
{{$kelas}}

@for ($i = 0;$i < 10; $i++)
     {{ $i }}
@endfor
@endsection
