<?php  

	/**
	 * 
	 */
	class User 
	{
		private $kon;
		private $email;

		function __construct($kon, $email)
		{
			$this->kon = $kon;
			$this->email =$email;

			$stmt = $this->kon->prepare("SELECT * FROM users WHERE email = :em ");
			$stmt->bindParam("em", $this->email);
			$stmt->execute();

			$this->data = $stmt->fetch(PDO::FETCH_ASSOC);
		}


		public function id(){
			return $this->data['id'];
		}
		public function password(){
			return $this->data['password'];
		}
		public function fullname(){
			return $this->data['fullname'];
		}
		public function acctNo(){
			return $this->data['acct_no'];
		}
		public function bank(){			
			return $this->data['bank'];
		}		
		public function email(){			
			return $this->data['email'];
		}		
		public function regDate(){
			return $this->data['date_added'];
		}
		public function status(){
			return $this->data['status'];
		}
		public function schedule(){
			return $this->data['schedule'];
		}


		public function updateProfile($fname, $lname,$mname, $phone, $country, $city, $state, $addr, $occ, $dob){
			$stmt = $this->kon->prepare("UPDATE uza SET firstname = :fn, lastname = :ln, middlename = :mn, dob = :dob, phone = :ph, addr = :addr, state = :st, country = :ctry, city = :cty, occupation = :occ WHERE email = :em ");
			$stmt->bindParam(":fn", $fname);
			$stmt->bindParam(":ln", $lname);
			$stmt->bindParam(":mn", $mname);
			$stmt->bindParam(":ph", $phone);
			$stmt->bindParam(":ctry", $country);
			$stmt->bindParam(":cty", $city);
			$stmt->bindParam(":st", $state);
			$stmt->bindParam(":addr", $addr);
			$stmt->bindParam(":occ", $occ);
			$stmt->bindParam(":dob", $dob);
			$stmt->bindParam(":em", $this->email);
			return $stmt->execute();
		}


		function verifyPassword($oldPassword){
			if(password_verify($oldPassword, $this->password())){
				return true;				
			}
		}

		public function updatePassword($newPassword){
			$pass = password_hash($newPassword, PASSWORD_DEFAULT);
			$stmt = $this->kon->prepare("UPDATE uza SET password = :pw WHERE email = :em ");
			$stmt->bindParam(":pw", $pass);
			$stmt->bindParam(":em", $this->email);
			return $stmt->execute();
		}

	}

?>