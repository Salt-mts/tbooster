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

        // function insertAddress($addr, $city, $st, $ph1, $ph2){
        //     $stmt = $this->kon->prepare("INSERT INTO addresses (user_id, address, city, state, phone1, phone2) VALUES (:uid, :addr, :city, :st, :ph1, :ph2)");
        //     $stmt->bindParam(":uid", $this->uid);
        //     $stmt->bindParam(":addr", $addr);
        //     $stmt->bindParam(":city", $city);
        //     $stmt->bindParam(":st", $st);
        //     $stmt->bindParam(":ph1", $ph1);
        //     $stmt->bindParam(":ph2", $ph2);
        //     return $stmt->execute();
        // }
		
        // function deleteAddr($id){
        //     $stmt = $this->kon->prepare("DELETE FROM addresses WHERE id = :id AND user_id =  :uid ");
        //     $stmt->bindParam(":uid", $this->uid);
        //     $stmt->bindParam(":id", $id);
        //     return $stmt->execute();
        // }


        // function checkoutAddress(){
		// 	$stmt = $this->kon->prepare("SELECT * FROM addresses WHERE user_id = :uid ORDER BY id LIMIT 1 ");
		// 	$stmt->bindParam(":uid", $this->uid);
		// 	$stmt->execute();
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
        //     if($stmt->rowCount() > 0){
        //         $addr = $row['address'];
        //         $city = $row['city'];
        //         $state = $row['state'];
        //         $country = $row['country'];
        //         $phone = $row['phone1'];				
        //         if(empty($row['phone2'])){
        //             $phone2 = "";
        //         }else{
        //             $phone2 = "Phone: ".$row['phone2'];
        //         }
        //         $id = $row['id'];
        //         $alert = "Sure to delete?";
        //         echo "
        //         <p class='text-light font-12 main-address'>
        //             $addr <br>
        //             $city, $state <br>
        //             $phone <br>
        //         </p>
        //         ";
        //     }else{
        //         echo "<br><br> <a href='account' class='btn bg-primary'>Add Delivery Address</a> <br><br>";
        //     }
		// }

	}
?> 