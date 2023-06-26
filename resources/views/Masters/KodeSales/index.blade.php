@extends('layouts.master')
@section('title','Master Kode Sales')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Kode Sales</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active"> Kode Sales</li>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Master Kode Sales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="kode_sales">Kode Sales</label>
                                <input type="text" name="kode_sales" class="form-control form-control-sm mb-3 kode_sales" placeholder="Kode Sales">                             
                            
                                
                                <label for="nama_sales">Nama Sales</label>
                                <input type="text" name="nama_sales" class="form-control form-control-sm mb-3 nama_sales" placeholder="Nama Sales">
                                
                                <label for="atasan">Atasan</label>
                                <input type="text" name="atasan" class="form-control form-control-sm mb-3 atasan" placeholder="Atasan">
                            
                                
                                <label for="tanggal_mulai_kerja">Tanggal Mulai Kerja</label>
                                <input type="date" name="tanggal_mulai_kerja" class="form-control form-control-sm mb-3 tanggal_mulai_kerja" placeholder="Tanggal Mulai Kerja">
                                
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control form-control-sm mb-3 tanggal_lahir" placeholder="Tanggal Lahir">
                                
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control form-control-sm mb-3 jenis_kelamin">
                                    <option value="">Pilih</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            
                                
                                <label for="target_penjualan">Target Penjualan</label>
                                <input type="number" name="target_penjualan" class="form-control form-control-sm mb-3 target_penjualan" placeholder="Target Penjualan">

                                <label for="hitung_komisi_sales">Hitung Komisi Sales</label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input hitung_komisi_sales" type="radio" name="hitung_komisi_sales" id="radioHitung" value="Hitung">
                                        <label class="form-check-label" for="radioHitung">Hitung</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hitung_komisi_sales" type="radio" name="hitung_komisi_sales" id="radioTidak" value="Tidak">
                                        <label class="form-check-label" for="radioTidak">Tidak</label>
                                    </div>
                                </div> 
                                
                                <label for="no_telepon">No Telepon / HP</label>
                                <input type="text" name="no_telepon" class="form-control form-control-sm mb-3 no_telepon" placeholder="No Telepon / HP">
                            
                                
                                <label for="bank_no_rekening">Bank & No Rekening</label>
                                <input type="text" name="bank_no_rekening" class="form-control form-control-sm mb-3 bank_no_rekening" placeholder="Bank & No Rekening">
                                

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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Master Kode Sales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="kode_sales">Kode Sales</label>
                                <input type="text" name="kode_sales" class="form-control form-control-sm mb-3 kode_sales" placeholder="Kode Sales">                             
                            
                                
                                <label for="nama_sales">Nama Sales</label>
                                <input type="text" name="nama_sales" class="form-control form-control-sm mb-3 nama_sales" placeholder="Nama Sales">
                                
                                <label for="atasan">Atasan</label>
                                <input type="text" name="atasan" class="form-control form-control-sm mb-3 atasan" placeholder="Atasan">
                            
                                
                                <label for="tanggal_mulai_kerja">Tanggal Mulai Kerja</label>
                                <input type="date" name="tanggal_mulai_kerja" class="form-control form-control-sm mb-3 tanggal_mulai_kerja" placeholder="Tanggal Mulai Kerja">
                                
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control form-control-sm mb-3 tanggal_lahir" placeholder="Tanggal Lahir">
                                
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control form-control-sm mb-3 jenis_kelamin">
                                    <option value="">Pilih</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            
                                
                                <label for="target_penjualan">Target Penjualan</label>
                                <input type="number" name="target_penjualan" class="form-control form-control-sm mb-3 target_penjualan" placeholder="Target Penjualan">

                                <label for="hitung_komisi_sales">Hitung Komisi Sales</label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input hitung_komisi_sales" type="radio" name="hitung_komisi_sales" id="radioHitung" value="Hitung">
                                        <label class="form-check-label" for="radioHitung">Hitung</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input hitung_komisi_sales" type="radio" name="hitung_komisi_sales" id="radioTidak" value="Tidak">
                                        <label class="form-check-label" for="radioTidak">Tidak</label>
                                    </div>
                                </div> 
                                
                                <label for="no_telepon">No Telepon / HP</label>
                                <input type="text" name="no_telepon" class="form-control form-control-sm mb-3 no_telepon" placeholder="No Telepon / HP">
                            
                                
                                <label for="bank_no_rekening">Bank & No Rekening</label>
                                <input type="text" name="bank_no_rekening" class="form-control form-control-sm mb-3 bank_no_rekening" placeholder="Bank & No Rekening">
                                

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
                { title: "Kode", name: "Age", type: "text", width: 35 },
                { title: "Nama Sales", name: "Name", type: "number", width: 50 },
                { title: "Atasan", name: "Name", type: "text", width: 50 },
                { title: "Target Penjualan", name: "Age", type: "number", width: 40 },
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
                                editClient(index);
                            });

                        var removeButton = $("<button>")
                            .addClass("btn btn-danger btn-sm")
                            .text("Remove")
                            .on("click", function() {
                                deleteClient(index);
                            });
                        buttonContainer.append(editButton, removeButton);

                        return $("<div>").addClass("text-center").append(buttonContainer);
                    }
                }
            ]
        });
    });

    function editClient(index) {
        $("#editModal").modal("show");
    }

    // button add condition
    $("#addButton").click(function() {
        $(".form-control").val("");
        $("#addModal").modal("show");
    });

</script>

@endsection
