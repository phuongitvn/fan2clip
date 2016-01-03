<?php
if($data){
    echo '<ul class="prod-list-view row">';
    foreach($data as $item){
        $link = CHtml::encode($item->url);
        ?>
        <li class="prod-item col-md-3">
            <div class="prod-container">
                <div class="prod-image">
                    <a target="_blank" href="<?php $link;?>" title="<?php echo CHtml::encode($item->name)?>">
                        <img width="100%" src="<?php echo CHtml::encode($item->thumb)?>" />
                    </a>
                    <div class="prod-price"><span class="label">Price:</span> <span>$26.00</span></div>
                </div>
                <div class="prod-title">
                    <h3 class="over-text"><a target="_blank" href="<?php echo $link;?>" title="<?php echo CHtml::encode($item->name)?>"><?php echo CHtml::encode($item->name)?></a></h3>
                </div>
                <div class="prod-control">
                    <a class="checkout" target="_blank" href="<?php echo $link;?>">Buy it now!</a>
                </div>
                <span class="sale_gbr"></span>
            </div>
        </li>
<?php
    }
    echo '</ul>';
}