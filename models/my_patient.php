<?php 

include './core/patient.php';

// Extended Patient Model
class my_patient extends patient
{

	public function list_all()
    {
        $result_array = array();
        $result = $this->db->query('select * from patients');

        return parent::result_array($result);
    }

    public function get_older_than($age){

    	$result_array = array();
        $result = $this->db->query('select * from patients where patient_age >= '.$age.'');
        return parent::result_array($result);

    }

    public function get_number_byage($patients)
    {
        $groups = array();
        foreach ($patients as $patient) {
            @$groups[$patient->patient_age] += 1;
        }
        return $groups;
    }

}