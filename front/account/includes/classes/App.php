<?php  

	/**
	 * 
	 */
	class App 
	{
		private $kon;
		private $bid;

		function __construct($kon, $bid)
		{
			$this->kon = $kon;
			$this->bid = $bid;
			$stmt = $this->kon->prepare("SELECT * FROM downloads WHERE brand_id = :bid ");
			$stmt->bindParam(":bid", $this->bid);
			$stmt->execute();
			$this->data = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		function playstore(){ return $this->data['playstore']; }
        function appstore(){ return $this->data['appstore']; }
        function price(){ return $this->data['price']; }
	}
?> 