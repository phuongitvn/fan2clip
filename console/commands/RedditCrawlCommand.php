<?php
/**
 * Created by PhpStorm.
 * User: NGUYEN NGOC BAO AN
 * Date: 3/7/2015
 * Time: 2:28 PM
 */
class RedditCrawlCommand extends CConsoleCommand
{
    public function actionIndex()
    {
        try {
            $url = 'http://www.reddit.com/r/videos/';
            $html = file_get_html($url);

            foreach ($html->find('#siteTable .thing a.title') as $e) {
                $link = urldecode(trim($e->href));
                if(strpos(strtolower($link),'youtube.com')!==false || strpos(strtolower($link),'youtu.be')!==false){
                    preg_match("/v=(\w+\-)/", $link, $match);
                    $code='';
                    if (!empty($match)) {
                        $sl = explode('=', $match[0]);
                        $code = $sl[1];
                    }elseif(strpos($link,'http://youtu.be/')!==false){
                        $code = str_replace('http://youtu.be/','',$link);
                    }
                    if($code!='' && !$this->isExistsCode($code)) {
                        $title = $e->plaintext;
                        echo '-----------' . "\n";
                        echo 'title: ' . $e->plaintext . "\n";
                        echo 'link: ' . $e->href . "\n";
                        echo "\r\n";
                        $tubeLink = new TubeVideoLink();
                        $tubeLink->title = $title;
                        $tubeLink->link = $link;
                        $tubeLink->status = 0;
                        $tubeLink->created_datetime = date('Y-m-d H:i:s');
                        $tubeLink->code=$code;
                        $res = $tubeLink->save();
                        var_dump($res);
                    }
                }

            }
        }catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    //php E:\source\gcms\fan2clip\trunk\console.php test view
    public function actionView()
    {
        try{
            $array = array(
                'conditions'=>array(
                    // field name => operator definition
                    'status'=>array('equals' => 0), // Or 'FieldName1'=>array('>=', 10)
                ),
                'limit'=>10,
                'offset'=>0,
                'sort'=>array('_id'=>EMongoCriteria::SORT_ASC),
            );
            $tubeLink = TubeVideoLink::model()->findAll($array);
            foreach ($tubeLink as $tube) {
                if($tube->code!='') {
                    echo $link = 'https://www.youtube.com/watch?v=' . $tube->code;
                    $html = file_get_html($link);
                    if(is_object($html)) {
                        echo 'name:'.$name = $html->find('#eow-title', 0)->plaintext;
                        echo "\n";
                        echo 'desc:'.$description = $html->find('#eow-description', 0)->plaintext;
                        $tubeVideo = new TubeVideo();
                        $tubeVideo->name = $name;
                        $tubeVideo->code = $tube->code;
                        $tubeVideo->description = $description;
                        $tubeVideo->status = 1;
                        $tubeVideo->cat_id = 1;
                        $tubeVideo->link_id = $tube->_id;
                        $tubeVideo->created_datetime = date('Y-m-d H:i:s');
                        $tubeVideo->updated_datetime = date('Y-m-d H:i:s');
                        $tubeVideo->created_by = 1;
                        $res = $tubeVideo->save();
                        echo "\n";
                        var_dump($res);

                        echo '-----------' . "\n";
                        echo "\n";
                    }
                }
                //update tube link
                $tubeLinkUpdate = TubeVideoLink::model()->findByPk($tube->_id);
                $tubeLinkUpdate->status = 1;
                $tubeLinkUpdate->updated_datetime = date('Y-m-d H:i:s');
                $res2 = $tubeLinkUpdate->save();
                var_dump($res2);
            }

        }catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    private function isExistsCode($code)
    {
        $c = array(
            'conditions'=>array(
                'code'=>array('equals' => $code)
            ),
            'limit'=>1,
        );
        $video = TubeVideoLink::model()->find($c);
        return $video?true:false;
    }
}