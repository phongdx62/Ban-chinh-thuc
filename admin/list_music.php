<?php 
    session_start();
    if($_SESSION["level"] == 2)
    {
        include("../models/m_music.php");
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
                $music = new music();
                $music->m_search_music($key);
                $music->disconnect();
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
        
            $sql = "SELECT id, song, singer, musician, country, style, new, best, topten FROM music";
            $music = new music();
            $music->query($sql);

            while ($row = $music->fetch_assoc()) 
            {
                require("templates/show_music.php");
            }           

            $music->disconnect();

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