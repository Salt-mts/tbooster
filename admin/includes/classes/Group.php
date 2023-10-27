<?php  

	/**
	 * 
	 */
	class Group 
	{
		private $kon;
		private $bid;

		function __construct($kon, $bid)
		{
			$this->kon = $kon;
			$this->bid = $bid;
			$stmt = $this->kon->prepare("SELECT * FROM groups WHERE brand_id = :bid ");
			$stmt->bindParam(":bid", $this->bid);
			$stmt->execute();
			$this->data = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		function whatsapp(){ return $this->data['whatsapp']; }
        function facebook(){ return $this->data['facebook']; }
        function telegram(){ return $this->data['telegram']; }
        function price(){ return $this->data['price']; }
	}
?> 