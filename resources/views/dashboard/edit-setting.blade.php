@extends('dashboard.base')
@section('content')
<form action="{{ route('update.setting',['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data User</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukan Nama" value="{{ $user->name }}">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Masukan Email" value="{{ $user->email }}">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                        <form>
                          <div class="form-group">
                            <label for="exampleFormControlFile1">Input Gambar</label>
                            <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1"  value="{{ $user->gambar }}" >
                          </div>
                        </form>
                        <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                        @error('gambar')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                               
                            </div>
                        </div>
                        <button type="submit" class="btn-primary">Simpan</button>
                    </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</form>
@endsection