<?php
	/**
	 * Object represents table 'crm_user'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmUser{
		
		public $userID;
		public $userName;
		public $password;
		public $firstName;
		public $lastName;
		public $email;
		public $state;
		public $level;
		public $chi;
		public $chd;
		public $reportes;
		public $localID;

		public function __construct($userID=NULL, $userName=NULL, $password=NULL, $firstName=NULL, $lastName=NULL, $email=NULL, $state=NULL,$level=NULL,$chi=NULL,$chd=NULL,$reportes = NULL,$localID = NULL)
		{
			$this->userID 		= $userID;
			$this->userName 	= $userName;
			$this->password 	= $password;
			$this->firstName	= $firstName;
			$this->lastName		= $lastName;
			$this->email		= $email;
			$this->state		= $state;
			$this->level		= $level;
			$this->chi			= $chi;
			$this->chd			= $chd;
			$this->reportes 	= $reportes;
			$this->localID		= $localID;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>