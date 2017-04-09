<?php
namespace app\extension\word;

use DOMDocument;
use Exception;
use Gufy\PdfToHtml\Pdf;
use ZipArchive;

/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 4/7/2017
 * Time: 2:24 PM
 */
class ReadXml
{
    /**TODO Hoan File read extension docx unzip to directory doc*/
    public $fileOpen = "";
    public $filePath = "";

    function __construct($fileOpen, $filePath)
    {
        $this->filePath = $filePath;
        $this->fileOpen = $fileOpen;
        $this->unzip();
    }

    private function unzip()    {
                $this->readXmlContent();


    }

    private function readXmlContent()
    {
        var_dump(\Yii::$app->basePath.'/web/se.pdf');
        $pdf = new Pdf(\Yii::$app->basePath.'/web/se.pdf');
    }
    protected function convertXmlToArray($xml)
    {
        if (!is_object($xml)) {
            $xml = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        }
        $result = (array) $xml;
        foreach ($result as $key => $value) {
            if (is_object($value)) {
                $result[$key] = $this->convertXmlToArray($value);
            }
        }
        return $result;
    }
}