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
                </ul>
            </div>
        </div>
        <div class="logo">
            <a href="home.php?page=1">
                <img src="logo.png">
            </a>
        </div>
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
                        <input type="text" placeholder="Film adı giriniz">
                    </li>
                </form>
            </ul>
        </div>
    </div>
    <div class="middle">
        <div class="content">
            <div class="panel">
                <?php
                    $idd=@$_GET['id'];
                          
                    $baglanti=@mysqli_connect("localhost","root","","film");
                    $cek=mysqli_query( $baglanti,"select * from filmler where id=".@$_GET['film_id']." ");
                    while($yaz=mysqli_fetch_array($cek))
                    {
                        echo'  
                
                            <div class="fragman">
                                <iframe width="100%" height="500" src="'.$yaz["trailer"].'" frameborder="0" allow="autoplay; encrypted-media"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="detail">
                                <div>
                                    <p>Film Bilgileri<label>'.$yaz["time"].'</label></p>
                                </div>
                                <div class="detailContent">
                                    <div>
                                        <img src="'.$yaz["img"].'">
                                    </div>
                                    <div>
                                        <div>
                                            <p>'.$yaz["name"].'</p>
                                        </div>
                                        <div>
                                            <p>FİLM AÇIKLAMASI: '.$yaz["description"].'</p>
                                           
                                        </div>
                                        <div>
                                            <p>YIL: '.$yaz["year"].'</p>
                                        </div>
                                        <div>
                                            <p>TÜR: '.$yaz["type"].'</p>
                                        </div>
                                        <div>
                                            <p>IMDB: '.$yaz["imdb"].'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>
            <div class="panel">
                <?php 
                    if(isset($_SESSION["login"])){
                        echo '  

                            <form action="comment.php" method="POST">
                              <div class="commentInputs">
                                    <textarea placeholder="Yorum Yap" name="comment"></textarea>
                                    <input type="hidden" name="film_id" value="'.@$_GET['film_id'].'">
                                    <input type="submit"  value="Yorum Yap">
                                </div>     
                            </form>
                        ';

                    if(isset($_GET["y_eklendi"]))
                    {
                        echo"yorum yapıldı";
                    }

                    }

                    else{

                        echo"<center><h3> Lütfen Giriş Yapınız</h3></center>";
                    }



                ?>

                <div class="commentsList">
                    <ul>
                    <?php
                        $baglanti=@mysqli_connect("localhost","root","","film");
                        $comments=mysqli_query( $baglanti,"select comment.id,user.name,comment.comment from comment inner join user ON comment.user_id = user.id where film_id=".@$_GET['film_id']." and comment_id=0");
                        while($comment=mysqli_fetch_array($comments))
                        {
                            $comments2=mysqli_query( $baglanti,"select comment.id,user.name,comment.comment from comment inner join user ON comment.user_id = user.id where film_id=".@$_GET['film_id']." and comment_id=".$comment["id"]);

                            if(isset($_SESSION["login"])){
                            echo '
                            <li>
                                <input type="hidden" value="'.$comment["id"].'">
                                <p><label>Kullanıcı Adı:</label><label>'.$comment["name"].'</label></p>
                                <p><label>Yorum:</label><label>'.$comment["comment"].'</label></p>
                                <input type="button" value="Yanıtla" onclick="ReplyComment(event)"/>
                            ';
                            }
                            while($comment2=mysqli_fetch_array($comments2)){
                                echo '<ol>
                                    <p><label>Kullanıcı Adı:</label><label>'.$comment2["name"].'</label></p>
                                    <p><label>Yorum:</label><label>'.$comment2["comment"].'</label></p>
                                </ol>';
                            }
                            echo '</li>';
                        }
                    ?>
                    
                    </ul>
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
        </div>
        <footer class="footer">hd film cehennemi 5651 sayılı kanuna göre içerik sağlayıcıdır. Sitemizdeki videolar üyelerimiz tarafından yüklenmektedir. Sitemizde yer alan videolardan herhangi bir telif hakkına ihlal ettiğini düşünüyorsanız, bize [email protected] adresinden gerekli yasal belgelerle müracaat etmeniz halinde 2 iş günü içerisinde söz konusu içerik kaldıralacaktır. | İf you think some videos is copyrighted, send us email and allow us 2 working days to delete the video. Copyright © 2011 — 2017 Film izle | Terms Of Use | Site Haritamız | İletişim | Film izle | Hd Film İzle | Yabancı Dizi İzle | 2017 Filmleri izle | Hd Film İzle - Film izle |
        </footer>
    </div>

    <script type="text/javascript" src="main.js"></script>
</body>

</html>