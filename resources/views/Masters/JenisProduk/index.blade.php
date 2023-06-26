@extends('layouts.master')
@section('title','Master Product Types')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Product Types</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active">Product Types</li>
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
                            <th>Product Code</th>
                            <th>Product Description</th>
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
                <h5 class="modal-title" id="addModalLabel">Add Master Product Types</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="product_code">Product Code</label>
                                <input type="text" name="product_code" class="form-control form-control-sm mb-3 product_code" maxlength="6" placeholder="Product Code">
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="product_description">Product Description</label>
                                <input type="text" name="product_description" class="form-control form-control-sm mb-3 product_description" maxlength="30" placeholder="Product Description" >
                                

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

{{-- edit --}}

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Master Product Types</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="product_code">Product Code</label>
                                <input type="hidden" class="form-control form-control-sm mb-3 product_id" maxlength="6" placeholder="Product Code" readonly>
                                <input type="text" name="product_id" class="form-control form-control-sm mb-3 product_code_edit" maxlength="6" placeholder="Product Code" readonly>
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="product_description">Product Description</label>
                                <input type="text" name="product_description" class="form-control form-control-sm mb-3 product_description_edit" maxlength="30" placeholder="Product Description" >
                                

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
        var table = $('#table-data').DataTable({
        pageLength: 20,
        processing: true,
        
        ajax: {
            "url"  : "{{ route('master_jenis_produk.list') }}"
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
                        data: 'product_code',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'product_name',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'product_id',  
                        render: function ( data, type, row, meta ) {
                            return '<button class="btn btn-primary" type="button" onclick="edit(\'' + data + '\', \'' + row.product_code + '\', \'' + row.product_name + '\')">Edit</button> &nbsp; <button class="btn btn-danger" type="button" onclick=remove('+ data +')>Remove</button>';

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
      
        var product_code = $('.product_code').val();
        var product_description = $('.product_description').val();
    
        if(product_code=='' || product_description=='') {
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
                url: "{{ route('master_jenis_produk') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_code: product_code,
                    product_description: product_description
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

    function edit(product_id, product_code, product_name) 
    {
        $("#editModal").modal("show");
        $(".form-control").val("");
        $('.product_id').val(product_id);
        $('.product_code_edit').val(product_code);
        $('.product_description_edit').val(product_name);
    }

    function update() 
    {
      
      var product_id = $('.product_id').val();
      var product_code = $('.product_code_edit').val();
      var product_description = $('.product_description_edit').val();
  
      if(product_code=='' || product_description=='') {
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
            //   url: "{{ route('master_jenis_produk') }}",
              url: "{{ route('master_jenis_produk') }}",
              type: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  product_id: product_id,
                  product_code: product_code,
                  product_description: product_description
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
            text: "Delete Product Type!",
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
                            url: "{{ route('master_jenis_produk') }}",
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                                product_id: param
                            },
                            success: function (response) {
                                // Berhasil
                                refresh();
                                Swal.fire(
                                    'Deleted!',
                                    'Product Type has been deleted.',
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
