<?php 
   header("Access-Control-Allow-Origin: *");
   // Define database connection parameters
   $hn      = 'localhost';
   $un      = 'root';
   $pwd     = '';//'abcde123'; /* kena buat skali lg kat bawah sebab class xdpt baca global, kena tanya siapa power java */
   $db      = 'cashless';
   $cs      = 'utf8';

   // Set up the PDO parameters
   $dsn 	= "mysql:host=" . $hn . ";port=3306;dbname=" . $db . ";charset=" . $cs;
   $opt 	= array(
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                        PDO::ATTR_EMULATE_PREPARES   => false,
                       );
					   
   // Create a PDO instance (connect to the database)
   $pdo 	= new PDO($dsn, $un, $pwd, $opt);
   
   //untuk web
   $conn=mysql_connect($hn, $un, $pwd) or die(mysql_error());
	mysql_select_db($db) or die(mysql_error()); 
	
	//untuk php data object (pdo)
	class Database {
		 
    //private static $dbName =  $db; // try dah takleh baca outer variable dari class. siapa power java tolong...
	private static $dbName = 'cashless';
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';//'abcde123';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>