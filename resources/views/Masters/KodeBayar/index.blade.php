@extends('layouts.master')
@section('title','Master Payment Code')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Payment Code</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active"> Payment Code</li>
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
                            <th>Bayar Code</th>
                            <th>Bayar Name</th>
                            <th>Bayar Category</th>
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
                <h5 class="modal-title" id="addModalLabel">Add Master Payment Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="payment_code">Payment Code</label>
                                <input type="text" id="payment_code" name="payment_code" class="form-control form-control-sm mb-3 payment_code" placeholder="Payment Code" maxlength="6">                             
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="payment_name">Payment Name</label>
                                <textarea id="payment_name" name="payment_name" class="form-control form-control-sm mb-3 payment_name" placeholder="Payment Name"></textarea>
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="category_payment">Category Payment</label>
                                <select id="category_payment" name="category_payment" class="form-control form-control-sm mb-3 category_payment">
                                    <option value="">Select</option>
                                    @foreach ($category_payment as $item)
                                        <option value="{{ $item->jenis_bayar_id }}">{{ $item->jenis_bayar_name }}</option>
                                    @endforeach
                                </select>     
                                                               

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
                <h5 class="modal-title" id="editModalLabel">Edit Master Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <label for="payment_code">Payment Code</label>
                                <input type="hidden" id="payment_id" name="payment_id" class="form-control form-control-sm mb-3 payment_id" placeholder="Payment Code">     
                                <input type="text" id="payment_code" name="payment_code" class="form-control form-control-sm mb-3 payment_code_edit" placeholder="Payment Code">                             
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="payment_name">Payment Name</label>
                                <textarea id="payment_name" name="payment_name" class="form-control form-control-sm mb-3 payment_name_edit" placeholder="Payment Name"></textarea>
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="category_payment">Category Payment</label>
                                <select id="category_payment" name="category_payment" class="form-control form-control-sm mb-3 category_payment_edit">
                                    <option value="">Select</option>
                                    @foreach ($category_payment as $item)
                                        <option value="{{ $item->jenis_bayar_id }}">{{ $item->jenis_bayar_name }}</option>
                                    @endforeach
                                </select>   
                                
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
            "url"  : "{{ route('master_kode_bayar.list') }}"
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
                        data: 'bayar_code',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'bayar_name',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'jenis_bayar_name',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'bayar_id',  
                        render: function ( data, type, row, meta ) {
                            return '<button class="btn btn-primary" type="button" onclick="edit(\'' + data + '\', \'' + row.bayar_code + '\', \'' + row.bayar_name + '\', \'' + row.bayar_jenis_id + '\')">Edit</button> &nbsp; <button class="btn btn-danger" type="button" onclick=remove('+ data +')>Remove</button>';

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
      
        var payment_code = $('.payment_code').val();
        var payment_name = $('.payment_name').val();
        var category_payment = $('.category_payment').val();
    
        if(payment_code=='' || payment_name=='' || category_payment=='') {
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
                url: "{{ route('master_kode_bayar') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    payment_code: payment_code,
                    payment_name: payment_name,
                    category_payment: category_payment
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

    function edit(payment_id, payment_code, payment_name, category_payment) 
    {
        console.log(category_payment);
        $("#editModal").modal("show");
        $(".form-control").val("");
        $('.payment_id').val(payment_id);
        $('.payment_code_edit').val(payment_code);
        $('.payment_name_edit').val(payment_name);
        $('.category_payment_edit').val(category_payment);
    }

    function update() 
    {
      
        var payment_id = $('.payment_id').val();
        var payment_code = $('.payment_code_edit').val();
        var payment_name = $('.payment_name_edit').val();
        var category_payment = $('.category_payment_edit').val();
    
        if(payment_code=='' || payment_name=='' || category_payment=='') {
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
                url: "{{ route('master_kode_bayar') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    payment_id: payment_id,
                    payment_code: payment_code,
                    payment_name: payment_name,
                    category_payment: category_payment
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
            text: "Delete Type!",
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
                            url: "{{ route('master_kode_bayar') }}",
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                                payment_id: param
                            },
                            success: function (response) {
                                // Berhasil
                                refresh();
                                Swal.fire(
                                    'Deleted!',
                                    'Type has been deleted.',
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
