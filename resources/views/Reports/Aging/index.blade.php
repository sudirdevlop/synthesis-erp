@extends('layouts.master')
@section('title','Report Aging')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Report Aging</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Report</a></li>
                <li class="breadcrumb-item active">Aging</li>
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
                                    
                                    <label for="kode_faktur">Berdasarkan</label>
                                    <div >
                                        <input type="radio" name="berdasarkan" id="urut-kasir" value="1" onclick="berdasarkan(1)" checked>
                                        <label for="urut-kasir">Kode Unit</label>&nbsp;
                                      
                                        <input type="radio" name="berdasarkan" id="urut-transfer-bank" onclick="berdasarkan(2)" value="2">
                                        <label for="urut-transfer-bank">Tanda Jadi</label>
                                    </div> 

                                    <div class="dropdown-divider mb-1"></div>
                                    
                                    <label>Batas Tanggal</label>
                                    <input type="text" name="batas_tanggal" class="form-control form-control-sm batas_tanggal" placeholder="Batas Tanggal">              
                                    
                                    <div class="dropdown-divider mb-1"></div>
                                    
                                    <label for="aging">Aging By</label>
                                    <div>
                                        <input type="radio" name="aging" id="aging-seluruhnya" value="1" checked>
                                        <label for="aging-seluruhnya">Seluruh Nya</label>&nbsp;
                                        
                                        <input type="radio" name="aging" id="aging-biasa" value="2">
                                        <label for="aging-biasa">Aging Biasa</label>&nbsp;
                                        
                                        <input type="radio" name="aging" id="aging-biasa" value="3">
                                        <label for="aging-biasa">Aging Khusus</label>
                                    </div>
                                    
                                    
    
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card shadow">
                                <div class="card-body">
    
                                    <div class="berdasarkan_kode_unit">
                                        <label >Kode Unit</label>
                                        <br>
                                        <select class="kode_unit select_box" multiple="multiple" name="kode_unit[]" style="width: 100%;" data-placeholder="Pilih Nomor Kode Unit">
                                            <option value="0">Pilih Semua</option>
                                            <option value="1">Unit</option>
                                        </select> 
                                    </div>
                                    
                                    <div class="berdasarkan_tanda_jadi">
                                        <label >Nomor Tanda Jadi</label>
                                        <br>
                                        <select class="tanda_jadi select_box " multiple="multiple" name="tanda_jadi[]" style="width: 100%;" data-placeholder="Pilih Nomor Tanda Jadi">
                                            <option value="0">Pilih Semua</option>
                                            <option value="1">Unit</option>
                                        </select> 
                                    </div>

                                    <div class="dropdown-divider mb-1"></div>
                                    
                                    <label for="cek-tanggal">Cek Tanggal Pembayaran</label>
                                    <div>
                                        <input type="radio" name="cek-tanggal" id="cek-tanggal-tidak" value="1" checked>
                                        <label for="cek-tanggal-tidak">Tidak</label>&nbsp;
                                        
                                        <input type="radio" name="cek-tanggal" id="cek-tanggal-periksa" value="2">
                                        <label for="cek-tanggal-periksa">Periksa</label>
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
        
        $(".berdasarkan_kode_unit").show();
        $(".berdasarkan_tanda_jadi").hide();

        $('.select_box').select2();
        
        $("#jsGrid1").jsGrid({
            height: "100%",
            width: "100%", // Tambahkan properti autowidth
            autowidth: true,
            
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
                { title: "Tanda Jadi", name: "Address", type: "text", width: 50 },
                { title: "Kode Unit", name: "Name", type: "text", width: 35 },
                { title: "Tanggal", name: "Age", type: "text", width: 35 },
                { title: "Harga Akhir", name: "Address", type: "number", width: 50 },
                { title: "Bln Jt Tempo", name: "Address", type: "number", width: 50 },
                { title: "Aging 30", name: "Age", type: "text", width: 35 },
                { title: "Aging 60", name: "Age", type: "text", width: 35 },
                { title: "Aging 90", name: "Age", type: "text", width: 35 },
                { title: "Aging 120", name: "Age", type: "text", width: 35 },
                { title: "Lain Lain", name: "Age", type: "text", width: 35 },
                { title: "Jen Bayar", name: "Age", type: "text", width: 35 },
                { title: "Bayar", name: "Age", type: "text", width: 35 },
                { title: "% Bayar", name: "Age", type: "text", width: 35 },
                { title: "Customer", name: "Address", type: "number", width: 50 },
                { title: "Bank", name: "Address", type: "number", width: 50 },
                { title: "Disetujui", name: "Address", type: "number", width: 50 },
            ]
        });
    });

    // button add condition
    $(".btn_filter").click(function() {
        $("#filterModal").modal("show");
    });

    function berdasarkan(params) {
        if(params==1){
            $(".berdasarkan_kode_unit").show();
            $(".berdasarkan_tanda_jadi").hide();
        }else if(params==2){
            $(".berdasarkan_kode_unit").hide();
            $(".berdasarkan_tanda_jadi").show();            
        }
    }

</script>

@endsection
