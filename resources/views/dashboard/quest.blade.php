@extends('dashboard.base')
@section('content')
<div class="section-header">
    <h1>Tanya Dan Jawab</h1>
     <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Backpack</a></div>
        <div class="breadcrumb-item">Tanya Dan Jawab</div>
    </div>         
</div>
@if (Auth::check())
<p class="section-lead">
    Tanya jawab tentang backpacker atau yang berhubungan. &nbsp;
    <a href="{{route('input.quest')}}" class="btn btn-primary">Tambah Thread</a>
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

@forelse ($quest as $q)
<div class="row">
<div class="col-md-7">
<div class="card">
    <div class="card-header">
    <h4><a href="{{ url('/' . $q->slug) }}">{{$q->title}}</a></h4>
    <div class="card-header-action">
        Pada {{ Carbon::now()->isoFormat('dddd, D MMMM Y')}}
    </div>
    </div>
    <div class="card-body">
    {{-- <div class="mb-2 text-muted">{{$q->deskripsi}}</div> --}}
    <div class="chocolat-parent">
        <a href="{{ asset($q->gambar) }}" class="chocolat-image" title="Just an example">
        <div data-crop-image="285" style="overflow: hidden; position: relative; height: 285px;">
            <img alt="image" src="{{ asset($q->gambar) }}" class="img-fluid">
        </div>
        </a>
    </div>
    <hr>
    
    <a href="{{ url('/' . $q->slug) }}" class="btn btn-icon icon-left"><i class="fa fa-eye"></i> Lihat</a>
    <a href="{{ url('/' . $q->slug) }}" class="btn btn-icon icon-left"><i class="fa fa-comment"></i >Komen</a>
    
    </div>
</div>
</div>
</div>
@empty
    <h1>Data kosong</h1>
@endforelse

@endsection