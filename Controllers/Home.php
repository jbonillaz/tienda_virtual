<?php 

	class Home extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function home()
		{
			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = NOMBRE_EMPESA;
			$data['page_name'] = "outlet_tech";
			$this->views->getView($this,"home",$data);
		}

	}
 ?>