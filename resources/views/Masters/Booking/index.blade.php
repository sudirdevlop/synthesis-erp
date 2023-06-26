@extends('layouts.master')
@section('title','Transaksi Booking')

@section('content')



{{-- datatable --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List Master Booking</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active">Booking</li>
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
                <h5 class="modal-title" id="addModalLabel">Add Transaction Booking / Tanda Jadi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">

                                <label for="kode_unit">Kode Unit</label>
                                <input type="text" id="kode_unit" name="kode_unit" class="form-control form-control-sm mb-3" placeholder="Kode Unit">

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
                { title: "Unit", name: "Address", type: "text", width: 50 },
                { title: "NUP", name: "Age", type: "number", width: 35 },
                { title: "Unit Code", name: "Name", type: "text", width: 75 },
                { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name", width: 35 },
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
