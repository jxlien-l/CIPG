<?php
$one_sn = false;
$one_email = false;
$one_phone = false;
foreach($contacts as $item)
{
    if($item['Type'] == 1 || 
        $item['Type'] == 2 ||
        $item['Type'] == 3 ||
        $item['Type'] == 6 ||
        $item['Type'] == 7)
    {
        $one_sn = true;
    }
    if($item['Type'] == 4)
    {
        $one_email = true;
    }
    if($item['Type'] == 5)
    {
        $one_phone = true;
    } 
} ?>
<section class="contact-section bg-black" style="margin-top:20px" id="contact">
    <div class="container">
        <div class="row">
            <?php if($one_sn): ?>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-at text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Réseaux sociaux</h4>
                        <hr class="my-4" />
                        <?php foreach($contacts as $item): ?>
                            <div class="small text-black-50">
                                <?php switch ($item['Type']) {
                                    case '1': ?>
                                        <i class="fab fa-linkedin-in"></i>
                                <?php break;
                                    case '2': ?>
                                        <i class="fab fa-twitter"></i>
                                <?php break;
                                    case '3': ?>
                                        <i class="fab fa-facebook-f"></i>
                                <?php break;
                                    case '6': ?>
                                        <i class="fab fa-snapchat-ghost"></i>
                                <?php break;
                                    case '7': ?>
                                        <i class="fab fa-artstation"></i>
                                <?php break;
                                    case '8': ?>
                                        <i class="fab fa-instagram"></i>
                                <?php break;
                                    }
                                
                                $is_sn = true;
                                if($item['Type'] == 4 || $item['Type'] == 5)
                                {
                                    $is_sn = false;
                                }
                                
                                if($is_sn)
                                {
                                    if($item['Alias'] !== null): ?>
                                        <a href="<?= $item['Value']; ?>" target="blank"><?= $item['Alias']; ?></a>
                                    <?php else: ?><a href="<?= $item['Value']; ?>" target="blank"><?= $item['Value']; ?></a><?php endif;
                                    if(!empty($item['Note']))
                                    {
                                        echo $item['Note'];
                                    } 
                                }?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($one_email): ?>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Email</h4>
                        <hr class="my-4" />
                        <?php foreach($contacts as $item){
                            switch ($item['Type']) {
                                case '4': ?>
                                    <div class="small text-black-50">
                                        <?php echo $item['Value'];
                                        if(!empty($item['Note']))
                                        {
                                            echo '('.$item['Note'].')';
                                        } ?>
                                    </div>
                                <?php break;
                                }
                            } ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($one_phone): ?>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-mobile-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Téléphone</h4>
                        <hr class="my-4" />
                        <?php foreach($contacts as $item){
                            switch ($item['Type']) {
                            case '5': ?>
                                <div class="small text-black-50">
                                <?php echo $item['Value'];
                                if(!empty($item['Note']))
                                {
                                    echo '('.$item['Note'].')';
                                } ?>
                                </div>
                            <?php break;
                            } 
                        } ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>