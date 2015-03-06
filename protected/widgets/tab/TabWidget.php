<?php
class TabWidget extends CWidget
{
	public $title='';
	public $_wID = NULL;
	public function init()
	{
		parent::init();
	}
	public function run()
	{
		$widget = WidgetsModel::model()->findByPk($this->_wID);
		$title = $widget->title;
		$data = @unserialize($widget->params);
		$this->render('default', compact('data','title'));
	}
	public static function buildParams($params="")
	{
		$data = @unserialize($params);
		//echo '<pre>';print_r($data);
		$cs = Yii::app()->getClientScript();
		$cs->registerScript("addOption","
				var i = $('.ss').size();
				$('#add').live('click', function(){
					i++;
					var html = 	'<fieldset>'
							+'<label>Tiêu đề</label><input type=\"text\" name=\"Tab['+i+'][title]\"/><br />'
							+'<label>Mô tả:</label><input type=\"text\" class=\"field\" name=\"Tab['+i+'][description]\" value=\"\" />'
							+'<label>Vị trí:</label><input type=\"text\" name=\"Tab['+i+'][position]\" value=\"\" />'
					$('<div id=\"f'+i+'\" class=\"ss\">'+html+'<a onclick=\"$(\'#f'+i+'\').remove();\">remove</a></fieldset></div>').fadeIn('slow').appendTo('.inputs')
				})
		");
		?>
		<div class="inputs">
		<?php if($data){
			foreach ($data as $key => $value){
				?>
				<div id="f<?php echo $key;?>" class="ss">
				<fieldset>
				<label>Tiêu đề:</label><input type="text" name="Tab[<?php echo $key;?>][title]" value="<?php echo $value['title'];?>"/>
				<label>Mô tả:</label><input type="text" name="Tab[<?php echo $key;?>][description]" value="<?php echo $value['description'];?>" />
				<label>Vị trí:</label><input type="text" name="Tab[<?php echo $key;?>][position]" value="<?php echo $value['position'];?>" />&nbsp;<a onclick="$('#f<?php echo $key;?>').remove();">remove</a>
				</fieldset>
				</div>
				<?php
			}
			
		}else{
			?>
			<div id="f1" class="ss">
			<fieldset>
			<label>Tiêu đề:</label><input type="text" name="Tab[1][title]" value=""/>
			<label>Mô tả:</label><input type="text" name="Tab[1][description]" value="" />
			<label>Vị trí:</label><input type="text" name="Tab[1][position]" value="" />&nbsp;<a onclick="$('#f1').remove();">remove</a>
			</fieldset>
			
			</div>
			<?php
		}
		
		?>
		</div>
		<input type="hidden" name="widget" value="TabWidget" />
		<a id="add" href="javascript: void(0);">Add</a>
		<?php
	}
	public function getParams($post)
	{
		return  serialize($post['Tab']);
	}
}