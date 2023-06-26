@extends('layouts.master')
@section('title','Transaksi')

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
              <h1 class="m-0">List Transaction Unit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                <li class="breadcrumb-item active">Unit</li>
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
                <h5 class="modal-title" id="addModalLabel">Add Transaction Unit</h5>
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
                                        <label for="kode_unit">Kode Unit</label>
                                        <input type="text" id="kode_unit" name="kode_unit" class="form-control form-control-sm mb-3" placeholder="Kode Unit">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="jenis_product">Jenis Product</label>
                                        <select id="jenis_product" name="jenis_product" class="form-control form-control-sm mb-3">
                                            <option value="">Select Product</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="description_product">Description Product</label>
                                        <input type="text" id="description_product" name="description_product" class="form-control form-control-sm mb-3" placeholder="Description Product" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="block">Block</label>
                                        <select id="block" name="block" class="form-control form-control-sm mb-3">
                                            <option value="">Select Block</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="description_block">Description Block</label>
                                        <input type="text" id="description_block" name="description_block" class="form-control form-control-sm mb-3" placeholder="Description Block" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" name="address" class="form-control form-control-sm mb-3" placeholder="Address">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="tipe">Tipe</label>
                                        <select id="tipe" name="tipe" class="form-control form-control-sm mb-3">
                                            <option value="">Select Tipe</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="description_tipe">Description Tipe</label>
                                        <input type="text" id="description_tipe" name="description_tipe" class="form-control form-control-sm mb-3" placeholder="Description Tipe" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="land_size">Land Size</label>
                                        <input type="text" id="land_size" name="land_size" class="form-control form-control-sm mb-3" placeholder="Land Size">
                                    </div>
                                    <div class="col-sm-4">                                
                                        <label for="hadap">Oriented</label>
                                        <select id="hadap" name="hadap" class="form-control form-control-sm mb-3">
                                            <option value="">Select Oriented</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="description_hadap">Description Oriented</label>
                                        <input type="text" id="description_hadap" name="description_hadap" class="form-control form-control-sm mb-3" placeholder="Description Oriented" readonly>
                                    </div>
                                    <div class="col-sm-4">             

                                        <label for="building_area">Building Area</label>
                                        <input type="text" id="building_area" name="building_area" class="form-control form-control-sm mb-3" placeholder="Building Area">
                                    </div>
                                </div>

                                <div class="row">
                                </div>
                                
                                <div class="row">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <label for="cash-Price">Cash Price</label>
                                        <input type="text" id="cash-Price" name="cash-Price" class="form-control form-control-sm mb-3 rupiah" placeholder="Cash Price">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="installment_price">installment Price </label>
                                        <input type="text" id="installment_price" name="installment_price" class="form-control form-control-sm mb-3 rupiah" placeholder="installment Price ">
                                    </div>
                                    <div class="col-sm-4">         
                                        <label for="credit_price">Credit Price</label>
                                        <input type="text" id="credit_price" name="credit_price" class="form-control form-control-sm mb-3 rupiah" placeholder="Credit Price">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <label for="ppn">PPN</label>
                                        <input type="number" id="ppn" name="ppn" class="form-control form-control-sm" placeholder="PPN">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="pph22">PPH 22</label>
                                        <input type="number" id="pph22" name="pph22" class="form-control form-control-sm" placeholder="PPH 22">
                                    </div>
                                    <div class="col-sm-4">         
                                        <label for="ppn_bm">PPN BM</label>
                                        <input type="number" id="ppn_bm" name="ppn_bm" class="form-control form-control-sm" placeholder="PPN BM">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-sm-4">                                                                
                                        <label for="customer">Customer</label>
                                        <select id="customer" name="customer" class="form-control form-control-sm mb-3">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-4">        

                                        <label for="order_date">Order Date</label>
                                        <input type="text" id="order_date" name="order_date" class="form-control form-control-sm mb-3 datepicker" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <label for="release_date">Release Date</label>
                                        <input type="text" id="release_date" name="release_date" class="form-control form-control-sm mb-3 datepicker" placeholder="Release Date">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="sales_agent">Sales / Agent</label>
                                        <input type="text" id="sales_agent" name="sales_agent" class="form-control form-control-sm mb-3" placeholder="Sales / Agent">
                                    </div>
                                    <div class="col-sm-4">         
                                        <label for="description">Description</label>
                                        <input type="text" id="description" name="description" class="form-control form-control-sm mb-3" placeholder="Description">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <label for="nup_date">NUP Date</label>
                                        <input type="text" id="nup_date" name="nup_date" class="form-control form-control-sm mb-3 datepicker" placeholder="NUP Date">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="nup">NUP</label>
                                        <input type="text" id="nup" name="nup" class="form-control form-control-sm mb-3" placeholder="NUP">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Change Date</th>
                                            <th>Cash Price</th>
                                            <th>installment Price </th>
                                            <th>Credit Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="small">
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary mx-auto">Lock</button>
                        <button type="button" class="btn btn-primary mx-auto">Reserve</button>
                        {{-- <button type="button" class="btn btn-primary mx-auto">Pending</button> --}}
                        {{-- <button type="button" class="btn btn-primary mx-auto">Schedule</button> --}}
                        <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal">Cancel</button>
                        
                    </div>
                </div>
                              
                
            </div>
        </div>
    </div>
