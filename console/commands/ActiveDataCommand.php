<?php
class ActiveDataCommand extends CConsoleCommand
{
    public function actionIndex()
    {
        $array = array(
            'conditions'=>array(
                'status'=>array('equals' => 3),
            ),
            'limit'=>5,
            'sort'=>array('_id'=>EMongoCriteria::SORT_ASC),
        );
        $data = TubeVideo::model()->findAll($array);
        if($data){
            foreach($data as $video){
                $model = TubeVideo::model()->findByPk($video->_id);
                $model->updated_datetime = date('Y-m-d H:i:s');
                $model->status=1;
                $res = $model->save(false);
                echo $res?"Update status success!":"Update fail";
                echo "\n";
            }
        }else{
            echo 'Not found content to active'."\n";
        }
    }
}