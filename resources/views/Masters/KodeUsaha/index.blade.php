@extends('layouts.master')
@section('title','Master Kode Usaha')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Jenis Usaha</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active"> Jenis Usaha</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">jsGrid</h3> --}}
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary" id="addButton">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-data" class="table table-bordered table-striped" style="width:100%;"> 
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Kode Usaha</th>
                            <th>Keterangan Usaha</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <!--data is here-->
                    </tbody>
                </table> 
            </div>
            <!-- /.card-body -->
        </div>
    </section>



    {{-- modal pop up add --}}
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Master Jenis Usaha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="usaha_code">Jenis Usaha</label>
                                <input type="text" name="usaha_code" class="form-control form-control-sm mb-3 usaha_code" placeholder="Jenis Usaha">                             
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="usaha_name">Keterangan Usaha</label>
                                <input type="text" name="usaha_name" class="form-control form-control-sm mb-3 usaha_name" placeholder="Keterangan Usaha">
                                

                            </div>
                        </div>
                    </div>
                </div>                                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save()">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Master Jenis Usaha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="usaha_code">Jenis Usaha</label>
                                <input type="hidden" name="usaha_code" class="form-control form-control-sm mb-3 usaha_id" placeholder="Jenis Perusahaan">            
                                <input type="text" name="usaha_code" class="form-control form-control-sm mb-3 usaha_code_edit" placeholder="Jenis Usaha" readonly>                             
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="usaha_name_edit">Keterangan Usaha</label>
                                <input type="text" name="usaha_name_edit" class="form-control form-control-sm mb-3 usaha_name_edit" placeholder="Keterangan Usaha">
                                

                            </div>
                        </div>
                    </div>
                </div>                                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="update()">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>





<script>
    $( document ).ready(function() {
        $( ".datepicker" ).datepicker();
        
        var table = $('#table-data').DataTable({
        pageLength: 20,
        processing: true,
        
        ajax: {
            "url"  : "{{ route('master_kode_usaha.list') }}"
        },
        columns: [  
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            // Mengembalikan nomor urut berdasarkan indeks baris + 1
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'usaha_code',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'usaha_name',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'usaha_id',  
                        render: function ( data, type, row, meta ) {
                            return '<button class="btn btn-primary" type="button" onclick="edit(\'' + data + '\', \'' + row.usaha_code + '\', \'' + row.usaha_name + '\')">Edit</button> &nbsp; <button class="btn btn-danger" type="button" onclick=remove('+ data +')>Remove</button>';

                        },
                        className: 'text-center' 
                    }
                ]
       
        });
    });


    // button add condition
    $("#addButton").click(function() {
        $(".form-control").val("");
        $("#addModal").modal("show");
    });

    function save() 
    {
      
        var usaha_code = $('.usaha_code').val();
        var usaha_name = $('.usaha_name').val();
    
        if(usaha_code=='' || usaha_name=='') {
            Swal.fire({
            title: 'Warning !',
            text: "Please don't leave the field(s) empty.",
            icon: 'error',
            confirmButtonText: 'Okay'
            });
        }else{

            Swal.fire({
            title: 'Loading',
            html: 'Sending data...',
            allowOutsideClick: false,
            didOpen: function () {
                Swal.showLoading();
            }
            });

            // AJAX POST request
            $.ajax({
                url: "{{ route('master_kode_usaha') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    usaha_code: usaha_code,
                    usaha_name: usaha_name
                },
                success: function (response) {
                    // Berhasil
                    Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message
                    });
                    refresh();
                    $("#addModal").modal("hide");
                },
                error: function (xhr, status, error) {
                    // Error
                    Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan saat mengirim data'
                    });
                },
                complete: function () {
                    // Selesai, tutup loading
                    // Swal.close();
                }
            });

        }
  
      
    }

    function edit(usaha_id, usaha_code, usaha_name) 
    {
        $("#editModal").modal("show");
        $(".form-control").val("");
        $('.usaha_id').val(usaha_id);
        $('.usaha_code_edit').val(usaha_code);
        $('.usaha_name_edit').val(usaha_name);
    }

    function update() 
    {
      
      var usaha_id = $('.usaha_id').val();
      var usaha_code = $('.usaha_code_edit').val();
      var usaha_name = $('.usaha_name_edit').val();
  
      if(usaha_name=='') {
          Swal.fire({
          title: 'Warning !',
          text: "Please don't leave the field(s) empty.",
          icon: 'error',
          confirmButtonText: 'Okay'
          });
      }else{

          Swal.fire({
          title: 'Loading',
          html: 'Sending data...',
          allowOutsideClick: false,
          didOpen: function () {
              Swal.showLoading();
          }
          });

          // AJAX POST request
          $.ajax({
            //   url: "{{ route('master_kode_usaha') }}",
              url: "{{ route('master_kode_usaha') }}",
              type: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  usaha_id: usaha_id,
                  usaha_code: usaha_code,
                  usaha_name: usaha_name
              },
              success: function (response) {
                  // Berhasil
                  Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: response.message
                  });
                  refresh();
                  $("#editModal").modal("hide");
              },
              error: function (xhr, status, error) {
                  // Error
                  Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Terjadi kesalahan saat mengirim data'
                  });
              },
              complete: function () {
                  // Selesai, tutup loading
                  // Swal.close();
              }
          });

      }

    
    }


    function remove(param){
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete Usaha !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire({
                        title: 'Loading',
                        html: 'Sending data...',
                        allowOutsideClick: false,
                        didOpen: function () {
                            Swal.showLoading();
                        }
                        });

                        $.ajax({
                            url: "{{ route('master_kode_usaha') }}",
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                                usaha_id: param
                            },
                            success: function (response) {
                                // Berhasil
                                refresh();
                                Swal.fire(
                                    'Deleted!',
                                    'Usaha  has been deleted.',
                                    'success'
                                );
                            },
                            error: function (xhr, status, error) {
                                // Error
                                Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Terjadi kesalahan saat mengirim data'
                                });
                            },
                            complete: function () {
                                // Selesai, tutup loading
                                // Swal.close();
                            }
                        });
                }
        });
    }

    
    function refresh() {
        $('#table-data').DataTable().ajax.reload();
    }

</script>

@endsection
