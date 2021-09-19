<?php

	const BASE_URL = "http://localhost/proyectos/tienda_virtual";
    // const LIBS = "Libraries/";
    // const VIEWS = "Views/";

    //Zona horaria
	date_default_timezone_set('America/Bogota');

    //Datos de conexion a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "db_tiendavirtual";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";

    //Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "COP";

	//Datos de envio de correo.
	const NOMBRE_REMITENTE = "Outlet Tech";
	const EMAIL_REMITENTE = "atenciaonalcliente@llanosoftware.com";
	const NOMBRE_EMPESA = "Outlet Tech";
	const WEB_EMPRESA = "https://llanosoftware.com";


?>