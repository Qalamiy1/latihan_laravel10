@extends('layouts.index')
@section('content')
    <div class="container mt-3">
    <a href="{{route('tambah_nilai')}}" class="btn btn-primary" >tambah</a>
    <div class="mt-3">
        @if(Session::has('pesan'))
        
        <div class="alert alert-success">
            {{Session::get('pesan')}}
        </div>
        
        @endif
    </div>
        <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Nilai</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataNilai as $item)
            <tr>
                <td>{{$loop -> iteration }}</td>
                <td>{{$item -> nama }}</td>
                <td>{{$item -> nilai }}</td>
                <td>
                    <a href="{{ route('edit_nilai',$item-> nilai_id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('hapus_nilai',$item->nilai_id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                   
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>

    @endsection
