<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<title><?php echo CHtml::encode($this->pageTitle)." | ".Yii::app()->name; ?></title>
    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<body>
	<div id="main"><?php echo $content;?></div>
</body>
</html>