</div>


{{-- modal bayar booking --}}

<div class="modal fade" id="pay_booking_modal" tabindex="-1" role="dialog" aria-labelledby="payBookingLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payBookingLabel">Booking</h5>
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
                                        <label for="receipt_number">Receipt Number</label>
                                        <input type="text" id="receipt_number" name="receipt_number" class="form-control form-control-sm mb-3" readonly placeholder="Receipt Number">
                                    </div>
                                    <div class="col-sm-4"> 
                                        <label for="received_from">Received From</label>
                                        <input type="text" id="received_from" name="received_from" class="form-control  mb-3 " readonly placeholder="Received From">
                                    </div>
                                    <div class="col-sm-4"> 
                                        <label for="receipt_date">Receipt Date</label>
                                        <input type="text" id="receipt_date" name="receipt_date" class="form-control  mb-3 datepicker" placeholder="Receipt Date">
                                    </div>
                                    <div class="col-sm-4"> 
                                        <label for="unit">Unit</label>
                                        <select class="unit select_box" style="width: 100%;" data-placeholder="Select Unit">
                                            <option value="B/7/01">B/7/01</option>
                                            <option value="B/7/02">B/7/02</option>
                                            <option value="B/7/03">B/7/03</option>
                                        </select> 
                                    </div>
                                    <div class="col-sm-4"> 
                                        <label for="booking_number">Booking Number</label>
                                        <input type="text" id="booking_number" name="booking_number" class="form-control form-control-sm mb-3" readonly placeholder="Booking Number">
                                    </div>
                                    {{-- <div class="col-sm-4"> 
                                        <label for="description">Description</label>
                                        <input type="text" id="description" name="description" class="form-control  mb-3 " readonly placeholder="Description">
                                    </div> --}}
                                </div>                                

                            </div>
                        </div>

                        <div class="card shadow">
                            <div class="card-body">

                                <div class="row">
                                    <button type="button" class="btn btn-primary" id="addBookingBtn" >
                                        <i class="fas fa-plus"></i> Add Detail Booking
                                    </button>
                                    <div class="col-sm-12 mt-1 field_booking add_fund_booking">

                                    </div>

                                    <table class="table table-bordered mt-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pay</th>
                                                <th>Due Date</th>
                                                <th>Invoice</th>
                                                <th>Total</th>
                                                <th>Cost</th>
                                                <th>Bank</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list_booking">
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
  





