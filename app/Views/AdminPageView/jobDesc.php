<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">jobDesc</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Adminpage</a></li>
                        <li class="breadcrumb-item active">jobDesc</li>
                    </ol>


                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <div class="btn-group ml-1 mo-mb-2">
                                <label>Select The Fields</label>
                                <select name="state" class="form-control" onchange="func(this.value)" id="fieldSelected">
                                    <option>Select Option</option>
                                    <option value="1">Education Field</option>
                                    <option value="2">Experience Field</option>
                                    <option value="3">Requirement Field</option>
                                </select>
                            </div>

                            <hr />
                            <div class="row">

                                <h4 class="mt-0 header-title col-md-10 "> jobDescription</h4>

                                <div class="modal fade bs-example-modal-max" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0">Add</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <textarea class="ml-4 mr-3 col-md-8 form-control" name="AddRequired" id="AddRequired"></textarea>
                                                    <button type="button" class="col-md-2 btn btn-primary waves-effect waves-light" onclick="addFields()" data-dismiss="modal">ADD</button>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </div>
                            <table id="datatable" class="display table table-bordered dt-responsive table-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SI No</th>
                                        <th style="word-wrap:break-word;">Description</th>
                                        <th>Edit</th>
                                        <td>delete</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // print_r($CategoryData);
                                    if (isset($descriptionDetails)) {
                                        if (is_array($descriptionDetails)) {
                                            $i = 1;
                                            foreach ($descriptionDetails as $tmp) {
                                    ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $tmp->description ?></td>
                                                    <th> <button type="button" class="btn  waves-effect waves-light" style="float:right;background-color:#40E5E5" data-toggle="modal" data-target=".bs-example-modal-update" onclick="editRequired(<?= $i ?> ,<?= $tmp->id ?>,<?= $tmp->mode ?>);"><i class="far fa-edit"></i></button></th>
                                                    <td> <button type="button" class="btn" style="background-color:#64A4E5" onclick="deleteOption(<?= $tmp->id ?>,<?= $tmp->mode ?>)"><i class="mdi mdi-delete-restore" size="large"></i></button></td>

                                                </tr>
                                    <?php
                                                $i++;
                                            }
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <div>
                                <button type="button" class="btn " style="float:right; border-radius:50%;background:linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);position: fixed;
    bottom: 0px;
    right: 0px; 
    margin:30px;
    margin-bottom:70px;
   " data-toggle="modal" data-target=".bs-example-modal-max" id="addButton" data-toggle="modal" data-target=".bs-example-modal-max" id="addButton" disabled=true><i class="mdi mdi-library-plus" style="color:blue;font-size:20px"></i></button>
                            </div>
                            <div class="modal fade bs-example-modal-update" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0">Update</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <textarea class="ml-4 mr-3 col-md-8 form-control" name="updateRequired" id="updateRequired"></textarea>
                                                <button type="button" class="col-md-2 btn btn-primary waves-effect waves-light" onclick="UpdateRequirement()" data-dismiss="modal" id="requirementAdd">ADD</button>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div>


    </div> <!-- container-fluid -->

</div>
<script>
    function func(selectedValue) {
        document.getElementById("addButton").disabled = false;
        $.ajax({
            type: "post",
            url: "<?= site_url(); ?>Adminpage/jobDescUpdated",
            data: {
                mode: selectedValue
            },
            success: function(data) {
                $("#datatable").html(data);
            }
        });
    }

    function addFields() {

        var mode = $('#fieldSelected').val();
        var education = $('#AddRequired').val();
        console.log(mode);
        if (education != "") {
            $.ajax({
                type: "post",
                url: "<?= site_url(); ?>Adminpage/addJobDetails",
                data: {
                    mode: mode,
                    education: education
                },

                success: function(data) {
                    $("#datatable").html(data);
                }
            });
        } else {
            alert("Enter the Text");
        }
    };


    function editRequired(uid, id, mode) {
        var getTableRows = document.getElementById('datatable');


       
            var rowLength = getTableRows.rows.length;
           
            for (i = 0; i < rowLength; i++) {
                var oCells = getTableRows.rows.item(i).cells;
                var cellLength = oCells.length;
                for (var j = 0; j < cellLength; j++) {
                    var cellVal = oCells.item(j).innerHTML;
                    console.log(cellVal);
                    if (i == uid) {
                        if (j == 1) {
                            var cellVal = oCells.item(j).innerHTML;
                            document.getElementById("updateRequired").value = cellVal;
                        }
                    }
                }
           
        }
        var education = $('#updateRequired').val();

        $("#requirementAdd").click(function() {
            var education = $('#updateRequired').val();

            if (education != "") {
                $.ajax({
                    type: "post",
                    url: "<?= site_url(); ?>Adminpage/updateJobDesc",
                    data: {
                        id: id,
                        mode: mode,
                        education: education
                    },

                    success: function(data) {
                        $('#datatable').html(data);
                    }
                });
            } else {
                alert("Enter the Text");
            }
        });
    }

    function deleteOption(Id, mode) {

        $.ajax({
            type: "post",
            url: "<?= site_url(); ?>Adminpage/deleteRecords",
            data: {
                Id: Id,
                mode: mode
            },
            success: function(data) {
                if (mode == 1) {
                    $("#datatable").html(data);
                } else if (mode == 2) {
                    $("#datatable").html(data);
                } else if (mode == 3) {
                    $("#datatable").html(data);
                } else {

                }
            }
        });

    }
</script>