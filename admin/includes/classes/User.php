<?php  

	/**
	 * 
	 */
	class User 
	{
		private $kon;
		private $uid;

		function __construct($kon, $uid)
		{
			$this->kon = $kon;
			$this->uid =$uid;

			$stmt = $this->kon->prepare("SELECT * FROM users WHERE id = :em ");
			$stmt->bindParam("em", $this->uid);
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
		public function referral(){
			return $this->data['referral_link'];
		}
		public function referrer(){
			return $this->data['referrer'];
		}

		function totalPendingPayment(){
			$stmt = $this->kon->prepare("SELECT SUM(price) AS sum FROM completed WHERE user_id = :uid AND status = 1 AND payout_requested = 1 AND is_paid = 0 ");
			$stmt->bindParam(":uid", $this->uid);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row['sum'];
		}
		function setPendingAsPaid(){
			$stmt = $this->kon->prepare("UPDATE completed SET is_paid = 1, payout_requested = 0 WHERE user_id = :uid AND status = 1 AND payout_requested = 1 AND is_paid = 0 ");
			$stmt->bindParam(":uid", $this->uid);
			return $stmt->execute();
		}

		function countReferred(){
			$ref = $this->referral();
			$stmt = $this->kon->prepare("SELECT * FROM users WHERE referrer = :refl AND ref_paid = 0");
			$stmt->bindParam(":refl",$ref);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $stmt->rowCount();
		}

		function setReferralAsPaid(){
			$ref = $this->referral();
			$stmt = $this->kon->prepare("UPDATE users SET ref_paid = 1 WHERE referrer = :refl AND ref_paid = 0");
			$stmt->bindParam(":refl", $ref);
			return $stmt->execute();
		}

	}

?>