<?php
	/*
		Adapter pattern:
		adapting between classes and objects
		real-world example include memory-card reader adapters, poweradapters, etc.
		software: 3rd party frameworks to adapt to local environment
					legacy code, updated method names that need to be mapped to new version
	*/

	// these are the third party libraries, no-touching
	class FacebookApi {
		public function getEmailFromUser() {
			print "I am the Facebook Email\n";
		}
	}
	
	class GoogleApi {
		public function getUserEmail() {
			print "i am the Google Email\n";
		}
	}	
	// end of third-party library
	
	
	interface ApiAdapter {
		public function getUserEmail();
	}
	
	class GoogleApiAdapter implements ApiAdapter {
		private $googleApi;
		
		public function __construct() {
			$this->googleApi = new GoogleApi;
		}
	
		public function getUserEmail() {
			$this->googleApi->getUserEmail();
		}
	}

	class FacebookApiAdapter implements ApiAdapter {
		private $api;
		
		public function __construct() {
			$this->api = new FacebookApi;
		}
	
		public function getUserEmail() {
			$this->api->getEmailFromUser();
		}
	}

	
	class Adapter {
		private $adapter;

		public function setAdapter(ApiAdapter $value) {
			$this->adapter = $value;
		}
		
		public function getUserEmail() {
			$this->adapter->getUserEmail();
		}
	}
	$adapter = new Adapter;
	$adapter->setAdapter(new FacebookApiAdapter);
	$adapter->getUserEmail();
	
	$adapter->setAdapter(new GoogleApiAdapter);
	$adapter->getUserEmail();
?>