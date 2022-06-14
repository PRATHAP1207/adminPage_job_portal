<div class="content">
                    <div class="container-fluid">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Persons List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Adminpage</a></li>
                <li class="breadcrumb-item active">Applied View</li>
            </ol>

        
        </div>
    </div>
</div>

<div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title col-md-10 ">Applied Person List</h4>
               
                                            <table id="datatable" class="display  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; float:inline-end">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Person Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Email Id</th>
                                                    <th>Applied job</th>
                                                    <th>Apllied date</th>
                                                    <th>Preview Resume</th>
                                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                                <?php 
  // print_r($CategoryData);
	if(isset($PersonList)){
		if(is_array($PersonList)){
			foreach($PersonList as $tmp){
                ?>


                                                <tr>
                                                    <td><?= $tmp->id?></td>
                                                    <td><?= $tmp->full_name?></td>
                                                    <td><?= $tmp->contact_number?></td>
                                                    <td><?= $tmp->email_id?></td>
                                                    <td><?= $tmp->title?></td>
                                                    <td><?= $tmp->applied_on?></td>
                                                    <td> <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal"  onClick="GetResumes(<?=$tmp->id; ?>)">Resume</button></td>
                                                  
                                                </tr>

                                                <?php
                                        }
                                    }
                                }
                                
                             ?>
                                              
                                                </tbody>
                                            </table>
                                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0" id="myModalLabel">Resume</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body" id=Resume>
                                                        <div class="gallery">
<iframe src="http://localhost/ci4/public/assests/upload/" frameborder="0" height="500px" width="100%"></iframe>                        
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            <!-- <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button> -->
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
    
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
    
    
                        </div>
                        <!-- end page content-->

                <!-- container-fluid -->

                </div> 

                <script>
                    
function GetResumes(ResumeId){
  console.log(ResumeId);
	//print_r(jobId);exit;
    $.ajax({
        type:"post",
        url:"<?=site_url();?>Adminpage/getResumeList",
        data:{
            ResumeId:ResumeId
        },
        
        success:function(data){
           //  data= JSON.parse( data );
         //   data= jQuery.parseJSON( data );
         // console.log(data);
         //result=json_decode(data);
        // document.getElementById("#JobData").innerHTML = data ;
            $("#Resume").html(data);
        }
    });
    
};
</script>



