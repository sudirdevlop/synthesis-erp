@extends('layouts.master')
@section('title','Transaksi Voucher')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Transaction Voucher</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                <li class="breadcrumb-item active">Voucher</li>
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
                        {{-- <button type="button" class="btn btn-primary" id="addButton">
                            <i class="fas fa-plus"></i> Add
                        </button> --}}
                        <a class="btn btn-primary" href="{{ route('transaction_voucher.add') }}">
                            <i class="fas fa-plus"></i> Add
                        </a>
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
                <h5 class="modal-title" id="addModalLabel">Add Transaction PP / PPJB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="card shadow">
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col-sm-4"> 
                                                <label for="kode_unit">Kode Unit</label>
                                                <input type="text" id="kode_unit" name="kode_unit" class="form-control form-control-sm mb-3" placeholder="Kode Unit">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="alamat">Alamat</label>
                                                <textarea id="alamat" name="alamat" class="form-control form-control-sm mb-3"></textarea>
                                            </div>
                                            <div class="col-sm-4">   
                                                <label for="tanggal_booking">Tanggal Booking</label>
                                                <input type="date" id="tanggal_booking" name="tanggal_booking" class="form-control form-control-sm mb-3" placeholder="Tanggal Booking">
                                            </div>
                                        </div> 
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-4"> 
                                                <label for="pembeli">Pembeli</label>
                                                <input type="date" id="pembeli" name="pembeli" class="form-control form-control-sm mb-3" placeholder="Pembeli">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="alamat_pembeli">Alamat Pembeli ( KTP )</label>
                                                <textarea id="alamat_pembeli" name="alamat_pembeli" class="form-control form-control-sm mb-3" placeholder="Alamat Pembeli ( KTP )"></textarea>
                                            </div>
                                            <div class="col-sm-4">   
                                                <label for="rt_rw_kelurah">RT/RW Lurah</label>
                                                <input type="text" id="rt_rw_kelurah" name="rt_rw_kelurah" class="form-control form-control-sm mb-3" placeholder="RT/RW Lurah">
                                            </div>
                                        </div>  

                                        <div class="row">
                                            <div class="col-sm-4"> 
                                                <label for="kecamatan">Kecamatan</label>
                                                <input type="text" id="kecamatan" name="kecamatan" class="form-control form-control-sm mb-3" placeholder="Kecamatan">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="kota">Kota</label>
                                                <input type="text" id="kota" name="kota" class="form-control form-control-sm mb-3" placeholder="Kota">
                                            </div>
                                        </div>   
        
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>                
                

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary mx-auto">Save</button>
                        <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-info mx-auto">
                            <i class="fas fa-print"></i> Print
                        </button>                                               
                    </div>
                </div>
                              
                
            </div>
        </div>
    </div>
</div>





<script>
    $( document ).ready(function() {
        
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
                { title: "RFP Number", name: "Name", type: "text", width: 40 },
                { title: "TGL RFP", name: "Address", type: "text", width: 40 },
                { title: "Kode Supplier", name: "Age", type: "text", width: 40 },
                { title: "Keterangan", name: "Name", type: "number", width: 40 },
                { name: "Total", type: "select", items: db.countries, valueField: "Id", textField: "Name", width: 35 },
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
                            .text("Print")
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


    // button add condition
    $("#addButton").click(function() {
        $(".form-control").val("");
        $("#addModal").modal("show");
    });

</script>

@endsection
