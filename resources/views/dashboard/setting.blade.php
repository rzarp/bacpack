@extends('dashboard.base')
@section('content')
    <div class="section-header">
        <h1>Lihat Data Account</h1>        
    </div>

     @if (session()->has('pesan'))
    <div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        {{ session()->get('pesan') }}
    </div>
    </div>
    @endif

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Account</h4>
                  </div>
                  
                  <div class="card-body">
                    <table class="table data-table">
                      <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Action</th>
                        </tr>
                      </thead>
                     @foreach($user as $users)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$users->name}}</td>
                                <td>{{$users->email}}</td>
                                <td><img width="100px" src="{{ asset($users->gambar) }}"/></td>
                                <td>
                                    <form method="post" action="">
                                        @csrf
                                        <div class="btn-group">
                                            <a class="btn btn-success" href="{{route ('edit.setting',['id' => $users->id]) }}">Edit</a>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                  </div>
                </div>
              </div>
    </div>


    

    
@endsection

