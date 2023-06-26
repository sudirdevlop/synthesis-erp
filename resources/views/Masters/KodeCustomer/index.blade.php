@extends('layouts.master')
@section('title','Master Kode Customer')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Kode Customer</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active"> Kode Customer</li>
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
                <h5 class="modal-title" id="addModalLabel">Add Master Kode Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <label for="kode_customer">Kode Customer</label>
                                <input type="text" name="kode_customer" class="form-control form-control-sm kode_customer" placeholder="Kode Customer">

                                <div class="dropdown-divider mb-1"></div>

                                <label for="nama_customer">Nama Customer</label>
                                <input type="text" name="nama_customer" class="form-control form-control-sm nama_customer" placeholder="Nama Customer">

                                <div class="dropdown-divider mb-1"></div>

                                <label for="tempat_lahir">Tempat / Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat_lahir" class="form-control form-control-sm tempat_lahir" style="width: 60%;" placeholder="Tempat Lahir">
                                    <input type="date" name="tanggal_lahir" class="form-control form-control-sm tanggal_lahir" style="width: 40%;">
                                </div>

                                <div class="dropdown-divider mb-1"></div>

                                <label >Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control form-control-sm jenis_kelamin">
                                    <option value="">Pilih</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>

                                <div class="dropdown-divider mb-1"></div>

                                <label >Agama</label>
                                <div class="input-group">
                                    
                                    <select name="agama" class="form-control form-control-sm agama" style="width: 30%;">
                                        <option value="">Pilih</option>
                                        
                                    </select>
                                    <input type="text" name="agama" class="form-control form-control-sm" style="width: 40%;" readonly>
                                </div>
                                
                                <div class="dropdown-divider mb-1"></div>

                                <label for="telp_rumah">Telp. Rumah</label>
                                <input type="text" name="telp_rumah" class="form-control form-control-sm telp_rumah" placeholder="Telp. Rumah">
                                
                                <div class="dropdown-divider mb-1"></div>

                                <label for="telp_kantor">Telp. Kantor</label>
                                <input type="text" name="telp_kantor" class="form-control form-control-sm telp_kantor" placeholder="Telp. Kantor">

                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <label for="id_pemesan">ID Pemesan</label>                                        
                                <select name="id_pemesan" class="form-control form-control-sm id_pemesan">
                                    <option value="">Pilih</option>
                                    <option value="SIM A">SIM A</option>
                                    <option value="SIM B">SIM B</option>
                                    <option value="SIM B2">SIM B2</option>
                                    <option value="SIM C">SIM C</option>
                                    <option value="Kitas">Kitas</option>
                                    <option value="Passport">Passport</option>
                                    <option value="Lain Lain">Lain Lain</option>
                                </select>

                                <div class="dropdown-divider mb-1"></div>

                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input type="text" class="form-control npwp form-control-sm" name="npwp" pattern="\d{2}\.\d{3}\.\d{3}\.\d{1}-\d{3}\.\d{3}" placeholder="99.999.999.9-999.999">
                                    <small class="form-text text-muted">Format: 99.999.999.9-999.999</small>
                                </div>
                                
                                <div class="dropdown-divider mb-1"></div>

                                <label>Kategori Customer</label>
                                <div class="input-group">
                                    
                                    <select name="kategori" class="form-control form-control-sm kategori" style="width: 30%;">
                                        <option value="">Pilih</option>
                                        
                                    </select>
                                    <input type="text" name="kategori" class="form-control form-control-sm nama_kategori" style="width: 40%;"  readonly>
                                </div>

                                <div class="dropdown-divider mb-1"></div>

                                <label>Profesi</label>
                                <div class="input-group">
                                    
                                    <select name="profesi" class="form-control form-control-sm profesi" style="width: 30%;">
                                        <option value="">Pilih</option>
                                        
                                    </select>
                                    <input type="text" name="profesi" class="form-control form-control-sm nama_profesi" style="width: 40%;"  readonly>
                                </div>

                                <div class="dropdown-divider mb-1"></div>

                                <label>Jenis Usaha</label>
                                <div class="input-group">
                                    
                                    <select name="jenis_usaha" class="form-control form-control-sm jenis_usaha" style="width: 30%;">
                                        <option value="">Pilih</option>
                                        
                                    </select>
                                    <input type="text" name="jenis_usaha" class="form-control form-control-sm nama_jenis_usaha" style="width: 40%;"  readonly>
                                </div>
                                
                                <div class="dropdown-divider mb-1"></div>

                                <label for="handphone">Handphone</label>
                                <input type="text" name="handphone" class="form-control form-control-sm handphone_1" placeholder="Handphone 1">
                                <br>
                                <input type="text" name="handphone" class="form-control form-control-sm handphone_2" placeholder="Handphone 2">
                                
                                <div class="dropdown-divider mb-1"></div>

                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control form-control-sm email" placeholder="Email">

                            </div>
                        </div>
                    </div>
                </div>                                
            </div>

            
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <label for="alamat_kartu_identitas">Alamat Kartu Indentitas</label>
                                <textarea name="alamat_kartu_identitas" class="form-control form-control-sm alamat_kartu_identitas" placeholder="Alamat Kartu Indentitas"></textarea>

                                <div class="dropdown-divider mb-1"></div>

                                <div class="row">
                                    <div class="col-6">
                                        <label>RT/RW</label>
                                        <div class="input-group">
                                            <input type="text" name="rt" class="form-control form-control-sm rt" style="width: 45%;" placeholder="RT">
                                            <label style="width: 10%">&nbsp; / &nbsp;</label>
                                            <input type="text" name="rw" class="form-control form-control-sm rw" style="width: 45%;" placeholder="RW">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <label>Kelurahan</label>
                                        <div class="input-group">
                                            <input type="text" name="kelurahan" class="form-control form-control-sm kelurahan" placeholder="Kelurahan">
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider mb-1"></div>

                                <label>Kecamatan</label>
                                <input type="date" name="kecamatan" class="form-control form-control-sm kecamatan" placeholder="Kecamatan">
                                
                                <div class="dropdown-divider mb-1"></div>

                                <label>Kota / Kab</label>                                        
                                <div class="input-group">
                                    <select name="kota" class="form-control form-control-sm kota" style="width: 30%;">
                                        <option value="">Pilih</option>                                            
                                    </select>
                                    <input type="text" name="kota" class="form-control form-control-sm kota" style="width: 70%;" readonly>
                                </div>
                                
                                <div class="dropdown-divider mb-1"></div>
                                    
                                <label>Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control form-control-sm kode_pos" placeholder="Kode Pos">

                            </div>
                        </div>
                    </div>

                    
                    <div class="col-4">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="alamat_surat">Alamat Surat</label>
                                <textarea name="alamat_surat" class="form-control form-control-sm alamat_surat" placeholder="Alamat Surat"></textarea>
                                
                                <div class="dropdown-divider mb-1"></div>

                                <div class="row">
                                    <div class="col-6">
                                        <label>RT/RW</label>
                                        <div class="input-group">
                                            <input type="text" name="rt_surat" class="form-control form-control-sm rt_surat" style="width: 45%;" placeholder="RT">
                                            <label style="width: 10%">&nbsp; / &nbsp;</label>
                                            <input type="text" name="rw_surat" class="form-control form-control-sm rw_surat" style="width: 45%;" placeholder="RW">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <label>Kelurahan</label>
                                        <div class="input-group">
                                            <input type="text" name="kelurahan_surat" class="form-control form-control-sm kelurahan_surat" placeholder="Kelurahan">
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider mb-1"></div>

                                <label>Kecamatan</label>
                                <input type="date" name="kecamatan_surat" class="form-control form-control-sm kecamatan_surat" placeholder="Kecamatan">
                                
                                <div class="dropdown-divider mb-1"></div>

                                <label>Kota / Kab</label>                                        
                                <div class="input-group">
                                    <select name="kota_surat" class="form-control form-control-sm kota_surat" style="width: 30%;">
                                        <option value="">Pilih</option>                                            
                                    </select>
                                    <input type="text" name="kota_surat" class="form-control form-control-sm kota_surat" style="width: 70%;" readonly>
                                </div>
                                
                                <div class="dropdown-divider mb-1"></div>
                                    
                                <label>Kode Area</label>
                                <input type="text" name="kode_area" class="form-control form-control-sm kode_area" placeholder="Kode Area">

                            </div>
                        </div>
                    </div>

                    
                    <div class="col-4">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="alamat_npwp">Alamat NPWP</label>
                                <textarea name="alamat_npwp" class="form-control form-control-sm alamat_npwp" placeholder="Alamat NPWP"></textarea>
                                
                                <div class="dropdown-divider mb-1"></div>

                                <div class="row">
                                    <div class="col-6">
                                        <label>RT/RW</label>
                                        <div class="input-group">
                                            <input type="text" name="rt_npwp" class="form-control form-control-sm rt_npwp" style="width: 45%;" placeholder="RT">
                                            <label style="width: 10%">&nbsp; / &nbsp;</label>
                                            <input type="text" name="rw_npwp" class="form-control form-control-sm rw_npwp" style="width: 45%;" placeholder="RW">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <label>Kelurahan</label>
                                        <div class="input-group">
                                            <input type="text" name="kelurahan_npwp" class="form-control form-control-sm kelurahan_npwp" placeholder="Kelurahan">
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider mb-1"></div>

                                <label>Kecamatan</label>
                                <input type="date" name="kecamatan_npwp" class="form-control form-control-sm kecamatan_npwp" placeholder="Kecamatan">
                                
                                <div class="dropdown-divider mb-1"></div>

                                <label>Kota / Kab</label>                                        
                                <div class="input-group">
                                    <select name="kota_npwp" class="form-control form-control-sm kota_npwp" style="width: 30%;">
                                        <option value="">Pilih</option>                                            
                                    </select>
                                    <input type="text" name="kota_npwp" class="form-control form-control-sm kota_npwp" style="width: 70%;" readonly>
                                </div>


                                <div class="dropdown-divider mb-1"></div>

                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control form-control-sm keterangan" placeholder="Keterangan"></textarea>

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
                <h5 class="modal-title" id="editModalLabel">Edit Master Kode Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="col-12" >
                                    <div class="card shadow">
                                        <div class="card-body row">
                                            <div class="col-6">
            
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama" name="nama" class="form-control form-control-sm" placeholder="Nama">
            
                                                <div class="dropdown-divider mb-1"></div>
            
                                                <label for="keterangan">Keterangan</label>                                    
                                                <input type="text" id="keterangan" name="keterangan" class="form-control form-control-sm" placeholder="Keterangan">
            
                                            </div>
                                            <div class="col-6">
                                                
                                                <label for="cara_bayar">Cara Bayar</label>
                                                <input type="text" id="cara_bayar" name="cara_bayar" class="form-control form-control-sm" placeholder="Cara Bayar">
            
                                                <div class="dropdown-divider mb-1"></div>
            
                                                <label for="unit">Unit</label>
                                                <input type="text" id="unit" name="unit" class="form-control form-control-sm" placeholder="Unit">
            
                                            </div>
                                        </div>
                                    </div>
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

    // function npwp
    $('.npwpInput').on('input', function() {
        var npwpValue = $(this).val();
        var isValid = validateNPWP(npwpValue);
        
        if (isValid) {
          $(this).removeClass('is-invalid');
          $(this).addClass('is-valid');
        } else {
          $(this).removeClass('is-valid');
          $(this).addClass('is-invalid');
        }
      });
      
      function validateNPWP(npwp) {
        var regex = /^\d{2}\.\d{3}\.\d{3}\.\d{1}-\d{3}\.\d{3}$/;
        return regex.test(npwp);
      }

</script>

@endsection