<script>
    $( document ).ready(function() {

        $('.select_box').select2();
        
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
                { title: "Unit Code", name: "Address", type: "text", width: 75 },
                { title: "Status", name: "Age", type: "number", width: 35 },
                { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name", width: 35 },
                {
                    title: "Action",
                    headerTemplate: function() {
                        return $("<div>").addClass("text-center").text("Action");
                    },
                    itemTemplate: function(_, item) {
                        var index = db.clients.indexOf(item);
                        var buttonContainer = $("<div>").addClass("btn-group");

                        var reverseButton = $("<button>")
                            .addClass("btn btn-primary btn-sm")
                            .text("Reserve")
                            .on("click", function() {
                                editClient(index);
                            });

                        var lockButton = $("<button>")
                            .addClass("btn btn-success btn-sm")
                            .text("Lock")
                            .on("click", function() {
                                deleteClient(index);
                            });

                        var pendingButton = $("<button>")
                            .addClass("btn btn-warning btn-sm")
                            .text("Pending")
                            .on("click", function() {
                                deleteClient(index);
                            });

                        var scheduleButton = $("<button>")
                            .addClass("btn btn-info btn-sm")
                            .text("Schedule")
                            .on("click", function() {
                                deleteClient(index);
                            });

                        var bayarBookingButton = $("<button>")
                            .addClass("btn btn-secondary btn-sm")
                            .text("Bayar Booking")
                            .on("click", function() {
                                $("#pay_booking_modal").modal("show");
                        });

                        buttonContainer.append(lockButton, reverseButton, bayarBookingButton);

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


    // add detail bookings
    var bookingCount = 0;

    function updateRowNumbers() {
        $('.list_booking tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    $('#addBookingBtn').on('click', function() {
        bookingCount++;

        var newField = 
            '<div class="row">' +
                '<div class="form-group col-sm-4">' +
                    '<select class="form-control Pay textboxt_append">' +
                        '<option value="">Select Pay</option>' +
                        '<option value="CC">CC - Credit Card</option>' +
                        '<option value="Cash">Cash</option>' +
                        '<option value="VA">VA -  Virtual Account</option>' +
                    '</select>' +
                '</div>' +
                '<div class="form-group col-sm-4">' +
                    '<select class="form-control Invoice textboxt_append">' +
                        '<option value="">Select Invoice</option>' +
                        '<option value="PPJB">PPJB - Rp. 10.000.000</option>' +
                        '<option value="BF">BF - Rp. 1.000.000</option>' +
                    '</select>' +
                '</div>' +
                '<div class="form-group col-sm-3">' +
                    '<select class="form-control Bank textboxt_append">' +
                        '<option value="">Select Bank</option>' +
                        '<option value="PPJB">PPJB - Rp. 10.000.000</option>' +
                        '<option value="BF">BF - Rp. 1.000.000</option>' +
                    '</select>' +
                '</div>' +
                '<div class="form-group col-sm-4">' +
                    '<input type="text" class="form-control Total textboxt_append rupiah" value="" placeholder="Total">' +
                '</div>' +
                '<div class="form-group col-sm-4">' +
                    '<input type="text" class="form-control Cost textboxt_append rupiah" value="" placeholder="Cost">' +
                '</div>' +
                '<div class="form-group col-sm-3">' +
                    '<input type="text" class="form-control DueDate textboxt_append datepicker" value="" placeholder="Due Date">' +
                '</div>' +
                // '<div class="form-group col-sm-4">' +
                //     '<input type="text" class="form-control Settlement_Date textboxt_append datepicker" value="" placeholder="Settlement date">' +
                // '</div>' +
                // '<div class="form-group col-sm-4">' +
                //     '<input type="text" class="form-control Receipt_Date textboxt_append datepicker" value="" placeholder="Receipt Date">' +
                // '</div>' +
                '<div class="form-group col-sm-2">' +
                    '<button type="button" class="btn btn-success saveBtn">Save</button>' +
                '</div>' +
            '</div>';

        $('.field_booking').empty().append(newField);

    });

    $(document).on('click', '.saveBtn', function() {

        var progress = $('.Progress').val();
        var percent = $('.Percent').val();
        var description = $('.Description').val();

        if(progress!=='' || percent !=='' || description!==''){

            // Tambahkan nilai ke dalam tabel list_booking
            var newRow =
                '<tr>' +
                    '<td>' + bookingCount + '</td>' +
                    '<td>' + progress + '</td>' +
                    '<td>' + percent + '</td>' +
                    '<td>' + description + '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-primary editBtn"><i class="fas fa-edit"></i></button>' +
                    '<button type="button" class="btn btn-danger deleteBtn"><i class="fas fa-trash"></i></button>' +
                    '</td>' +                  
                '</tr>';

            $('.list_booking').append(newRow);
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
