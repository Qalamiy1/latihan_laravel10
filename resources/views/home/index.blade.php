    @extends('layouts.index')
    @section('title','home')

    @section('content')


    ini content coba coba 


    <h1>selamat datang di halaman Home</h1>
    <a href="murid">pindah ke Halaman Siswa</a>


    @php
    $sekolah = 'smk ds';
    $no =1;
    $array = [1,2,3,4];
    @endphp

    {{$sekolah}} <br>

    @if($no)
    <button>nomor{{$no}}</button>
    @else
    <button>nomor bukan 1}</button>
    @endif
    <br>
    @foreach ($array as $gantinnya)
    <h1>{{$gantinnya}}</h1>
    @endforeach
    @endsection
    @section('content2')
    <h1>content2</h1>
    @endsection

