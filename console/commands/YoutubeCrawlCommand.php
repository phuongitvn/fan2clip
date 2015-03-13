<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/12/2015
 * Time: 11:33 PM
 */
//php E:\source\gcms\fan2clip\trunk\console.php YoutubeCrawl
class YoutubeCrawlCommand extends CConsoleCommand
{
    public static $_limit_related = 3;
    public function actionIndex($code)
    {
        try{
            $url = 'https://www.youtube.com/watch?v='.$code;
            $html = file_get_html($url);
            if(is_object($html)) {
                $title = $html->find("#watch-header h1 span",0)->plaintext;
                $description = $html->find("#eow-description",0)->innertext;
                if(!$this->isExistsCode($code)) {
                    $tubeLink = new ConsoleTubeLinkModel();
                    $tubeLink->title = trim($title);
                    $tubeLink->code = $code;
                    $tubeLink->status = 2;
                    $tubeLink->genre = 'kids';
                    $tubeLink->tags = 'music,barbie';
                    $tubeLink->type = 'youtube';
                    $tubeLink->link = 'https://www.youtube.com/watch?v=' . $code;
                    $tubeLink->related = 1;
                    $res = $tubeLink->add();
                }
                //related video
                $i=0;
                for($i=0; $i<self::$_limit_related; $i++){
                    echo $i."\n";
                    if($i==self::$_limit_related) break;
                    if(is_object($html)) {
                        $title = $html->find("#watch-related li div a span.title", $i)->innertext;
                        $link = $html->find("#watch-related li div a", $i)->href;
                        preg_match("/v=(\w+)/", $link, $match);
                        if (!empty($match)) {
                            $sl = explode('=', $match[0]);
                            $code = $sl[1];
                        }
                        if (!empty($code) && !$this->isExistsCode($code)) {
                            $tubeLink = new ConsoleTubeLinkModel();
                            $tubeLink->title = trim($title);
                            $tubeLink->code = $code;
                            $tubeLink->status = 2;
                            $tubeLink->type = 'youtube';
                            $tubeLink->genre = 'kids';
                            $tubeLink->tags = 'music,barbie';
                            $tubeLink->link = 'https://www.youtube.com' . $link;
                            $tubeLink->related = 1;
                            $res = $tubeLink->add();
                            if ($res) {
                                echo 'success' . "\n";
                            } else {
                                $errors = $res->getErrors();
                                var_dump($errors);
                            }
                        }
                    }
                    $i++;
                }
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