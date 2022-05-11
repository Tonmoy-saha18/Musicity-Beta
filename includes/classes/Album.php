<?php
	class Album {

		private $con;
		private $id;
		private $title;
		private $artistId;
		private $genre;
		private $artworkPath;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query = "SELECT * FROM albums WHERE id='$this->id'";
			$data= $this->con->query($query);
			$row= $data->fetchAll();
			$album=$row[0];
			$this->title = $album['title'];
			$this->artistId = $album['artist_id'];
			$this->artworkPath = $album['artwork_path'];


		}

        public function getTitle() {
			return $this->title;
		}

		public function getArtist() {
			return new Artist($this->con, $this->artistId);
		}
 
		public function getArtworkPath() {
			// $len = strlen($this->artworkPath);
			// $path = substr($this->artworkPath, 6, $len);
			return $this->artworkPath;
			// return $path;
		}
?>