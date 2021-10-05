<?php 
	require_once("Models/TCategoria.php");
	require_once("Models/TProducto.php");
	class Home extends Controllers{

		use TCategoria, TProducto;
		public function __construct()
		{
			parent::__construct();
		}

		public function home()
		{
			// dep($this->getProductosT());
			// exit;
			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = NOMBRE_EMPESA;
			$data['page_name'] = "outlet_tech";
			$data['slider'] = $this->getCategoriasT(CAT_SLIDER);
			$data['banner'] = $this->getCategoriasT(CAT_BANNER);
			$data['productos'] = $this->getProductosT();
			// dep($data); exit;
			$this->views->getView($this,"home",$data);
		}

	}
 ?>