@extends('layouts.master')
@section('title','Transaction Progress Project')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Transaction Progress Project</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                <li class="breadcrumb-item active">List Transaction Progress Project</li>
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
                <h5 class="modal-title" id="addModalLabel">Add Transaction Progress Project</h5>
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
                                            <div class="col-sm-4"> 
                                                <label for="number_progress_project">Number Progress Project</label>
                                                <input type="text" id="number_progress_project" name="number_progress_project" class="form-control form-control-sm mb-3" placeholder="Number Progress Project">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="date">Date</label>
                                                <input type="text" id="date" name="date" class="form-control form-control-sm mb-3 datepicker" placeholder="Tanggal Booking">
                                            </div>
                                            <div class="col-sm-4">   
                                                <label for="stages">Stages</label>
                                                <select class="stages select_box" name="stages" style="width: 100%;" data-placeholder="Select Stages">
                                                    <option value="Stages 1">Stages 1</option>
                                                    <option value="Stages 2">Stages 2</option>
                                                    <option value="Home Office">Home Office</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="description">Description</label>
                                                <textarea id="description" name="description" class="form-control form-control-sm mb-3"></textarea>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Select File Excel</label>
                                                <input type="file" id="file" name="file" accept=".xls, .xlsx, .csv" class="mb-3" placeholder="Select File">
                                            </div>
                                        </div> 
                                            
                                    </div>
                                </div>


                                <div class="card shadow">
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                          <thead>
                                            <tr>
                                              <th>NO</th>
                                              <th>NO_TRX</th>
                                              <th>PROJECT CODE</th>
                                              <th>UNIT</th>
                                              <th>PILE FOUNDATION</th>
                                              <th>TIPE BEAM</th>
                                              <th>LT 1</th>
                                              <th>LT 2</th>
                                              <th>DAK</th>
                                              <th>ROOF FRAME</th>
                                              <th>TOTAL PROGRESS</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <th>1</th>
                                              <th>TRX011111</th>
                                              <th>PRJ00011</th>
                                              <th>Basura</th>
                                              <th>atas</th>
                                              <th>36 m2</th>
                                              <th>8</th>
                                              <th>10</th>
                                              <th>Sudah</th>
                                              <th>Sudah</th>
                                              <th>70 %</th>
                                            </tr>
                                            <tr>
                                              <th>2</th>
                                              <th>TRX011112</th>
                                              <th>PRJ00012</th>
                                              <th>Basura 1</th>
                                              <th>atas</th>
                                              <th>36 m2</th>
                                              <th>8</th>
                                              <th>10</th>
                                              <th>Sudah</th>
                                              <th>Sudah</th>
                                              <th>70 %</th>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                  

                            </div>
                        </div>
                    </div>

                </div>                
                

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary mx-auto">Save</button>
                        <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
                              
                
            </div>
        </div>
    </div>
</div>





<script>
    $( document ).ready(function() {
        $('.select_box').select2({
            dropdownParent: $('#addModal')
        });
        
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
                { title: "Nomor", name: "Name", type: "text", width: 40 },
                { title: "Tahap", name: "Address", type: "text", width: 40 },
                { title: "Tanggal", name: "Age", type: "text", width: 40 },
                { title: "Keterangan", name: "Name", type: "number", width: 40 },
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
                            .text("Print")
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
