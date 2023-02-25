@extends('admin.base')
@section('content')
<div class="section-header">
    <h1>Data quest</h1>         
</div>
  
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        <h4>Data Quest</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered data-table">
            <thead>
                <tr>
                <th>
                    No
                </th>
                <th>title</th>
                <th>slug</th>
                <th>deskripsi</th>
                <th>gambar</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>action</th>
                </tr>
            </thead>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection

@push('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('v1.qa.qa.show') }}",
        columns: [
            {
                data: 'DT_RowIndex', 
                name: 'DT_RowIndex'
            },
            {
                data: 'title', 
                name: 'title',
            },
            {
                data: 'slug', 
                name: 'slug',
            },
            {
                data: 'deskripsi', 
                name: 'deskripsi',
            },
            {
                data: 'gambar',
                name: 'gambar',
                render: function(data, type, row, meta) {
                  if (data) {
                    return '<img src="' + data + '" alt="' + data + '" width="100px" />';
                  }
                  return 'Foto Kosong';
                },
              },
            {
                data: 'created_at', 
                name: 'created_at',
                type: 'num',
                  render: {
                      _: 'display',
                      sort: 'timestamp'
                  }
            },

            {
                data: 'updated_at', 
                name: 'updated_at',
                type: 'num',
                  render: {
                      _: 'display',
                      sort: 'timestamp'
                  }
            },

            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false
            },
            
        ]
    });
    
  });
</script>



<script>
  $('body').on('click','.delete-confirm',function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    Swal.fire({
      title: 'Apakah Kamu Yakin ? ',
      text: "Hapus Data ini!",
      icon: 'warning',
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

<script>
  $('body').on('click','.edit-confirm',function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    Swal.fire({
      title: 'Apakah Kamu Yakin ? ',
      text: "Edit Data ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Edit'
    }).then((result) => {
      if (result.value) {
        window.location.href = url;
      }
    })
  });
</script>

@endpush