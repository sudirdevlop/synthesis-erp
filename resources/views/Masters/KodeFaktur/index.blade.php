@extends('layouts.master')
@section('title','Master Invoice')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Invoice</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active"> Invoice</li>
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
                            <th>Invoice Code</th>
                            <th>Invoice Name</th>
                            <th>Category Invoice</th>
                            <th>PPN</th>
                            <th>Account</th>
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
                <h5 class="modal-title" id="addModalLabel">Add Master Code Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="invoice_code">Code Invoice</label>
                                <input type="text" id="invoice_code" name="invoice_code" class="form-control form-control-sm mb-3 invoice_code" placeholder="Code Invoice">                             
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="invoice_name">Invoice Name</label>
                                <textarea id="invoice_name" name="invoice_name" class="form-control form-control-sm mb-3 invoice_name" placeholder="Invoice Name"></textarea>
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="category_invoice">Category Invoice</label>
                                <select id="category_invoice" name="category_invoice" class="form-control form-control-sm mb-3 category_invoice" style="width: 100%" >
                                    @foreach ($category_invoice as $item)
                                        <option value="{{ $item->jenis_faktur_id }}">{{ $item->jenis_faktur_name }}</option>
                                    @endforeach
                                </select>     
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="ppn">PPN ( % )</label>
                                <input type="text" id="ppn" name="ppn" class="form-control form-control-sm mb-3 ppn angka" placeholder="PPN ( % )">                             
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="account">Account #</label>                                
                                <div class="input-group mb-3">
                                    <input type="text" name="account" class="form-control form-control-sm mb-3 account_1" placeholder="203-010-401-00" maxlength="14" style="width: 70%;">
                                    <input type="text" name="account" class="form-control form-control-sm mb-3 account_2 angka" placeholder="106" maxlength="3" style="width: 30%;">
                                </div>
                                
                                
                                

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


{{-- modal edit --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Master Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="invoice_code">Invoice Code</label>
                                <input type="hidden" id="invoice_id" name="invoice_id" class="form-control form-control-sm mb-3 invoice_id" placeholder="Category Invoice">
                                <input type="text" name="invoice_code" class="form-control form-control-sm mb-3 invoice_code_edit" maxlength="30" placeholder="Invoice Code">
                                
                                <label for="invoice_name">Invoice Name</label>
                                <input type="text" name="invoice_name" class="form-control form-control-sm mb-3 invoice_name_edit" maxlength="30" placeholder="Invoice Name">
                                
                                <label>Category Invoice</label>
                                <select id="category_invoice_edit" name="category_invoice_edit" class="form-control form-control-sm mb-3 category_invoice_edit" style="width: 100%" >
                                    @foreach ($category_invoice as $item)
                                        <option value="{{ $item->jenis_faktur_id }}">{{ $item->jenis_faktur_name }}</option>
                                    @endforeach
                                </select>  

                                <label for="ppn_edit">PPN ( % )</label>
                                <input type="text" id="ppn_edit" name="ppn_edit" class="form-control form-control-sm mb-3 ppn_edit angka" placeholder="PPN ( % )">                             
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label>Account #</label>                                
                                <div class="input-group mb-3">
                                    <input type="text" name="account" class="form-control form-control-sm mb-3 account_1_edit" placeholder="203-010-401-00" maxlength="14" style="width: 70%;">
                                    <input type="text" name="account" class="form-control form-control-sm mb-3 account_2_edit angka" placeholder="106" maxlength="3" style="width: 30%;">
                                </div>
                                
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
        $('.select_box').select2({
            dropdownParent: $('.modal')
        });

        var table = $('#table-data').DataTable({
        pageLength: 20,
        processing: true,
        
        ajax: {
            "url"  : "{{ route('master_kode_faktur.list') }}"
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
                        data: 'faktur_code',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'faktur_name',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'jenis_faktur_name',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'ppn',  
                        render: function ( data, type, row, meta ) {
                            return parseInt(data) + ' %';
                        } 
                    },
                    {
                        data: 'account_number',  
                        render: function ( data, type, row, meta ) {
                            return data+' '+row.account_div;
                        } 
                    },
                    {
                        data: 'faktur_id',  
                        render: function ( data, type, row, meta ) {
                            return '<button class="btn btn-primary" type="button" onclick="edit(\'' + data + '\')">Edit</button> &nbsp; <button class="btn btn-danger" type="button" onclick=remove('+ data +')>Remove</button>';

                        },
                        className: 'text-center' 
                    }
                ]
       
        });
    });

    function save() 
    {
      
        var invoice_code = $('.invoice_code').val();
        var invoice_name = $('.invoice_name').val();
        var category_invoice = $('.category_invoice').val();
        var ppn = $('.ppn').val();
        var account_1 = $('.account_1').val();
        var account_2 = $('.account_2').val();
    
        if(invoice_code=='' || invoice_name=='' || category_invoice=='' ||  ppn=='' || account_1=='' || account_2=='') {
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
                url: "{{ route('master_kode_faktur') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    invoice_code: invoice_code,
                    invoice_name: invoice_name,
                    category_invoice: category_invoice,
                    ppn: ppn,
                    account_1: account_1,
                    account_2: account_2
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

    function edit(params) 
    {        
        $(".form-control").val("");
        $("#editModal").modal("show");
        $.ajax({
            url: '{{ url("/ar/master/kode_faktur") }}' + '/' +params,
            type: 'put',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {                
                $('.invoice_id').val(response.data.faktur_id);
                $('.invoice_code_edit').val(response.data.faktur_code);
                $('.invoice_name_edit').val(response.data.faktur_name);
                $('.category_invoice_edit').val(response.data.jenis_faktur_id);
                $('.ppn_edit').val(parseInt(response.data.ppn));
                $('.account_1_edit').val(response.data.account_number);
                $('.account_2_edit').val(response.data.account_div);
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
      
        var invoice_id = $('.invoice_id').val();
        var invoice_code = $('.invoice_code_edit').val();
        var invoice_code = $('.invoice_code_edit').val();
        var invoice_name = $('.invoice_name_edit').val();
        var category_invoice = $('.category_invoice_edit').val();
        var ppn = $('.ppn_edit').val();
        var account_1 = $('.account_1_edit').val();
        var account_2 = $('.account_2_edit').val();
    
        if(invoice_code=='' || invoice_name=='' || category_invoice=='' ||  ppn=='' || account_1=='' || account_2=='') {
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
                url: "{{ route('master_kode_faktur') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    invoice_code: invoice_code,
                    invoice_name: invoice_name,
                    category_invoice: category_invoice,
                    ppn: ppn,
                    account_1: account_1,
                    account_2: account_2,
                    invoice_id: invoice_id
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


    // button add condition
    $("#addButton").click(function() {
        $(".form-control").val("");
        $("#addModal").modal("show");
    });

    function remove(param){
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete Invoice !",
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
                            url: "{{ route('master_kode_faktur') }}",
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                                invoice_id: param
                            },
                            success: function (response) {
                                // Berhasil
                                refresh();
                                Swal.fire(
                                    'Deleted!',
                                    'Invoice  has been deleted.',
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
