<?php

namespace frontend\components;

use Yii;

class StringHelper
{
    private $limit;

    public function __construct()
    {
        $this->limit = Yii::$app->params['shortTextLimit'];
    }

    public function getShort($string, $limit = null)
    {
        if($limit === null) {
            $limit = $this->limit;
        }
        $limit = $limit + 1;
        $string = explode(' ', $string, $limit);
        $lastKey = array_pop($string);
        $string = implode(' ', $string);

        return $string;
    }
}
 ?>
