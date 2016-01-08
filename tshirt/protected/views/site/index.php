<?php $this->widget('application.widgets.ItemsListView.ItemsListViewWidget', array('data'=>$data));?>
<?php if($data):?>
<div class="loadmore">
    <a class="btn btn-blue" href="<?php echo Yii::app()->createUrl('/site/index', array('page'=>$page+1))?>">Load More</a>
</div>
    <?php endif;?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'bottom')); ?>
<div id="feature">
    <div class="wrr-feature container">
        <div class="row">
            <div class="col-md-4">
                <div class="wrr-col">
                    <a href="#"><i class="fa fa-truck"></i></a>
                    <h3>Worldwide Delivery</h3>
                    <p>We ship to over 200 countries & regions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wrr-col">
                    <a href="#"><i class="fa fa-credit-card"></i></a>
                    <h3>Safe Payment</h3>
                    <p>Pay with the world’s most popular and secure payment methods.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wrr-col">
                    <a href="#"><i class="fa fa-users"></i></a>
                    <h3>24/7 Help Center</h3>
                    <p>Round-the-clock assistance for a smooth shopping experience.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget();?>