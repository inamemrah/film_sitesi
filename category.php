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
        <div class="logo"><a href="home.php"><img src="logo.png"></a></div>
        <div class="navbar">
            <ul>
                <li>
                    <a href="#">Film</a>
                </li>
                <li>
                    <a href="#">Dizi</a>
                </li>
                <li>
                    <a href="#">Fragman</a>
                </li>
                <li>
                    <a href="#">Yapım Yılına Göre Filmler</a>
                </li>
                <form>
                    <li style="float:right">
                        <input type="submit" value="Ara">
                    </li>
                    <li style="float:right">
                        <input type="text" placeholder="Film adı giriniz">
                    </li>
                </form>
            </ul>
        </div>
    </div>
    <div class="middle">
        <div class="content">
            <div class="panel">
                <div class="head">
                    <ul>
                        <li>
                            <a href="#">Yeni Eklenen Filmler</a>
                        </li>
                        <li>
                            <a href="#">Imdb +7 Filmler</a>
                        </li>
                        <li>
                            <a href="#">En Çok Yorumlananlar</a>
                        </li>
                        <li>
                            <a href="#">En Çok Beğenilenler</a>
                        </li>
                    </ul>
                </div>


                <div class="itemPanel">
                    <?php
                        $baglanti=@mysqli_connect("localhost","root","","film");
                        $filmler=mysqli_query( $baglanti,"select  * from filmler where category_id=".@$_GET['id']."");
                        while($film=mysqli_fetch_array($filmler))
                        {
                            echo '
                                <a href="film.php?id='.$film['id'].'">
                                    <div class="item">
                                        <img src="'.$film['img'].'" class="itemImg">
                                        <div class="itemText">
                                            <p>'.$film['name'].'</p>
                                            <a href="film.php">
                                                <p>'.$film['description'].'</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>

                            ';
                        }
                    ?>
                </div>
                <div class="pages">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a class="active" href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
            <div class="panel">
                <div class="head">
                    <ul>
                        <li>
                            <a href="#">Son Eklenen Yabancı Diziler</a>
                        </li>
                    </ul>
                </div>
                <div class="itemPanel">
                     <?php
                        $baglanti=@mysqli_connect("localhost","root","","film");
                        $filmler=mysqli_query( $baglanti,"select  * from filmler where category_id=".@$_GET['id']."");
                        while($film=mysqli_fetch_array($filmler))
                        {
                            echo '
                                <a href="film.php?id='.$film['id'].'">
                                    <div class="item">
                                        <img src="'.$film['img'].'" class="itemImg">
                                        <div class="itemText">
                                            <p>'.$film['name'].'</p>
                                            <a href="film.php">
                                                <p>'.$film['description'].'</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>

                            ';
                        }
                    ?>
                </div>
                <div class="pages">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a class="active" href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">&raquo;</a>
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
                                    <a href="category.php?id='.$cat['id'].'">'.$cat['c_name'].'</a>
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
                                    <a href="category.php?id='.$cat['id'].'">'.$cat['c_name'].'</a>
                                </li>
                            ';
                        }
                    ?>
                </ul>
            </div>
            <div class="item">
                <div class="head">item list</div>
                <ul>
                    <li>
                        <a href="#">item</a>
                    </li>
                    <li>
                        <a href="#">item</a>
                    </li>
                    <li>
                        <a href="#">item</a>
                    </li>
                    <li>
                        <a href="#">item</a>
                    </li>
                </ul>
            </div>
        </div>
        <footer class="footer">Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının
            bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri
            standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda
            pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının
            yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları
            ile popüler olmuştur.
        </footer>
    </div>
</body>

</html>