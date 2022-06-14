<div class="content">
                    <div class="container-fluid">
                    <div class="container-fluid">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Job List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Adminpage</a></li>
                <li class="breadcrumb-item active">JobList</li>
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
                                        <select name="state" class="form-control" onchange="func(this.value)">
                       <option value="0">Select Option</option>
                                 <option value="1" >Active</option>
                                 <option value="2" >InActive</option>
                               </select>
                                        </div>
<hr/>
    <div class="row">
                                            <h4 class="mt-0 header-title col-md-10 "> Previous Job List</h4>
                                            <a href="<?= site_url()?>Adminpage/addJob" style="color:black"> <button type="button" class="btn btn-info waves-effect waves-light mb-2" >Add-Job</button></a>
    
</div>
                                            <table id="datatable" class="display  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; float:inline-end">
                                                <thead>
                                                <tr>
                                                    <th>Job Id</th>
                                                    <th>Job Title</th>
                                                    <th>Created Date</th>
                                                    <th>Closing Date</th>
                                                    <th>Preview</th>
                                                    <th>delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php 
  // print_r($CategoryData);
	if(isset($JobList)){
		if(is_array($JobList)){
			foreach($JobList as $tmp){
                ?>

                                                <tr>
                                                    <td><?= $tmp->job_id?></td>
                                                    <td><?= $tmp->title?></td>
                                                    <td><?= $tmp->date_posted?></td>
                                                    <td><?= $tmp->closing_date?></td>

                                                    <td> <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#myModal" onClick="recordView(<?=$tmp->job_id?>)">Preview</button></td>
                                                    <td> <button type="button" class="btn btn-secondary waves-effect waves-light mb-2"  onClick="recordDelete(<?=$tmp->job_id?>,<?= $tmp->status?>)" >Delete</button></td>
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
                                                    <div class="modal-content" >
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0" id="myModalLabel">Job Description</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                              
                                                        <div class="modal-body" id="JobData">
                                                         </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                      
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
    
    
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> 

<script>
function recordView(jobId){
  
	//print_r(jobId);exit;
    $.ajax({
        type:"post",
        url:"<?=site_url();?>Adminpage/getSingleJob",
        data:{
            JobId:jobId
        },
        
        success:function(data){
           //  data= JSON.parse( data );
         //   data= jQuery.parseJSON( data );
         // console.log(data);
         //result=json_decode(data);
        // document.getElementById("#JobData").innerHTML = data ;
            $("#JobData").html(data);
        }
    });  
};
function recordDelete(job_id,status){
  $.ajax({
      type:"post",
      url:"<?=site_url();?>Adminpage/recordChange",
      data:{
        job_id:job_id,
        status:status
      },
      
      success:function(data){
           //  $("#datatable").html(data);
      }
  });
  
};
function func(selectedValue)
 {
    //make the ajax call
   // console.log(selectedValue)
   $.ajax({
      type:"post",
      url:"<?=site_url();?>Adminpage/joblistUpdated",
      data:{
        status:selectedValue
      },
      
      success:function(data){
          $("#datatable").html(data);
      }
  });
}
</script>
