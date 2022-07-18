<?php include 'inc/header.php';
$icerikler = $db->query("SELECT * FROM icerikler", PDO::FETCH_ASSOC);
?>
<section class="banner" id="top" style="background-image: url(/assets/img/dunya-haritasi.webp);">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="banner-caption">
                    <div class="line-dec"></div>
                    <h2> Hoşgeldiniz.</h2>
                   
                </div>
            </div>
        </div>
    </div>
</section>

<main>
 

    <section class="featured-places">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <span>İçerikler</span>
                        <h2>Son İçerikler</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if ( $icerikler->rowCount() ){
                    foreach( $icerikler as $key => $icerik ){  ?>
                        <div class="col-sm-4 col-xs-12">
                            <div class="featured-item">
                                <div class="thumb">
                                    <div class="thumb-img">
                                        <img src="admin/covers/<?php echo $icerik['cover'] ?>" alt="">
                                    </div>

                                    <div class="overlay-content">
                                        <strong title="Yazar"><i class="fa fa-user"></i> <?php echo $icerik['author'] ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>

                                <div class="down-content">
                                    <h4><?php echo $icerik['title'] ?></h4>

                                    <p>
                                        <?php $uzunluk = strlen($icerik['content']);
                                        echo mb_substr($icerik['content'],0,150, "UTF-8");
                                        if($uzunluk >150){ echo '...' ;}
                                        ?>
                                    </p>
                                    <div class="text-button">
                                        <a href="icerik_detay.php?slug=<?php echo $icerik['slug'] ?>">Devamı</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if($key ==2){
                            break;
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>

 
</main>

<?php include 'inc/footer.php'; ?>