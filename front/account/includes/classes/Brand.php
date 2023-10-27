<?php  

	/**
	 * 
	 */
	class Brand 
	{
		private $kon;
		private $bid;

		function __construct($kon, $bid='')
		{
			$this->kon = $kon;
			$this->bid = $bid;
			$stmt = $this->kon->prepare("SELECT * FROM brand WHERE brand_id = :bid ");
			$stmt->bindParam(":bid", $this->bid);
			$stmt->execute();
			$this->data = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		function logo(){ return $this->data['logo']; }
        function name(){ return $this->data['name']; }
        function status(){ return $this->data['status']; }
        function date(){ return $this->data['date_added']; }
	}
?> 