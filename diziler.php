<?php
    include ('db.php');
    session_start();
?>

<form action="login.php" method="POST">
<?php

    if(isset($_SESSION["login"])){

        echo'

            <table>
                
            <tr>
                <td><h3> Kullanıcı Adı: '. $_SESSION["name"].'</a></td>
            </tr>
            <tr>
                <td><a href="logout.php"><h3>Çıkış Yap</h3> </td>
            </tr>     

        </table>  ';

    }
    else{

        echo'

        <table>
            
            <tr>
                <td> Kullanıcı Adı: </td>  <td> <input type="text" name="name"> </td>
            </tr>

            <tr>
                <td>Şifre:</td> <td> <input type="password" name="password"> </td>
                 <td></td> <td><input type="submit" id="button" value ="Giriş Yap"></td>
            </tr>  

        </table>  ';
    }

?>
</form>

<html>

<head>
    <title>Home</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="header">
        <div class="top">
            <div class="navbarHeader">
                <ul>
                    <li>
                        <a href="#">Tavsiye Filmler</a>
                    </li>
                    <li>
                        <a href="#">Film İstekleri</a>
                    </li>
                    <li>
                        <a href="#">Yasal Bildirim</a>
                    </li>
                    <li>
                        <a href="#">İletişim</a>
                    </li>
                    <li>
                        <a href="signup.php">Üye OL</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="logo"><a href="home.php?page=1"><img src="logo.png"></a></div>
        <div class="navbar">
            <ul>
                <li>
                    <a href="filmler.php?page=1">Film</a>
                </li>
                <li>
                    <a href="diziler.php?page=1">Dizi</a>
                </li>
                <li>
                    <a href="#">Fragman</a>
                </li>
                <li>
                    <a href="#">Yapım Yılına Göre Filmler</a>
                </li>
                <form method="GET" action="home.php">
                    <li style="float:right">
                        <input type="submit" value="Ara">
                    </li>
                    <li style="float:right">
                        <input type="text" name="search" placeholder="Film adı giriniz">
                    </li>
                </form>
            </ul>
        </div>
    </div>
    <div class="middle">
        <div class="content">
            <div class="panel">
               


                <div class="itemPanel">
                    <?php
                        $baglanti=@mysqli_connect("localhost","root","","film");
                        $sql="select * from filmler where type=2";
                        $cek=mysqli_query($baglanti,$sql);
                        $num_rows = mysqli_num_rows($cek);
                        if(isset($_GET["page"]))
                            $page=($_GET["page"]-1)*12;
                        else
                            $page=0;
                        if(isset($_GET['search']))
                            $sql.=" where name LIKE '".$_GET['search']."%'";
                        else if(isset($_GET['category']))
                            $sql.=" left join category on filmler.category_id=category.id where category.c_name='".$_GET['category']."'";
                        else
                            $sql.=" limit 12 OFFSET ".$page;
                        $cek=mysqli_query($baglanti,$sql);
                        while($yaz=@mysqli_fetch_array($cek))
                        {
                            echo '
                                <a href="film.php?film_id='.$yaz['id'].'">
                                    <div class="item">
                                        <img src="'.$yaz['img'].'" class="itemImg" width="238" height="357">
                                        <div class="itemText">
                                            <p>'.$yaz['name'].'</p>
                                            <a href="film.php">
                                                <p>'.$yaz['description'].'</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>

                            ';
                        }
                    ?>
                </div>
                <div class="pages">
                    <?php 
                    if($_GET["page"]-1>=1)
                        echo "<a href='home.php?page=".($_GET["page"]-1)."'>&laquo;</a>";
                    else
                        echo "<a href='#'>&laquo;</a>";
                    $pages=$num_rows/12;
                    for($i=1;$i<=($pages+1);$i++)
                        echo "<a href='home.php?page=".$i."'>".$i."</a>";

                    if($_GET["page"]<=($pages))
                        echo "<a href='home.php?page=".($_GET["page"]+1)."'>&raquo;</a>";
                    else
                        echo "<a href='#'>&raquo;</a>";
                    ?>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="item">
                <div class="head">item list</div>
                <ul>
                     <?php
                        $baglanti=@mysqli_connect("localhost","root","","film");
                        $category=mysqli_query( $baglanti,"select  * from category");
                        while($cat=mysqli_fetch_array($category))
                        {
                            echo '
                                <li>
                                    <a href="home.php?category='.$cat['c_name'].'">'.$cat['c_name'].'</a>
                                </li>
                            ';
                        }
                    ?>
                    
                </ul>
            </div>
            <div class="item">
                <div class="head">item list</div>
                <ul>
                     <?php
                        $baglanti=@mysqli_connect("localhost","root","","film");
                        $category=mysqli_query( $baglanti,"select  * from category");
                        while($cat=mysqli_fetch_array($category))
                        {
                            echo '
                                <li>
                                    <a href="home.php?category='.$cat['c_name'].'">'.$cat['c_name'].'</a>
                                </li>
                            ';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <footer class="footer">hd film cehennemi 5651 sayılı kanuna göre içerik sağlayıcıdır. Sitemizdeki videolar üyelerimiz tarafından yüklenmektedir. Sitemizde yer alan videolardan herhangi bir telif hakkına ihlal ettiğini düşünüyorsanız, bize [email protected] adresinden gerekli yasal belgelerle müracaat etmeniz halinde 2 iş günü içerisinde söz konusu içerik kaldıralacaktır. | İf you think some videos is copyrighted, send us email and allow us 2 working days to delete the video. Copyright © 2011 — 2017 Film izle | Terms Of Use | Site Haritamız | İletişim | Film izle | Hd Film İzle | Yabancı Dizi İzle | 2017 Filmleri izle | Hd Film İzle - Film izle |
        </footer>
    </div>

<script type="text/javascript" src="main.js"></script>
</body>

</html>

