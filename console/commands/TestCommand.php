<?php
/**
 * Created by PhpStorm.
 * User: NGUYEN NGOC BAO AN
 * Date: 3/7/2015
 * Time: 2:28 PM
 */
class TestCommand extends CConsoleCommand
{
    public function actionIndex()
    {
        $url = 'http://www.bing.com/videos/search?&q=Football+Goals&qft=+filterui:videoage-lt1440&FORM=R5VR5';
        $html = file_get_html($url);
        //$result = $html->find('div[id=dg_c]', 0)->innertext;
        foreach($html->find('div[id=dg_c] .dg_u .tl') as $e){
            echo $e->innerText."\r\n";
        }
            echo 'test';
    }
}