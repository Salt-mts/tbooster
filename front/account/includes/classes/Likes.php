<?php  

	/**
	 * 
	 */
	class Likes 
	{
		private $kon;
		private $bid;

		function __construct($kon, $bid)
		{
			$this->kon = $kon;
			$this->bid = $bid;
			$stmt = $this->kon->prepare("SELECT * FROM likes WHERE brand_id = :bid ");
			$stmt->bindParam(":bid", $this->bid);
			$stmt->execute();
			$this->data = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		function facebook(){ return $this->data['facebook']; }
        function instagram(){ return $this->data['instagram']; }
        function linkedin(){ return $this->data['linkedin']; }
        function youtube(){ return $this->data['youtube']; }
        function twitter(){ return $this->data['twitter']; }
        function audiomack(){ return $this->data['audiomack']; }
        function tiktok(){ return $this->data['tiktok']; }
        function price(){ return $this->data['price']; }
	}
?> 