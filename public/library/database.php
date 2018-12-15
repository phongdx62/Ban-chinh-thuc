<?php  
	class database
	{
		protected $host = 'localhost';
		protected $name = 'root';
		protected $pass = '';
		protected $db = 'quan_ly_web_nhac_';

		protected $conn;
		protected $result;

		public function connect()
		{
			$this->conn = mysqli_connect($this->host, $this->name, $this->pass, $this->db) or die('không thể kết nối tới database');
			$this->conn->set_charset('utf8');
		}

		public function disconnect()
		{
			if($this->conn)
			{
				mysqli_close($this->conn);
			}
		}

		public function query($sql)
		{
			if($this->conn)
			{
				$this->free_query();
				$this->result = mysqli_query($this->conn, $sql);
			}
		}

		public function free_query()
		{
			if($this->result)
			{
				//giải phóng bộ nhớ của biến đã lưu kết quả truy vấn trước đó
				mysqli_free_result($this->result);
			}
		}

		public function num_rows()
		{
			if($this->result)
			{
				$num = mysqli_num_rows($this->result);
				return $num;
			}
		}

		public function fetch_assoc()
		{
			if($this->conn)
			{
				$row = mysqli_fetch_assoc($this->result);
				return $row;
			}
		}
	}
?>