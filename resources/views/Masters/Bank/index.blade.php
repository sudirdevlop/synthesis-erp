@extends('layouts.master')
@section('title','Master Bank')

@section('content')
<style>
    .field_disbursement {
        display: flex;
        flex-wrap: wrap;
    }

    .form-group {
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .Progress {
        width: 100%;
    }

    .Percent, .Description {
        width: 100%;
    }

    .saveBtn {
        width: 100%;
    }
</style>


{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Bank</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active">Bank</li>
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
                <div id="jsGrid1"></div>
            </div>
            <!-- /.card-body -->
        </div>
    </section>



    {{-- modal pop up add --}}
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Master Kode Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <label for="bank_code">Bank Code</label>
                                        <input type="text" name="bank_code" class="form-control form-control-sm mb-3 bank_code" placeholder="Bank Code">  
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="bank_name">Bank Name</label>
                                        <select class="bank_name select_box" name="bank_name" style="width: 100%;" data-placeholder="Select Bank">
                                            <option value="BCA">BCA</option>
                                            <option value="BNI">BNI</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-4">   
                                        <label for="bank_account_number">Bank Account Number</label>
                                        <input type="text" readonly name="bank_account_number" class="form-control form-control-sm mb-3 bank_account_number" placeholder="Bank Account Number"> 
                                    </div>
                                    
                                    <div class="col-sm-4">   
                                        <label for="bank_account_number_escrow">Bank Account Number Escrow</label>
                                        <input type="text" readonly name="bank_account_number_escrow" class="form-control form-control-sm mb-3 bank_account_number_escrow" placeholder="Bank Account Number Escrow"> 
                                    </div>
                                    
                                    <div class="col-sm-4">  
                                        <label for="branch">Branch</label>
                                        <input type="text" readonly name="branch" class="form-control form-control-sm mb-3 branch" placeholder="Branch"> 
                                    </div>
                                
                                    <div class="col-sm-4">  
                                        <label for="position">Position</label>
                                        <input type="text" readonly name="position" class="form-control form-control-sm mb-3 position" placeholder="Position">
                                    </div>
                                
                                    <div class="col-sm-4">  
                                        <label for="phone">Phone</label>
                                        <input type="text" readonly name="phone" class="form-control form-control-sm mb-3 phone" placeholder="Phone">  
                                    </div>
                                
                                    <div class="col-sm-4">  
                                        <label for="contact">Contact</label>
                                        <input type="text" readonly name="contact" class="form-control form-control-sm mb-3 contact" placeholder="Contact">  
                                    </div>
                                    
                                    <div class="col-sm-4">  
                                        <label for="company_name">Company Name</label>
                                        <input type="text" readonly name="company_name" class="form-control form-control-sm mb-3 company_name" placeholder="Company Name">                                          
                                    </div>
                                    
                                    <div class="col-sm-4">  
                                        <label for="address">Address</label>
                                        <textarea name="address" readonly class="form-control form-control-sm mb-3 address" placeholder="Address"> </textarea>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="row">
                                    <button type="button" class="btn btn-primary" id="addDisbursementBtn" >
                                        <i class="fas fa-plus"></i> Add Fund Disbursement
                                    </button>
                                    <div class="col-sm-12 mt-1 field_disbursement add_fund_disbursement">

                                    </div>

                                    <table class="table table-bordered mt-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Progress</th>
                                                <th>Percent</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list_disbursement">
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>                                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

{{-- modal edit & detail --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Master Kode Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="kode_bank">Kode Bank</label>
                                <input type="text" name="kode_bank" class="form-control form-control-sm mb-3 kode_bank" placeholder="Kode Bank">                             
                            
                                
                                <label for="nama_bank">Nama Bank</label>
                                <input type="text" name="nama_bank" class="form-control form-control-sm mb-3 nama_bank" placeholder="Nama Bank"> 
                            
                                
                                <label for="cabang">Cabang</label>
                                <input type="text" name="cabang" class="form-control form-control-sm mb-3 cabang" placeholder="Cabang"> 
                            
                                
                                <label for="no_rekening">No Rekening</label>
                                <input type="text" name="no_rekening" class="form-control form-control-sm mb-3 no_rekening" placeholder="No Rekening">                             
                            
                                
                                <label for="pejabat">Pejabat</label>
                                <input type="text" name="pejabat" class="form-control form-control-sm mb-3 pejabat" placeholder="Pejabat">  
                            
                                
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control form-control-sm mb-3 jabatan" placeholder="Jabatan">
                            
                                
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control form-control-sm mb-3 alamat" placeholder="Jabatan"> </textarea>
                            
                                
                                <label for="kode_no_surat">Kode No Surat</label>
                                <input type="text" name="kode_no_surat" class="form-control form-control-sm mb-3 kode_no_surat" placeholder="Kode No Surat">    
                            
                                
                                <label>Nomor Perkiraan</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="nomor_perkiraan_1" class="form-control form-control-sm mb-3 nomor_perkiraan_1" placeholder="203-010-400-00" maxlength="13" style="width: 70%;">
                                    <input type="text" name="nomor_perkiraan_1" class="form-control form-control-sm mb-3 nomor_perkiraan_2" placeholder="102" maxlength="3" style="width: 30%;">
                                </div>
                                
                                <label for="kode_jurnal">Kode Jurnal</label>
                                <input type="text" name="kode_jurnal" class="form-control form-control-sm mb-3 kode_jurnal" placeholder="Kode Jurnal">
                                
                                <label for="kode_bank">Kode Bank</label>
                                <input type="text" name="kode_bank" class="form-control form-control-sm mb-3 kode_bank" placeholder="Kode Bank">

                            </div>
                        </div>
                    </div>
                </div>                                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>





<script>
    $( document ).ready(function() {
        $('.select_box').select2({
            dropdownParent: $('#addModal')
        });
        
        $("#jsGrid1").jsGrid({
            height: "100%",
            width: "100%",

            sorting: true,
            paging: true,

            data: db.clients,

            fields: [
                {
                    title: "No",
                    name: "No",
                    type: "text",
                    width: 15,
                    itemTemplate: function(value, item) {
                        var index = db.clients.indexOf(item);
                        return index + 1;
                    }
                },
                { title: "Kode", name: "Age", type: "text", width: 20 },
                { title: "Nama Bank", name: "Name", type: "number", width: 60 },
                { title: "Nomor Rekening", name: "Age", type: "number", width: 60 },
                {
                    title: "Action",
                    headerTemplate: function() {
                        return $("<div>").addClass("text-center").text("Action");
                    },
                    itemTemplate: function(_, item) {
                        var index = db.clients.indexOf(item);
                        var buttonContainer = $("<div>").addClass("btn-group");

                        var detailButton = $("<button>")
                            .addClass("btn btn-primary btn-sm")
                            .text("Detail")
                            .on("click", function() {
                                detailClient(index);
                            });

                        var editButton = $("<button>")
                            .addClass("btn btn-success btn-sm")
                            .text("Edit")
                            .on("click", function() {
                                editClient(index);
                            });

                        var removeButton = $("<button>")
                            .addClass("btn btn-danger btn-sm")
                            .text("Remove")
                            .on("click", function() {
                                deleteClient(index);
                            });
                        buttonContainer.append(detailButton, editButton, removeButton);

                        return $("<div>").addClass("text-center").append(buttonContainer);
                    }
                }
            ]
        });
    });

    function detailClient(index) {
        $("#editModal").modal("show");
    }

    // button add condition
    $("#addButton").click(function() {
        $(".form-control").val("");
        $("#addModal").modal("show");
    });

    var disbursementCount = 0;

    function updateRowNumbers() {
        $('.list_disbursement tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    $('#addDisbursementBtn').on('click', function() {
        disbursementCount++;

        var newField = '<div class="form-group col-sm-3">' +
            '<select class="form-control Progress textboxt_append">' +
                '<option value="TANAH MATANG">TANAH MATANG</option>' +
                '<option value="PANCANG">PANCANG</option>' +
                '<option value="ATAP TUTUP">ATAP TUTUP</option>' +
                '<option value="LEGAL">LEGAL</option>' +
            '</select>' +
            '</div>' +
            '<div class="form-group col-sm-2">' +
            '<input type="text" class="form-control Percent textboxt_append" value="" placeholder="Percent">' +
            '</div>' +
            '<div class="form-group col-sm-4">' +
            '<input type="text" class="form-control Description textboxt_append" value="" placeholder="Description">' +
            '</div>' +
            '<div class="form-group col-sm-2">' +
            '<button type="button" class="btn btn-success saveBtn">Save</button>' +
            '</div>';

        $('.field_disbursement').empty().append(newField);
    });

    $(document).on('click', '.saveBtn', function() {

        var progress = $('.Progress').val();
        var percent = $('.Percent').val();
        var description = $('.Description').val();

        if(progress!=='' || percent !=='' || description!==''){

            // Tambahkan nilai ke dalam tabel list_disbursement
            var newRow =
                '<tr>' +
                    '<td>' + disbursementCount + '</td>' +
                    '<td>' + progress + '</td>' +
                    '<td>' + percent + '</td>' +
                    '<td>' + description + '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-primary editBtn"><i class="fas fa-edit"></i></button>' +
                    '<button type="button" class="btn btn-danger deleteBtn"><i class="fas fa-trash"></i></button>' +
                    '</td>' +                  
                '</tr>';

            $('.list_disbursement').append(newRow);
            $(".textboxt_append").val('');
            updateRowNumbers();

            // Tampilkan swal2 alert success
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data saved successfully!',
            });

        }
    });

    $(document).on('click', '.deleteBtn', function() {
        $(this).closest('tr').remove();
        updateRowNumbers();
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Row deleted successfully!',
        });
    });

    $(document).on('click', '.editBtn', function() {
        var row = $(this).closest('tr');
        var progress = row.find('td:nth-child(2)').text();
        var percent = row.find('td:nth-child(3)').text();
        var description = row.find('td:nth-child(4)').text();

        row.html(
            '<td>&nbsp;</td>' +
            '<td>' +
            '<select class="form-control Progress">' +
            '<option value="TANAH MATANG" ' + (progress === 'TANAH MATANG' ? 'selected' : '') + '>TANAH MATANG</option>' +
            '<option value="PANCANG" ' + (progress === 'PANCANG' ? 'selected' : '') + '>PANCANG</option>' +
            '<option value="ATAP TUTUP" ' + (progress === 'ATAP TUTUP' ? 'selected' : '') + '>ATAP TUTUP</option>' +
            '<option value="LEGAL" ' + (progress === 'LEGAL' ? 'selected' : '') + '>LEGAL</option>' +
            '</select>' +
            '</td>' +
            '<td><input type="text" class="form-control Percent" value="' + percent + '"></td>' +
            '<td><input type="text" class="form-control Description" value="' + description + '"></td>' +
            '<td>' +
            '<button type="button" class="btn btn-success saveBtn_edit"><i class="fas fa-save"></i></button>' +
            '</td>'
        );
    });

    $(document).on('click', '.saveBtn_edit', function() {
        var row = $(this).closest('tr');
        var progress = row.find('.Progress').val();
        var percent = row.find('.Percent').val();
        var description = row.find('.Description').val();

        if (progress !== '' || percent !== '' || description !== '') {
            var newRow =
                '<td>&nbsp;</td>' +
                '<td>' + progress + '</td>' +
                '<td>' + percent + '</td>' +
                '<td>' + description + '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-primary editBtn"><i class="fas fa-edit"></i></button>' +
                '<button type="button" class="btn btn-danger deleteBtn"><i class="fas fa-trash"></i></button>' +
                '</td>';

            row.html(newRow);
            updateRowNumbers();

            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data saved successfully!',
            });
        }
    });

</script>

@endsection
