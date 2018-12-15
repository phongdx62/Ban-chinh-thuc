<?php
    session_start();
    if($_SESSION["level"] == 2)
    {
        include("../models/m_user.php");
        require("templates/header.php");
        echo"<form action='list_user.php'>";
        require("templates/search_ad.php");
        if (isset($_REQUEST['ok'])) 
        {
            $key = addslashes(stripslashes($_GET['key']));
 
            if (empty($key)) 
            {
                echo "<p style= 'color:red;'>* Dữ liệu tìm kiếm không được để trống</p>";
            } 
            else
            {
                $user = new user();
                $user->m_search_user($key);
                $user->disconnect();
            }
                echo"</table>";
            echo"</div>";   
        }
        else
        {
            echo"<div style='height: 40px;'>";
            echo"<a style='color: #FF33FF;' href='send_mail_all.php'>Gửi thư cho tất cả</a>";
            echo"</div>";
            require("templates/table_user.php");
            //Thực hiện truy vấn
            $sql = "SELECT * FROM users WHERE level !=2";
            $user = new user();
            $user->query($sql);

            $stt = 1;        
            while ($row = $user->fetch_assoc()) 
            {
                require("templates/show_user.php");
                $stt++;
            }           
                        
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