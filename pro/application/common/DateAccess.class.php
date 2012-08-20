
<?php

class DataAcess{
	
	protected $hostname;
	protected $username;
	protected $password;
	protected $database;
	protected $db;
	protected $sql;
	protected $result;


	/**
	 * @param $hostname : localhost
	 * @param $username : 数据库用户名
	 * @param $password : 数据库密码
	 * @param $db : 链接数据库返回的对象
	 * @param $database : 数据库名称
	 * @param $sql : sql语句
	 * @param $result : 查询数据库后返回的对象
	 */


	function __construct( $hostname , $username , $password , $dbname){
	
		@$this->db = new mysqli( $hostname , $username , $password , $dbname );
		if( !$this->db ){
			throw new Exception("不能链接到数据库！\n");
		}
		$this->db->query("set names 'utf-8'");

	}


	function __destruct( ){
		
		$this->db->close();

	}


	/**
	 * function select() 对数库进行select查询
	 * @param $slectcontent 要查询的内容
	 * @param $condition 要查询的条件(包括表名)
	 */

	public function select( $slectcontent ,  $condition ){
	
		$this->sql = "select $slectcontent from $condition";
		$this->result = $this->db->query( $this->sql );
		if( !$this->result ){
			throw new Exception("检索数据失败！\n");
		}

		return $this->result;
	}


	/**
	 * function insert( ) 对数库进行插入操作
	 * @param $tablename 表名
	 * @param $inserts  数组类型的变量 代表所要插入的字段名称和字段值
	 * eg: $insert = array( 'first' => '1',
	 *						'second' => '2',
	 *						'third' => '3'
	 *					);
	 */

	public function insert( $tablename , $inserts ){

		$values = array_map('mysql_real_escape_string', array_values($inserts));
		$keys = array_keys($inserts);		        
		$this->sql = "insert into $tablename ( ".implode(',' , $keys) .") values ('". implode( '\',\'' , $values) . "')";
		$this->result = $this->db->query( $this->sql );
		print $this->sql."\n";
		if( !$this->result ){
			throw new Exception("插入数据失败！\n");
		}

	}


	/**
	 * function delete() 对数库进行删除操作
	 * @param $tablename 表名
	 * @param $where 要查询的条件
	 */

	public function delete( $tablename , $where ){
	
		$this->sql = "delete from $tablename where $where";
		$this->result = $this->db->query( $this->sql );
		if( !$this->result ){
			throw new Exception("删除数据失败！\n");
		}
		
	}


	/**
	 * function update() 对数库进行数据修改操作
	 * @param $tablename 表名
	 * @param $set	设置修改字段和修改值
	 * @param $where 设置修改条件
	 */

	public function update( $tablename , $set , $where ){
	
		$this->sql = "update $tablename set $set where $where";
		$this->result = $this->db->query( $this->sql );
		if( !$this->result ){
			throw new Exception("修改数据失败!\n");
		}

	}

}

/*
	//应用
	try{
		$test = new DataAcess('localhost', 'root', 'zhangyun', 'test');
		$test->delete( "test" , "id = 8");
		$test->update( "test" , "name = 'modify5'" , "id = 5");
		$test->insert( "test" , array( 
					'id' => 0,
					'name' => 'test0',
					));
		$select = $test->select( '*' , "test");
	}catch( Exception $e ){
		print $e->getMessage();
	}
*/
?>