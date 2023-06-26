@extends('layouts.master')
@section('title','Report Berkas Dokumen')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Report Berkas Dokumen</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Report</a></li>
                <li class="breadcrumb-item active">Berkas Dokumen</li>
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
                    <div class="col-sm-2">
                        <button class="btn btn-info btn_filter">
                            <i class="fas fa-filter"></i> Filter
                        </button> 
                    </div>
                    <div class="col-sm-10">
                        
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <button class="btn btn-danger">
                            <i class="fas fa-file-pdf"></i> PDF
                        </button> 
                        
                        <button class="btn btn-success">
                            <i class="fas fa-file-excel"></i> Excel
                        </button> 
                    </div>
                    
                </div>

                <div id="jsGrid1"></div>
            </div>
            <!-- /.card-body -->
        </div>
    </section>



    {{-- modal pop up add --}}
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card shadow">
                                <div class="card-body">                                    
                                    
                                    <label for="kode_unit">Kode Unit</label>
                                    <br>
                                    <select class="kode_unit select_box" name="kode_unit[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih Kode Unit">
                                        <option value="0">Pilih Semua</option>
                                        <option value="1">BA</option>
                                        <option value="2">BB</option>
                                    </select>   

                                    <div class="dropdown-divider mb-1"></div>
                                    
                                    <label for="cara_bayar">Cara Bayar</label>
                                    <br>
                                    <select class="cara_bayar select_box" name="cara_bayar[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih Cara Bayar">
                                        <option value="0">Pilih Semua</option>
                                        <option value="1">BA</option>
                                        <option value="2">BB</option>
                                    </select>     
                                    
                                    <div class="dropdown-divider mb-1"></div>
                                    
                                    <label for="dokumen">Dokumen</label>
                                    <br>
                                    <select class="dokumen select_box" name="dokumen[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih Dokumen">
                                        <option value="0">Pilih Semua</option>
                                        <option value="1">Lengkap</option>
                                        <option value="2">Belum</option>
                                    </select>     
    
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card shadow">
                                <div class="card-body">
    
                                    <label>Tanggal Transaksi</label>
                                    <div class="input-group">
                                        <input type="text" name="tanggal_awal" class="form-control form-control-sm tanggal_awal" style="width: 45%;" placeholder="Tanggal Awal">
                                        <label style="width: 10%">&nbsp; - &nbsp;</label>
                                        <input type="text" name="tanggal_akhir" class="form-control form-control-sm tanggal_akhir" style="width: 45%;" placeholder="Tanggal Akhir">
                                    </div>

                                    <div class="dropdown-divider mb-1"></div>
                                    
                                    <label for="cover_note">Cover Note</label>
                                    <br>
                                    <select class="cover_note select_box" name="cover_note[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih Cover Note">
                                        <option value="0">Pilih Semua</option>
                                        <option value="1">Sudah</option>
                                        <option value="2">Belum</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                    </div>                                
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Submit</button>
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
                { title: "Kode Unit", name: "Name", type: "text", width: 35 },
                { title: "Nama", name: "Address", type: "number", width: 50 },
                { title: "Tanggal Booking", name: "Age", type: "text", width: 35 },
                { title: "Cara Bayar", name: "Address", type: "number", width: 50 },
                { title: "Dokumen Lengkap", name: "Address", type: "number", width: 50 },
            ]
        });
    });

    // button add condition
    $(".btn_filter").click(function() {
        $("#filterModal").modal("show");
    });

</script>

@endsection
