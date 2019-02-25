<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;

/**
 * 
 */
class DataConversionBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * 
     */
    public function convertYoutubeUrlToCode($youtubeUrl)
    {
        // watch?v= の位置を返す
        $tmpPosition = strpos($youtubeUrl, 'watch?v=');

        // watch?v= 以降の文字列のみ取得
        $youtubeCode = substr($youtubeUrl, $tmpPosition + 8);

        return $youtubeCode;
    }
}
