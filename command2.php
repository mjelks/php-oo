<?php

	interface Command {
		public function execute_command()
	}
	
	class RemoteControl {
		private $command;
		public function __construct(Command $command) {
			$this->command = $command;			
		}
	
		public function onPress() {
			// create Television instance
			// invoke the assigned command	
			$this->command->execute_command();
		}
		
		public function offPress() {
		
		}
	}
	
	class Television {
		protected function turnOn() {
		
		}
	}
	
	class TurnOnTelevision extends Television implements Command {
		public function execute_command() {		
			$this->turnOn()
		}	
	}
	
	$remote = new RemoteControl();


?>