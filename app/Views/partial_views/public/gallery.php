<?php $models = array(); ?>
<section class="gallery bg-light" id="gallery-<?php if(isset($gallery['Id'])){echo $gallery['Id'];}else{echo '0';} ?>">
    <div class="container col-11">
        <div class="row"><h1 class="mt-5"><a href="<?= base_url() ?>/Home/Gallery/<?= $gallery['Id'] ?>"><?= $gallery['Title'] ?></a></h1></div>
        <div class="row" style="margin-top:10px">
            <?php if(empty($items)): ?>
                <div class="col-sm">Cette gallerie est vide.</div>
            <?php else:
                    $nb = 0;
                    foreach($items as $item):
                        if($item['IsFrontPage'] == '1'): ?>
                            <div class="responsive">
                                <div class="gallery">
                                <?php if(substr($item['Url'], -3) == 'OBJ'): array_push($models, $item); ?>
                                        <div id="viewer_<?= $item['Id']; ?>" class="stl_viewer"></div>
                                <?php else:
                                    if(substr($item['Url'], -3) == 'jpg' || substr($item['Url'], -3) == 'png'): ?>
                                        <span class="helper"></span>
                                        <img src="<?= $item['Url'] ?>">
                                    <?php endif; 
                                endif;?>
                                    <!-- <div class="desc">Add a description of the image here</div> -->
                                </div>
                            </div>
                    <?php $nb++;
                        endif;
                    endforeach;
                endif; ?>
        </div>
    </div>
</section>
<script>
    <?php foreach($models as $model): ?>
		var viewer_<?= $model['Id']; ?> = new StlViewer
		(
			document.getElementById("viewer_<?= $model['Id']; ?>"),
			{
				models:
				[
                    {filename:"<?= $model['Url']; ?>", animation:{delta:{rotationx:1, rotationy:1, rotationz:1, msec:2000, loop:true}}}
                ],
                bgcolor:  "#141414"
			}
        );
        viewer_<?= $model['Id']; ?>.set_auto_resize();
        viewer_<?= $model['Id']; ?>.set_scale(1, 2);
    <?php endforeach; ?>
</script>