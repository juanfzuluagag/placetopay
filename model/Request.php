<?php  

	/**
	 * @author Juan F. Zuluaga G <juanf.zuluagag@gmail.com
	 * Modelo utilizada para manipular los datos de la respuesta del servicio, y asociar al payer y al payment
	 */
	class Request{

		private $status;
		private $reason;
		private $message;
		private $date;
		private $requestId;
		private $processUrl;
		private $payer;
		private $payment;
		
		function __construct($args){
			$this->status = $args['status'];
			$this->reason = $args['reason'];
			$this->message = $args['message'];
			$this->date = $args['date'];
			$this->requestId = $args['requestId'];
			$this->processUrl = $args['processUrl'];
			$this->payer = $args['payer'];
			$this->payment = $args['payment'];
		}

		protected function getStatus(){
			return $this->status;
		}

		protected function getReasons(){
			return $this->reason;
		}

		protected function getMessage(){
			return $this->message;
		}

		protected function getDate(){
			return $this->date;
		}

		protected function getRequestId(){
			return $this->requestId;
		}

		protected function getProcessUrl(){
			return $this->processUrl;
		}

		protected function getPayer(){
			return $this->payer;
		}

		protected function getPayment(){
			return $this->payment;
		}

		protected function setStatus($status){
			$this->status = $status;
		}

		protected function setMessage($message){
			$this->message = $message;
		}

		protected function setDate($date){
			$this->date = $date;
		}

		protected function setRequestId($requestId){
			$this->requestId = $requestId;
		}

		protected function setProcessUrl($processUrl){
			$this->processUrl = $processUrl;
		}

		protected function setPayer($payer){
			$this->payer = $payer;
		}

		protected function setPayment($payment){
			$this->payment = $payment;
		}


	}

?>