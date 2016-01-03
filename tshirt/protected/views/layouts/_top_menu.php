<?php
$menuObjects = array(
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
);
function menuGen($menuObjects)
{
    if($menuObjects){
        foreach($menuObjects as $object){
            $class=$object['hassub']?'class="has-sub"':"";
            echo '<li '.$class.'><a href="/">'.$object['label'].'</a>';
            if($object['hassub']){
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
            <li><a href="/">Best Sellers</a></li>
            <li class="has-sub"><a href="http://fan2clip.com/">Sports</a>
                <ul>
                    <li class='has-sub'><a href='#'><span>Product 1</span></a>
                        <ul>
                            <li><a href='#'><span>Product 1 - 1</span></a></li>
                            <li class='last'><a href='#'><span>Product 1 - 2</span></a></li>
                            <li class='last'><a href='#'><span>Product 1 - 3</span></a></li>
                            <li class='last'><a href='#'><span>Product 1 - 4</span></a></li>
                            <li class='last'><a href='#'><span>Product 1 - 5</span></a></li>
                            <li class='last'><a href='#'><span>Product 1 - 6</span></a></li>
                            <li class='last'><a href='#'><span>Product 1 - 7</span></a></li>
                            <li class='last'><a href='#'><span>Product 1 - 8</span></a></li>
                            <li class='last'><a href='#'><span>Product 1 - 9</span></a></li>
                            <li class='last'><a href='#'><span>Product 1 - 10</span></a></li>
                        </ul>
                    </li>
                    <li><a href='#'><span>Product 2</span></a></li>
                    <li><a href='#'><span>Product 3</span></a></li>
                    <li><a href='#'><span>Product 4</span></a></li>
                </ul>
            </li>
            <li><a href="http://fan2clip.com/">Jobs</a></li>
            <li><a href="http://fan2clip.com/">Life Style</a></li>
            <li><a href="http://fan2clip.com/">Political</a></li>
            <li><a href="http://fan2clip.com/">Gamer</a></li>
            <li><a href="http://fan2clip.com/">Hobby</a></li>
            <li><a href="http://fan2clip.com/">Pets</a></li>
        </ul>
    </div>
</div>