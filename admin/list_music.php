<?php 
    session_start();
    require("../public/library/database.php");
    if($_SESSION["level"] == 1)
    {
        require("templates/header.php");
        echo"<form action='../admin/list_music.php'>";
        require("templates/search_ad.php");
        
        if (isset($_REQUEST['ok'])) 
        {
            $key = addslashes(stripslashes($_GET['key']));
 
            if (empty($key)) {
                echo "<p style= 'color:red;'>* Dữ liệu tìm kiếm không được để trống</p>";
            } 
            else
            {
                $data = new database();
                $sql = "SELECT * FROM music WHERE song LIKE '%$key%' OR singer LIKE '%$key%' OR musician LIKE '%$key%' OR country LIKE '%$key%' OR style LIKE '%$key%' ";
 
                
                $data->query($sql);
                $num = $data->num_rows();
                if ($num > 0 && $key != "") 
                {
                    echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                    echo '<table border="1" cellspacing="0" cellpadding="10">'; 
                    require("templates/table_music.php");
                                     
                    while ($data->fetch_assoc()) 
                    {
                        require("templates/show_music.php");
                    }                   
                } 
                else 
                {
                    echo"<p style='color:red;'>* Không tìm thấy kết quả!;</p>";
                }
                
                $data->disconnect();
            }
                echo"</table>";
            echo"</div>";
        }
        else
        {
            echo"<div style='height: 40px;'>";
                echo"<a style='color: #FF33FF;' href='add_list_music.php'>Thêm bài hát</a>";
            echo"</div>";
            require("templates/table_music.php");
            $data = new database();
            $sql = "SELECT * FROM music";
            
            $data->query($sql);

            while ($row = $data->fetch_assoc()) 
            {
                require("templates/show_music.php");
            }           

            $data->disconnect();

                echo"</table>";
            echo"</div>";   
        }
    require("templates/footer.php");   
    }
    else
    {
        ob_start(); 
        header('Location: ../index.php');
        ob_end_flush(); 
    }    
?>