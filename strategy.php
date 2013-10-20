<?php
	/* 
		strategy pattern : 
		best used when classes differ only in their behavior
		define a class of algorithms
	*/
	
	interface Behavior {
		public function movement();
	}
	
	class NormalBehavior implements Behavior {
		public function movement() {
			print "I am a normal robot\n";
		}
	}
	
	class AggressiveBehavior implements Behavior {
		public function movement() {
			print "I am an aggressive robot\n";
		}
	}
	
	class Robot {
		private $behavior;
		private $name;
		
		public function __construct($name) {
			$this->name = $name;
		}
		
		public function setBehavior(Behavior $behavior) {
			$this->behavior = $behavior;
		}
		
		public function movement() {
			$this->behavior->movement();
		}
	}
	
	$normalBehavior = new NormalBehavior;
	$aggressiveBehavior = new AggressiveBehavior;

	$robot = new Robot("Mr. Passive");
	$robot->setBehavior($normalBehavior);
	$robot->movement();


	$robot = new Robot("Mr. Passive-Aggressive");
	$robot->setBehavior($aggressiveBehavior);
	$robot->movement();

?>