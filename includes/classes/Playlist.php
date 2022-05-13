<?php
    class Playlist {
 
        private $con;
        private $id;
        private $name;
        private $owner;
 
        public function __construct($con, $data) {
 
            $this->con = $con;
            if(!is_array($data)) {
                //Data is an id (string)
                $query = "SELECT * FROM playlist WHERE id='$data'";
                $playlist = $this->con->query($query);
                $row = $playlist->fetchAll();
                $data=$row[0];
            }
 
           
            $this->id = $data['id'];
            $this->name = $data['title'];
            $this->owner = $data['owner_id'];
        }
 
        
 
 
 
    }
   
?>

