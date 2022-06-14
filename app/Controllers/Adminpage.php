<?php

namespace App\Controllers;

class Adminpage extends BaseController
{
    public function index()
    {
        $data['education'] = $this->Common_model->getRecords('requirement_details', "*", array('mode' => 1));
        $data['experience'] = $this->Common_model->getRecords('requirement_details', "*", array('mode' => 2));
        $data['requiredDetails'] = $this->Common_model->getRecords('requirement_details', "*", array('mode' => 3));
        $data['content'] = 'AdminPageView/JobStatistics';
        echo view('BasicTemplate/content', $data);
    }
    function joblist()
    {

        // $status=$this->request->getVar('Status');
        $data['JobList'] = $this->Common_model->getRecords('jobs', "*", array('status' => 1));
        // print_r($data);exit;
        $data['content'] = 'AdminPageView/JobList';
        echo view('BasicTemplate/content', $data);
    }

    function joblistUpdated()
    {

        $status = $this->request->getVar('status');
        // print_r($status);exit;
        $JobListNew = $this->Common_model->getJobListUpdated($status);

?>

        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; float:inline-end">
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
                if (isset($JobListNew)) {
                    if (is_array($JobListNew)) {
                        foreach ($JobListNew as $tmp) {
                ?>

                            <tr>
                                <td><?= $tmp->job_id ?></td>
                                <td><?= $tmp->title ?></td>
                                <td><?= $tmp->date_posted ?></td>
                                <td><?= $tmp->closing_date ?></td>

                                <td> <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#myModal" onClick="recordView(<?= $tmp->job_id ?>)">Preview</button></td>
                                <td> <button type="button" class="btn btn-secondary waves-effect waves-light mb-2" onClick="recordDelete(<?= $tmp->job_id ?>,<?= $tmp->status ?>)">Delete</button></td>
                            </tr>


                <?php
                        }
                    }
                }

                ?>

            </tbody>
        </table>
    <?php

    }
    function addJob()
    {
        $data['education'] = $this->Common_model->getRecords('requirement_details', "*", array('mode' => 1));
        $data['experience'] = $this->Common_model->getRecords('requirement_details', "*", array('mode' => 2));
        $data['requiredDetails'] = $this->Common_model->getRecords('requirement_details', "*", array('mode' => 3));
        $data['Category'] = $this->Common_model->getRecords('categories');

        $data['content'] = 'AdminPageView/AddJobView';
        echo view('BasicTemplate/content', $data);

        //   echo view('AdminPageView/AddJobView');
    }
    function addJobDetails()
    {
      
        $education = $this->request->getVar('education');
        $mode = $this->request->getVar('mode');
   
        
            $value['description'] = $education;
            $value['mode'] = $mode;
            $description = $this->Common_model->insertRecord('requirement_details', $value);

        $descriptionDetails = $this->Common_model->getRecords('requirement_details', "*", array('mode' => $mode));
        // print_r($data);exit;
    ?>
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
                                                        $i=1;
                                                        foreach ($descriptionDetails as $tmp) {
                                                ?>
                                                            <tr>
                                                                <td><?=$i ?></td>
                                                                <td><?= $tmp->description ?></td>
                                                                <th> <button type="button" class="btn  waves-effect waves-light" style="float:right;background-color:#40E5E5" data-toggle="modal" data-target=".bs-example-modal-update"
                                                                 onclick="editRequired(<?= $i?> ,<?= $tmp->id ?>,<?= $tmp->mode ?>);"><i class="far fa-edit"></i></button></th>
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
    <?php
    }



    function appliedList()
    {
        $data['PersonList'] = $this->Common_model->GetPersonList();
        // print_r($data);
        $data['content'] = 'AdminPageView/AppliedPerson';
        echo view('BasicTemplate/content', $data);
    }
    function getSingleJob()
    {

        $JobId = $this->request->getVar('JobId');
        $JobDesc = $this->Common_model->getRecords("jobs", "*", array('job_id' => $JobId));
    ?>
        <div class="modal-body" id="JobData">

            <?php
            // print_r($CategoryData);
            if (isset($JobDesc)) {
                if (is_array($JobDesc)) {
                    foreach ($JobDesc as $tmp) {
            ?>

                        <div>
                            <p>job Id: <?= $tmp->job_id ?></p>
                            <h5>title : <?= $tmp->title ?></h5>
                            <p>Location :<?= CityData($tmp->city); ?>,<?= countryData($tmp->country); ?></p>
                            <p>Job type:<?= JobType($tmp->type); ?></p>
                            <p>Category :
                                <?php $res = category($tmp->category); ?>
                                <?php
                                if (isset($res)) {
                                    if (is_array($res)) {

                                        foreach ($res as $temp) {
                                            foreach ($temp as $data) {
                                                // print_r($data->category);exit;
                                ?>
                                                <?php
                                                echo $data->category ?>
                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>

                            </p>
                            <p>Description :</p>
                            <p><?= $tmp->description ?></p>
                            <p>Education :</p>
                            <ul>
                                <?php
                                $res = DescriptionDetails($tmp->education, 1);

                                ?>
                                <?php
                                if (isset($res)) {
                                    if (is_array($res)) {

                                        foreach ($res as $temp) {
                                            foreach ($temp as $data) {

                                ?>

                                                <li><?php
                                                    echo ($data->description);
                                                    ?> </li>
                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                            </ul>
                            <p>Experience</p>
                            <ul>
                                <?php
                                $res = DescriptionDetails($tmp->experience, 2);

                                ?>
                                <?php
                                if (isset($res)) {
                                    if (is_array($res)) {

                                        foreach ($res as $temp) {
                                            foreach ($temp as $data) {

                                ?>

                                                <li><?php
                                                    echo ($data->description);
                                                    ?> </li>
                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>




                            </ul>
                            <p>requirements</p>
                            <ul>

                                <?php
                                $res = DescriptionDetails($tmp->requirements, 3);

                                ?>
                                <?php
                                if (isset($res)) {
                                    if (is_array($res)) {

                                        foreach ($res as $temp) {
                                            foreach ($temp as $data) {

                                ?>

                                                <li><?php
                                                    echo ($data->description);
                                                    ?> </li>
                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>

                            </ul>

                        </div>

            <?php
                    }
                }
            }

            ?>
        </div>
    <?php
    }

    function recordChange()
    {
        $job_id = $this->request->getVar('job_id');
        $status = $this->request->getVar('status');
        // print_r($status,$job_id);exit;
        if ($status == 1) {
            $value['status'] = 2;
        } else {
            $value['status'] = 1;
        }

        $where['job_id'] = $job_id;
        $updated = $this->Common_model->updateRecord('jobs', $value, $where);
    }

    function addNewJobDescription()
    {
        // $uid=$id;
        $jobTitle = $this->request->getVar('jobTitle');
        $city = $this->request->getVar('city');
        $country = $this->request->getVar('country');
        $category = $this->request->getVar('category');
        $jobType = $this->request->getVar('jobType');
        $location = $this->request->getVar('location');
        $Description = $this->request->getVar('Description');
        $startDate = $this->request->getVar('startDate');
        $endDate = $this->request->getVar('endDate');
        $education = implode(',', $_POST['education']);
        // $education=$this->request->getVar('education');
        $experience = implode(',', $_POST['experience']);
        $requirements = implode(',', $_POST['requirements']);

        // $experience=$this->request->getVar('experience');
        // $requirements=$this->request->getVar('requirements');
        $value['title'] = $jobTitle;
        if ($city > 0) {
            $value['city'] = $city;
        } else {
            $value['city'] = 0;
        }

       // $value['city'] = $city;
       if ($country > 0) {
        $value['country'] = $country;
    } else {
        $value['country'] = 0;
    }

     //   $value['country'] = $country;
        $value['category'] = $category;

        $value['type'] = $jobType;
        $value['workLocation'] = $location;
        $value['description'] = $Description;
        $value['date_posted'] = $startDate;
        $value['closing_date'] = $endDate;
        $value['education'] = $education;
        $value['experience'] = $experience;
        $value['requirements'] = $requirements;
        $value['status'] = 1;
        $value['created_by'] = getSession('session_id');
        $value['created_on'] = date("Y-m-d");
        //print_r($value);exit;
        $Result = $this->Common_model->insertRecord('jobs', $value);

        // print_r($Result);
        if ($Result != '') {
            return redirect()->to('Dashboard');
        }
    }

    function getResumeList()
    {
        $ResumeId = $this->request->getVar('ResumeId');
        $ResumeFile = $this->Common_model->getRecords("applicationform", "*", array('id' => $ResumeId));
        // print_r($ResumeFile);
    ?>
        <div class="modal-body" id=Resume>

            <div class="gallery">
                <?php
                //print_r($CategoryData);
                if (isset($ResumeFile)) {

                    foreach ($ResumeFile as $tmp) {

                        // print_r($tmp->resume_files);
                ?>



                        <iframe src="http://localhost/ci4/public/assests/upload/<?= $tmp->resume_files ?>" frameborder="0" height="500px" width="100%"></iframe>


            </div>
            <h5>Resume Files</h5>
        </div>
<?php
                    }
                }

?>


<?php
    }

    function deleteRecords()
    {
        $Id = $this->request->getVar('Id');
        $mode = $this->request->getVar('mode');
        
        $value['id'] = $Id;
        $created_id = $this->Common_model->delete_record('requirement_details', $value);
$descriptionDetails = $this->Common_model->getRecords('requirement_details', "*", array('mode' => $mode));

        ?>
        <table id=<?=$mode?> class="display table table-bordered dt-responsive table-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                                        $i=1;
                                                        foreach ($descriptionDetails as $tmp) {
                                                ?>
                                                            <tr>
                                                                <td><?=$i ?></td>
                                                                <td><?= $tmp->description ?></td>
                                                                <th> <button type="button" class="btn  waves-effect waves-light" style="float:right;background-color:#40E5E5" data-toggle="modal" data-target=".bs-example-modal-update"
                                                                 onclick="editRequired(<?= $i?> ,<?= $tmp->id ?>,<?= $tmp->mode ?>);"><i class="far fa-edit"></i></button></th>
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
  <?php
    }
 function jobDesc(){

    $data['descriptionDetails'] = $this->Common_model->getRecords('requirement_details', "*", array('mode' => 1));
      $data['content'] = 'AdminPageView/jobDesc';
    echo view('BasicTemplate/content', $data);
 }

 function jobDescUpdated(){
 $mode=$this->request->getVar('mode');
 $descriptionDetails = $this->Common_model->getRecords('requirement_details', "*", array('mode' => $mode));
 ?>

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
                                                        $i=1;
                                                        foreach ($descriptionDetails as $tmp) {
                                                ?>
                                                            <tr>
                                                                <td><?=$i ?></td>
                                                                <td><?= $tmp->description ?></td>
                                                                <th> <button type="button" class="btn  waves-effect waves-light" style="float:right;background-color:#40E5E5" data-toggle="modal" data-target=".bs-example-modal-update"
                                                                 onclick="editRequired(<?= $i?> ,<?= $tmp->id ?>,<?= $tmp->mode ?>);"><i class="far fa-edit"></i></button></th>
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
<?php
 }

 function updateJobDesc()
 {
       
     $education = $this->request->getVar('education');
     $mode = $this->request->getVar('mode');
     $id = $this->request->getVar('id');

     $value['description'] = $education;
     $value['mode'] = $mode;
     $where['id'] = $id;
     $updated = $this->Common_model->updateRecord('requirement_details', $value, $where);
     $descriptionDetails = $this->Common_model->getRecords('requirement_details', "*", array('mode' => $mode));
     // print_r($data);exit;
 ?>
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
                                                        $i=1;
                                                        foreach ($descriptionDetails as $tmp) {
                                                ?>
                                                            <tr>
                                                                <td><?=$i ?></td>
                                                                <td><?= $tmp->description ?></td>
                                                                <th> <button type="button" class="btn  waves-effect waves-light" style="float:right;background-color:#40E5E5" data-toggle="modal" data-target=".bs-example-modal-update"
                                                                 onclick="editRequired(<?= $i?> ,<?= $tmp->id ?>,<?= $tmp->mode ?>);"><i class="far fa-edit"></i></button></th>
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
 <?php
 }

}

