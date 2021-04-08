@extends('dashboard.base')
@section('content')
<div class="section-header">
    <h1>Forum</h1>
     <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Backpack</a></div>
        <div class="breadcrumb-item">Forum</div>
    </div>         
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <div class="alert alert-light">
                <a href="/input/tanya"><div class="alert-title">Tanya Dan jawab</div></a>
                Tanya jawab tentang backpacker atau yang berhubungan.
            </div>
            <div class="alert alert-light">
                <a href="/input/blog"><div class="alert-title">Blog</div></a>
                Berbagi Cerita Pengalaman
            </div>
            <div class="alert alert-light">
                <a href="/input/galeri"><div class="alert-title">Galeri</div></a>
                Berbagi Foto Perjalanan
            </div>
            <div class="alert alert-light">
                <a href="/input/tour"><div class="alert-title">Tour And Travel</div></a>
                Tour Dan Travel
            </div>
        </div>
        </div>
    </div>
</div>    
@endsection