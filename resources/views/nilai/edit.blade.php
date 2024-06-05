@extends ('layouts.index')

@section('content')

 <div class="container"> 
   <div class="mt-3 ">
@if($errors->any())
  
<ul>
    @foreach($errors->all() as $item)
    <div class="alert alert-danger">
    <li>{{$item}}</li>
    </div>
    @endforeach

</ul>

@endif

@if (Session::has('validasi_nilai'))
   <div class="alert alert-danger">
    {{Session::get('validasi_nilai')}}
    </div>
    @endif
@if(Session::has('hapus'))

    {{Session::get('hapus')}}

@endif
@if(Session::has('edit_nilai'))
    {{Session::get('edit_nilai')}}

@endif

    </div>

    <form action="{{Route('aksi_edit_nilai',$nilai->id)}}" method="post">
        @csrf
        <div class="mb-3">
        <label for="siswa" >Siswa</label>
    <select class="form-control" name="siswa_id">
        <option value="">Pilih siswa</option>
        @foreach($dataSiswa as $siswa)
        <option 
        @if($siswa->id==$nilai->siswa_id)
        selected
        @endif
        
        value="{{$siswa->id}}">{{$siswa ->nama}}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
    <label for="nilai">nilai</label>
    <input class="form-control" value="{{ $nilai->nilai }}" type="text" name="nilai">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    </form>
 </div>
@endsection