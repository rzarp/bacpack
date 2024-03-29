@extends('dashboard.base')
@section('content')
<div class="section-header">
    <h1>Tour & Travel</h1>
     <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/">Backpack</a></div>
        <div class="breadcrumb-item">Tour & Travel</div>
    </div>         
</div>


<div class="card mb-3">
    @if(isset($tour->gambar))
    <img class="img-fluid" src="{{ asset ((isset($tour->gambar) ? $tour->gambar : '')) }}" data-holder-rendered="true">    
    @endif
  <div class="card-body">
    <h5 class="card-title">{{$tour->title }}</h5>
    <p class="card-text">{{ $tour->deskripsi }}</p>
    <p class="card-text"><small class="text-muted">{{ Carbon::now()->isoFormat('dddd, D MMMM Y')}} </small></p>
    <img alt="image" src="{{asset($tour->user['gambar'])}}" class="rounded-circle mr-1" aria-expanded="false" v-pre style="width:50px">
    <small class="text-muted">Oleh : {{$tour->user['name']}}</small></p>
  </div>
</div>

@if (Auth::check())
<form action="{{ url('/commenttour') }}" method="post">
@csrf
<input type="hidden" name="id" value="{{ $tour->id }}" class="form-control">
<input type="hidden" name="parent_id" id="parent_id" class="form-control">                
<div class="card">
  <div class="card-body">
    <div class="form-group" style="display: none" id="formReplyComment">
        <label for="">Balas Komentar</label>
        <input type="text" id="replyComment" class="form-control" readonly>
    </div>
    <h5 class="card-title">Komentari</h5>
     <textarea name="comment" cols="30" rows="10" class="form-control" required></textarea>
     <br>
    <button class="btn btn-primary btn-sm">Kirim</button>
  </div>

  <div class="col-md-12">
@foreach ($tour->commentstour as $row)
    <blockquote>
        <hr>
        <p>{{ $row->comment }}</p>
        <p><small class="text-muted">{{ Carbon::now()->isoFormat('dddd, D MMMM Y')}}</small></p>
        <a href="javascript:void(0)" onclick="balasKomentar({{ $row->id }}, '{{ $row->comment }}')">Balas</a>
    </blockquote>
    @foreach ($row->childtour as $val) 
        <div class="child-comment">
            <blockquote>
                <hr>
                <p>{{ $val->comment }} </p>
                <p><small class="text-muted">{{ Carbon::now()->isoFormat('dddd, D MMMM Y')}}</small></p>
            </blockquote>
        </div>
    @endforeach
@endforeach
</div>
</div>
</form>

@else


<div class="card">
    <div class="card-body">
    Silakan <a href="{{ route('login') }}">Login</a> atau
    <a href="{{ route('register') }}">mendaftar</a>
    untuk mengirim komentar
    </div>
</div>




@endif


@endsection