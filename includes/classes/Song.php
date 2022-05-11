<?php
	class Song {

		private $con;
		private $id;
		private $mysqliData;
		private $title;
		private $artistId;
		private $albumId;
		private $genre;
		private $duration;
		private $path;
		private $setCharge;

        public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
			$query = "SELECT * FROM songs WHERE id='$this->id'";
			$returnobj=$this->con->query($query);
			$data=$returnobj->fetch(); 
			$this->mysqliData = $data;
			$this->title = $this->mysqliData['title'];
			$this->albumId = $this->mysqliData['album_id'];
			$this->genre = $this->mysqliData['genre_id'];
			$this->duration = $this->mysqliData['duration'];
			$this->path = $this->mysqliData['song_path'];
			$this->path = $this->mysqliData['set_charge'];
		}