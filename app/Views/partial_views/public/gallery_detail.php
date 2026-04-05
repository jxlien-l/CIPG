<section class="gallery bg-dark" id="gallery-<?php if(isset($gallery['Id'])){echo $gallery['Id'];}else{echo '0';} ?>">
    <div class="container col-10">
        <div class="row"><h1 class="mt-5"><a href="<?= base_url(); ?>/Home">Accueil</a> | <?= $gallery['Title'] ?></h1></div>
        <div class="row" style="margin-top:10px;margin:auto;">
            <?php if(empty($items)): ?>
                <div class="col-sm">Cette gallerie est vide.</div>
            <?php else: ?>
                <?php foreach($items as $item): ?>
                        <img src="<?= $item['Url'] ?>" style="padding-top:15px;margin:auto">
                    <?php endforeach; ?>
                <?php endif; ?>
        </div>
    </div>
</section>
<style>
h1{
    /*font-size: 0.8rem;*/
    font-family: "Varela Round", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    text-transform: uppercase;
    letter-spacing: 0.15rem;
}
div.gallery img {
    width: 100%;
    /*height: 300px !important;*/
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    /*padding: 0 6px;*/
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
</style>