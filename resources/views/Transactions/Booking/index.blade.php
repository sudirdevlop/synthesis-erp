@extends('layouts.master')
@section('title','Transaksi Booking')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Transaction Booking / Tanda Jadi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                <li class="breadcrumb-item active">Booking / Tanda Jadi</li>
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Transaction Booking / Tanda Jadi</h5>
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
                                        <label for="unit">Unit</label>
                                        <select class="unit select_box" style="width: 100%;" data-placeholder="Select Unit">
                                            <option value="">Pilih</option>
                                            <option value="B/7/01">B/7/01</option>
                                            <option value="B/7/02">B/7/02</option>
                                            <option value="B/7/03">B/7/03</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">    
                                        <label for="nup">NUP</label>
                                        <input type="text" id="nup" name="nup" class="form-control form-control-sm  mb-3" placeholder="Nomor NUP" readonly>
                                    </div>
                                    <div class="col-sm-4"> 
                                        <label for="status">Status</label>
                                        <input type="text" id="status" name="status" class="form-control form-control-sm mb-3" placeholder="Status" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="customer">Customer</label>
                                        <input type="text" id="customer" name="customer" class="form-control form-control-sm mb-3" placeholder="Customer Order" readonly>
                                    </div>
                                    
                                    <div class="col-sm-4">    
                                        <label for="sales_agent">Sales / Agent</label>
                                        <input type="text" id="sales_agent" name="sales_agent" class="form-control form-control-sm mb-3" placeholder="Sales / Agent" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="supervisor">Supervisor</label>
                                        <input type="text" id="supervisor" name="supervisor" class="form-control form-control-sm mb-3" placeholder="Supervisor" readonly>
                                    </div>
                                    <div class="col-sm-4"> 
                                        <label for="change_number">Change Number</label>
                                        <input type="text" id="change_number" name="change_number" class="form-control form-control-sm mb-3" placeholder="Change Number" readonly>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                        
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <label>Upload KTP</label><br>
                                        <input type="file" name="upload_ktp" id="upload_ktp" accept=".jpg, .jpeg, .png, .pdf" required><br>
                                        <img id="preview_ktp" src="#" alt="Preview" style="display: none; max-width: 150px;">
                                    </div>
                                    <div class="col-sm-4">
                                        <label >Upload KK</label><br>
                                        <input type="file" name="upload_kk" id="upload_kk" accept=".jpg, .jpeg, .png, .pdf" required>
                                        <img id="preview_kk" src="#" alt="Preview" style="display: none; max-width: 150px;">
                                    </div>
                                    <div class="col-sm-4">   
                                        <label>Upload NPWP</label><br>
                                        <input type="file" name="upload_npwp" id="upload_npwp" accept=".jpg, .jpeg, .png, .pdf">
                                        <img id="preview_npwp" src="#" alt="Preview" style="display: none; max-width: 150px;">
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label >Upload Net Present Value (NPV)</label><br>
                                        <input type="file" name="upload_npv" id="upload_npv" accept=".pdf" required>
                                        <img id="preview_npv" src="#" alt="Preview" style="display: none; max-width: 150px;">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card shadow">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <label for="start_date_of_bphtb_installment">Start Date of BPHTB Installment</label>
                                        <input type="text" id="start_date_of_bphtb_installment" name="start_date_of_bphtb_installment" class="form-control form-control-sm mb-3 datepicker" placeholder="Start Date of BPHTB Installment">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="amount_of_bphtb">Amount of BPHTB</label>
                                        <input type="text" id="amount_of_bphtb" name="amount_of_bphtb" class="form-control form-control-sm mb-3" placeholder="Amount of BPHTB">
                                    </div>
                                    <div class="col-sm-4">   
                                        <label for="bphtb_subsidi">BPHTB Subsidy</label>
                                        <input type="text" id="bphtb_subsidi" name="bphtb_subsidi" class="form-control form-control-sm mb-3 datepicker" placeholder="BPHTB Subsidy">
                                    </div>
                                    <div class="col-sm-4">   
                                        <label for="how_many_times_bphtb">How Many Times BPHTB</label>
                                        <input type="text" id="how_many_times_bphtb" name="how_many_times_bphtb" class="form-control form-control-sm mb-3" placeholder="How Many Times BPHTB">
                                    </div>
                                    {{-- <div class="col-sm-4"> 
                                        <label for="keterangan_bphtb">Keterangan BPHTB</label>
                                        <input type="text" id="keterangan_bphtb" name="keterangan_bphtb" class="form-control form-control-sm mb-3" placeholder="Keterangan BPHTB">
                                    </div> --}}
                                    <div class="col-sm-4">
                                        <label for="virtual_account_bphtb">Virtual Account BPHTB</label>
                                        <input type="text" id="virtual_account_bphtb" name="virtual_account_bphtb" class="form-control form-control-sm mb-3 datepicker" placeholder="Virtual Account BPHTB">
                                    </div>
                                </div>                                                   

                            </div>
                        </div>
                        
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <label for="booking_date">Booking Date</label>
                                        <input type="text" id="booking_date" name="booking_date" class="form-control form-control-sm mb-3 datepicker" placeholder="Booking Date">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="input_date">Input Date</label>
                                        <input type="text" id="input_date" name="input_date" class="form-control form-control-sm mb-3 datepicker" placeholder="Input Date">
                                    </div>
                                    <div class="col-sm-4">   
                                        <label for="construction_completion_date">Construction Completion Date</label>
                                        <input type="text" id="construction_completion_date" name="construction_completion_date" class="form-control form-control-sm mb-3 datepicker" placeholder="Construction Completion Date">
                                    </div>
                                    <div class="col-sm-4"> 
                                        <label for="skup_date">SKUP Date</label>
                                        <input type="text" id="skup_date" name="skup_date" class="form-control form-control-sm mb-3 datepicker" placeholder="SKUP Date">
                                    </div>
                                    <div class="col-sm-4"> 
                                        <label for="skup_number">SKUP Number</label>
                                        <input type="text" id="skup_number" name="skup_number" class="form-control form-control-sm mb-3 rupiah" placeholder="SKUP Number">
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <label for="ppjb_number">PPJB Number</label>
                                        <input type="text" id="ppjb_number" name="ppjb_number" class="form-control form-control-sm mb-3" placeholder="PPJB Number">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="ppjb_date">PPJB Date</label>
                                        <input type="text" id="ppjb_date" name="ppjb_date" class="form-control form-control-sm mb-3 datepicker" placeholder="PPJB Date">
                                    </div>
                                    <div class="col-sm-4">   
                                        <label for="date_of_readiness_for_ppjb">Date of Readiness for PPJB</label>
                                        <input type="text" id="date_of_readiness_for_ppjb" name="date_of_readiness_for_ppjb" class="form-control form-control-sm mb-3 datepicker" placeholder="date of readiness for PPJB">
                                    </div>
                                    <div class="col-sm-4"> 
                                        <label for="delivery_of_ppjb">Delivery of PPJB</label>
                                        <input type="text" id="delivery_of_ppjb" name="delivery_of_ppjb" class="form-control form-control-sm mb-3" placeholder="Delivery of PPJB">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="amount_of_ppjb">Amount of PPJB</label>
                                        <input type="text" id="amount_of_ppjb" name="amount_of_ppjb" class="form-control form-control-sm rupiah" placeholder="Amount of PPJB">
                                    </div>
                                    <div class="col-sm-4">   
                                        <label for="tanda_jadi_bf">Tanda Jadi / BF</label>
                                        <input type="text" id="tanda_jadi_bf" name="tanda_jadi_bf" class="form-control form-control-sm rupiah" placeholder="Tanda Jadi / BF">
                                    </div>
                                    <div class="col-sm-4">   
                                        <label for="bast_date">BAST Date</label>
                                        <input type="text" id="bast_date" name="bast_date" class="form-control form-control-sm mb-3 datepicker" placeholder="BAST Date">
                                    </div>
                                    <div class="col-sm-4"> 
                                        <label for="ajb_date">AJB Date</label>
                                        <input type="text" id="ajb_date" name="ajb_date" class="form-control form-control-sm mb-3 datepicker" placeholder="AJB Date">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="addendum_date">Addendum Date</label>
                                        <input type="text" id="addendum_date" name="addendum_date" class="form-control form-control-sm mb-3 datepicker" placeholder="Addendum Date">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card shadow">
                            <div class="card-body">
                                
                                <div class="row">

                                    <div class="col-sm-8 mt-3"> 
                                        <div class="form-group row">
                                            <label for="price" class="col-sm-4 col-form-label">Price</label>
                                            <div class="col-sm-8">
                                              <input type="text" id="price" name="price" class="form-control form-control-sm rupiah" placeholder="Price">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="discount" class="col-sm-4 col-form-label">Discount</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="discount" name="discount" class="form-control form-control-sm rupiah" placeholder="Discount">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="price_after_discount" class="col-sm-4 col-form-label">Price After Discount</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="price_after_discount" name="price_after_discount rupiah" class="form-control form-control-sm" placeholder="Price After Discount">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="ppn" class="col-sm-4 col-form-label">PPN</label>
                                            <div class="col-sm-8">
                                                <input type="number" id="ppn" name="ppn" class="form-control form-control-sm " placeholder="PPN">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="ppn_bm" class="col-sm-4 col-form-label">PPN BM</label>
                                            <div class="col-sm-8">
                                                <input type="number" id="ppn_bm" name="ppn_bm" class="form-control form-control-sm " placeholder="PPN BM">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="pph22" class="col-sm-4 col-form-label">PPH 22</label>
                                            <div class="col-sm-8">
                                                <input type="number" id="pph22" name="pph22" class="form-control form-control-sm " placeholder="PPH 22">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="harga_jual" class="col-sm-4 col-form-label">Selling Price</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="harga_jual" name="harga_jual" class="form-control form-control-sm rupiah harga_jual" placeholder="Selling Price">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="transfer_via_virtual_account">Transfer Via Virtual Account Bank</label>
                                            <select class="transfer_via_virtual_account select_box" id="transfer_via_virtual_account" style="width: 100%;" data-placeholder="Select VA">
                                                <option value="BCA">BCA</option>
                                                <option value="BNI">BNI</option>
                                            </select>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="internal_description">Internal Description</label>
                                            <input type="text" id="internal_description" name="internal_description" class="form-control form-control-sm rupiah" placeholder="Internal Description">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="external_description">External Description</label>
                                            <input type="text" id="external_description" name="external_description" class="form-control form-control-sm rupiah" placeholder="External Description">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="reference">Reference</label>
                                            <input type="text" id="reference" name="reference" class="form-control form-control-sm rupiah" placeholder="Reference">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="information">Information</label>
                                            <input type="text" id="information" name="information" class="form-control form-control-sm rupiah" placeholder="Information">
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                        
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <div class="row">

                                    <div class="col-sm-4">                        
                        
                                        <div class="form-group">
                                            <label for="cara_bayar">Payment method</label>
                                            <select name="cara_bayar" class="form-control form-control-sm cara_bayar" data-placeholder="Select Cara Bayar" onchange="cara_bayar(this)">
                                                <option value="">Pilih</option>
                                                <option value="CK">CK</option>
                                                <option value="KB">KB</option>
                                                <option value="KPR">KPR</option>
                                                <option value="CKS">CKS</option>
                                                <option value="KBS">KBS</option>
                                                <option value="KPRS">KPRS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <br>
                        
                                        {{-- <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="manualPaymentSwitch">
                                            <label class="custom-control-label" for="manualPaymentSwitch">Bayar Manual</label>
                                        </div> --}}
                                    </div>

                                    <div class="col-sm-4"></div>

                                    <div class="col-sm-12">
                                        <div class="master_simulasi"></div>
                                        <br>
                                        
                                        <div class="detail_simulasi"></div>
                                        {{-- <div id="simulasi_pembayaran" style="display: none;">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="harga_jual">Harga Jual</label>
                                                    <input type="text" id="harga_jual" name="harga_jual" class="form-control form-control-sm rupiah harga_jual" placeholder="Harga Jual">
                                                </div>
                                            
                                                <div class="col-sm-3">
                                                    <label for="dp">DP</label>
                                                    <input type="text" id="dp" name="dp" class="form-control form-control-sm angka dp" placeholder="DP">
                                                </div>
                                            
                                                <div class="col-sm-3">
                                                    <label for="tenor_cicilan">Tenor Cicilan</label>
                                                    <input type="text" id="tenor_cicilan" name="tenor_cicilan" class="form-control form-control-sm angka tenor_cicilan" placeholder="Tenor Cicilan" maxlength="3">
                                                </div>
                                            </div>
                                        
                                            <br>
                                            <button id="hitung" class="btn btn-primary" onclick="calculate()">Hitung!</button>
 
                                            <div class="result" id="result"></div>

                                        </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                
                <div class="row">
                    <div class="col-4">
                        &nbsp;
                    </div>
                    <div class="col-8">
                        <div class="container">
                            <div class="row mt-3">
                                <div class="col-12 text-left">
                                    <button type="button" class="btn btn-primary mx-auto">Save</button>
                                    <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal">Cancel</button>                        
                                </div>
                                {{-- <div class="col-12 text-left mt-3">
                                    <button type="button" class="btn btn-primary mx-auto">Lamp 3</button>
                                    <button type="button" class="btn btn-primary mx-auto">Lamp 4</button>
                                    <button type="button" class="btn btn-primary mx-auto">Lamp 5</button>
                                    <button type="button" class="btn btn-primary mx-auto">Schedule</button>
                                    <button type="button" class="btn btn-primary mx-auto">Faktur</button>
                                    
                                </div> --}}
                            </div>
                        </div>

                    </div>             
                </div> 
                
            </div>
        </div>
    </div>
</div>





<script>
    $(document).ready(function() {
        $('.select_box').select2();
        // $('.select_box').select2({
        //     dropdownParent: $('#addModal')
        // });

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
                { title: "Unit", name: "Address", type: "text", width: 50 },
                { title: "NUP", name: "Age", type: "number", width: 35 },
                { title: "Unit Code", name: "Name", type: "text", width: 75 },
                { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name", width: 35 },
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
                                editClient(index);
                            });

                        var editButton = $("<button>")
                            .addClass("btn btn-success btn-sm")
                            .text("Edit")
                            .on("click", function() {
                                deleteClient(index);
                            });

                        var removeButton = $("<button>")
                            .addClass("btn btn-danger btn-sm")
                            .text("Cancel")
                            .on("click", function() {
                                deleteClient(index);
                            });

                        var lamp3Button = $("<button>")
                            .addClass("btn btn-info btn-sm")
                            .text("Lamp 3")
                            .on("click", function() {
                                // Add appropriate logic for "Lamp 3" button
                            });

                        var lamp4Button = $("<button>")
                            .addClass("btn btn-info btn-sm")
                            .text("Lamp 4")
                            .on("click", function() {
                                // Add appropriate logic for "Lamp 4" button
                            });

                        var lamp5Button = $("<button>")
                            .addClass("btn btn-info btn-sm")
                            .text("Lamp 5")
                            .on("click", function() {
                                // Add appropriate logic for "Lamp 5" button
                            });

                        var scheduleButton = $("<button>")
                            .addClass("btn btn-info btn-sm")
                            .text("Schedule")
                            .on("click", function() {
                                // Add appropriate logic for "Schedule" button
                            });

                        buttonContainer.append(detailButton, editButton, removeButton, lamp3Button, lamp4Button, lamp5Button, scheduleButton);

                        return $("<div>").addClass("text-center").append(buttonContainer);
                    }
                }
            ]
        });
    });


    // button add condition
    $("#addButton").click(function() {
        $(".form-control").val("");
        $("#addModal").modal("show");
    });


    $('#upload_ktp').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            var preview = $('#preview_ktp');
            var fileExtension = input.files[0].name.split('.').pop().toLowerCase();
            
            if (fileExtension === 'pdf') {
                preview.attr('src', '{{ asset("") }}assets/logo/logo_pdf.png');
                preview.css('max-height', '150px');
            } else {
                preview.attr('src', e.target.result);
            }
            
            preview.css('display', 'block');
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    });
    // $('#upload_ktp').change(function() {
    //     var fileData = new FormData();
    //     fileData.append('upload_ktp', $('#upload_ktp')[0].files[0]);

    //     $.ajax({
    //         url: '{{ route("upload_ktp") }}',
    //         type: 'POST',
    //         headers: {
    //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //         },
    //         data: fileData,
    //         processData: false,
    //         contentType: false,
    //         success: function(response) {
    //         Swal.fire({
    //             title: 'Success',
    //             text: 'File uploaded successfully!',
    //             icon: 'success'
    //         });
    //         },
    //         error: function(xhr, status, error) {
    //         Swal.fire({
    //             title: 'Error',
    //             text: 'File upload failed!',
    //             icon: 'error'
    //         });
    //         }
    //     });
    // });


    
    $('#upload_npv').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            var preview = $('#preview_npv');
            var fileExtension = input.files[0].name.split('.').pop().toLowerCase();
            
            if (fileExtension === 'pdf') {
                preview.attr('src', '{{ asset("") }}assets/logo/logo_pdf.png');
                preview.css('max-height', '150px');
            } else {
                preview.attr('src', e.target.result);
            }
            
            preview.css('display', 'block');
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    });

    $('#upload_kk').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            var preview = $('#preview_kk');
            var fileExtension = input.files[0].name.split('.').pop().toLowerCase();
            
            if (fileExtension === 'pdf') {
                preview.attr('src', '{{ asset("") }}assets/logo/logo_pdf.png');
                preview.css('max-height', '150px');
            } else {
                preview.attr('src', e.target.result);
            }
            
            preview.css('display', 'block');
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    });

    
    $('#upload_npwp').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            var preview = $('#preview_npwp');
            var fileExtension = input.files[0].name.split('.').pop().toLowerCase();
            
            if (fileExtension === 'pdf') {
                preview.attr('src', '{{ asset("") }}assets/logo/logo_pdf.png');
                preview.css('max-height', '150px');
            } else {
                preview.attr('src', e.target.result);
            }
            
            preview.css('display', 'block');
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    });

    // cara bayar
    $('.harga_jual').on('input', function() {
        var value = formatRupiahToNumber($(this).val());

        if (value > 0) {
            cara_bayar();
        }
    });
    
    function cara_bayar() {
        $('.simulasi_table').remove();
        $('.detail_simulasi_table').remove();

        const harga_jual = formatRupiahToNumber($('.harga_jual').val());

        if (harga_jual <= 0 || isNaN(harga_jual)) {
            Swal.fire(
                'Alert!',
                'Harga jual harus diisi terlebih dahulu.',
                'error'
            );
            $('.harga_jual').focus();
            return;
        }

        var selectedOption = $('.cara_bayar').val();
        if (selectedOption === 'CK') 
        {
            
            $('.simulasi_table').remove();
            $('.detail_simulasi_table').remove();

            var table = isian_master_ck();
            var table_detail = isian_detail_ck();

            $('.master_simulasi').empty().append(table);
            $('.detail_simulasi').empty().append(table_detail);

        } else if (selectedOption === 'CKS') 
        {
            
            $('.simulasi_table').remove();
            $('.detail_simulasi_table').remove();

            var table = isian_master_cks();
            // var table_detail = isian_detail_ck();

            $('.master_simulasi').empty().append(table);
            
            // $('.detail_simulasi').empty().append(table_detail);

        } else if (selectedOption === 'KB') 
        {
            
            $('.simulasi_table').remove();
            $('.detail_simulasi_table').remove();

            var table = isian_master_kb();
            var table_detail = isian_detail_kb();

            $('.master_simulasi').empty().append(table);
            $('.detail_simulasi').empty().append(table_detail);
        }else if (selectedOption === 'KBS') 
        {
            
            $('.simulasi_table').remove();
            $('.detail_simulasi_table').remove();

            var table = isian_master_kbs();
            // var table_detail = isian_detail_ck();

            $('.master_simulasi').empty().append(table);
            
            // $('.detail_simulasi').empty().append(table_detail);

        } else if (selectedOption === 'KPR') 
        {
            
            $('.simulasi_table').remove();
            $('.detail_simulasi_table').remove();

            var table = isian_master_kpr();
            var table_detail = isian_detail_kpr();

            $('.master_simulasi').empty().append(table);
            $('.detail_simulasi').empty().append(table_detail);
        }else if (selectedOption === 'KPRS') 
        {
            
            $('.simulasi_table').remove();
            $('.detail_simulasi_table').remove();

            var table = isian_master_kprs();
            // var table_detail = isian_detail_ck();

            $('.master_simulasi').empty().append(table);
            
            // $('.detail_simulasi').empty().append(table_detail);

        } else {
            // Hapus tabel jika opsi yang dipilih tidak sesuai
            $('.simulasi_table').remove();
            $('.detail_simulasi_table').remove();
        }
        
        $( ".datepicker" ).datepicker();
        rupiah();
        angka();
        formatRupiah();
    }


    // table master cara_bayar
    function isian_master_ck() {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var booking_fee = 0;
        var angsuran = 0;

        booking_fee = harga_jual * 0.01;
        angsuran = harga_jual * 0.99;

        // Tambahkan header kolom
        var table = $('<table>').addClass('table simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('StartDate').appendTo(headerRow);
        $('<th>').text('Count').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);
        $('<th>').text('Percentage').appendTo(headerRow);
        $('<th>').text('Interval').appendTo(headerRow);

        // Tambahkan baris data pertama
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('BF - Booking Fee').appendTo(dataRow);
        $('<td>').text('20/06/2023').appendTo(dataRow);
        $('<td>').text('1').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(booking_fee)).appendTo(dataRow);
        $('<td>').text('1%').appendTo(dataRow);
        $('<td>').text('999').appendTo(dataRow);

        // Tambahkan baris data kedua
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('ANG - Angsuran').appendTo(dataRow);
        $('<td>').text('20/07/2023').appendTo(dataRow);
        $('<td>').text('12').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(angsuran)).appendTo(dataRow);
        $('<td>').text('99%').appendTo(dataRow);
        $('<td>').text('999').appendTo(dataRow);

        return table;
    }    
    
    function isian_master_cks() {
        
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());
        
        var booking_fee = 0;
        var angsuran = 0;

        booking_fee = harga_jual * 0.01;
        angsuran = harga_jual * 0.99;

        // Tambahkan header kolom
        var table = $('<table>').addClass('table simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('StartDate').appendTo(headerRow);
        $('<th>').text('Count').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);
        $('<th>').text('Percentage').appendTo(headerRow);
        $('<th>').text('Interval').appendTo(headerRow);
        $('<th>').text('Action').appendTo(headerRow);

        // Tambahkan baris data pertama
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('BF - Booking Fee').appendTo(dataRow);
        $('<td>').append($('<input class="form-control form-control-sm datepicker startdate_bf" type="text">')).appendTo(dataRow);            
        $('<td>').append($('<input value="1" readonly>').attr('type', 'text').addClass('form-control form-control-sm angka count_bf').css('text-align', 'right')).appendTo(dataRow);
        $('<td align="right">').append($('<input value="'+formatRupiah(booking_fee)+'">').attr('type', 'text').addClass('form-control form-control-sm rupiah total_bf').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input value="1%">').attr('type', 'text').addClass('form-control form-control-sm angka').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input>').attr('type', 'text').addClass('form-control form-control-sm angka interval_bf')).appendTo(dataRow);
        $('<td>').append('').appendTo(dataRow);

        // Tambahkan baris data kedua
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('ANG - Angsuran').appendTo(dataRow);
        $('<td>').append($('<input>').attr('type', 'text').addClass('form-control form-control-sm datepicker startdate_angsuran')).appendTo(dataRow);
        $('<td>').append($('<input value="12">').attr('type', 'text').addClass('form-control form-control-sm angka count_angsuran').css('text-align', 'right')).appendTo(dataRow);
        $('<td align="right">').append($('<input value="'+formatRupiah(angsuran)+'">').attr('type', 'text').addClass('form-control form-control-sm  rupiah total_angsuran').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input  value="99%">').attr('type', 'text').addClass('form-control form-control-sm').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input>').attr('type', 'text').addClass('form-control form-control-sm angka interval_angsuran')).appendTo(dataRow);
        $('<td>').append($('<button class="btn btn-sm btn-primary" onclick="hitung_rata_angsuran_cks()">Hitung Rata Angsuran</button>')).appendTo(dataRow);

        // Tambahkan baris data kedua
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td colspan=6>').append($('<button class="btn btn-sm btn-primary" onclick="isian_detail_cks()">Hitung</button>')).appendTo(dataRow);

        return table;
    }

    function isian_master_kb() {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var booking_fee = 0;
        var dp = 0;
        var angsuran = 0;

        booking_fee = harga_jual * 0.01;
        dp = harga_jual * 0.19;
        angsuran = harga_jual * 0.8;

        // Tambahkan header kolom
        var table = $('<table>').addClass('table simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('StartDate').appendTo(headerRow);
        $('<th>').text('Count').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);
        $('<th>').text('Percentage').appendTo(headerRow);
        $('<th>').text('Interval').appendTo(headerRow);

        // Tambahkan baris data pertama
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('BF - Booking Fee').appendTo(dataRow);
        $('<td>').text('20/06/2023').appendTo(dataRow);
        $('<td>').text('1').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(booking_fee)).appendTo(dataRow);
        $('<td>').text('1%').appendTo(dataRow);
        $('<td>').text('999').appendTo(dataRow);

        // Tambahkan baris data kedua
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('DP - Down Payment').appendTo(dataRow);
        $('<td>').text('20/07/2023').appendTo(dataRow);
        $('<td>').text('4').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(dp)).appendTo(dataRow);
        $('<td>').text('19%').appendTo(dataRow);
        $('<td>').text('999').appendTo(dataRow);

        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('ANG - Angsuran').appendTo(dataRow);
        $('<td>').text('20/08/2023').appendTo(dataRow);
        $('<td>').text('20').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(angsuran)).appendTo(dataRow);
        $('<td>').text('80%').appendTo(dataRow);
        $('<td>').text('999').appendTo(dataRow);

        return table;
    }
    
    function isian_master_kbs() {
        
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var booking_fee = 0;
        var dp = 0;
        var angsuran = 0;

        booking_fee = harga_jual * 0.01;
        dp = harga_jual * 0.19;
        angsuran = harga_jual * 0.8;

        // batas
        var table = $('<table>').addClass('table simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('StartDate').appendTo(headerRow);
        $('<th>').text('Count').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);
        $('<th>').text('Percentage').appendTo(headerRow);
        $('<th>').text('Interval').appendTo(headerRow);
        $('<th>').text('Action').appendTo(headerRow);
            
        // Tambahkan baris data pertama
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('BF - Booking Fee').appendTo(dataRow);
        $('<td>').append($('<input class="form-control form-control-sm datepicker startdate_bf" type="text">')).appendTo(dataRow);
        $('<td>').append($('<input value="1" readonly>').attr('type', 'text').addClass('form-control form-control-sm angka count_bf').css('text-align', 'right')).appendTo(dataRow);
        $('<td align="right">').append($('<input value="'+formatRupiah(booking_fee)+'">').attr('type', 'text').addClass('form-control form-control-sm rupiah total_bf').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input value="1%">').attr('type', 'text').addClass('form-control form-control-sm angka').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input>').attr('type', 'text').addClass('form-control form-control-sm angka interval_bf')).appendTo(dataRow);$('<td>').append('').appendTo(dataRow);
            
            
        
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('DP - Down Payment').appendTo(dataRow);
        $('<td>').append($('<input>').attr('type', 'text').addClass('form-control form-control-sm datepicker startdate_dp')).appendTo(dataRow);
        $('<td>').append($('<input value="4">').attr('type', 'text').addClass('form-control form-control-sm angka count_dp').css('text-align', 'right')).appendTo(dataRow);
        $('<td align="right">').append($('<input value="'+formatRupiah(dp)+'">').attr('type', 'text').addClass('form-control form-control-sm  angka total_dp').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input value="19%">').attr('type', 'text').addClass('form-control form-control-sm').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input >').attr('type', 'text').addClass('form-control form-control-sm angka interval_dp')).appendTo(dataRow);
        $('<td>').append($('<button class="btn btn-sm btn-primary" onclick="hitung_rata_kbs_dp()">Hitung Rata DP</button>')).appendTo(dataRow);
            
            
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('ANG - Angsuran').appendTo(dataRow);
        $('<td>').append($('<input>').attr('type', 'text').addClass('form-control form-control-sm datepicker startdate_angsuran')).appendTo(dataRow);
        $('<td>').append($('<input value="20">').attr('type', 'text').addClass('form-control form-control-sm angka count_angsuran').css('text-align', 'right')).appendTo(dataRow);
        $('<td align="right">').append($('<input value="'+formatRupiah(angsuran)+'">').attr('type', 'text').addClass('form-control form-control-sm  rupiah total_angsuran').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input  value="80%">').attr('type', 'text').addClass('form-control form-control-sm').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input>').attr('type', 'text').addClass('form-control form-control-sm angka interval_angsuran')).appendTo(dataRow);
        $('<td>').append($('<button class="btn btn-sm btn-primary" onclick="hitung_rata_kbs_angsuran()">Hitung Rata Angsuran</button>')).appendTo(dataRow);

            
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td colspan=5>').append($('<button class="btn btn-sm btn-primary" onclick="isian_detail_kbs()">Hitung</button>')).appendTo(dataRow);

        return table;
    }

    function isian_master_kpr() {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var booking_fee = 0;
        var dp = 0;
        var pelunasan = 0;

        booking_fee = harga_jual * 0.01;
        dp = harga_jual * 0.19;
        pelunasan = harga_jual * 0.8;

        // Tambahkan header kolom
        var table = $('<table>').addClass('table simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('StartDate').appendTo(headerRow);
        $('<th>').text('Count').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);
        $('<th>').text('Percentage').appendTo(headerRow);
        $('<th>').text('Interval').appendTo(headerRow);

        // Tambahkan baris data pertama
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('BF - Booking Fee').appendTo(dataRow);
        $('<td>').text('20/06/2023').appendTo(dataRow);
        $('<td>').text('1').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(booking_fee)).appendTo(dataRow);
        $('<td>').text('1%').appendTo(dataRow);
        $('<td>').text('999').appendTo(dataRow);

        // Tambahkan baris data kedua
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('DP - Down Payment').appendTo(dataRow);
        $('<td>').text('20/07/2023').appendTo(dataRow);
        $('<td>').text('4').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(dp)).appendTo(dataRow);
        $('<td>').text('19%').appendTo(dataRow);
        $('<td>').text('999').appendTo(dataRow);

        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('PLS - Pelunasan').appendTo(dataRow);
        $('<td>').text('20/08/2023').appendTo(dataRow);
        $('<td>').text('1').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(pelunasan)).appendTo(dataRow);
        $('<td>').text('80%').appendTo(dataRow);
        $('<td>').text('999').appendTo(dataRow);

        return table;
    }
    
    function isian_master_kprs() {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var booking_fee = 0;
        var dp = 0;
        var pelunasan = 0;

        booking_fee = harga_jual * 0.01;
        dp = harga_jual * 0.19;
        pelunasan = harga_jual * 0.8;

        // batas
        var table = $('<table>').addClass('table simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('StartDate').appendTo(headerRow);
        $('<th>').text('Count').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);
        $('<th>').text('Percentage').appendTo(headerRow);
        $('<th>').text('Interval').appendTo(headerRow);
        $('<th>').text('Action').appendTo(headerRow);
            
        // Tambahkan baris data pertama
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('BF - Booking Fee').appendTo(dataRow);
        $('<td>').append($('<input class="form-control form-control-sm datepicker startdate_bf" type="text">')).appendTo(dataRow);
        $('<td>').append($('<input value="1" readonly>').attr('type', 'text').addClass('form-control form-control-sm angka count_bf').css('text-align', 'right')).appendTo(dataRow);
        $('<td align="right">').append($('<input value="'+formatRupiah(booking_fee)+'">').attr('type', 'text').addClass('form-control form-control-sm angka total_bf').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input value="1%">').attr('type', 'text').addClass('form-control form-control-sm').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input>').attr('type', 'text').addClass('form-control form-control-sm angka interval_bf')).appendTo(dataRow);
        $('<td>').append('').appendTo(dataRow);
            
            
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('DP - Down Payment').appendTo(dataRow);
        $('<td>').append($('<input>').attr('type', 'text').addClass('form-control form-control-sm datepicker startdate_dp')).appendTo(dataRow);
        $('<td>').append($('<input value="4">').attr('type', 'text').addClass('form-control form-control-sm angka count_dp').css('text-align', 'right')).appendTo(dataRow);
        $('<td align="right">').append($('<input value="'+formatRupiah(dp)+'">').attr('type', 'text').addClass('form-control form-control-sm  angka total_dp').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input value="19%">').attr('type', 'text').addClass('form-control form-control-sm').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input >').attr('type', 'text').addClass('form-control form-control-sm angka interval_dp')).appendTo(dataRow);
        $('<td>').append($('<button class="btn btn-sm btn-primary" onclick="hitung_rata_dp_kprs()">Hitung Rata DP</button>')).appendTo(dataRow);
            
            
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('PLS - Pelunasan').appendTo(dataRow);
        $('<td>').append($('<input>').attr('type', 'text').addClass('form-control form-control-sm datepicker startdate_pelunasan')).appendTo(dataRow);
        $('<td>').append($('<input value="1" readonly>').attr('type', 'text').addClass('form-control form-control-sm angka count_pelunasan').css('text-align', 'right')).appendTo(dataRow);
        $('<td align="right">').append($('<input value="'+formatRupiah(pelunasan)+'">').attr('type', 'text').addClass('form-control form-control-sm  angka total_pelunasan').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input value="80%">').attr('type', 'text').addClass('form-control form-control-sm').css('text-align', 'right')).appendTo(dataRow);
        $('<td>').append($('<input >').attr('type', 'text').addClass('form-control form-control-sm angka interval_pelunasan')).appendTo(dataRow);
        $('<td>').append('').appendTo(dataRow);

            
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td colspan=6>').append($('<button class="btn btn-sm btn-primary" onclick="isian_detail_kprs()">Hitung</button>')).appendTo(dataRow);

        return table;
    }

    

    // table detail cara_bayar
    function isian_detail_ck() {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var booking_fee = 0;
        var angsuran = 0;
        
        booking_fee = harga_jual * 0.01;
        angsuran = harga_jual * 0.99;

        var pembagi = 12;

        // Tambahkan header kolom
        var table = $('<table>').addClass('table detail_simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('Due Date').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);

        // Tambahkan baris data pertama
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('BF - Booking Fee').appendTo(dataRow);
        $('<td>').text('20/06/2023').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(booking_fee)).appendTo(dataRow);

        for (var i = 0; i < pembagi; i++) {

            var per_angsuran = angsuran / pembagi;
            var ke = i + 1;

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('ANG _ Angsuran ke ' + ke).appendTo(dataRow);
            $('<td>').text('20/07/2023').appendTo(dataRow);
            $('<td align="right">').text(formatRupiah(per_angsuran)).appendTo(dataRow);

        }

        return table;
    }

    
    function isian_detail_cks() {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var total_fix_bf = 0;
        var total_fix_angsuran = 0;

        var startdate_bf = $('.startdate_bf').val();
        var count_bf = formatRupiahToNumber($('.count_bf').val());
        var total_bf = formatRupiahToNumber($('.total_bf').val());
        var interval_bf = formatRupiahToNumber($('.interval_bf').val());
        var startdate_angsuran = $('.startdate_angsuran').val();
        var count_angsuran = formatRupiahToNumber($('.count_angsuran').val());
        var total_angsuran = formatRupiahToNumber($('.total_angsuran').val());
        var interval_angsuran = formatRupiahToNumber($('.interval_angsuran').val());
        

        // Tambahkan header kolom
        var table = $('<table>').addClass('table detail_simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('Due Date').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);

        for (var i = 0; i < count_bf; i++) {

            per_bf = total_bf / count_bf;
            var ke = i + 1;

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('BF - Booking Fee ke ' + ke).appendTo(dataRow);
            $('<td>').append($('<input class="form-control form-control-sm datepicker due_date_bf_'+i+'" type="text">')).appendTo(dataRow);
            $('<td align="right">').append($('<input class="form-control form-control-sm angka total_detail_bf_'+i+'" type="text" value="'+formatRupiah(per_bf)+'">').css('text-align', 'right')).appendTo(dataRow);

        }

        var per_angsuran = 0;
        for (var i = 0; i < count_angsuran; i++) {

            per_angsuran =  Math.ceil(total_angsuran / count_angsuran);
            var ke = i + 1;

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('ANG _ Angsuran ke ' + ke).appendTo(dataRow);
            $('<td>').append($('<input class="form-control form-control-sm datepicker due_date_angsuran_'+i+'" type="text">')).appendTo(dataRow);
            $('<td align="right">').append($('<input class="form-control form-control-sm angka total_detail_angsuran_'+i+'" type="text" value="'+formatRupiah(per_angsuran)+'">').css('text-align', 'right')).appendTo(dataRow);

        }

        
        // var dataRow = $('<tr>').appendTo(tbody);
        // $('<td colspan=3>').append($('<button class="btn btn-sm btn-primary" onclick="hitung_rata_angsuran_cks(' + count_angsuran + ', ' + per_angsuran + ', '+ total_bf +')">Hitung Rata Angsuran</button>')).appendTo(dataRow);

        $('.detail_simulasi').empty().append(table);
        
        $( ".datepicker" ).datepicker();
        rupiah();
        angka();
        formatRupiah();
        
    }

    function isian_detail_kb() {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var booking_fee = 0;
        var dp = 0;
        var angsuran = 0;

        booking_fee = harga_jual * 0.01;
        dp = harga_jual * 0.2;
        angsuran = harga_jual * 0.8;

        var pembagi_dp = 4;
        var pembagi_angsuran = 20;

        // Tambahkan header kolom
        var table = $('<table>').addClass('table detail_simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('Due Date').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);

        // Tambahkan baris data pertama
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('BF - Booking Fee').appendTo(dataRow);
        $('<td>').text('20/06/2023').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(booking_fee)).appendTo(dataRow);

        // dp
        for (var i = 0; i < pembagi_dp; i++) {

            var per_dp = dp / pembagi_dp;
            var ke = i + 1;
            if (i === 0) {
                per_dp = per_dp - booking_fee;
            }

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('DP - Down Payment ke ' + ke).appendTo(dataRow);
            $('<td>').text('20/07/2023').appendTo(dataRow);
            $('<td align="right">').text(formatRupiah(per_dp)).appendTo(dataRow);

        }

        // Angusran
        for (var i = 0; i < pembagi_angsuran; i++) {

            var per_angsuran = angsuran / pembagi_angsuran;
            var ke = i + 1;

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('ANG _ Angsuran ke ' + ke).appendTo(dataRow);
            $('<td>').text('20/07/2023').appendTo(dataRow);
            $('<td align="right">').text(formatRupiah(per_angsuran)).appendTo(dataRow);

        }

        return table;
    }

    
    function isian_detail_kbs() {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var total_fix_bf = 0;
        var total_fix_angsuran = 0;

        var startdate_bf = $('.startdate_bf').val();
        var count_bf = formatRupiahToNumber($('.count_bf').val());
        var total_bf = formatRupiahToNumber($('.total_bf').val());
        var interval_bf = formatRupiahToNumber($('.interval_bf').val());
        var count_dp = formatRupiahToNumber($('.count_dp').val());
        var total_dp = formatRupiahToNumber($('.total_dp').val());
        var interval_dp = formatRupiahToNumber($('.interval_dp').val());
        var startdate_angsuran = $('.startdate_angsuran').val();
        var count_angsuran = formatRupiahToNumber($('.count_angsuran').val());
        var total_angsuran = formatRupiahToNumber($('.total_angsuran').val());
        var interval_angsuran = formatRupiahToNumber($('.interval_angsuran').val());
        

        // Tambahkan header kolom
        var table = $('<table>').addClass('table detail_simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('Due Date').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);

        for (var i = 0; i < count_bf; i++) {

            per_bf = total_bf / count_bf;
            var ke = i + 1;

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('BF - Booking Fee ke ' + ke).appendTo(dataRow);
            $('<td>').append($('<input class="form-control form-control-sm datepicker due_date_bf_'+i+'" type="text">')).appendTo(dataRow);
            $('<td align="right">').append($('<input class="form-control form-control-sm angka total_detail_bf_'+i+'" type="text" value="'+formatRupiah(per_bf)+'">').css('text-align', 'right')).appendTo(dataRow);

        }

        var per_dp = 0;
        for (var i = 0; i < count_dp; i++) {

            per_dp = Math.ceil(total_dp / count_dp);
            var ke = i + 1;

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('DP - Down Payment ke ' + ke).appendTo(dataRow);
            $('<td>').append($('<input class="form-control form-control-sm datepicker due_date_dp_'+i+'" type="text">')).appendTo(dataRow);
            $('<td align="right">').append($('<input class="form-control form-control-sm angka total_detail_dp_'+i+'" type="text" value="'+formatRupiah(per_dp)+'">').css('text-align', 'right')).appendTo(dataRow);

        }

        var per_angsuran = 0;
        for (var i = 0; i < count_angsuran; i++) {

            per_angsuran = Math.ceil(total_angsuran / count_angsuran);
            var ke = i + 1;

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('ANG - Angsuran ke ' + ke).appendTo(dataRow);
            $('<td>').append($('<input class="form-control form-control-sm datepicker due_date_angsuran_'+i+'" type="text">')).appendTo(dataRow);
            $('<td align="right">').append($('<input class="form-control form-control-sm angka total_detail_angsuran_'+i+'" type="text" value="'+formatRupiah(per_angsuran)+'">').css('text-align', 'right')).appendTo(dataRow);

        }

        
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td colspan=3>').append($('<button class="btn btn-sm btn-primary" onclick="hitung_rata_kbs_dp(' + per_dp + ')">Hitung Rata DP</button> &nbsp; <button class="btn btn-sm btn-primary" onclick="hitung_rata_kbs_angsuran(' + per_angsuran + ')">Hitung Rata Angsuran</button>')).appendTo(dataRow);

        $('.detail_simulasi').empty().append(table);
        
        $( ".datepicker" ).datepicker();
        rupiah();
        angka();
        formatRupiah();
        
    }


    function isian_detail_kpr() {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var booking_fee = 0;
        var dp = 0;
        var pelunasan = 0;

        booking_fee = harga_jual * 0.01;
        pelunasan = harga_jual * 0.8;

        dp = harga_jual * 0.2;
        var pembagi = 4;

        

        


        // Tambahkan header kolom
        var table = $('<table>').addClass('table detail_simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('Due Date').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);

        // Tambahkan baris data pertama
        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('BF - Booking Fee').appendTo(dataRow);
        $('<td>').text('20/06/2023').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(booking_fee)).appendTo(dataRow);

        for (var i = 0; i < pembagi; i++) {

            var per_dp = dp / pembagi;
            var ke = i + 1;
            if (i === 0) {
                per_dp = per_dp - booking_fee;
            }

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('DP - Down Payment ke ' + ke).appendTo(dataRow);
            $('<td>').text('20/07/2023').appendTo(dataRow);
            $('<td align="right">').text(formatRupiah(per_dp)).appendTo(dataRow);

        }

        var dataRow = $('<tr>').appendTo(tbody);
        $('<td>').text('PLS - Pelunasan').appendTo(dataRow);
        $('<td>').text('20/08/2023').appendTo(dataRow);
        $('<td align="right">').text(formatRupiah(pelunasan)).appendTo(dataRow);

        return table;
    }

    
    function isian_detail_kprs() {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());

        var total_fix_bf = 0;
        var total_fix_angsuran = 0;

        var startdate_bf = $('.startdate_bf').val();
        var count_bf = formatRupiahToNumber($('.count_bf').val());
        var total_bf = formatRupiahToNumber($('.total_bf').val());
        var interval_bf = formatRupiahToNumber($('.interval_bf').val());
        var count_dp = formatRupiahToNumber($('.count_dp').val());
        var total_dp = formatRupiahToNumber($('.total_dp').val());
        var interval_dp = formatRupiahToNumber($('.interval_dp').val());
        var startdate_pelunasan = $('.startdate_pelunasan').val();
        var count_pelunasan = formatRupiahToNumber($('.count_pelunasan').val());
        var total_pelunasan = formatRupiahToNumber($('.total_pelunasan').val());
        var interval_pelunasan = formatRupiahToNumber($('.interval_pelunasan').val());
        

        // Tambahkan header kolom
        var table = $('<table>').addClass('table detail_simulasi_table table-bordered table-striped');
        var thead = $('<thead>').appendTo(table);
        var tbody = $('<tbody>').appendTo(table);

        var headerRow = $('<tr>').appendTo(thead);
        $('<th>').text('Invoice').appendTo(headerRow);
        $('<th>').text('Due Date').appendTo(headerRow);
        $('<th>').text('Total').appendTo(headerRow);

        for (var i = 0; i < count_bf; i++) {

            per_bf = Math.ceil(total_bf / count_bf);
            var ke = i + 1;

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('BF - Booking Fee ke ' + ke).appendTo(dataRow);
            $('<td>').append($('<input class="form-control form-control-sm datepicker due_date_bf_'+i+'" type="text">')).appendTo(dataRow);
            $('<td align="right">').append($('<input class="form-control form-control-sm angka total_detail_bf_'+i+'" type="text" value="'+formatRupiah(per_bf)+'">').css('text-align', 'right')).appendTo(dataRow);

        }

        var per_dp = 0;
        for (var i = 0; i < count_dp; i++) {

            per_dp = Math.ceil(total_dp / count_dp);
            var ke = i + 1;

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('DP - Down Payment ke ' + ke).appendTo(dataRow);
            $('<td>').append($('<input class="form-control form-control-sm datepicker due_date_dp_'+i+'" type="text">')).appendTo(dataRow);
            $('<td align="right">').append($('<input class="form-control form-control-sm angka total_detail_dp_'+i+'" type="text" value="'+formatRupiah(per_dp)+'">').css('text-align', 'right')).appendTo(dataRow);

        }

        var per_pelunasan = 0;
        for (var i = 0; i < count_pelunasan; i++) {

            per_pelunasan =  Math.ceil(total_pelunasan / count_pelunasan);
            var ke = i + 1;

            var dataRow = $('<tr>').appendTo(tbody);
            $('<td>').text('PLS - Pelunasan ke ' + ke).appendTo(dataRow);
            $('<td>').append($('<input class="form-control form-control-sm datepicker due_date_pelunasan_'+i+'" type="text">')).appendTo(dataRow);
            $('<td align="right">').append($('<input class="form-control form-control-sm angka total_detail_pelunasan_'+i+'" type="text" value="'+formatRupiah(per_pelunasan)+'">').css('text-align', 'right')).appendTo(dataRow);

        }

        
        // var dataRow = $('<tr>').appendTo(tbody);
        // $('<td colspan=3>').append($('<button class="btn btn-sm btn-primary" onclick="hitung_rata_dp_kprs(' + per_dp + ')">Hitung Rata DP</button>')).appendTo(dataRow);

        $('.detail_simulasi').empty().append(table);
        
        $( ".datepicker" ).datepicker();
        rupiah();
        angka();
        formatRupiah();
        
    }
    

    // hitung rata angsuran
    function hitung_rata_angsuran_cks()
    {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());
        var count_angsuran = formatRupiahToNumber($('.count_angsuran').val());
        var total_bf = formatRupiahToNumber($('.total_bf').val());
        var total_angsuran = formatRupiahToNumber($('.total_angsuran').val());
        var per_angsuran=Math.ceil(total_angsuran/count_angsuran);

        
        var total_baru = 0+total_bf;
        var angsuran_ke = [];
        
        for (var i = 0; i < count_angsuran; i++) {
            var angsuran = formatRupiahToNumber($('.total_detail_angsuran_'+i).val());
            
            if(per_angsuran === angsuran)
            {
                angsuran_ke.push(i);
            }else{
                total_baru += angsuran;
            }
        }

        total_baru = harga_jual-total_baru;

        total_baru = Math.ceil(total_baru / angsuran_ke.length);
        total_baru = parseInt(total_baru);
        
        angsuran_ke.forEach(function(value, index) {
            $('.total_detail_angsuran_'+value).val(formatRupiah(total_baru));
        });

    }

    function hitung_rata_dp_kprs()
    {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());
        var total_pelunasan = formatRupiahToNumber($('.total_pelunasan').val());
        var total_bf = formatRupiahToNumber($('.total_bf').val());
        var total_dp = formatRupiahToNumber($('.total_dp').val());
        var total_pelunasan = formatRupiahToNumber($('.total_pelunasan').val());
        var count_dp = formatRupiahToNumber($('.count_dp').val());
        var per_dp=Math.ceil(total_dp/count_dp);
        
        var total_baru = 0+total_bf+total_pelunasan;
        var dp_ke = [];
        
        for (var i = 0; i < count_dp; i++) {
            var dp = formatRupiahToNumber($('.total_detail_dp_'+i).val());
            
            if(per_dp === dp)
            {
                dp_ke.push(i);
            }else{
                total_baru += dp;
            }
        }
        console.log(total_baru);

        total_baru = harga_jual-total_baru;
        console.log(total_baru);

        total_baru = Math.ceil(total_baru / dp_ke.length);
        total_baru = parseInt(total_baru);
        console.log(total_baru, dp_ke.length);
        
        dp_ke.forEach(function(value, index) {
            $('.total_detail_dp_'+value).val(formatRupiah(total_baru));
        });

    }

    
    function hitung_rata_kbs_dp()
    {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());
        var total_angsuran = formatRupiahToNumber($('.total_angsuran').val());
        var total_bf = formatRupiahToNumber($('.total_bf').val());
        var total_dp = formatRupiahToNumber($('.total_dp').val());
        var count_dp = formatRupiahToNumber($('.count_dp').val());
        var per_dp = Math.ceil(total_dp/count_dp);
        
        var total_baru = 0+total_bf+total_angsuran;
        var dp_ke = [];
        
        for (var i = 0; i < count_dp; i++) {
            var dp = formatRupiahToNumber($('.total_detail_dp_'+i).val());
            
            if(per_dp === dp)
            {
                dp_ke.push(i);
            }else{
                total_baru += dp;
            }
        }

        total_baru = harga_jual-total_baru;

        total_baru = Math.ceil(total_baru / dp_ke.length);
        total_baru = parseInt(total_baru);
        
        dp_ke.forEach(function(value, index) {
            $('.total_detail_dp_'+value).val(formatRupiah(total_baru));
        });

    }


    function hitung_rata_kbs_angsuran()
    {
        var harga_jual = formatRupiahToNumber($('.harga_jual').val());
        var total_angsuran = formatRupiahToNumber($('.total_angsuran').val());
        var total_dp = formatRupiahToNumber($('.total_dp').val());
        var total_bf = formatRupiahToNumber($('.total_bf').val());
        var total_angsuran = formatRupiahToNumber($('.total_angsuran').val());
        var count_dp = formatRupiahToNumber($('.count_dp').val());
        var count_angsuran = formatRupiahToNumber($('.count_angsuran').val());
        var per_angsuran = Math.ceil(total_angsuran/count_angsuran);
        
        var total_baru = 0+total_bf+total_dp;
        var angsuran_ke = [];
        
        for (var i = 0; i < count_angsuran; i++) {
            var angsuran = formatRupiahToNumber($('.total_detail_angsuran_'+i).val());
            
            if(per_angsuran === angsuran)
            {
                angsuran_ke.push(i);
            }else{
                total_baru += angsuran;
            }
        }

        total_baru = harga_jual-total_baru;

        total_baru = Math.ceil(total_baru / angsuran_ke.length);
        total_baru = parseInt(total_baru);
        
        angsuran_ke.forEach(function(value, index) {
            $('.total_detail_angsuran_'+value).val(formatRupiah(total_baru));
        });

    }

    // batas
    function rupiah(){
        $(".rupiah").on("input", function() {
            var value = $(this).val();
            // Hapus karakter selain angka
            value = value.replace(/[^\d]/g, "");

            // Format menjadi rupiah
            value = formatRupiah(value);

            // Set nilai input dan atur text align menjadi right
            if (value !== "") {
            $(this).val("Rp " + value).css("text-align", "right");
            } else {
            $(this).val(value).css("text-align", "right");
            }
        });
    }

    function formatRupiah(angka) {
        var number_string = angka.toString().replace(/[^,\d]/g, ""),
            split    = number_string.split(","),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return rupiah;
    }

    function angka(){
        // format angka
        $(".angka").on("input", function() {
            var value = $(this).val();
            // Hapus karakter selain angka
            value = value.replace(/[^\d]/g, "");

            // Format menjadi angka
            value = formatRupiah(value);

            // Set nilai input dan atur text align menjadi right
            $(this).val(value).css("text-align", "right");
        });
    }

</script>

@endsection
