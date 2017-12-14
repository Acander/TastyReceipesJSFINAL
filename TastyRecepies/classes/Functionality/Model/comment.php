<?php

	namespace Functionality\Model;
	
	class Comment implements \JsonSerializable {
		
		private $uid;
		private $message;
		private $commenDate;
		private $c_id;
		private $food;
		
		public function __construct($uid, $message, $commenDate, $c_id, $food){
			$this->uid = $uid;
			$this->message = $message;
			$this->commentDate = $commentDate;
			$this->c_id = $c_id;
			$this->food = $food;
		}
		
		public function jsonSerialize() {
			$json_obj = new \stdClass;
			$json_obj->uid = \json_encode($this->uid);
			$json_obj->message = \json_encode($this->message, JSON_UNESCAPED_UNICODE);
			$json_obj->commentDate = \json_encode($this->commentDate);
			$json_obj->c_id = \json_encode($this->c_id);
			$json_obj->food = \json_encode($this->food);
			return $json_obj;
    }
	}