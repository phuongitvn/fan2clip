<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/22/2015
 * Time: 4:38 PM
 */
#php E:\source\gcms\fan2clip\trunk\console.php GagCrawl FindLink
class GagCrawlCommand extends CConsoleCommand
{
    public function actionFindLink()
    {
        try{
            $links = array(
                0=>array(
                    'link'=>'http://9gag.tv/channel/prank',
                    'genre'=>'funny',
                    'tags'=>'funny,fail,prank'
                ),
            );
            foreach($links as $link)
            {
                $html = file_get_html($link['link']);
                $main = $html->find(".main",0);
                foreach($main->find(".badge-grid-item") as $e){
                    echo $title = $e->find(".item div.info a.title h4",0)->innertext."\n";
                    echo $url = $e->find(".item div.info a",0)->href."\n";
                    $model = new TubeVideoLink();
                    $model->title = trim($title);
                    $model->link = trim($url);
                    $model->type = 'youtube';
                    $model->genre = $link['genre'];
                    $model->tags = $link['tags'];
                    $model->created_datetime = date('Y-m-d H:i:s');
                    $model->updated_datetime = date('Y-m-d H:i:s');
                    $model->status=0;
                    $res = $model->save();
                    echo $res?"true":"false";
                    echo "\n";
                }
            }
        }catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}