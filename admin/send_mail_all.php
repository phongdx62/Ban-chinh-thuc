<?php
    session_start();
    require("../models/m_user.php");
    if($_SESSION["level"] == 2)
    {
        require("templates/header.php");
        require("templates/js_sendmail.php");
            
        if(isset($_POST["ok"]))
        {
            $title = addslashes(stripslashes($_POST["title"]));
            $content = addslashes(stripslashes($_POST["content"]));

            if(isset($title) && isset($content))
            {
                $sql = "SELECT * FROM users";
                $user = new user();
                $user->query($sql);

                if($user->num_rows()<1)
                {
                    echo "<p style='color:red;'>Không tìm thấy email nào!</p>";
                }
                else
                {
                    while ($row=$user->fetch_assoc()) 
                    {
                        $email = htmlentities(trim(stripcslashes($row["email"])));
                        $username = htmlentities(trim(stripcslashes($row["username"])));
                        $new_title = htmlentities(trim($title));
                        $new_content = "Xin chào ! {$username}\n\n" .htmlentities(trim($content));
                        $from = "Từ : 58TH2 - Sky - TLU";

                        $send = mail($email, $new_title, $new_content, $from);        
                    } 
                    if( $send == true )
                    {
                        echo "<p style='color:blue;'>Gửi email thành công ... </p>";
                    }
                    else
                    {
                        echo "<p style='color:red;'>Không thể gửi email ...</p>";
                    }      
                }       
                $user->disconnect();            
            }
        } 
    }
    else
    {
        ob_start(); 
        header('Location: ../index.php');
        ob_end_flush(); 
    }
        
?>
        <div class="container">
            <div class="form-container">
                <form method="post" id="reused_form" enctype=&quot;multipart/form-user&quot;>
                   
<?php
    require("templates/label_sendmail.php");  
    require("templates/footer.php");
?>