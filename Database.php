<?php

class Database{
    
    private $host    = DB_HOST;
    private $user    = DB_USER;
    private $pass    = DB_PASS;
    private $dbName  = DB_NAME;
    
    public $link;
    public $error;
    
    
    public function __construct() {
        $this->connectDB();
    }

    private function connectDB(){
        
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbName);
        
        if(!$this->link){
            $this->error = "Connection failed".$this->link->connect_error;
            return false;
        }
    }
    
    //Read or retrieve data from database
    
    public function select($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        
        if($result->num_rows >0){
            return $result;
        }  else {
            return false;
        }
    }
    public function insert($query){
        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($insert_row){
           // header("Location : addUser.php?msg="urlencode(or die($this->link->error.__LINE__);));
           echo 'Data inserted successfully..';
        }else{
            die("Error :(".$this->link->errno.")").$this->link->error;
        }
        
    }
    
      public function update($query){
        $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($update_row){
           // header("Location : addUser.php?msg="urlencode(or die($this->link->error.__LINE__);));
           echo 'Data Updated successfully..';
        }else{
            die("Error :(".$this->link->errno.")").$this->link->error;
        }
        
    }
    
     public function delete($query){
        $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($delete_row){
           // header("Location : addUser.php?msg="urlencode(or die($this->link->error.__LINE__);));
           echo 'Data Deleted successfully..';
        }else{
            die("Error :(".$this->link->errno.")").$this->link->error;
        }
        
    }
}

