<html>
<head>
<?php
include("ayar.php");
session_start();
if(!isset($_SESSION["login"])){
echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
header("Location:main.php");
}else{
echo "Admin sayfasina hosgeldiniz..<br>";
echo "<a href=logout.php>Çıkış Yap</a>";
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ADMİN PANEL</title>

        <style type="text/css">
            body {margin: 0; padding: 0; background-color: white;}
            #kayit_formu {padding: 10px; width: 500px; margin: 50px auto; background: #ddd; border-radius: 5px;}
            input {padding: 10px;border:1px solid #ccc; border-radius: 3px;}
            #button {background-color: #59adff; cursor: pointer;}
            #genel{margin-top: 50px;}
            #filmekle{background-color: #c3c3c3;
                        margin-left: 10px;
                        width: 450px;
                        height: 600px;}

        </style>

</head>

<body>
<div id="genel">
<center>
<div id="filmekle">

<center><h2>FİLM EKLE</h2></center>
 
    <form action="?" method="POST">
        <center>
        <table>
            
        <tr>
            <td> Kategori : </td>  

            <td> 
            <select name="kategori_id"/>
                <option value="1">1080P</option>
                <option value="2">3D FİLM</option>
                <option value="3">Aile </option>
                <option value="4">Aksiyon </option>
                <option value="5">Animasyon</option> 
                <option value="6">Belgesel</option>
                <option value="7">Bilim Kurgu</option>
                <option value="8">Biyografi</option>
                <option value="9">Dram</option>
                <option value="10">Fantastik</option> 
                <option value="11">Gençlik</option>
                <option value="12">Gerilim</option>
                <option value="13">Gizem</option>
                <option value="14">Hint</option>
                <option value="15">Macera</option> 
                <option value="16">Komedi</option>
                <option value="17">Korku</option>
                <option value="18">Romantik</option>
                <option value="19">Polisiye</option>
                <option value="20">Psikolojik</option> 
                <option value="21">Savaş</option>
                <option value="22">Tarihi</option>
            </td>
        </tr>
         <tr>
            <td> Tip : </td>  

            <td> 
            <select name="type_id"/>
                <option value="1">Film</option>
                <option value="2">Dizi</option>
            </td>
        </tr>
        <tr>
            <td>Film Adı:</td> <td> <input type="text" name="name"> </td>
        </tr>

        <tr>
            <td>Film Yılı:</td> <td><input type="text" name="year"></td>
        </tr>
         <tr>
            <td>IMDB:</td> <td><input type="text" name="imdb"></td>
        </tr>
        <tr>
            <td>Film Açıklaması:</td> <td><input type="text" name="desc"></td>
        </tr>

        <tr>
            <td>Film Resmi:</td> <td><input type="file" name="image"></td>
        </tr>

        <tr>
            <td>Film Süresi:</td> <td><input type="text" name="time"/></td>
        </tr>

        <tr>
            <td>Film Video:</td> <td><input type="text" name="trailer"/></td>
        </tr>
    
        <tr>
        </tr>
        <center>
        <tr>
            <td></td> <td><input type="submit" id="button" value ="Film Ekle"></td>
        </tr></center>

        </table>
        </center>

    </form>
</div>
</center>

    <?php

         if($_POST){

           

            $kategori_id = $_POST['kategori_id'];
            $type = $_POST['type_id'];
            $name =$_POST['name'];
            $year=$_POST['year'];
            $imdb =$_POST['imdb'];
            $desc=$_POST['desc'];
            $image=$_POST['image'];
            $time=$_POST['time'];
            $trailer=$_POST['trailer'];
            $a="images/";
            

           if($kategori_id == "" || $type =="" || $name =="" || $year =="" || $imdb =="" || $desc =="" || $image ==""  || $time =="" || $trailer ==""  )
           {
                echo "Lütfen boş alan bırakmayınız";
           }
           else{
             error_reporting(0); 
             $baglan=@mysql_connect("localhost","root");
                 mysql_select_db("film" ,$baglan) or die ("bağlanamadı");
                  
                $oyunkayit = mysql_query("INSERT INTO filmler (category_id,type,name,year,img,imdb,description,time,trailer) VALUES 
                    ('$kategori_id','$type','$name','$year','$a$image' , '$imdb' , '$desc' , '$time' , '$trailer')");

                if($oyunkayit){
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