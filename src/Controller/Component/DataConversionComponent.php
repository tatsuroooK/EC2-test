<?php
namespace Cake\Controller\Component;

use Cake\Controller\Component;

class DataConversionComponent extends Component
{
    /**
     * youtube urlのコードを生成
     * (watch?v= 以降の文字列を返す)
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
