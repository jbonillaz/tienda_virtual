<?php 

	class CategoriasModel extends Mysql{

        public $intIdcategoria;
		public $strCategoria;
		public $strDescripcion;
		public $intStatus;
		public $strPortada;

		public function __construct(){

			parent::__construct();

		}	

        // Metodo para ingresar uan categoria.
        public function inserCategoria(string $nombre, string $descripcion, string $portada, int $status){

			$return = 0;
			$this->strCategoria = $nombre;
			$this->strDescripcion = $descripcion;
			$this->strPortada = $portada;
			$this->intStatus = $status;

			$sql = "SELECT * FROM categoria WHERE nombre = '{$this->strCategoria}' ";
			$request = $this->select_all($sql);

			if(empty($request)){

				$query_insert  = "INSERT INTO categoria(nombre,descripcion,portada,status) VALUES(?,?,?,?)";
	        	$arrData = array($this->strCategoria, 
								 $this->strDescripcion, 
								 $this->strPortada, 
								 $this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}
        // Seleccionar las categorias para mostrarlas en la tabla del sistema
        public function selectCategorias(){

			$sql = "SELECT * FROM categoria 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

        //Metodo para extraer una categoria.
        public function selectCategoria(int $idcategoria){
			$this->intIdcategoria = $idcategoria;
			$sql = "SELECT * FROM categoria
					WHERE idcategoria = $this->intIdcategoria";
			$request = $this->select($sql);
			return $request;
		}
		// metodo para actualizar una categoria.
		public function updateCategoria(int $idcategoria, string $categoria, string $descripcion, string $portada, int $status){
			$this->intIdcategoria = $idcategoria;
			$this->strCategoria = $categoria;
			$this->strDescripcion = $descripcion;
			$this->strPortada = $portada;
			$this->intStatus = $status;

			$sql = "SELECT * FROM categoria WHERE nombre = '{$this->strCategoria}' AND idcategoria != $this->intIdcategoria";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE categoria SET nombre = ?, descripcion = ?, portada = ?, status = ? WHERE idcategoria = $this->intIdcategoria ";
				$arrData = array($this->strCategoria, 
								 $this->strDescripcion, 
								 $this->strPortada, 
								 $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		// Metodo para eliminar una categoria
		public function deleteCategoria(int $idcategoria){
			$this->intIdcategoria = $idcategoria;
			$sql = "SELECT * FROM producto WHERE categoriaid = $this->intIdcategoria";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE categoria SET status = ? WHERE idcategoria = $this->intIdcategoria ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}	


	}
 ?>