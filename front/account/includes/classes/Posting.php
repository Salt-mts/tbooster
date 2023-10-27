<?php  

	/**
	 * 
	 */
	class Posting 
	{
		private $kon;
		private $bid;

		function __construct($kon, $bid='')
		{
			$this->kon = $kon;
			$this->bid = $bid;
			$stmt = $this->kon->prepare("SELECT * FROM posting WHERE brand_id = :bid ");
			$stmt->bindParam(":bid", $this->bid);
			$stmt->execute();
			$this->data = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		function link(){ return $this->data['link']; }
        function price(){ return $this->data['price']; }
	}
?> 