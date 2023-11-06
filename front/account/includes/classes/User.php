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


		function totalUnpaid($uid){
			$stmt = $this->kon->prepare("SELECT SUM(price) AS sum FROM completed WHERE user_id = :uid AND status = 1 AND is_paid = 0 ");
			$stmt->bindParam(":uid", $uid);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			echo number_format($row['sum'], 2);
		}
		function totalPaid($uid){
			$stmt = $this->kon->prepare("SELECT SUM(price) AS sum FROM completed WHERE user_id = :uid AND is_paid = 1 ");
			$stmt->bindParam(":uid", $uid);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			echo number_format($row['sum'], 2);
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
			if(md5($oldPassword) === $this->password()){
				return true;				
			}
		}

		public function updatePassword($newPassword){
			$pass = md5($newPassword);
			$stmt = $this->kon->prepare("UPDATE users SET password = :pw WHERE email = :em ");
			$stmt->bindParam(":pw", $pass);
			$stmt->bindParam(":em", $this->email);
			return $stmt->execute();
		}

	}

?>