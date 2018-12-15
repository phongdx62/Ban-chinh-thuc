<?php
    session_start();
    require("../models/m_user.php");
    if($_SESSION["level"] == 1)
    {
        require("templates/header.php");
        require("templates/js_sendmail.php");
        
        $userid = addslashes(stripslashes($_GET["userid"]));

        $sql = "SELECT * FROM users WHERE userid = $userid";
        $user = new user();
        $user->query($sql);
        $row = $user->fetch_assoc();

        if(isset($_POST["ok"]))
        {
            $title = addslashes(stripslashes($_POST["title"]));
            $content = addslashes(stripslashes($_POST["content"]));
                
            if(isset($title) && isset($content))
            {
                if($user->num_rows()<1)
                {
                     echo "<p style='color:red;'>Không tìm thấy email nào!</p>";
                }
                else
                {                  
                    //Hàm htmlentities() sẽ chuyển các kí tự thích hợp thành các kí tự HTML entiies.
                    //Kí thự HTML entiies là các kí tự dùng để hiển thị các biểu tượng, kí tự trong HTML. Ví dụ muốn hiển thị 5 dấu cách, nếu bạn chỉ sử dụng dấu cách bình thường trình duyệt sẽ loại bỏ 4 dấu và chỉ dữ lại 1 dấu cách, muốn hiển thị tất cả bạn sẽ phải sử dụng HTML entiies.
                    //Hàm trim() sẽ loại bỏ khoẳng trắng( hoặc bất kì kí tự nào được cung cấp) dư thừa ở đầu và cuối chuỗi.
                    //Hàm stripslashes() sẽ loại bỏ các dấu backslashes ( \ ) có trong chuỗi. ( \ ' sẽ trở thành ' , \\ sẽ trở thành \).
                    //Hàm trả về chuỗi với các kí tự backslashes đã bị loại bỏ.
                    $email = htmlentities(trim(stripcslashes($row["email"])));
                    $username = htmlentities(trim(stripcslashes($row["username"])));
                    $new_tiltel = htmlentities(trim($title));
                    $new_content = "Xin chào ! {$username}\n\n" .htmlentities(trim($content));
                    $from = "Từ : 58TH2 - Sky - TLU";

                    $send = mail($email, $new_tiltel, $new_content, $from);        
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
                <form action="send_mail.php?userid=<?php echo $userid; ?>" method="post">
                    <label for="email">Địa chỉ email:</label>
                    <input id="email" type="email" name="email" value="<?php echo $row['email']; ?>" required>
                    
<?php  
    $user->disconnect();
    require("templates/label_sendmail.php");
    require("templates/footer.php");
?>