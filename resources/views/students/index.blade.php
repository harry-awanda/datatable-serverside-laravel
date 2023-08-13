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
              var table = $('#datatables').DataTable({
                  ajax: '{{ route('json') }}', // Pastikan URL sesuai dengan route yang sesuai
                  processing: true,
                  serverSide: true,
                  deferRender: true,
                  columns: [
                    // {title: 'nomor'},                  
                    {
                        title: 'checkBox',
                        data: null,
                        render: function(data, type, row) {
                            var checkboxId = data.id;

                            return '<div class="">' +
                                '<input type="checkbox" class="custom-checkbox" data-id="' + checkboxId + '">' +
                                '<label class="" for="' + checkboxId + '"></label>' +
                                '</div>';
                        },
                        searchable: false, // Nonaktifkan pencarian hanya untuk kolom ini
                    },
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

                              return  '<div class="btn-group btn-group-toggle btn-group-sm btn-group-flat">' + 
                                      '<a href="' + editUrl + '" class="btn btn-warning">Edit</a>' +
                                      '<a class="button btn button-icon bg-danger" href="' + deleteUrl + '" onclick="event.preventDefault(); document.getElementById(\'delete-form-' + data.id + '\').submit();">Delete</a>' +
                                      '</div>' +
                                      '<form id="delete-form-' + data.id + '" action="' + deleteUrl + '" method="POST" style="display: none;">' +                                   
                                      '@method('DELETE') @csrf' +                                    
                                      '</form>';
                          },
                      searchable: false,
                    },                                           
                  ],
                  order: [[1, 'asc']],
              });
              $('#deleteAllSelectedRecord').on('click', function (){
                // alert('Script executed');
                var selectedId = [];
                $('.custom-checkbox:checked').each(function(){
                  selectedId.push($(this).data('id'));
                });
                // console.log(selectedId);
                if (selectedId.length === 0) {
                    Swal.fire('Data tidak terpilih', 'Pilih data yang ingin dihapus', 'info');
                    return; // Stop further execution
                }
                Swal.fire({
                  title: 'Apa kamu yakin ingin hapus data?',
                  text: "Data yang sudah dihapus tidak bisa dikembalikan",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Iya, hapus!'
                }).then((result) => {
                  if (result.isConfirmed) {
                      axios.delete('{{ route('students.deleteALL') }}', {
                          data: {
                              ids: selectedId
                          }
                      })
                      .then(response => {
                          Swal.fire('Deleted!', 'Data nya sudah dihapus', 'success').then(() => {
                              table.ajax.reload();
                          });
                      })
                      .catch(error => {
                          Swal.fire('Data gagal dihapus', '', 'error');
                          console.error(error);
                      });
                  }
                });
              });
          });
    </script>
@endpush


@section('footer')

@stop
