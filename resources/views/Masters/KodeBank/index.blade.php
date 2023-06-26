@extends('layouts.master')
@section('title','Master Kode Bank')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Kode Bank</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active"> Kode Bank</li>
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

</script>

@endsection
