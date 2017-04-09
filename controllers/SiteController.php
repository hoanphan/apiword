<?php

namespace app\controllers;

use app\extension\word\ReadXml;
use app\models\dsDiem;
use app\models\DsHocKy;
use app\models\DsHocSinh;
use app\models\DsLoaiDiem;
use app\models\DsLop;
use app\models\DsMonHoc;
use app\models\DsNamHoc;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Yii;
use yii\base\DynamicModel;
use yii\base\Exception;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\rest\Controller;
use yii\web\Response;
use yii\web\User;
use ZipArchive;
const EOL= '<br>';
class SiteController extends \yii\web\Controller
{

    public $modelClass = 'app\models\DsHocSinh';
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new \yii\base\DynamicModel([
            'username', 'password'
        ]);
        $model->addRule(['username', 'password'], 'required')
            ->addRule(['username', 'password'], 'string', ['max' => 32]);
        $model->attributes = Yii::$app->request->post();
        $user = DsHocSinh::findOne(strtoupper($model->username));
        if ($model->validate()) {
            if ($user != null) {
                if ($user->password == Yii::$app->security->generatePasswordHash($model->password))
                    return array('status' => true);
                else
                    return array('status' => false, 'data' => $model->getErrors());
            }

        } else
            return array('status' => false, 'data' => $model->getErrors());
    }
    public function actionIndex()
    {
        $fileOpen=Yii::$app->basePath.'/web/se.docx';
        $filePath=Yii::$app->basePath.'\web';
        $xml=new ReadXml($fileOpen,$filePath);
     /*   echo date('H:i:s'), " Reading contents from `{$source}`";


// Save file
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);

// Save file
        echo $this->write($phpWord, basename(__FILE__, '.php'), $writers);*/
    }
    function write($phpWord, $filename, $writers)
    {
        $result = '';

        // Write documents
        foreach ($writers as $format => $extension) {
            $result .= date('H:i:s') . " Write to {$format} format";
            if (null !== $extension) {
                $targetFile = __DIR__ . "/results/{$filename}.{$extension}";
                $phpWord->save($targetFile, $format);
            } else {
                $result .= ' ... NOT DONE!';
            }
            $result .= EOL;
        }

        $result .= $this->getEndingNotes($writers);

        return $result;
    }
    function getEndingNotes($writers)
    {
        $result = '';

        // Do not show execution time for index

            $result .= date('H:i:s') . " Done writing file(s)" . EOL;
            $result .= date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB" . EOL;

        return $result;
    }
}
