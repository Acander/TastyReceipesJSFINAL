<?php
	
	namespace Functionality\Util;
	
	class InputFiltering{
		
		/**
		*	Filters input and making sure that the input data is a string
		*	and does not use control characters
		*	@param string A supposed string
		*/
		public static function registrationInputFiltering($input){
			if(!empty($input)){
				return self::stringConditions($input);
			}
			else{
				return true;
			}
		}
		
		private static function stringConditions($string){
			return !(ctype_alpha($string) && ctype_print($string));
		}
		
		/**
		*	Filter input and making sure that the input data is string
		*	@param string A supposed string
		*/
		public static function commentInputFiltering($input){
			if(!empty($input)){
				return !ctype_alpha($input);
			}
			else{
				return true;
			}
		}
	
}