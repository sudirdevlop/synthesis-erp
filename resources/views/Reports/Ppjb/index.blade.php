@extends('layouts.master')
@section('title','Report PP / PPJB')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Report PP / PPJB</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Report</a></li>
                <li class="breadcrumb-item active">PP / PPJB</li>
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
                                    
                                    <div class="col-12">
                                        <label>Tanggal Booking</label>
                                        <div class="input-group">
                                            <input type="text" name="tanggal_awal" class="form-control form-control-sm tanggal_awal" style="width: 45%;" placeholder="Tanggal Awal">
                                            <label style="width: 10%">&nbsp; - &nbsp;</label>
                                            <input type="text" name="tanggal_akhir" class="form-control form-control-sm tanggal_akhir" style="width: 45%;" placeholder="Tanggal Akhir">
                                        </div>
                                    </div>      
    
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card shadow">
                                <div class="card-body">
    

                                    <label for="kode_faktur">Status Dokumen</label>
                                    <div >
                                      
                                        <input type="radio" name="telah_bayar" id="telah-bayar-pp" value="1" checked onclick="status_dokumen(1)">
                                        <label for="telah-bayar-pp">NUP / PP</label>&nbsp;&nbsp;&nbsp;
                                      
                                        <input type="radio" name="telah_bayar" id="telah-bayar-ppjb" value="2" onclick="status_dokumen(2)">
                                        <label for="telah-bayar-ppjb">PPJB / Notaris</label>

                                    </div>

                                    <div class="dropdown-divider mb-1"></div>
                                    
                                    
                                    <div class="col-12">
                                        <label class="pp">Tanggal Sign PP</label>
                                        <label class="ppjb">Tanggal PPJB</label>
                                        <div class="input-group">
                                            <input type="text" name="tanggal_awal" class="form-control form-control-sm tanggal_awal" style="width: 45%;" placeholder="Tanggal Awal">
                                            <label style="width: 10%">&nbsp; - &nbsp;</label>
                                            <input type="text" name="tanggal_akhir" class="form-control form-control-sm tanggal_akhir" style="width: 45%;" placeholder="Tanggal Akhir">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body" >
                                    <label class="pp">Status PP</label>
                                    <label class="ppjb">Status PPJB</label>
                                    <div style="display: flex; justify-content: space-between;">
                                        <div>
                                            <label for="kode_unit1">Kode Unit</label>
                                            <br>
                                            <select class="kode_unit select_box" name="kode_unit[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih Kode Unit">
                                                <option value="0">Pilih Semua</option>
                                                <option value="1">BA</option>
                                                <option value="2">BB</option>
                                            </select>
                                        </div>
                                
                                        <div>
                                            <label for="kode_unit2">Kode Unit</label>
                                            <br>
                                            <select class="kode_unit select_box" name="kode_unit[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih Kode Unit">
                                                <option value="0">Pilih Semua</option>
                                                <option value="1">BA</option>
                                                <option value="2">BB</option>
                                            </select>
                                        </div>
                                
                                        <div>
                                            <label for="kode_unit3">Kode Unit</label>
                                            <br>
                                            <select class="kode_unit select_box" name="kode_unit[]" multiple="multiple" style="width: 100%;" data-placeholder="Pilih Kode Unit">
                                                <option value="0">Pilih Semua</option>
                                                <option value="1">BA</option>
                                                <option value="2">BB</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body">
    

                                    <label class="pp">Addendum PP</label>
                                    <label class="ppjb">Addendum PPJB</label>
                                    <div >
                                      
                                        <input type="radio" name="addendum_pp" id="addendum-pp-pp" value="1" checked>
                                        <label for="addendum-pp-pp">Ada</label>&nbsp;&nbsp;&nbsp;
                                      
                                        <input type="radio" name="addendum_pp" id="addendum-pp-ppjb" value="2">
                                        <label for="addendum-pp-ppjb">Tidak Ada</label>&nbsp;&nbsp;
                                      
                                        <input type="radio" name="addendum_pp" id="addendum-pp-ppjb" value="3">
                                        <label for="addendum-pp-ppjb">Semua</label>

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
    $( document ).ready(function() 
    {
        $(".pp").show();
        $(".ppjb").hide();
        
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
                { title: "Booking", name: "Age", type: "text", width: 35 },
                { title: "No PPJB", name: "Age", type: "text", width: 35 },
                { title: "Tgl PPJB", name: "Age", type: "text", width: 35 },
                { title: "Sign PPJB", name: "Age", type: "text", width: 35 },
                { title: "Status", name: "Address", type: "number", width: 35 },
                { title: "Keterangan", name: "Address", type: "number", width: 40 },
            ]
        });
    });

    function status_dokumen(status)
    {
        if(status == 1) {
            $(".pp").show();
            $(".ppjb").hide();
        }
        else {
            $(".pp").hide();
            $(".ppjb").show();
        }
    }

    // button add condition
    $(".btn_filter").click(function() {
        $("#filterModal").modal("show");
    });

</script>

@endsection
