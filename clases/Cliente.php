<?php 
	class Cliente extends Usuario {
		private $formaDePago;
		
		public function setFormaDePago(Pago $forma){
			$this->formaDePago = $forma;
		}
		
		
	}