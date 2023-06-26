@extends('layouts.master')
@section('title','Report Invoice')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Report Invoice</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Report</a></li>
                <li class="breadcrumb-item active">Invoice</li>
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
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body">    
                                    
                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <h5>INVOICE</h5>
                                            <label>Tanggal Jatuh Tempo</label>
                                            <div class="input-group">
                                                <input type="text" name="tanggal_awal_jatuh_tempo" class="form-control form-control-sm tanggal_awal_jatuh_tempo" style="width: 45%;" placeholder="Tanggal Awal">
                                                <label style="width: 10%;text-align: center">-</label>
                                                <input type="text" name="tanggal_akhir_jatuh_tempo" class="form-control form-control-sm tanggal_akhir_jatuh_tempo" style="width: 45%;" placeholder="Tanggal Akhir">
                                            </div>                                          
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <h5>Faktur Pajak</h5>
                                            <div class="row">
                                                <div class="col-sm-6">  
                                                    <label for="no_faktur_pajak">No Faktur Pajak</label>
                                                    <br>
                                                    <select class="no_faktur_pajak select_box" name="no_faktur_pajak[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih No Faktur Pajak">
                                                        <option value="0">Pilih Semua</option>
                                                        <option value="1">Apart</option>
                                                        <option value="2">Kav</option>
                                                        <option value="3">Kios</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">                                                    
                                                    <label>Tanggal Faktur Pajak</label>
                                                    <div class="input-group">
                                                        <input type="text" name="tanggal_awal_faktur_pajak" class="form-control form-control-sm tanggal_awal_faktur_pajak" style="width: 45%;" placeholder="Tanggal Awal">
                                                        <label style="width: 10%;text-align: center">-</label>
                                                        <input type="text" name="tanggal_akhir_faktur_pajak" class="form-control form-control-sm tanggal_akhir_faktur_pajak" style="width: 45%;" placeholder="Tanggal Akhir">
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>
                                    </div><br>
                                    
                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <h5> Kwitansi</h5>
                                            <div class="row">
                                                <div class="col-sm-6">  
                                                    <label for="no_kwitansi">No Kwitansi</label>
                                                    <br>
                                                    <select class="no_kwitansi select_box" name="no_kwitansi[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih No Kwitansi">
                                                        <option value="0">Pilih Semua</option>
                                                        <option value="1">Apart</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">                                                    
                                                    <label>Tanggal Kwitansi</label>
                                                    <div class="input-group">
                                                        <input type="text" name="tanggal_awal_kwitansi" class="form-control form-control-sm tanggal_awal_kwitansi" style="width: 45%;" placeholder="Tanggal Awal">
                                                        <label style="width: 10%;text-align: center">-</label>
                                                        <input type="text" name="tanggal_akhir_kwitansi" class="form-control form-control-sm tanggal_akhir_kwitansi" style="width: 45%;" placeholder="Tanggal Akhir">
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <label for="kode_unit">Kode Unit</label>
                                            <br>
                                            <select class="kode_unit select_box" name="kode_unit[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih Kode Unit">
                                                <option value="0">Pilih Semua</option>
                                                <option value="1">Nama</option>
                                            </select>                                         
                                        </div>
                                    </div>
    
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
                { title: "Keterangan", name: "Address", type: "number", width: 50 },
                { title: "Tipe", name: "Age", type: "text", width: 35 },
                { title: "Luas Bangunan / Tanah", name: "Address", type: "number", width: 50 },
            ]
        });
    });

    // button add condition
    $(".btn_filter").click(function() {
        $("#filterModal").modal("show");
    });

</script>

@endsection
