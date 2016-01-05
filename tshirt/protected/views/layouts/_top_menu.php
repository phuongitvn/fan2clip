<?php
/*$menuObjects = array(
    array(
        'label'=>'Best Sellers',
        'code'=>'best-sellers',
        'hassub'=>false
    ),
    array(
        'label'=>'Sports',
        'code'=>'sports',
        'hassub'=>true,
        'subs'=>array(
            array(
                'label'=>'Baseball',
                'code'=>'baseball',
                'hassub'=>false
            ),
            array(
                'label'=>'Football',
                'code'=>'football',
                'hassub'=>false
            ),
            array(
                'label'=>'Basketball',
                'code'=>'basketball',
                'hassub'=>false
            )
        )
    )
);*/
$menuObjects = WebCategoryModel::model()->getCategory();
function menuGen($menuObjects)
{
    if($menuObjects){
        foreach($menuObjects as $object){
            $hasSubs = count($object['subs'])>0?true:false;
            $class=$hasSubs?'class="has-sub"':"";
            echo '<li '.$class.'><a href="/">'.$object['label'].'</a>';
            if($hasSubs){
                echo '<ul>';
                menuGen($object['subs']);
                echo '</ul>';
            }else{
                echo '</li>';
            }
        }
    }
}
?>
<div id="menu">
    <div id="cssmenu" class="wr-menu">
        <ul>
            <li><a href="/" <?php if($controller=='site' && $action=='index'){?>class="active"<?php }?>>Home</a></li>
            <?php
            menuGen($menuObjects);
            ?>
        </ul>
    </div>
</div>