@extends('layouts.master')
@section('title','Master Bloc')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Bloc</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active">Bloc</li>
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
                            <th>Bloc Code</th>
                            <th>Bloc Name</th>
                            <th>Start Selling</th>
                            <th>Handover</th>
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
                <h5 class="modal-title" id="addModalLabel">Add Master Bloc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="bloc_code">Bloc Code</label>
                                <input type="text" name="bloc_code" class="form-control form-control-sm mb-3 bloc_code" placeholder="Bloc Code" maxlength="6">
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="bloc_name">Bloc / Cluster Name</label>
                                <input type="text" name="bloc_name" class="form-control form-control-sm mb-3 bloc_name" placeholder="Bloc / Cluster Name">
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="start_salles">Start Salles</label>
                                <input type="text" name="start_salles" class="form-control form-control-sm mb-3 datepicker start_salles" placeholder="Start Salles">
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="handover_date">Handover Date</label>
                                <input type="text"  name="handover_date" class="form-control form-control-sm mb-3 handover_date" placeholder="Handover Date">                                

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


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Master Bloc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="bloc_code">Bloc Code</label>
                                <input type="hidden" name="bloc_id"  class="form-control form-control-sm mb-3 bloc_id" placeholder="Bloc Code">
                                <input type="text" name="bloc_code" maxlength="6" class="form-control form-control-sm mb-3 bloc_code_edit" placeholder="Bloc Code" readonly>
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="bloc_name">Bloc / Cluster Name</label>
                                <input type="text" name="bloc_name" class="form-control form-control-sm mb-3 bloc_name_edit" placeholder="Bloc / Cluster Name">
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="start_salles">Start Salles</label>
                                <input type="date" name="start_salles" class="form-control form-control-sm mb-3 datepicker start_salles_edit" placeholder="Start Salles">
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="handover_date">Handover Date</label>
                                <input type="text"  name="handover_date" class="form-control form-control-sm mb-3 handover_date_edit" placeholder="Handover Date">                                

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
            "url"  : "{{ route('master_blok.list') }}"
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
                        data: 'bloc_name',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'bloc_name',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'bloc_date',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'handover_date',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'bloc_id',  
                        render: function ( data, type, row, meta ) {
                            return '<button class="btn btn-primary" type="button" onclick="edit('+ data + ')">Edit</button> &nbsp; <button class="btn btn-danger" type="button" onclick=remove('+ data +')>Remove</button>';

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
      
        var bloc_code = $('.bloc_code').val();
        var bloc_name = $('.bloc_name').val();
        var start_salles = $('.start_salles').val();
        var handover_date = $('.handover_date').val();
    
        if(bloc_code=='' || bloc_name=='' || bloc_name=='' || start_salles=='' || handover_date=='') {
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
                url: "{{ route('master_blok') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    bloc_code: bloc_code,
                    bloc_name: bloc_name,
                    start_salles: start_salles,
                    handover_date: handover_date
                },
                success: function (response) {
                    // Berhasil
                    Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message
                    });
                    $("#addModal").modal("hide");
                    refresh();
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

    function edit(params) 
    {        
        $(".form-control").val("");
        $("#editModal").modal("show");
        $.ajax({
            url: '{{ url("/ar/master/blok") }}' + '/' +params,
            type: 'put',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {                
                $('.bloc_id').val(response.data.bloc_id);
                $('.bloc_code_edit').val(response.data.bloc_code);
                $('.bloc_name_edit').val(response.data.bloc_name);
                $('.start_salles_edit').val(response.data.bloc_date);
                $('.handover_date_edit').val(response.data.handover_date);
                $( ".datepicker" ).datepicker();
            },
            error: function(xhr, status, error) {
                // Error
                Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi kesalahan saat mengirim data'
                });
            },
        });
    }

    function update()
    {
      
        var bloc_id = $('.bloc_id').val();
        var bloc_code = $('.bloc_code_edit').val();
        var bloc_name = $('.bloc_name_edit').val();
        var start_salles = $('.start_salles_edit').val();
        var handover_date = $('.handover_date_edit').val();
    
        if(bloc_code=='' || bloc_name=='' || bloc_name=='' || start_salles=='' || handover_date=='') {
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
              url: "{{ route('master_blok') }}",
              type: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  bloc_id: bloc_id,
                  bloc_code: bloc_code,
                  bloc_name: bloc_name,
                  start_salles: start_salles,
                  handover_date: handover_date
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
            text: "Delete!",
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
                            url: "{{ route('master_blok') }}",
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                                bloc_id: param
                            },
                            success: function (response) {
                                // Berhasil
                                refresh();
                                Swal.fire(
                                    'Deleted!',
                                    'has been deleted.',
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
