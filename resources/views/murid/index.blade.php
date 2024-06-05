        <!-- extend ini berisikan apa yang ada di file layouts di file index jadi ini fungsinya untuk
         menyingkat waktu untuk membuat navbar ataupun footer -->

    @extends('layouts.index')
    @section('title','murid')


       <!-- disini isi content masukan ke dalam section -->
       <!-- where('siswa','like','%'.$search.'%')-> -->
        @section('content')
        <div class="container mt-5">
<form class="d-flex" role="search">
      <input class="form-control me-2" type="text" name="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <p>data yang dicari : {{$Search}} </p>
    <a href="{{route('tambah_siswa')}}" class="btn btn-primary">Tambah</a>
<div class="container" >
<table class="table mt-3 border">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nama</th>
      <th scope="col">alamat</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  </thead>
  <tbody>
    @foreach($datasiswa as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->nama}}</td>
        <td>{{$item->alamat}}</td>
        <td>
            <a href="{{ route('edit',$item->id) }}"  class="btn btn-warning">Edit</a>
            <a href="{{ route('hapus',$item->id) }}" class="btn btn-danger">Hapus</a>
        </td>
      </tr>
    @endforeach
   
    
  </tbody>
</table>
{{ $datasiswa->links('vendor.pagination.bootstrap-5') }}
</div>
</div>

       @endsection

        <!-- penutup content dengan endsection -->