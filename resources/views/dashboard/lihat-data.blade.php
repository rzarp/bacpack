@extends('dashboard.base')
@section('content')
<div class="section-header">
    <h1>Tanya Dan Jawab</h1>
     <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/">Backpack</a></div>
        <div class="breadcrumb-item">Tanya Dan Jawab</div>
    </div>         
</div>

<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header">
    <h4>Thread Saya</h4>
    </div>
    <div class="card-body">
    <ul class="nav nav-tabs" id="myTab2" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">Tanya Dan Jawab</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Blog</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">Galeri</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="tour-tab2" data-toggle="tab" href="#tour" role="tab" aria-controls="contact" aria-selected="false">Tour & Travel</a>
        </li>
    </ul>
    {{-- Tanya jawab --}}
    <div class="tab-content tab-bordered" id="myTab3Content">
        <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
            <table class="table data-table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Desc</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach($quest as $q)
                <tr>
                 <th scope="row">{{ $loop->iteration }}</th>
                 <td>{{$q->title}} </td>
                 <td> {{$q->deskripsi}}</td>
                 <td><img width="150px" src="{{ asset($q->gambar) }}"/></td>
                 <td> 
                    <form action="{{ route('data.destroy',['id' => $q->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="{{ url('/' . $q->slug) }}" class="btn btn-light btn-sm">lihat</a>
                        <a href="{{ route('data.edit',['id' => $q->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                 </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      {{-- end tanya jawab --}}

        {{-- Blog --}}
        <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
          <table class="table data-table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Desc</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach($blog as $b)
                <tr>
                 <th scope="row">{{ $loop->iteration }}</th>
                 <td>{{$b->title}} </td>
                 <td> {{$b->deskripsi}}</td>
                 <td><img width="150px" src="{{ asset($b->gambar) }}"/></td>
                 <td> 
                    <form action="{{ route('blog.destroy',['id' => $b->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="{{ url('blog/' . $b->slug) }}" class="btn btn-light btn-sm">lihat</a>
                        <a href="{{ route('blog.edit',['id' => $b->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                 </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        {{-- galeri --}}
        <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
          <table class="table data-table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Desc</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach($galeri as $g)
                <tr>
                 <th scope="row">{{ $loop->iteration }}</th>
                 <td>{{$g->title}} </td>
                 <td> {{$g->deskripsi}}</td>
                 <td><img width="150px" src="{{ asset($g->gambar) }}"/></td>
                 <td> 
                    <form action="{{ route('galeri.destroy',['id' => $g->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="{{ url('galeri/' . $g->slug) }}" class="btn btn-light btn-sm">lihat</a>
                        <a href="{{ route('galeri.edit',['id' => $g->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                 </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        {{-- end galeri --}}

        {{-- tour --}}
        <div class="tab-pane fade" id="tour" role="tabpanel" aria-labelledby="tour-tab2">
          <table class="table data-table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Desc</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach($tour as $t)
                <tr>
                 <th scope="row">{{ $loop->iteration }}</th>
                 <td>{{$t->title}} </td>
                 <td> {{$t->deskripsi}}</td>
                 <td><img width="150px" src="{{ asset($t->gambar) }}"/></td>
                 <td> 
                    <form action="{{ route('tour.destroy',['id' => $t->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="{{ url('tour/' . $t->slug) }}" class="btn btn-light btn-sm">lihat</a>
                        <a href="{{ route('tour.edit',['id' => $t->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                 </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        {{-- end tour --}}
    </div>
    </div>
</div>
</div>
</div>

@endsection


@section('script')

<script>
  $('body').on('click','.delete-confirm',function (event) {
    event.preventDefault();
    const url = $(this).attr('href');

    Swal.fire({
      title: 'Apakah Anda Yakin ? ',
      text: "Hapus Data ini!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus'
    }).then((result) => {
      if (result.value) {
        window.location.href = url;
      }
    })
  });
</script>


@endsection
