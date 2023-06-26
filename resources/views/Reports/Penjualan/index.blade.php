@extends('layouts.master')
@section('title','Report Penjualan Unit')

@section('content')


{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Penjualan Unit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active">Penjualan Unit</li>
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
                                    
                                    <label >Sales</label>
                                    <br>
                                    <select class="sales select_box" name="sales[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih Sales">
                                        <option value="0">Pilih Semua</option>
                                        <option value="1">BA</option>
                                        <option value="2">BB</option>
                                    </select>     
                                    
                                    <div class="dropdown-divider mb-1"></div>
                                    
                                    <label >Urut</label>
                                    <div >
                                        <input type="radio" name="urut" id="urut-unit" value="1" checked>
                                        <label for="urut-unit">Unit</label>&nbsp;
                                      
                                        <input type="radio" name="urut" id="urut-sales" value="2">
                                        <label for="urut-sales">Sales</label>&nbsp;
                                      
                                        <input type="radio" name="urut" id="urut-sales-manager" value="3">
                                        <label for="urut-sales-manager">Sales Manager</label>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card shadow">
                                <div class="card-body">
    
                                    <div class="col-12">
                                        <label>Tanggal Booking</label>
                                        <div class="input-group">
                                            <input type="text" name="tanggal_awal" class="form-control form-control-sm tanggal_awal" style="width: 45%;" placeholder="Tanggal Awal">
                                            <label style="width: 10%">&nbsp; - &nbsp;</label>
                                            <input type="text" name="tanggal_akhir" class="form-control form-control-sm tanggal_akhir" style="width: 45%;" placeholder="Tanggal Akhir">
                                        </div>
                                    </div>  

                                    <div class="dropdown-divider mb-1"></div>
                                    
                                    <label for="status">Status</label>
                                    <br>
                                    <select class="status select_box" name="status[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih Status">
                                        <option value="0">Pilih Semua</option>
                                        <option value="1">Sold</option>
                                        <option value="2">Cancel</option>
                                    </select>
                                    
                                    <div class="dropdown-divider mb-1"></div>
                                    
                                    <label >Bentuk</label>
                                    <div >
                                        <input type="radio" name="bentuk" id="bentuk-rincian" value="1" checked>
                                        <label for="bentuk-rincian">Rincian</label>&nbsp;
                                      
                                        <input type="radio" name="bentuk" id="bentuk-ringkasan" value="2">
                                        <label for="bentuk-ringkasan">Ringkasan</label>&nbsp;
                                      
                                        <input type="radio" name="bentuk" id="bentuk-rekap" value="3">
                                        <label for="bentuk-rekap">Rekap</label>
                                      
                                        <input type="radio" name="bentuk" id="bentuk-rekap" value="3">
                                        <label for="bentuk-rekap-2">Rekap 2</label>
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
