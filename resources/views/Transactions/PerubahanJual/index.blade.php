@extends('layouts.master')
@section('title','Transaksi')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Transaction Perubahan Jual</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                <li class="breadcrumb-item active">Perubahan Jual</li>
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
                <h5 class="modal-title" id="addModalLabel">Add Transaction Perubahan Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="small">* Maximum hanya 3 Jenis Perubahan yang disimpan</label>
                                    <label>Perubahan / Ganti:</label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="checkboxNama" value="nama">
                                      <label class="form-check-label" for="checkboxNama">Nama</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="checkboxCaraBayar" value="cara_bayar">
                                      <label class="form-check-label" for="checkboxCaraBayar">Cara Bayar</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="checkboxUnit" value="unit">
                                      <label class="form-check-label" for="checkboxUnit">Unit</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="checkboxHarga" value="harga">
                                      <label class="form-check-label" for="checkboxHarga">Harga</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="checkboxSchedule" value="schedule">
                                      <label class="form-check-label" for="checkboxSchedule">Schedule</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="checkboxBPHTB" value="bphtb">
                                      <label class="form-check-label" for="checkboxBPHTB">BPHTB</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="checkboxBatal" value="batal">
                                      <label class="form-check-label" for="checkboxBatal">Batal</label>
                                    </div>
                                </div>                                

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow">
                            <div class="card-body">
                                                                
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="manualProsesSwitch">
                                    <label class="custom-control-label" for="manualProsesSwitch">Proses</label>
                                </div>

                                <div class="dropdown-divider mb-1"></div>

                                <label for="nup">NUP</label>
                                <input type="text" id="nup" name="nup" class="form-control form-control-sm mb-3" placeholder="NUP">

                                <div class="dropdown-divider mb-1"></div>

                                <label for="keterangan">Keterangan</label>
                                <input type="text" id="keterangan" name="keterangan" class="form-control form-control-sm mb-3" placeholder="Keterangan">

                                <div class="dropdown-divider mb-1"></div>

                                <label for="tanggal_perubahan">Tanggal Perubahan</label>
                                <input type="date" id="tanggal_perubahan" name="tanggal_perubahan" class="form-control form-control-sm mb-3" placeholder="Tanggal Perubahan">

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="harga_dasar" class="mt-1">Harga Dasar</label>
                                <input type="text" id="harga_dasar" name="harga_dasar" class="form-control form-control-sm mb-3" placeholder="Harga Dasar">

                                <div class="dropdown-divider mb-1"></div>

                                <label for="diskon_1">Diskon 1</label>
                                <input type="text" id="diskon_1" name="diskon_1" class="form-control form-control-sm mb-3" placeholder="Diskon 1">

                                <div class="dropdown-divider mb-1"></div>

                                <label for="diskon_2">Diskon 2</label>
                                <input type="text" id="diskon_2" name="diskon_2" class="form-control form-control-sm mb-3" placeholder="Diskon 2">

                                <div class="dropdown-divider mb-1"></div>

                                <label for="ppn">PPN</label>
                                <input type="text" id="ppn" name="ppn" class="form-control form-control-sm" placeholder="PPN">

                                <div class="dropdown-divider mb-1"></div>

                                <label for="pph22">PPH 22</label>
                                <input type="text" id="pph22" name="pph22" class="form-control form-control-sm" placeholder="PPH 22">

                                <div class="dropdown-divider mb-1"></div>

                                <label for="ppn_bm">PPN BM</label>
                                <input type="text" id="ppn_bm" name="ppn_bm" class="form-control form-control-sm" placeholder="PPN BM">

                                <div class="dropdown-divider mb-1"></div>

                                <label for="total">Total</label>
                                <input type="text" id="total" name="total" class="form-control form-control-sm mb-3" placeholder="Total">

                            </div>
                        </div>
                    </div>

                    <div class="col-8" style="margin-top: -220px">
                        <div class="card shadow">
                            <div class="card-body row">
                                <div class="col-6">

                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control form-control-sm mb-3" placeholder="Nama">

                                    <div class="dropdown-divider mb-1"></div>

                                    <label for="keterangan">Keterangan</label>                                    
                                    <input type="text" id="keterangan" name="keterangan" class="form-control form-control-sm mb-3" placeholder="Keterangan">

                                </div>
                                <div class="col-6">
                                    
                                    <label for="cara_bayar">Cara Bayar</label>
                                    <input type="text" id="cara_bayar" name="cara_bayar" class="form-control form-control-sm mb-3" placeholder="Cara Bayar">

                                    <div class="dropdown-divider mb-1"></div>

                                    <label for="unit">Unit</label>
                                    <input type="text" id="unit" name="unit" class="form-control form-control-sm mb-3" placeholder="Unit">

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary mx-auto">Save</button>
                        <button type="button" class="btn btn-primary mx-auto">Refund</button>
                        <button type="button" class="btn btn-primary mx-auto">Proccess</button>
                        <button type="button" class="btn btn-primary mx-auto">Info Angsuran</button>
                        <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal">Cancel</button>
                        
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
                { title: "No Ganti", name: "Address", type: "text", width: 75 },
                { title: "NUP", name: "Age", type: "number", width: 35 },
                { name: "Kode Unit", type: "select", items: db.countries, valueField: "Id", textField: "Name", width: 35 },
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
