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
 
        public function getId() {
            return $this->id;
        }
 
        public function getName() {
            return $this->name;
        }
 
        public function getOwner() {
            $query = "SELECT username FROM users WHERE id='$this->owner'";
            $data  = $this->con->query($query);
            $row=$data->fetchAll();
            $id=$row[0];
            return $id['username'];
        }
 
        public function getNumberOfSongs() {
            $query = "SELECT song_id FROM playlist_song WHERE playlist_id='$this->id'";
            $data  = $this->con->query($query);
            return $data->rowCount();
        }
 
        public function getSongIds() {
 
            $query = "SELECT song_id FROM playlist_song WHERE playlist_id='$this->id' ORDER BY playlist_order ASC";
 
            $data= $this->con->query($query);
            $row= $data->fetchAll();
            return $row;
 
 
        }
 
        public static function getPlaylistsDropdown($con, $username) {
            $dropdown = '<select class="item playlist">
                            <option value="">Add to playlist</option>';
 
            $query = "SELECT id FROM users WHERE username='$username'";
            $data  = $con->query($query);
            $row=$data->fetchAll();
            $id=$row[0];
            $ownerid= $id['id'];
            $query = "SELECT id, title FROM playlist WHERE owner_id='$ownerid'";
            $data  = $con->query($query);
            $tabledata=$data->fetchAll();
            foreach($tabledata AS $row){
                $id = $row['id'];
                $name = $row['title'];
 
                $dropdown = $dropdown . "<option value='$id'>$name</option>";
            }
 
 
            return $dropdown . "</select>";
        }
 
 
 
 
    }
   
?>

