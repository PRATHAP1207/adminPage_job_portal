<?php

function CityData($city){
    $country= array('1'=>'Bangalore','2'=>'Chennai');
    if(isset($country[$city])){
			return $country[$city];
    }
}

function category($category){
 // print_r($category);exit;
  $Common_model=new \App\Models\Common_model();
  $Category['Category']=$Common_model->getRecords("categories", "*", array('id' => $category));
  // print_r($Category);exit;
 return $Category ;
}

function countryData($country){
  $countryValues= array('1'=>'India','2'=>'USA');
  if(isset($countryValues[$country])){
    return $countryValues[$country];
  }
}
function JobType($type){
  $JobTypes= array('1'=>'Full Time','2'=>'Part Time');
  if(isset($JobTypes[$type])){
    return $JobTypes[$type];
  }
}



function DescriptionDetails($empdata,$mode){
    $Common_model=new \App\Models\Common_model();
      //print_r($mode);
    $getEdu['eduData']=$Common_model->getEducation($empdata,$mode);
        // print_r($getEdu);
       return $getEdu ;
}

function SelectedValues($values){
print_r($values);
}



function randomKey($length){   
  $pool = array_merge(range(0, 9), range('A', 'Z'), range('a', 'z')); 
  $key = '';   
  for ($i = 0; $i < $length; $i++) {   
  $key .= $pool[mt_rand(0, count($pool) - 1)]; 
  }   
  return $key;
  }
  if(!function_exists('getSession')){
  function getSession($data){
    return session()->get($data);
  }
  }

?>