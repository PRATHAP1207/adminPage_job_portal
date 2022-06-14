<div class="content">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="page-title-box">
                <div class="container-fluid">



                    <h4 class="page-title">Add New Job</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Adminpage</a></li>
                        <li class="breadcrumb-item active">Add New Job</li>
                    </ol>
                </div>

            </div>
            <!-- end container-fluid -->

        </div>
        <!-- page-title-box -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <!-- <h4 class="mt-0 header-title">New Job</h4>
                                <p class="text-muted m-b-30">Create a new Job with selecting the Appropriate data</p> -->

                                <div class="color-picker-inputs">
                                    <form method="post" action="<?= site_url(); ?>Adminpage/addNewJobDescription" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Job Title</label>
                                                <input type="text" class="form-control" name="jobTitle" id="jobTitle" autocomplete="off" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Work Location</label>
                                                <select class="form-control select2" name="location" id="location" required onchange=jobTypeSelection(this.value)>
                                                    <option>Select</option>
                                                    <option value="1">Remote</option>
                                                    <option value="2">On-Site</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Select Category</label>
                                                <select class="form-control select2" name="category" id="dataCategory" required>
                                                    <option>Select</option>
                                                    <?php
                                                    // print_r($CategoryData);
                                                    if (isset($Category)) {
                                                        if (is_array($Category)) {
                                                            foreach ($Category as $tmp) {
                                                    ?>
                                                                <option value="<?= $tmp->id ?>"><?= $tmp->category ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>




                                            <div class="col-md-6 form-group">
                                                <label class="control-label"> Job Type</label>
                                                <select class="form-control select2" name="jobType" required>
                                                    <option>Select</option>

                                                    <option value="1">Full Time</option>
                                                    <option value="2">Part Time</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row " id=dataVisible>
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Select Country</label>
                                                <select class="form-control select2" name="country" id="country" required disabled=true>
                                                    <option>Select</option>
                                                    <option value="1">India</option>
                                                    <!-- <option value="2">USA</option> -->
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Select City</label>
                                                <select class="form-control select2" name="city" id="city" required disabled=true>
                                                    <option>Select</option>
                                                    <option value="1">Bangalore</option>
                                                    <option value="2">Chennai</option>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="m-t-10">
                                            <label class="control-label">Description</label>

                                            <textarea id="textarea" class="form-control" rows="3" placeholder="This textarea is Here" name="Description" required></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Start and End Date</label>
                                            <div>
                                                <div class="input-group">
                                                    <input type="date" id="date-start" class="form-control floating-label" placeholder="Start Date" name="startDate" data-provide="datepicker" required>
                                                    <input type="date" id="date-end" class="form-control floating-label" placeholder="End Date" name="endDate" data-provide="datepicker" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Requirements</label>

                                            <select class="select2 form-control select2-multiple" style="word-wrap:break-word;" multiple="multiple" data-placeholder="Choose ..." id="3" name="requirements[]" required>
                                                <?php
                                                // print_r($CategoryData);
                                                if (isset($requiredDetails)) {
                                                    if (is_array($requiredDetails)) {
                                                        foreach ($requiredDetails as $tmp) {
                                                ?>

                                                            <option value="<?= $tmp->id ?>" style="word-wrap:break-word;"><?= $tmp->description ?></option>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <!-- <div class="col-sm-6 col-md-3 m-t-30">
                                                <div class="text-center">
                                                 
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-max">Extra Requirements</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="deleteOption(3)">Delete</button>
                                                </div>

                                                <div class="modal fade bs-example-modal-max" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Extra Requirements</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <input type="text" class="ml-4 mr-3 col-md-8 form-control" name="updateRequired" id="updateRequired">
                                                                    <button type="button" class="col-md-2 btn btn-primary waves-effect waves-light" onClick="UpdateRequirement(3)" data-dismiss="modal">ADD</button>
                                                                </div>
                                                                <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." id="3">
                                                                    <?php
                                                                 
                                                                    if (isset($requiredDetails)) {
                                                                        if (is_array($requiredDetails)) {
                                                                            foreach ($requiredDetails as $tmp) {
                                                                    ?>

                                                                                <option value="<?= $tmp->id ?>"><?= $tmp->description ?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> -->
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Education</label>
                                            <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." id="1" name="education[]" required style="word-wrap: break-word;">
                                                <?php
                                                if (isset($education)) {
                                                    if (is_array($education)) {
                                                        foreach ($education as $tmp) {
                                                ?>
                                                            <option value="<?= $tmp->id ?>" style=" word-wrap: break-word;"><?= $tmp->description ?></option>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <!-- <div class="col-sm-6 col-md-3 m-t-30">
                                                <div class="text-center">
                                               
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center">Extra Education</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="deleteOption(1)">Delete</button>
                                                </div>

                                                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Extra Education</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <input type="text" class="ml-4 mr-3 col-md-8 form-control" name="educationUpdated" id="educationUpdated">
                                                                    <button type="button" class="col-md-2 btn btn-primary waves-effect waves-light" onClick="updateRecord(1)" data-dismiss="modal">ADD</button>
                                                                </div>
                                                                <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." id="1">
                                                                    <?php
                                                              
                                                                    if (isset($education)) {
                                                                        if (is_array($education)) {
                                                                            foreach ($education as $tmp) {
                                                                    ?>

                                                                                <option value="<?= $tmp->id ?>"><?= $tmp->description ?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Experience</label>

                                            <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." id="2" name="experience[]" required>
                                                <?php
                                                // print_r($CategoryData);
                                                if (isset($experience)) {
                                                    if (is_array($experience)) {
                                                        foreach ($experience as $tmp) {
                                                ?>
                                                            <option value="<?= $tmp->id ?>"><?= $tmp->description ?></option>

                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <!-- <div class="col-sm-6 col-md-3 m-t-30">
                                                <div class="text-center">
                                                
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-exp">Extra experience</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="deleteOption(2)">Delete</button>
                                                </div>

                                                <div class="modal fade bs-example-modal-exp" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Extra Experience</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <input type="text" class="ml-4 mr-3 col-md-8 form-control" name="updatedExperience" id="updatedExperience">
                                                                    <button type="button" class="col-md-2 btn btn-primary waves-effect waves-light" onclick="updateExperience(2)" data-dismiss="modal">ADD</button>
                                                                </div>
                                                                <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." id="2">
                                                                    <?php
                                                                 
                                                                    if (isset($experience)) {
                                                                        if (is_array($experience)) {
                                                                            foreach ($experience as $tmp) {
                                                                    ?>
                                                                                <option value="<?= $tmp->id ?>" style=" word-wrap: break-word;"> <?= $tmp->description ?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <!-- <button type="button" class="btn btn-success waves-effect waves-light" style="float:right">Submit</button> -->
                                        <input type="submit" class="btn btn-success waves-effect waves-light" style="float:right" value='Submit' />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end page content-->

    </div>

</div>



<script>
    function jobTypeSelection(value) {
        if (value == 2) {
            document.getElementById("country").disabled = false;
            document.getElementById("city").disabled = false;
        } else {
            document.getElementById("country").disabled = true;
            document.getElementById("city").disabled = true;
        }

    }
</script>