<div style="margin-left: 300px;">
	<form action="edit_list_music.php?id=<?php echo $id; ?>" method="post">	
		<h2 style="color: #FF9999; margin-left: 100px;">Sửa thông tin bài hát</h2>		
			<div>
				<input style="height: 30px; width: 500px; color: #009900;" type="text" name="song" placeholder="Tên bài hát" value="<?php echo $row['song']; ?>" required>
				<div style="color: #A020F0;">Tên bài hát</div>
			</div>
			<div>
				<input style="height: 30px; width: 500px; color: #00CC99;" type="text" name="singer" placeholder="Tên ca sĩ" value="<?php echo $row['singer']; ?>" required>
				<div style="color: #A020F0;">Tên ca sĩ</div>
			</div>
			<div>
				<input style="height: 30px; width: 500px; color: #00CC66;" type="text" name="musician" placeholder="Tên nhạc sĩ" value="<?php echo $row['musician']; ?>" required>
				<div style="color: #A020F0;">Tên nhạc sĩ</div>
			</div>
			<div>
				<input style="height: 30px; width: 500px; color: #33CC00;" type="text" name="country" placeholder="Quốc gia" value="<?php echo $row['country']; ?>" required>
				<div style="color: #A020F0;">Quốc gia</div>
			</div>
			<div>
				<input style="height: 30px; width: 500px; color: #009933;" type="text" name="style" placeholder="Thể loại" value="<?php echo $row['style']; ?>" required>
				<div style="color: #A020F0;">Thể loại</div>
			</div>
			<div>
				<input style="height: 30px; width: 500px; color: #33CC33;" type="text" name="new" placeholder="Bài hát mới" value="<?php echo $row['new']; ?>" required>
				<div style="color: #A020F0;">Bài hát mới(1='bài hát mới', 0='bài hát cũ')</div>
			</div>	
			<div>
				<input style="height: 30px; width: 500px; color: #00FF00;" type="text" name="best" placeholder="Những bài hát hay nhất" value="<?php echo $row['best']; ?>" required>
				<div style="color: #A020F0;">(2='bài hát hay nhất', 1='những bài hát hay nhất')</div>
			</div>
			<div>
				<input style="height: 30px; width: 500px; color: #008800;" type="text" name="topten" placeholder="Top 10" value="<?php echo $row['topten']; ?>" required>
				<div style="color: #A020F0;">Bảng xếp hạng (Đánh số từ 1->10)</div>
			</div>
		<button style="height: 30px; color: #FF6600; margin-left: 200px;" type="submit" name="ok">Đồng ý sửa</button>
	</form>
</div>