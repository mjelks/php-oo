<?php
	/*
	Template pattern:
		template is a preset format, used as a starting point for a particular application
		A template method defines an algorithm in a base class using abstract operations 
		that subclasses override to provide concrete behavior.
	*/
	
	abstract class TripPackage {
		public final function doTrip() {
			$this->startTrip();
			$this->dayOne();
			$this->dayTwo();
			$this->endTrip();
		}
		abstract public function startTrip();
		abstract public function dayOne();
		abstract public function dayTwo();
		abstract public function endTrip();
	}

	
	class PackageA extends TripPackage {
		public function startTrip() {
			print "Start in Airport\n";
		}
		public function dayOne() {
			print "Take cruise\n";
		}
		public function dayTwo() {
			print "Take Bus\n";
		}
		public function endTrip() {
			print "Arrive in Airport\n";
		}
	}

	class PackageB extends TripPackage  {
		public function startTrip() {
			print "Start in Puerta Vallarta\n";
		}
		public function dayOne() {
			print "Dock in Cancun\n";
		}
		public function dayTwo() {
			print "Dock in Cozumel\n";
		}
		public function endTrip() {
			print "Arrive Back at Home Airport\n";
		}
	}

	$trip = new PackageA;
	$trip->doTrip();
	print "\n\n";
	$trip2 = new PackageB;
	$trip2->doTrip();

	
?>