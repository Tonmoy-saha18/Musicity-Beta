<?php
	class User {

		private $con;
		private $username;

		public function __construct($con, $username) {
			$this->con = $con;
			$this->username = $username;
		}

		public function getUsername() {
			return $this->username;
		}

		public function getUserId() {
			$query = "SELECT id FROM users WHERE username='$this->username'";
			//echo ($this->username);
			$row =  $this->con->query($query);
			$data = $row->fetchAll();
			$id = $data[0];
			return $id['id'];
		}
		public function getUserBalance() {
			$query = "SELECT amount FROM users WHERE username='$this->username'";
			//echo ($this->username);
			$row =  $this->con->query($query);
			$data = $row->fetch();
			return $data['amount'];
		}

		public function getEmail() {
			$query = "SELECT email FROM users WHERE username='$this->username'";
			$row = $this->con->query($query);
			$data = $row->fetchAll();
			$email=$data[0];
			return $email['email'];

		}
		public function getDescription() {
			$query = "SELECT description FROM users WHERE username='$this->username'";
			$row = $this->con->query($query);
			$data = $row->fetchAll();
			$description=$data[0];
			return $description['description'];

		}


		public function getFirstAndLastName() {
			$query = "SELECT concat(first_name, ' ', last_name) as 'name'  FROM users WHERE username='$this->username'";
			$row = $this->con->query($query);
			$data = $row->fetchAll();
			$name=$data[0];
			return $name['name'];
		}

	}
?>   