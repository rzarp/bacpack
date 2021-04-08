@extends('dashboard.base')
@section('content')
<div class="section-header">
    <h1>Tour & Travel</h1>
     <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Backpack</a></div>
        <div class="breadcrumb-item">Tour & Travel</div>
    </div>         
</div>
@if (Auth::check())
<p class="section-lead">
    Tour dan travel. &nbsp;
    <a href="{{route('tour.input')}}" class="btn btn-primary">Tambah Thread</a>
</p>
@else


<div class="card">
    <div class="card-header">
        <h4>Backpacker Indonesia</h4>
    </div>
<div class="card-body">
    Selamat datang di backpackerindonesia.com,
    Sebuah forum seputar backpacking dan traveling.
    Untuk bertanya atau diskusi dengan backpacker lain,
    silakan bergabung dengan komunitas kami.
</div>
<div class="card-footer text-left">
    <a class="btn btn-success" href="{{ route('login') }}">Login</a>
    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
</div>
</div>

@endif

<br>

@forelse ($tour as $t)
<div class="row">
<div class="col-md-7">
<div class="card">
    <div class="card-header">
    <h4><a href="{{ url('tour/' . $t->slug) }}">{{$t->title}}</a></h4>
    <div class="card-header-action">
        Pada {{ Carbon::now()->isoFormat('dddd, D MMMM Y')}}
    </div>
    </div>
    <div class="card-body">
    <div class="chocolat-parent">
        <a href="{{ asset($t->gambar) }}" class="chocolat-image" title="Just an example">
        <div data-crop-image="285" style="overflow: hidden; position: relative; height: 285px;">
            <img alt="image" src="{{ asset($t->gambar) }}" class="img-fluid">
        </div>
        </a>
    </div>
    <hr>
    
    <a href="{{ url('galeri/' . $t->slug) }}" class="btn btn-icon icon-left"><i class="fa fa-eye"></i> Lihat</a>
    <a href="{{ url('galeri/' . $t->slug) }}" class="btn btn-icon icon-left"><i class="fa fa-comment"></i >Komen</a>
    
    </div>
</div>
</div>
</div>
@empty
    <h1>Data kosong</h1>
@endforelse
@endsection