<?php  
	echo"<tr>";
		echo"<td>$row[id]</td>";
		echo"<td>$row[song]</td>";
		echo"<td>$row[singer]</td>";
		echo"<td>$row[musician]</td>";
		echo"<td>$row[country]</td>";
		echo"<td>$row[style]</td>";
		echo"<td>$row[new]</td>";	
		echo"<td>$row[best]</td>";
		echo"<td>$row[topten]</td>";					
		echo"<td><a href='edit_list_music.php?id=$row[id]' style='color:blue;'>Sửa</a></td>";	
		echo"<td><a href='del_list_music.php?id=$row[id]' onclick='return show_confirm()' style='color:red;'>Xóa</a></td>";						
	echo"</tr>";
?>