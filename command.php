<?php
	/* 
		COMMAND PATTERN
		An object that contains a symbol, name or key that represents a list of commands, actions or keystrokes
		The Command Pattern allows you to decouple the requester of an action from the object that actually performs the action.
		great for taking inputs and outputs, and not worrying about the details in between
		
		typically used as a good example of queueing as well
		
		pattern : 
			client
			concrete Command
				command
				
			receiver
	*/
	
	interface Order {
		public function execute_order();
	}
	
	class StockTrade {
		private $stockName;

		public function __construct($stockName="") {
			$this->stockName = $stockName;
		}
		
		public function buy() {
			print "You want to buy {$this->stockName}\n";
		}
		
		public function sell() {
			print "You want to sell {$this->stockName}\n";			
		}
	}
	
	class Agent {
		private $orderQueue = Array();
		
		public function placeOrder(Order $order) {
			$orderQueue[] = $order;
			$order->execute_order(array_shift($orderQueue));
		}
	}
	
	class BuyStockOrder implements Order {
		private $stock;
		
		public function __construct(StockTrade $st) {
			$this->stock = $st;
		}
		
		public function execute_order() {
			$this->stock->buy();
		}
	}
	
	class SellStockOrder implements Order {
		private $stock;
		
		public function __construct(StockTrade $st) {
			$this->stock = $st;
		}
		
		public function execute_order() {
			$this->stock->sell();
		}
	}
	
	// the client
	//class Client {
		$stockName = 'AAPL';
		$stock = new StockTrade($stockName);
		$buyOrder = new BuyStockOrder($stock);
		$sellOrder = new SellStockOrder($stock);
		$agent = new Agent();
		
		$agent->placeOrder($buyOrder);
		$agent->placeOrder($sellOrder);			
	
	//}
	
	
?>