<?php  
	echo"<tr>";
		echo"<td>$stt</td>";
		echo"<td>$row[fname]</td>";
		echo"<td>$row[lname]</td>";
		echo"<td>$row[username]</td>";
		echo"<td>$row[email]</td>";						
		if($row['level'] == 1)
		{
			echo "<td>VIP</td>";
		}
		else if($row['level'] == 0)
		{
			echo "<td>Thành viên</td>";
		}
		else
		{
			echo "<td>Admin</td>";
		}
		echo"<td><a href='send_mail.php?userid=$row[userid]' style='color:blue;'>Gửi</a></td>";
		echo"<td><a href='del_list_user.php?userid=$row[userid]' onclick='return show_confirm()' style='color:red;'>Xóa</a></td>";						
		echo"</tr>";
		//href='del_list_user.php?id=$row[matv]' matv sẽ được chuyển theo đường dẫn
?>