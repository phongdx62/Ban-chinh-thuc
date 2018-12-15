<?php  
	include('../public/library/database.php');
	class user extends database
	{
		protected $userID;
		protected $firstName;
		protected $lastName;
		protected $userEmail;
		protected $userName;
		protected $userPass;	
		protected $userLevel;

		public function __construct()
		{
			$this->connect();
		}

		public function set_fname($fname)
		{
			$this->firstName = $fname;
		}

		public function get_fname()
		{
			return $this->firstName;
		}

		public function set_lname($lname)
		{
			$this->lastName = $lname;
		}

		public function get_lname()
		{
			return $this->lastName;
		}

		public function set_email($email)
		{
			$this->userEmail = $email;
		}

		public function get_email()
		{
			return $this->userEmail;
		}

		public function set_name($name)
		{
			$this->userName = $name;
		}

		public function get_name()
		{
			return $this->userName;
		}

		public function set_pass($pass)
		{
			$this->userPass = $pass;
		}

		public function get_pass()
		{
			return $this->userPass;
		}

		public function set_level($level)
		{
			$this->userLevel = $level;
		}

		public function get_level()
		{
			return $this->userLevel;
		}

		public function m_login()
		{
			$sql = "SELECT username, password, level FROM users WHERE username = '$this->userName' AND password = '$this->userPass' ";
			$this->query($sql);
			if($this->num_rows()==1)
			{
				$row = $this->fetch_assoc();
				$_SESSION['name'] = $this->userName;
				$_SESSION['level'] = $row['level'];
				return 'ok';
			}
			else
			{
				return 'fail';
			}
		}

		public function m_register()
		{
			$sql = "SELECT userid FROM users WHERE username = '$this->userName' ";
			$this->query($sql);
			if($this->num_rows()==0)
			{
				$sql = "INSERT INTO users(
			    				fname,
			    				lname,			   		
			    				email,
			    				username,
			    				password) VALUES 
			    				('$this->firstName',
			    				'$this->lastName',
			    				'$this->userEmail',
			    				'$this->userName',
								'$this->userPass')";
				$this->query($sql);				
			}
			else
			{
				return 'fail';
			}
		}

		public function m_list_user()
		{
			$sql = "SELECT * FROM users WHERE level != 2";
			$this->query($sql);
			$stt=1;
			while($row = $this->fetch_assoc())
			{
				require("templates/show_user.php");
				$stt++;
			}
		}

		public function m_del_user($userid)
		{
			$sql = "DELETE FROM users WHERE userid = $userid";
			$this->query($sql);
		}

		public function m_search_user($key)
		{
			$sql = "SELECT * FROM users 
					WHERE fname LIKE '%$key%' OR lname LIKE '%$key%' OR username LIKE '%$key%' OR email LIKE '%$key%' AND level != 2";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "") 
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">'; 
                require("templates/table_user.php");
                $stt=1;
                while ($row = $this->fetch_assoc()) 
                {
                    require("templates/show_user.php");
                    $stt++;         
                }                   
            } 
            else 
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}
	}
?>