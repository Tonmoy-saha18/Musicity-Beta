<?php
	class Artist {

		private $con;
		private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function getName() {
			$artistQuery = "SELECT concat(first_name, ' ', last_name) as name FROM users WHERE id='$this->id'";
			$artist = $this->con->query($artistQuery);
			$data = $artist->fetchAll();
			$name=$data[0] ?? null;
			return $name['name'] ?? null;
		}

		public function getDescription() {
			$artistQuery = "SELECT description FROM users WHERE id='$this->id'";
			$artist = $this->con->query($artistQuery);
			$data = $artist->fetchAll();
			$name=$data[0] ?? null;
			return $name['description'] ?? null;
		}
		
		public function getSongIds() {

			$query = "SELECT s.id as id FROM `songs` as s JOIN albums as u ON u.id = s.album_id WHERE u.artist_id='$this->id' ORDER BY plays ASC";

			$data= $this->con->query($query);
			$row= $data->fetchAll();
			$ids=array_column($row, 'id');
			return $ids;

		}
	}
?>