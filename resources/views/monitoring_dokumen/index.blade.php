@extends('layouts.master')
@section('title','Master Code Info')

@section('content')

<style>
    .ui-datepicker {
        z-index: 9999 !important;
    }
</style>

{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Code Info</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active"> Code Info</li>
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
                            <th>Description</th>
                            <th>Attachment</th>
                            <th>Date</th>
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
                <h5 class="modal-title" id="addModalLabel">Add Master Code Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="attachment_name">Description</label>
                                <input type="text" id="attachment_name" name="attachment_name" class="form-control form-control-sm mb-3 attachment_name" placeholder="Code Info">                             
                                                                
                                <label>Date</label>
                                <div class="input-group">
                                    <input type="text" name="tanggal_awal" class="form-control form-control-sm start_date" style="width: 45%;" placeholder="Start Date" id="start_date">
                                    <label style="width: 10%">&nbsp; - &nbsp;</label>
                                    <input type="text" name="tanggal_akhir" class="form-control form-control-sm end_date" style="width: 45%;" placeholder="End Date" id="end_date">
                                </div><br>
                                
                                <label>Attachment</label><br>
                                <input type="file" name="attachment_directory" id="attachment_directory" accept=".pdf" required><br>
                                <img id="preview_attachment" class="mt-2" src="#" alt="Preview" style="display: none; max-width: 100px;">
                                
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
                <h5 class="modal-title" id="editModalLabel">Edit Master Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="info_code">Info Code</label>
                                <input type="hidden" class="form-control form-control-sm mb-3 info_id" maxlength="6" placeholder="Info Code" readonly>
                                <input type="text" name="info_id" class="form-control form-control-sm mb-3 info_code_edit" maxlength="6" placeholder="Info Code" readonly>
                                
                                <div class="dropdown-divider mb-1"></div>
                                
                                <label for="info_name">Info</label>
                                <input type="text" name="info_name" class="form-control form-control-sm mb-3 info_name_edit" maxlength="30" placeholder="Info" >
                                

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
        $(".start_date").datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function(selectedDate) {
            // Saat tanggal awal dipilih, batasi tanggal akhir
            $(".end_date").datepicker("option", "minDate", selectedDate);
            }
        });

        $(".end_date").datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function(selectedDate) {
            // Saat tanggal akhir dipilih, batasi tanggal awal
            $(".start_date").datepicker("option", "maxDate", selectedDate);
            }
        });
        
        var table = $('#table-data').DataTable({
        pageLength: 20,
        processing: true,
        
        ajax: {
            "url"  : "{{ route('document_monitoring.list') }}"
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
                        data: 'attachment_name',  
                        render: function ( data, type, row, meta ) {
                            return data;
                        } 
                    },
                    {
                        data: 'attachment_directory',  
                        render: function ( data, type, row, meta ) {
                            // return '<a href="'+data+'" target="_blank"><img src="{{ asset("") }}assets/logo/logo_pdf.png" width="100px"></a>';
                            return '<a href="' + data + '"><img src="{{ asset("") }}assets/logo/logo_pdf.png" width="100px"></a>';

                        } 
                    },
                    {
                        data: 'attachment_directory',  
                        render: function ( data, type, row, meta ) {
                            return row.start_date+' - '+row.end_date;
                        } 
                    },
                    {
                        data: 'attachment_id',  
                        render: function ( data, type, row, meta ) {
                            return '<button class="btn btn-primary" type="button" onclick="edit('+ data +')">Edit</button> &nbsp; <button class="btn btn-danger" type="button" onclick=remove('+ data +')>Remove</button>';

                        },
                        className: 'text-center' 
                    }
                ]
       
        });
    });

    $('#attachment_directory').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            var preview = $('#preview_attachment');
            var fileExtension = input.files[0].name.split('.').pop().toLowerCase();
            
            if (fileExtension === 'pdf') {
                preview.attr('src', '{{ asset("") }}assets/logo/logo_pdf.png');
                preview.css('max-height', '100px');
            } else {
                preview.attr('src', e.target.result);
            }
            
            preview.css('display', 'block');
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    });

    // button add condition
    $("#addButton").click(function() {
        $(".form-control").val("");
        $("#addModal").modal("show");
    });

    function save() 
    {
        var attachment_name = $('.attachment_name').val();
        var start_date = $('.start_date').val();
        var end_date = $('.end_date').val();
        var fileData = new FormData();
        fileData.append('attachment_directory', $('#attachment_directory')[0].files[0]);
        fileData.append('end_date', end_date);
        fileData.append('start_date', start_date);
        fileData.append('attachment_name', attachment_name);

        if (attachment_name == '' || start_date == '' || end_date == '') {
            Swal.fire({
            title: 'Warning!',
            text: "Please don't leave the field(s) empty.",
            icon: 'error',
            confirmButtonText: 'Okay'
            });
        } else {
            Swal.fire({
            title: 'Loading',
            html: 'Sending data...',
            allowOutsideClick: false,
            didOpen: function() {
                Swal.showLoading();
            }
            });

            // AJAX POST request
            $.ajax({
            url: "{{ route('document_monitoring') }}",
            type: 'POST',
            data: fileData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                // Berhasil
                Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: response.message
                });
                refresh();
                $("#addModal").modal("hide");
            },
            error: function(xhr, status, error) {
                // Error
                Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while sending the data'
                });
            },
            complete: function() {
                // Selesai, tutup loading
                // Swal.close();
            }
            });
        }
    }


    function edit(info_id, info_code, info_name) 
    {
        $("#editModal").modal("show");
        $(".form-control").val("");
    }

    function update() 
    {
      
      var info_id = $('.info_id').val();
      var info_code = $('.info_code_edit').val();
      var info_name = $('.info_name_edit').val();
  
      if(info_code=='' || info_name=='') {
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
            //   url: "{{ route('master_kode_info') }}",
              url: "{{ route('master_kode_info') }}",
              type: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  info_id: info_id,
                  info_code: info_code,
                  info_name: info_name
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
            text: "Delete Info !",
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
                            url: "{{ route('master_kode_info') }}",
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                                info_id: param
                            },
                            success: function (response) {
                                // Berhasil
                                refresh();
                                Swal.fire(
                                    'Deleted!',
                                    'Info  has been deleted.',
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
