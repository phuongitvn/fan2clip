<?php
class Support extends CWidget
{
	public $title='';
	public $_wID = NULL;
	public function init()
	{
		parent::init();
	}
	public function run()
	{
		$params = Widgets::model()->findByPk($this->_wID);
		$data = @unserialize($params->params);
		$this->render('default', array('data'=>$data));
	}
	public static function buildParams($params="")
	{
		$data = @unserialize($params);
		//echo '<pre>';print_r($data);
		
		?>
		<script>
		$(document).ready(function(){
			var i = $('.inputs input').size() + 2;
			$('#add').click(function() {
				var html = '<select name="Support['+i+'][type]"><option value="Yahoo">Yahoo</option><option value="Skype">Skype</option><option value="Mobile">Mobile</option><option value="Phone">Phone</option></select>'
				$('<div id="f'+i+'"><fieldset><legend>Support</legend><label>Loại</label>'+html+'<br /><label>Giá trị:</label><input type="text" class="field" name="Support['+i+'][value]" value="" /><a onclick="$(\'#f'+i+'\').remove();">remove</a></fieldset></div>').fadeIn('slow').appendTo('.inputs');
				i++;
			});
		})
		</script>
		<div class="inputs">
		<?php if($data){
			foreach ($data as $key => $value){
				$select = "<select name=\"Support[".$key."][type]\"><option value=\"yahoo\">Yahoo</option><option value=\"skype\">Skype</option><option value=\"mobile\">Mobile</option><option value=\"phone\">Phone</option></select>";
				?>
				<div id="f<?php echo $key;?>">
				<fieldset><legend>Support</legend>
				<label>Loại:</label><?php echo self::getOption("Support[$key][type]",$value['type']);?>
				<label>Giá trị:</label><input type="text" name="Support[<?php echo $key;?>][value]" value="<?php echo $value['value'];?>" />&nbsp;<a onclick="$('#f<?php echo $key;?>').remove();">remove</a>
				</fieldset>
				</div>
				<?php
			}
			
		}else{
			?>
			<div id="f1">
			<fieldset><legend>Support</legend>
			<label>Loại:</label><?php echo self::getOption('Support[1][type]');?>
			<label>Giá trị:</label><input type="text" name="Support[1][value]" value="" />&nbsp;<a onclick="$('#f1').remove();">remove</a>
				
			</fieldset>
			
			</div>
			<?php
		}
		
		?>
		</div>
		<input type="hidden" name="widget" value="Support" />
		<a id="add">Add</a>
		<?php
	}
	public function getParams($post)
	{
		return  serialize($post['Support']);
	}
	public static function getOption($name="",$res="")
	{
		$option = array('Yahoo','Skype','Mobile','Phone');
		$html = "<select name='{$name}'>";
		foreach ($option as $value){
			if($res!='' && $res==$value){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$html .="<option value='{$value}' {$selected}>{$value}</option>";
		}
		return $html."</select>";
	}
}