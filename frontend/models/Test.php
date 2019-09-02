<?php

namespace frontend\models;

use Yii;
use frontend\components\StringHelper;

class Test
{
    private $maxNewsList;

    public function __construct()
    {
        $this->maxNewsList = Yii::$app->params['maxNewsList'];
    }

    public static function getNewsList($maxNewsList = null)
    {
        if($maxNewsList === null) {
            $maxNewsList = $this->maxNewsList;
        }

        $maxNewsList = intval($maxNewsList);
        $sql = 'SELECT * FROM news LIMIT '.$maxNewsList;

        $result = Yii::$app->db->createCommand($sql)->queryAll();

        $helper = new StringHelper();

        if(!empty($result) && is_array($result)) {
            foreach ($result as &$item) {
                $item['text'] = $helper->getShort($item['text']);
            }
        }
        return $result;
    }
}
 ?>
