@extends('layouts.master')
@section('title','Master Code Hadap')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Code Hadap</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active"> Code Hadap</li>
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
                            <th>Hadap Code</th>
                            <th>Hadap Name</th>
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
                <h5 class="modal-title" id="addModalLabel">Add Master Code Hadap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="hadap_code">Code Hadap</label>
                                <input type="text" id="hadap_code" name="hadap_code" class="form-control form-control-sm mb-3 hadap_code" placeholder="Code Hadap" maxlength="6">

                                <div class="dropdown-divider mb-1"></div>

                                {{-- <div class="form-group">
                                    <label>Area Usaha</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="area_usaha" id="radioSalon" value="Salon">
                                        <label class="form-check-label" for="radioSalon">Salon</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="area_usaha" id="radioBasah" value="Basah">
                                        <label class="form-check-label" for="radioBasah">Basah</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="area_usaha" id="radioKering" value="Kering">
                                        <label class="form-check-label" for="radioKering">Kering</label>
                                    </div>
                                </div>                                 --}}
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="hadap_name">Hadap</label>
                                <textarea id="hadap_name" name="hadap_name" class="form-control form-control-sm mb-3 hadap_name" placeholder="Hadap"></textarea>
                                

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
                <h5 class="modal-title" id="editModalLabel">Edit Master Hadap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="hadap_code">Hadap Code</label>
                                <input type="hidden" class="form-control form-control-sm mb-3 hadap_id" maxlength="6" placeholder="Hadap Code" readonly>
                                <input type="text" name="hadap_id" class="form-control form-control-sm mb-3 hadap_code_edit" maxlength="6" placeholder="Hadap Code" readonly>
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="hadap_name">Hadap</label>
                                <input type="text" name="hadap_name" class="form-control form-control-sm mb-3 hadap_name_edit" maxlength="30" placeholder="Hadap" >
                                

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
            "url"  : "{{ route('master_kode_hadap.list') }}"
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
                        data: 'hadap_code',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'hadap_name',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'hadap_id',  
                        render: function ( data, type, row, meta ) {
                            return '<button class="btn btn-primary" type="button" onclick="edit(\'' + data + '\', \'' + row.hadap_code + '\', \'' + row.hadap_name + '\')">Edit</button> &nbsp; <button class="btn btn-danger" type="button" onclick=remove('+ data +')>Remove</button>';

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
      
        var hadap_code = $('.hadap_code').val();
        var hadap_name = $('.hadap_name').val();
    
        if(hadap_code=='' || hadap_name=='') {
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
                url: "{{ route('master_kode_hadap') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    hadap_code: hadap_code,
                    hadap_name: hadap_name
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

    function edit(hadap_id, hadap_code, hadap_name) 
    {
        $("#editModal").modal("show");
        $(".form-control").val("");
        $('.hadap_id').val(hadap_id);
        $('.hadap_code_edit').val(hadap_code);
        $('.hadap_name_edit').val(hadap_name);
    }

    function update() 
    {
      
      var hadap_id = $('.hadap_id').val();
      var hadap_code = $('.hadap_code_edit').val();
      var hadap_name = $('.hadap_name_edit').val();
  
      if(hadap_code=='' || hadap_name=='') {
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
            //   url: "{{ route('master_kode_hadap') }}",
              url: "{{ route('master_kode_hadap') }}",
              type: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  hadap_id: hadap_id,
                  hadap_code: hadap_code,
                  hadap_name: hadap_name
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
            text: "Delete Hadap !",
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
                            url: "{{ route('master_kode_hadap') }}",
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                                hadap_id: param
                            },
                            success: function (response) {
                                // Berhasil
                                refresh();
                                Swal.fire(
                                    'Deleted!',
                                    'Hadap  has been deleted.',
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
