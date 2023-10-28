<?php  

	/**
	 * 
	 */
	class Completed 
	{
		private $kon;
		private $bid;
		private $uid;

		function __construct($kon, $bid, $uid)
		{
			$this->kon = $kon;
			$this->bid = $bid;
			$this->uid = $uid;
			$stmt = $this->kon->prepare("SELECT * FROM completed WHERE brand_id = :bid AND user_id = :uid ");
			$stmt->bindParam(":bid", $this->bid);
			$stmt->bindParam(":uid", $this->uid);
			$stmt->execute();
			$this->data = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->count = $stmt->rowCount();
		}

		function type(){ return $this->data['brand_type']; }
        function price(){ return $this->data['price']; }
        function status(){ return $this->data['status']; }
        function ispaid(){ return $this->data['is_paid']; }
        function date(){ return $this->data['date_added']; }

        function add($brandType, $price){
            $date = date("F j, Y");
            $stmt = $this->kon->prepare("INSERT INTO completed (user_id, brand_id, brand_type, price, date_added) VALUES (:uid, :bid, :bt, :pr, :dt)");
			$stmt->bindParam(":uid", $this->uid);
			$stmt->bindParam(":bid", $this->bid);
			$stmt->bindParam(":bt", $brandType);
			$stmt->bindParam(":pr", $price);
			$stmt->bindParam(":dt", $date);
			return $stmt->execute();
        }

		function isCompleted(){
			if($this->count > 0){
				return true;
			}
		}
	}
?> 