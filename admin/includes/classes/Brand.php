<?php  

	/**
	 * 
	 */
	class Brand 
	{
		private $kon;
		private $bid;

		function __construct($kon, $bid)
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
        function isActive(){ return $this->data['status']; }


        function activateBrand(){
            $status = 1;
            $stmt = $this->kon->prepare("UPDATE brand SET status = :stat WHERE brand_id = :bid");
            $stmt->bindParam(":bid", $this->bid);
            $stmt->bindParam(":stat", $status);
            return $stmt->execute();
        }
        function deactivateBrand(){
            $status = 0;
            $stmt = $this->kon->prepare("UPDATE brand SET status = :stat WHERE brand_id = :bid");
            $stmt->bindParam(":bid", $this->bid);
            $stmt->bindParam(":stat", $status);
            return $stmt->execute();
        }

        function updateFollow($facebook, $instagram, $youtube, $twitter, $tiktok, $linkedin, $audiomack, $price){

            $query = $this->kon->prepare("SELECT * FROM follows WHERE brand_id = :bid");
            $query->bindParam(":bid", $this->bid);
            $query->execute();
            // $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($query->rowCount() < 1){
                $kweri = $this->kon->prepare("INSERT INTO follows(brand_id) VALUES(:bid)");
                $kweri->bindParam(":bid", $this->bid);
                $kweri->execute();
            }
            $stmt = $this->kon->prepare("UPDATE follows SET facebook = :fb, instagram = :ig, youtube = :yt, twitter = :tw, tiktok = :tik, linkedin = :ln, audiomack = :am, price = :pr WHERE brand_id = :bid");
            $stmt->bindParam(":bid", $this->bid);
            $stmt->bindParam(":fb", $facebook);
            $stmt->bindParam(":ig", $instagram);
            $stmt->bindParam(":yt", $youtube);
            $stmt->bindParam(":tw", $twitter);
            $stmt->bindParam(":tik", $tiktok);
            $stmt->bindParam(":ln", $linkedin);
            $stmt->bindParam(":am", $audiomack);
            $stmt->bindParam(":pr", $price);
            return $stmt->execute();
        }

        function updateLike($facebook, $instagram, $youtube, $twitter, $tiktok, $linkedin, $audiomack, $price){

            $query = $this->kon->prepare("SELECT * FROM likes WHERE brand_id = :bid");
            $query->bindParam(":bid", $this->bid);
            $query->execute();
            // $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($query->rowCount() < 1){
                $kweri = $this->kon->prepare("INSERT INTO likes(brand_id) VALUES(:bid)");
                $kweri->bindParam(":bid", $this->bid);
                $kweri->execute();
            }
            $stmt = $this->kon->prepare("UPDATE likes SET facebook = :fb, instagram = :ig, youtube = :yt, twitter = :tw, tiktok = :tik, linkedin = :ln, audiomack = :am, price = :pr WHERE brand_id = :bid");
            $stmt->bindParam(":bid", $this->bid);
            $stmt->bindParam(":fb", $facebook);
            $stmt->bindParam(":ig", $instagram);
            $stmt->bindParam(":yt", $youtube);
            $stmt->bindParam(":tw", $twitter);
            $stmt->bindParam(":tik", $tiktok);
            $stmt->bindParam(":ln", $linkedin);
            $stmt->bindParam(":am", $audiomack);
            $stmt->bindParam(":pr", $price);
            return $stmt->execute();
        }

        function updateApp($playstore, $appstore, $price){

            $query = $this->kon->prepare("SELECT * FROM downloads WHERE brand_id = :bid");
            $query->bindParam(":bid", $this->bid);
            $query->execute();
            if($query->rowCount() < 1){
                $kweri = $this->kon->prepare("INSERT INTO downloads(brand_id) VALUES(:bid)");
                $kweri->bindParam(":bid", $this->bid);
                $kweri->execute();
            }
            $stmt = $this->kon->prepare("UPDATE downloads SET playstore = :ps, appstore = :ap, price = :pr WHERE brand_id = :bid");
            $stmt->bindParam(":bid", $this->bid);
            $stmt->bindParam(":ps", $playstore);
            $stmt->bindParam(":ap", $appstore);
            $stmt->bindParam(":pr", $price);
            return $stmt->execute();
        }

        function updateGroup($telegram, $whatsapp, $facebook, $price){

            $query = $this->kon->prepare("SELECT * FROM groups WHERE brand_id = :bid");
            $query->bindParam(":bid", $this->bid);
            $query->execute();
            if($query->rowCount() < 1){
                $kweri = $this->kon->prepare("INSERT INTO groups(brand_id) VALUES(:bid)");
                $kweri->bindParam(":bid", $this->bid);
                $kweri->execute();
            }
            $stmt = $this->kon->prepare("UPDATE groups SET telegram = :tel, whatsapp = :wha, facebook = :fb, price = :pr WHERE brand_id = :bid");
            $stmt->bindParam(":bid", $this->bid);
            $stmt->bindParam(":tel", $telegram);
            $stmt->bindParam(":wha", $whatsapp);
            $stmt->bindParam(":fb", $facebook);
            $stmt->bindParam(":pr", $price);
            return $stmt->execute();
        }

        function updatePosting($link, $price){

            $query = $this->kon->prepare("SELECT * FROM posting WHERE brand_id = :bid");
            $query->bindParam(":bid", $this->bid);
            $query->execute();
            if($query->rowCount() < 1){
                $kweri = $this->kon->prepare("INSERT INTO posting(brand_id) VALUES(:bid)");
                $kweri->bindParam(":bid", $this->bid);
                $kweri->execute();
            }
            $stmt = $this->kon->prepare("UPDATE posting SET link = :lk, price = :pr WHERE brand_id = :bid");
            $stmt->bindParam(":bid", $this->bid);
            $stmt->bindParam(":lk", $link);
            $stmt->bindParam(":pr", $price);
            return $stmt->execute();
        }
		
        function deleteBrand(){
            $stmt = $this->kon->prepare("DELETE FROM brand WHERE brand_id = :bid");
            $stmt->bindParam(":bid", $this->bid);
            return $stmt->execute();
        }


	}
?> 