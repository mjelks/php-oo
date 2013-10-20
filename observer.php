<?php
	/*
		one-to-many dependency between objects 
		when one object changes, all dependents are notified (and updated) automatically
		
		good examples: database triggers, dom changes, screen updates
	*/
	
	// recipients 
	// message send (notification)
	// system (notifier)
	
	class Publisher {
		private $recipients = Array();

		public function subscribeIt(Observer $recipient) {
			$this->recipients[] = $recipient;
		}
		public function unsubscribeIt() {}

		public function notify() {
			// loop through subscribers, and message them
			foreach ($this->recipients as $recipient) {
				$recipient->receiveMessage($this);
			}
		}
	}
	
	class Observer {
		// data vars
		public function __construct() {
			// basic stuff
		}
		public function receiveMessage(Publisher $message) {
			var_dump($message);
		}
	}
	
	$system = new Publisher();	
	$system->subscribeIt(new Observer);
	$system->subscribeIt(new Observer);
	$system->notify();
	
	
	
?>