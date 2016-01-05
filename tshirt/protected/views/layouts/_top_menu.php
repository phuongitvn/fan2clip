<?php
/*$menuObjects = array(
    array(
        'label'=>'Best Sellers',
        'code'=>'best-sellers',
        'hassub'=>false,
        'subs'=>array()
    ),
    array(
        'label'=>'Sports',
        'code'=>'sports',
        'hassub'=>true,
        'subs'=>array(
            array(
                'label'=>'Baseball',
                'code'=>'baseball',
                'hassub'=>false,
                'subs'=>array()
            ),
            array(
                'label'=>'Football',
                'code'=>'football',
                'hassub'=>false,
                'subs'=>array()
            ),
            array(
                'label'=>'Basketball',
                'code'=>'basketball',
                'hassub'=>false,
                'subs'=>array()
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
                echo '<li class="lead-subs"><a href="/">'.$object['label'].'</a>';
                menuGen($object['subs']);
                echo '</ul>';
            }else{
                echo '</li>';
            }
        }
    }
}
?>
<!--<div id="menu">
    <div id="cssmenu" class="wr-menu">
        <ul>
            <li><a href="/" <?php /*if($controller=='site' && $action=='index'){*/?>class="active"<?php /*}*/?>>Home</a></li>
            <?php
/*            menuGen($menuObjects);
            */?>
        </ul>
    </div>
</div>-->
<nav id="mysidebarmenu" class="amazonmenu">
    <h3><i class="fa fa-navicon"></i>CATEGORIES</h3>
    <ul>
        <?php
            menuGen($menuObjects);
        ?>
        <!--<li><a href="#">Item 1</a></li>
        <li><a href="#">Folder 0</a>
            <div>
                <p>Browse our spring collection of useful webmaster tools and resources! Everything from JavaScript, CSS to PHP are covered!</p>

                <ul>
                    <li><a href="#">JavaScript Kit</a></li>
                    <li><a href="#">CSS Drive</a></li>
                    <li><a href="#">CSS Library</a>
                    <li><a href="#">PHP For the Absolute Beginner</a></li>
                </ul>
            </div>
        </li>
        <li><a href="#">Folder 1</a>
            <ul>
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a>
                    <ul>
                        <li>Sub Item 1.3.1</li>
                        <li>Sub Item 1.3.2</li>
                        <li>Sub Item 1.3.3</li>
                    </ul>
                </li>
                <li><a href="#">Sub Item 1.4</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
                <li><a href="#">Sub Item 1.4</a></li>
            </ul>
        </li>
        <li><a href="#">Item 3</a></li>
        <li><a href="#">Folder 2</a>
            <ul>
                <li><a href="#">Sub Item 2.1</a></li>
                <li><a href="#">Sub Item 2.1</a></li>
                <li><a href="#">Sub Item 2.1</a></li>
                <li><a href="#">Sub Item 2.1</a></li>
                <li><a href="#">Sub Item 2.1</a></li>
                <li><a href="#">Sub Item 2.1</a></li>
            </ul>
        </li>
        <li><a href="#">Item 4</a></li>-->
    </ul>
</nav>