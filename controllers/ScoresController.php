<?php
/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 3/30/2017
 * Time: 10:08 AM
 */

namespace app\controllers;

use app\models\dsDiem;
use app\models\DsHocKy;
use app\models\DsHocSinh;
use app\models\DsLoaiDiem;
use app\models\DsLop;
use app\models\DsMonHoc;
use app\models\DsNamHoc;
use Exception;
use Yii;
use yii\rest\ActiveController;

class ScoresController extends ActiveController
{
    public $modelClass='app\models\dsDiem';
    /**
     * action index
     * params username student
     * return json list scores
    **/
    public function actionGet()
    {
        $this->layout=false;
        if (Yii::$app->request->post()) {

            if(isset($_POST['username'])) {
                $username = $_POST['username'];
                $user = DsHocSinh::findOne($username);
                /**
                 * @var DsLoaiDiem[] $listScrose
                 **/
                $idClass = $user->dshocsinhtheolop->MaLop;
                $listTypeScroses = DsLoaiDiem::find()->all();
                $Semester = DsHocKy::findOne(['KiHienTai' => DsHocKy::STATUS_CURRENT])->MaHocKy;
                $yearCurent = DsNamHoc::findOne(['NamHienTai' => DsNamHoc::STATUS_CURRENT])->MaNamHoc;
                $content = $this->render('index', ['user' => $username, 'listTypeScroses' => $listTypeScroses, 'Semester' => $Semester, 'idYearCurrent' => $yearCurent, 'idClass' => $idClass]);
                $arr = array(

                );
                return array('status' => true, $arr, 'message' => $content);
            }
            else
                return array('status' => false);
        } else {
            return array('status' => false);
        }
    }
    public  function actionGetScores()
    {
        
    }

}