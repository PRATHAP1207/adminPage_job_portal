<?php
 namespace App\Models;
 use CodeIgniter\Model;
 use CodeIgniter\Database\ConnectionInterface;
 class Common_model extends Model{
	function insertRecord($table,$data){
		$builder = $this->db->table($table);
		$builder->insert($data);
		return $this->db->insertID();
	}
	
	function getRecords($table, $fields = '*', $where = ''){
		$builder = $this->db->table($table);
        if ($fields)
            $builder->select($fields);
        if (!empty($where))
            $builder->where($where);
        return $builder->get()->getResult();
	}



    function getRecord(){
    $query=$this->db->query('SELECT jobs.job_id, categories.category, jobs.title, jobs.description,jobs.city,jobs.country,jobs.type,jobs.date_posted,jobs.closing_date,
    requirement_details.education_details
    FROM jobs
    INNER JOIN categories
    ON jobs.category=categories.id
    INNER JOIN requirement_details
    ON jobs.education = requirement_details.id;');
    return $query->getResult();
    }
	function getEducation($details,$mode){
	
		$query=$this->db->query("SELECT * FROM `requirement_details` WHERE id IN ($details) and mode='$mode';");
        return $query->getResult();
	}
	 public function getLoginRecord($table, $select='*',$where='')
	 {
		 $builder= $this->db->table($table);
		 $builder->select($select);
		 if(!empty($where))
		 $builder->where($where);
		 return $builder->get()->getRow();
		 
	 }
	 public function updateRecord( $table,$value,$where='')
	 {    
		 $builder= $this->db->table($table);
		 $builder->set($value);
		 $builder->where($where);
		 return $builder->update();
	 }
	 function GetPersonList(){
		$query=$this->db->query("SELECT applicationform.id, applicationform.full_name,
		 applicationform.contact_number,applicationform.email_id,
		applicationform.applied_on,applicationform.resume_files, jobs.title FROM applicationform 
		INNER JOIN jobs ON applicationform.applied_job=jobs.job_id;");
        return $query->getResult();
	 }
	 function getJobListUpdated($Status){

		$query=$this->db->query("SELECT jobs.job_id,jobs.title,jobs.date_posted,jobs.closing_date,jobs.status 
		FROM `jobs` where jobs.status='$Status';");
        return $query->getResult();
	 }
	 public function delete_record($table, $where){
		$this->db->table($table)->delete($where);
		 if ($this->db->affectedRows() == '1')
		 {
		   return true;
		 }
	 }
}