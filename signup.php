

    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ANASAYFA</title>

        <style type="text/css">
            body {margin: 0; padding: 0;}
            #kayit_formu {padding: 10px; width: 500px; margin: 50px auto; background: #ddd; border-radius: 5px;}
            input {padding: 5px;border:1px solid #ccc; border-radius: 3px;}
            #button {background-color: red; cursor: pointer;}

        </style>

       
    </head>

    <body>

    <a href="home.php"> ANA SAYFA </a>

    <div id="kayit_formu">

    
    <form action="?" method="POST">
        
        <table>
            
        <tr>
            <td> Kullanıcı Adı: </td>  <td> <input type="text" name="name"> </td>
        </tr>

        <tr>
            <td>Şifre:</td> <td> <input type="password" name="password"> </td>
        </tr>

        <tr>
            <td>Mail Adresi:</td> <td><input type="text" name="mail"></td>
        </tr>

        <tr>
            <td></td> <td><input type="submit" id="button" value ="Kayıt Ol"></td>
        </tr>

        </table>

    </form>






    <?php

         if($_POST){

                $name = $_POST['name'];
                $password = $_POST['password'];
                $mail =$_POST['mail'];
                

               if($name == "" || $password =="" || $mail =="" )
               {
                    echo "Lütfen boş alan bırakmayınız";
               }
               else{
                 error_reporting(0); 
                 $baglan=@mysql_connect("localhost","root");
                     mysql_select_db("film" ,$baglan) or die ("bağlanamadı");
                      
                    $kayit = mysql_query("INSERT INTO user (name,password,mail) VALUES ('$name','$password','$mail')");

                    if($kayit){
                        echo "Kayıt Başarılı";
                    }
                    else{
                        echo "Bir Hata Oluştu";
                    }
                    
                   }
         }

    ?>


       </div>
    </body>

    </html>