@extends ('master')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card-body">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-primary">
          <li class="breadcrumb-item"><a href="/dashboard" class="text-white">Dashboard</a></li>
          <li class="breadcrumb-item active text-white" aria-current="page">Student</li>
        </ol>
        </nav>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="header-title">
              <h4 class="card-title">Data Siswa</h4>
            </div>
            <div class="btn-group btn-group-toggle btn-group-sm btn-group-flat">    
              <a href="{{ route('students.create') }}" class="btn btn-primary">Add Data</a>
              <a href="#" class="btn btn-warning">Update</a>
              <a href="#" class="btn btn-success">Import</a>
              <a href="#" id="deleteAllSelectedRecord" class="btn btn-danger">Delete</a>
            </div>
      </div>
      <div class="card-body">
        <!-- <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p> -->
        <div class="table-responsive">
          <table id="datatables" class="table table-striped">
            {{--  --}}
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
              $('#datatables').DataTable({
                  ajax: '{{ route('json') }}', // Pastikan URL sesuai dengan route yang sesuai
                  processing: true,
                  serverSide: true,
                  deferRender: true,
                  columns: [
                    // {title: 'nomor'},
                    { title: 'NISN', data: 'nisn' },
                    { title: 'Nama Siswa', data: 'name' },
                    { title: 'Jenis Kelamin', data: 'lp' },
                    {
                      title: 'Action',
                      data: null,
                          render: function (data, type, row) {
                              var editUrl = '{{ route('students.edit', '__id__') }}';
                              var deleteUrl = '{{ route('students.destroy', '__id__') }}';

                              editUrl = editUrl.replace('__id__', data.id);
                              deleteUrl = deleteUrl.replace('__id__', data.id);

                              return '<a href="' + editUrl + '" class="btn btn-warning">Edit</a>' +
                                    '<form action="' + deleteUrl + '" method="POST" style="display: inline-block;">' +
                                    '@method('DELETE') @csrf' +
                                    '<button type="submit" class="btn btn-danger">Hapus</button>' +
                                    '</form>';
                          },
                      searchable: false,
                    },                                           
                  ],
              });
          });
    </script>
@endpush


@section('footer')

@stop
