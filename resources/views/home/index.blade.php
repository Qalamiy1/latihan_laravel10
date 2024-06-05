    @extends('layouts.index')
    @section('title','home')

    @section('content')
<h1>halo {{auth()->user()->nama}}</h1>    

    @endsection

