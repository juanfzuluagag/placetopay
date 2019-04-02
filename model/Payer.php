<?php  

	/**
	 * @author Juan F. Zuluaga G <juanf.zuluagag@gmail.com
	 * Modelo utilizada para manipular los datos del usuario
	 */
	class Payer{
		private $document_type;
		private $document;
		private $name;
		private $last_name;
		private $mail;
		private $mobile;
		private $address;
		private $country;
		private $city;

		
		function __construct($args){
			$this->document_type = $args['documentType'];
			$this->document = $args['document'];
			$this->name = $args['name'];
			$this->last_name = $args['surname'];
			$this->mail = $args['email'];
			$this->mobile = $args['mobile'];
			$this->address = $args['address'];
			$this->country = $args['country'];
			$this->city = $args['city'];

		}

		//getter functions
		protected function getDocumentType(){
			return $this->document_type;
		}

		protected function getDocument(){
			return $this->document;
		}

		protected function getName(){
			return $this->name;
		}

		protected function getLastName(){
			return $this->last_name;
		}

		protected function getMail(){
			return $this->mail;
		}

		protected function getMobile(){
			return $this->mobile;
		}

		protected function getAddress(){
			return $this->address;
		}

		protected function getCountry(){
			return $this->country;
		}

		protected function getCity(){
			return $this->city;
		}

		//Setters function
		protected function setDocumentType($documentType){
			$this->document_type = $documentType;
		}

		protected function setDocument($document){
			$this->document = $document;
		}

		protected function setName($name){
			$this->name = $name;
		}

		protected function setLastName($last_name){
			$this->last_name = $last_name;
		}

		protected function setMail($mail){
			$this->mail = $mail;
		}

		protected function setMobile($mobile){
			$this->mobile = $mobile;
		}

		protected function setAddress($address){
			$this->address = $address;
		}

		protected function setCountry($country){
			$this->country = $country;
		}

		protected function setCity($city){
			$this->city = $city;
		}

	}

?>