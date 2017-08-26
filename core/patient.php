<?php 

include 'base.php';

// Patient Model
// Core Class
class patient extends base
{
    public function __construct()
    {
        // constructing the parent gives us 
        // access to the db through $this->db
        // which is a native php mysqli interface
        parent::__construct();
    }

}