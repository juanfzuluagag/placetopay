<?php  

	/**
	 * @author Juan F. Zuluaga G <juanf.zuluagag@gmail.com
	 * Modelo utilizada para manipular los datos de la compra, aspcioado a un pagador
	 {"status":{"status":"OK","reason":"PC","message":"La petici\u00f3n se ha procesado correctamente","date":"2019-04-01T20:04:42-05:00"},"requestId":188754,"processUrl":"https:\/\/test.placetopay.com\/redirection\/session\/188754\/dc76451bf21fa44ad60f486aec55be75"}


	 */
	class Payment{
		
		private $reference;
		private $description;
		private $currency;
		private $total;
		private $payer;


		function __construct($args, $payer){
			
			$this->reference = $args['reference'];
			$this->description = $args['description'];
			$this->currency = $args['currency'];
			$this->total = $args['total'];
			$this->payer = $payer;
		}

		protected function getReference(){
			return $this->reference;
		}

		protected function getDesciption(){
			return $this->description;
		}

		protected function getCurrency(){
			return $this->currency;
		}

		protected function getTotal(){
			return $this->total;
		}

		protected function getPayer(){
			return $this->payer;
		}

		protected function setReference($reference){
			$this->reference = $reference;
		}

		protected function setDescription($description){
			$this->description = $description;
		}

		protected function setCurrency($currency){
			$this->currency = $currency;
		}

		protected function setTotal($total){
			$this->total = $total;
		}

		protected function setPayer($payer){
			$this->payer = $payer;
		}

	}

?>