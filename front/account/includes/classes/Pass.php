<?php  

	/**
	 * 
	 */
	class Pass 
	{
		private $kon;
		private $pass;

		function __construct($kon, $pass)
		{
			$this->kon = $kon;
			$this->pass = $pass;
			$stmt = $this->kon->prepare("SELECT * FROM jobpass WHERE pass = :pass ");
			$stmt->bindParam(":pass", $this->pass);
			$stmt->execute();
			$this->data = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->count = $stmt->rowCount();
		}

		function owner(){ return $this->data['owner']; }
        function date(){ return $this->data['date_added']; }
        function passExist(){
            if($this->count == 1){
                return true;
            }
        }
        
        function isUsed(){ 
            $stmt = $this->kon->prepare("SELECT * FROM jobpass JOIN users WHERE jobpass.pass = :pass AND users.jobpass = :pass ");
			$stmt->bindParam(":pass", $this->pass);
			$stmt->execute();
            if($stmt->rowCount() == 1){
                return true;
            }
        }
	}
?> 