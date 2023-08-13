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
              <h4 class="card-title mb-3">Data Siswa</h4>
              <div class="row">
                <div class="form-group col-md-12">
                  <label>Jenis Kelamin:</label>
                  <div class="dropdown bootstrap-select form-control dropup">
                    <select name="lp" id="jenisKelamin" class="selectpicker form-control" data-style="py-0" tabindex="null">
                      <option selected disabled>Pilih salah satu</option>
                      <option value="laki-laki">laki-laki</option>              
                      <option value="perempuan">perempuan</option>              
                    </select>                 
                  </div>
                </div>
                {{-- <div class="form-group col-md-6">
                  <label>Jenis Kelamin:</label>
                  <div class="dropdown bootstrap-select form-control dropup">
                    <select name="lp" class="selectpicker form-control" data-style="py-0" tabindex="null">
                      <option selected disabled>Pilih salah satu</option>
                      <option>laki-laki</option>                   
                      <option>perempuan</option>                   
                    </select>                
                  </div>
                </div> --}}
              </div>
            </div>
            <div class="btn-group btn-group-toggle btn-group-sm btn-group-flat">    
              <a href="{{ route('students.create') }}" class="btn btn-primary">Add Data</a>
              <a href="#" id="updateAllSelectedRecord" class="btn btn-warning">Update</a>
              <a href="#" class="btn btn-success">Import</a>
              <a href="#" id="deleteAllSelectedRecord" class="btn btn-danger">Delete</a>
            </div>
          </div>
          <div class="card-body">       
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
              // var selectedAllIds = [];
              var table = $('#datatables').DataTable({
                  ajax: '{{ route('json') }}', // Pastikan URL sesuai dengan route yang sesuai
                  processing: true,
                  serverSide: true,
                  deferRender: true,
                  columns: [                                
                    {
                        title: '<div class="text-center">' +
                               '<input type="checkbox" id="selectAll">' +
                               '</div>',                           
                        data: null,
                        render: function(data, type, row) {
                            var checkboxId = data.id;

                            return '<div class="text-center">' +
                                   '<input type="checkbox" class="custom-checkbox" data-id="' + checkboxId + '">' +
                                   '<label class="" for="' + checkboxId + '"></label>' +
                                   '</div>';
                        },
                        searchable: false, // Nonaktifkan pencarian hanya untuk kolom ini
                        orderable: false,
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
                  initComplete: function () {
                        $('#selectAll').on('change', function() {
                            if ($(this).is(':checked')) {
                                selectedAllIds = table.column(0).data().pluck('id').toArray();                             
                            } else {
                                selectedAllIds = [];
                            }
                            $('#deleteAllSelectedRecord').on('click', function() {
                              if(selectedAllIds.length > 0){
                                Swal.fire({
                                  title: 'Apa kamu yakin ingin hapus semua data?',
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
                                              ids: selectedAllIds
                                          }
                                      })
                                      .then(response => {
                                          Swal.fire('Deleted!', 'Data nya sudah dihapus', 'success').then(() => {
                                              table.ajax.reload().then(() => {
                                                $('#selectAll').prop('checked', false);
                                              })
                                          });
                                      })
                                      .catch(error => {
                                          Swal.fire('Data gagal dihapus', '', 'error');
                                          console.error(error);
                                      });
                                  }
                                });
                              }else{
                                Swal.fire('Tidak ada data terpilih', 'Data pada page ini sudah kosong', 'warning').then(() => {
                                  $('#selectAll').prop('checked', false);
                                });
                              }
                            });
                            $('#updateAllSelectedRecord').on('click', function() {                           
                              var selectedGender = $('#jenisKelamin').val();
                              if(selectedAllIds.length > 0){
                                Swal.fire({
                                  title: 'Apa kamu yakin ingin mengubah data?',
                                  showDenyButton: true,
                                  showCancelButton: true,
                                  confirmButtonText: 'Simpan',
                                  denyButtonText: `Jangan disimpan`,
                                }).then((result) => {
                                  if (result.isConfirmed) {
                                    axios.post('{{ route('students.updateALL') }}', {                         
                                              ids: selectedAllIds,
                                              lp: selectedGender                         
                                      })
                                      .then(response => {
                                          Swal.fire('Tersimpan!', 'Data nya sudah diupdate', 'success').then(() => {
                                            $('#selectAll').prop('checked', false).then(() => {
                                              table.ajax.reload();      
                                            })
                                          });
                                      })
                                      .catch(error => {
                                          Swal.fire('Data gagal diupdate', '', 'error');
                                          console.error(error);
                                      });                 
                                  } else if (result.isDenied) {
                                    Swal.fire('Tidak ada data yang diupdate', '', 'info')
                                  }
                                });
                              }else{
                                Swal.fire('Tidak ada data terpilih', 'Data pada page ini sudah kosong', 'warning').then(() => {
                                  $('#selectAll').prop('checked', false);
                                });
                              }
                            });
                        });
                    }
              });
              $('#deleteAllSelectedRecord').on('click', function (){

                var selectedId = [];
                $('.custom-checkbox:checked').each(function(){
                  selectedId.push($(this).data('id'));
                });               
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
              $('#updateAllSelectedRecord').on('click', function() {
                var selectedId = [];
                $('.custom-checkbox:checked').each(function() {
                  selectedId.push($(this).data('id'));
                })
                var selectedGender = $('#jenisKelamin').val();              

                if (selectedId.length === 0) {
                    Swal.fire('Data tidak terpilih', 'Pilih data yang ingin diupdate', 'info');
                    return; // Stop further execution
                }
                Swal.fire({
                  title: 'Apa kamu yakin ingin mengubah data?',
                  showDenyButton: true,
                  showCancelButton: true,
                  confirmButtonText: 'Simpan',
                  denyButtonText: `Jangan disimpan`,
                }).then((result) => {
                  if (result.isConfirmed) {
                     axios.post('{{ route('students.updateALL') }}', {                         
                              ids: selectedId,
                              lp: selectedGender                         
                      })
                      .then(response => {
                          Swal.fire('Tersimpan!', 'Data nya sudah diupdate', 'success').then(() => {
                              table.ajax.reload();                       
                          });
                      })
                      .catch(error => {
                          Swal.fire('Data gagal diupdate', '', 'error');
                          console.error(error);
                      });                 
                  } else if (result.isDenied) {
                    Swal.fire('Tidak ada data yang diupdate', '', 'info')
                  }
                })
              });
          });
    </script>
@endpush


@section('footer')

@stop
