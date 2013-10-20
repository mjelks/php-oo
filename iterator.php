<?php
	/*
		Iterator design pattern:
		Pattern that allows the iteration through different data structures
	*/
	
	interface Iterator {
		public function hasNext();
		public function next();
	}
	
	class DinerMenu implements Iterator {
		private $menuItems;
		public $position;
		
		public function __construct($items) {
			$this->menuItems = $items;
		}
	}
?>