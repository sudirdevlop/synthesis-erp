@extends('layouts.master')
@section('title','Add | Transaksi Voucher')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add New Voucher</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                <li class="breadcrumb-item active">Voucher</li>
                <li class="breadcrumb-item active">Add</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
            
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">

                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">                        
                                            <label for="rfp_number">RFP Number</label>
                                            <input type="text" name="rfp_number"  class="form-control form-control-sm  form-control-sm-sm mb-2 rfp_number" placeholder="RFP Number" >
                                        </div>

                                        <div class="col-3">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="text" name="tanggal"  class="form-control form-control-sm  form-control-sm-sm mb-2 tanggal datepicker">
                                        </div>

                                        <div class="col-3">
                                            <label for="rencana_bayar">Rencana Bayar</label>
                                            <input type="text" name="rencana_bayar"  class="form-control form-control-sm  form-control-sm-sm mb-2 rencana_bayar" placeholder="Rencana Bayar">
                                        </div>
                                    
                                        <div class="col-3">
                                            <label>Bank</label>
                                            <select class="bank select_box" name="bank" style="width: 100%;" data-placeholder="Pilih Bank">
                                                <option value="BCA">BCA</option>
                                                <option value="BRI">BRI</option>
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-6">                        
                                            <label>Dibayarkan Kepada</label>
                                            <select class="dibayarkan_kepada select_box" name="dibayarkan_kepada" style="width: 100%;" data-placeholder="Pilih">
                                                <option value="CV Sudir Sukses">CV Sudir Sukses</option>
                                                <option value="PT Synthesis">PT Synthesis</option>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label>No Perkiraan</label>
                                            <select class="no_perkiraan select_box" name="no_perkiraan" style="width: 100%;" data-placeholder="Pilih">
                                                <option value="204-010-000-00 000">204-010-000-00  000 -Utang Pajak Penghasilan</option>
                                                <option value="204-010-100-00 000">204-010-100-00  000 -Utang PPh Ps 21</option>
                                                <option value="204-010-100-00 101">204-010-100-00  101 -Utang PPh Ps 21 HO</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                        <div class="col-6">   
                                            <label for="keterangan">Keterangan</label>
                                            <textarea name="keterangan" style="height: 35px" class="form-control form-control-sm  form-control-sm-sm mb-2 keterangan" placeholder="Keterangan"></textarea>
                                        </div>

                                        <div class="col-6">  

                                            <label >Invoice</label>
                                            <div class="d-flex">
                                                <input type="text" name="invoice" style="" class="form-control form-control-sm  form-control-sm-sm mb-2 invoice" placeholder="Invoice" readonly>
                                                <button class="btn btn-sm btn-success ml-2">Hitung</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <label for="ppn">PPN</label>
                                            <input type="number" name="ppn" style="" class="form-control form-control-sm  form-control-sm-sm mb-2 ppn" placeholder="PPN">
                                        </div>
                                    
                                        <div class="col-3">
                                            <label for="pph">PPH</label>
                                            <input type="number" name="pph" style="" class="form-control form-control-sm  form-control-sm-sm mb-2 pph" placeholder="PPH">
                                        </div>

                                        
                                        <div class="col-3">
                                            <label for="pembulatan">Pembulatan</label>
                                            <input type="text" name="pembulatan" style="" class="form-control form-control-sm  form-control-sm-sm mb-2 pembulatan rupiah" placeholder="Pembulatan">
                                        </div>
                                        <div class="col-3">
                                            <label for="grand_total">Grand Total</label>
                                            <input type="text" name="grand_total" style="" class="form-control form-control-sm  form-control-sm-sm mb-2 grand_total rupiah" placeholder="Grand Total">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row" >
                                        <div class="col-2">
                                            <label for="cheque_no">Cheque No</label>
                                            <input type="text" name="cheque_no" class="form-control form-control-sm mb-2 cheque_no" placeholder="Cheque No">
                                        </div>
                                    
                                        <div class="col-2">
                                            <label for="tanggal_cheque">Tanggal Cheque	</label>
                                            <input type="text" name="tanggal_cheque" class="form-control form-control-sm mb-2 tanggal_cheque datepicker" placeholder="Tanggal Cheque	">
                                        </div>
                                        
                                        <div class="col-2">
                                            <label for="tanggal_cair">Tanggal Cair</label>
                                            <input type="text" name="tanggal_cair" class="form-control form-control-sm mb-2 tanggal_cair datepicker" placeholder="Tanggal Cair">
                                        </div>
                                    
                                        <div class="col-2">
                                            <label for="nominal">Nominal</label>
                                            <input type="text" name="nominal" class="form-control form-control-sm mb-2 nominal rupiah" placeholder="Nominal">
                                        </div>

                                        <div class="col-2">
                                            <label for="no_bpb">No BPB / K Accounting	</label>
                                            <input type="text" name="no_bpb" class="form-control form-control-sm mb-2 no_bpb" placeholder="No BPB/K Accounting	">
                                        </div>
                                    
                                        <div class="col-2">
                                            <label for="tanggal_invoice">Tanggal</label>
                                            <input type="text" name="tanggal_invoice" class="form-control form-control-sm mb-2 tanggal_invoice datepicker" placeholder="Tanggal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-primary btn-sm mb-2" id="addButton">Add Details</button>
                                    <button class="btn btn-danger btn-sm mb-2">mass delete</button>
                                    <table class="table table-bordered " style="font-size: 12px">
                                        <thead>
                                            <tr>
                                                <th width="3%"><input type="checkbox" class="cb_header" onclick="select_all()"></th>
                                                <th width="5%">No</th>
                                                <th width="25%">Barang</th>
                                                <th width="8%">Qty</th>
                                                <th width="15%">Harga</th>
                                                <th width="8%">PPN</th>
                                                <th width="8%">PPH</th>
                                                <th width="10%">No Faktur</th>
                                                <th width="10%">Acct Numb</th>
                                                <th width="15%">Tgl Faktur</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr> 
                                                <td><input type="checkbox" class="checkbox-1 cb_detail" id="checkbox-1"></td>
                                                <td>1</td>
                                                <td>ATK0000001 | ALAT TULIS PERLENGKAPAN SHARING SESSION | PCS</td>
                                                <td>2</td>
                                                <td>30.000</td>
                                                <td>3.000</td>
                                                <td>3.000</td>
                                                <td>Asd123$#</td>
                                                <td>702-010-100-00</td>
                                                <td>01/01/1900</td>
                                                <td>
                                                    <button class="btn btn-sm btn-sm btn-primary" id="addButton">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-sm btn-danger" >
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                   
                                                </td>
                                            </tr>
                                            <tr> 
                                                <td><input type="checkbox" class="checkbox-2 cb_detail" id="checkbox-2"></td>
                                                <td>2</td>
                                                <td>ATK0000001 | ALAT TULIS PERLENGKAPAN SHARING SESSION | PCS</td>
                                                <td>2</td>
                                                <td>30.000</td>
                                                <td>3.000</td>
                                                <td>3.000</td>
                                                <td>Asd123$#</td>
                                                <td>702-010-100-00</td>
                                                <td>01/01/1900</td>
                                                <td>
                                                    <button class="btn btn-sm btn-sm btn-primary" id="addButton">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-sm btn-danger" >
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                   
                                                </td>
                                            </tr>
                                            <tr> 
                                                <td><input type="checkbox" class="checkbox-3 cb_detail" id="checkbox-3"></td>
                                                <td>3</td>
                                                <td>ATK0000001 | ALAT TULIS PERLENGKAPAN SHARING SESSION | PCS</td>
                                                <td>2</td>
                                                <td>30.000</td>
                                                <td>3.000</td>
                                                <td>3.000</td>
                                                <td>Asd123$#</td>
                                                <td>702-010-100-00</td>
                                                <td>01/01/1900</td>
                                                <td>
                                                    <button class="btn btn-sm btn-sm btn-primary" id="addButton">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-sm btn-danger" >
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                   
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>                                    
                                    <button class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                                    <a href="{{ route('transaction_voucher') }}" class="btn btn-danger"><i class="fas fa-undo"></i> Back</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>      
            
    </section>



    {{-- modal pop up add --}}
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Detail</h5>
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
                                            <div class="col-sm-8"> 
                                                <label>Barang</label>
                                                <select class="barang select_box_popup" name="barang" style="width: 100%;" data-placeholder="Pilih Barang">
                                                    <option value="ATK9000004">ATK9000004 | MAINBOARD IC EMPROM | 950.000 | 702-020-900-00</option>
                                                    <option value="ATK9000005">ATK9000005 - BUKU LANDSCAPE ARCHITETURE - 3.387.000 - 702-010-100-00</option>
                                                    <option value="ATK9000006">ATK9000006 - BUKU DESIGN ARCHITECTURE - 2.203.000 - 702-010-100-00</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4"> 
                                                <label>Note Barang</label>
                                                <input type="text"  name="note_barang" class="form-control form-control-sm mb-2 note_barang" placeholder="Note Barang">
                                            </div>
                                        </div> 
                                        
                                        
                                        <div class="row mt-2">
                                            <div class="col-sm-3"> 
                                                <label for="budget_sampai_bulan_ini">Budget Sampai Bulan ini</label>
                                                <input type="text"  name="budget_sampai_bulan_ini" class="form-control form-control-sm mb-2 rupiah budget_sampai_bulan_ini" placeholder="Budget Sampai Bulan ini">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="pemakaian_budget_sampai_bulan_ini">Pemakaian Budget Sampai Bulan ini</label>
                                                <input type="text"  name="pemakaian_budget_sampai_bulan_ini" class="form-control form-control-sm mb-2 rupiah pemakaian_budget_sampai_bulan_ini" placeholder="Pemakaian Budget Sampai Bulan ini">
                                            </div>
                                            <div class="col-sm-3">   
                                                <label for="Satuan">Satuan</label>
                                                <input type="text" id="Satuan" name="Satuan" class="form-control form-control-sm mb-2" placeholder="Satuan">
                                            </div>
                                            <div class="col-sm-3">   
                                                <label for="Qty">Qty</label>
                                                <input type="number" id="Qty" name="Qty" class="form-control form-control-sm mb-2" placeholder="Qty">
                                            </div>
                                        </div>  

                                        <div class="row">
                                            <div class="col-sm-3"> 
                                                <label for="harga">Harga</label>
                                                <input type="text" id="harga" name="harga" class="form-control form-control-sm mb-2 rupiah" placeholder="Harga">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="ppn">PPN</label>
                                                <input type="number" id="ppn" name="ppn" class="form-control form-control-sm mb-2" placeholder="PPN">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="pph">PPH</label>
                                                <input type="number" id="pph" name="pph" class="form-control form-control-sm mb-2" placeholder="PPH">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="total">Total</label>
                                                <input type="text" id="total" name="total" class="form-control form-control-sm mb-2 rupiah" placeholder="Total">
                                            </div>
                                        </div>   

                                        <div class="row">
                                            <div class="col-sm-3"> 
                                                <label for="no_faktur_pajak">No Faktur Pajak</label>
                                                <input type="text" id="no_faktur_pajak" name="no_faktur_pajak" class="form-control form-control-sm mb-2" placeholder="No Faktur Pajak">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="tanggal_faktur_pajak">Tanggal Faktur Pajak</label>
                                                <input type="text" id="tanggal_faktur_pajak" name="tanggal_faktur_pajak" class="form-control form-control-sm mb-2 datepicker" placeholder="Tanggal Faktur Pajak">
                                            </div>
                                        </div>   
                                        <br>
                                        
                                        <button type="button" class="btn btn-primary mx-auto"><i class="fas fa-save"></i> Add</button>
                                        <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal"><i class="fas fa-close"></i> Cancel</button>
        
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>                
                
                              
                
            </div>
        </div>
    </div>
</div>





<script>
    $( document ).ready(function() {
        $('.select_box').select2();
        $('.select_box_popup').select2({
            dropdownParent: $('#addModal')
        });

    });


    // button add condition
    $("#addButton").click(function() {
        $(".form-control").val("");
        $("#addModal").modal("show");
    });

    function select_all(){
        
        if($('.cb_header').is(':checked')) {
            $('.cb_detail').prop('checked',true);
        } else {
            $('.cb_detail').prop('checked',false);
        }

    }


</script>

@endsection
