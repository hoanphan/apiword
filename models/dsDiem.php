<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dsdiem".
 *
 * @property string $MaHocSinh
 * @property string $MaNamHoc
 * @property string $MaHocKy
 * @property string $MaMonHoc
 * @property string $MaLoaiDiem
 * @property integer $STTDiem
 * @property double $Diem
 * @property string $DiemCu
 * @property integer $ChoPhepDang
 * @property integer $KhoaSo
 * @property integer $ChoPhepSua
 *
 * @property Dshocsinh $maHocSinh
 * @property Dsnamhoc $maNamHoc
 * @property Dshocky $maHocKy
 * @property Dsmonhoc $maMonHoc
 * @property Dsloaidiem $maLoaiDiem
 */
class dsDiem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsdiem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MaHocSinh', 'MaNamHoc', 'MaHocKy', 'MaMonHoc', 'MaLoaiDiem', 'STTDiem'], 'required'],
            [['STTDiem', 'ChoPhepDang', 'KhoaSo', 'ChoPhepSua'], 'integer'],
            [['Diem'], 'number'],
            [['DiemCu'], 'string'],
            [['MaHocSinh'], 'string', 'max' => 7],
            [['MaNamHoc'], 'string', 'max' => 8],
            [['MaHocKy'], 'string', 'max' => 2],
            [['MaMonHoc'], 'string', 'max' => 4],
            [['MaLoaiDiem'], 'string', 'max' => 3],
            [['MaHocSinh'], 'exist', 'skipOnError' => true, 'targetClass' => Dshocsinh::className(), 'targetAttribute' => ['MaHocSinh' => 'MaHocSinh']],
            [['MaNamHoc'], 'exist', 'skipOnError' => true, 'targetClass' => Dsnamhoc::className(), 'targetAttribute' => ['MaNamHoc' => 'MaNamHoc']],
            [['MaHocKy'], 'exist', 'skipOnError' => true, 'targetClass' => Dshocky::className(), 'targetAttribute' => ['MaHocKy' => 'MaHocKy']],
            [['MaMonHoc'], 'exist', 'skipOnError' => true, 'targetClass' => Dsmonhoc::className(), 'targetAttribute' => ['MaMonHoc' => 'MaMonHoc']],
            [['MaLoaiDiem'], 'exist', 'skipOnError' => true, 'targetClass' => Dsloaidiem::className(), 'targetAttribute' => ['MaLoaiDiem' => 'MaLoaiDiem']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MaHocSinh' => 'Ma Hoc Sinh',
            'MaNamHoc' => 'Ma Nam Hoc',
            'MaHocKy' => 'Ma Hoc Ky',
            'MaMonHoc' => 'Ma Mon Hoc',
            'MaLoaiDiem' => 'Ma Loai Diem',
            'STTDiem' => 'Sttdiem',
            'Diem' => 'Diem',
            'DiemCu' => 'Diem Cu',
            'ChoPhepDang' => 'Cho Phep Dang',
            'KhoaSo' => 'Khoa So',
            'ChoPhepSua' => 'Cho Phep Sua',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaHocSinh()
    {
        return $this->hasOne(Dshocsinh::className(), ['MaHocSinh' => 'MaHocSinh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaNamHoc()
    {
        return $this->hasOne(Dsnamhoc::className(), ['MaNamHoc' => 'MaNamHoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaHocKy()
    {
        return $this->hasOne(Dshocky::className(), ['MaHocKy' => 'MaHocKy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaMonHoc()
    {
        return $this->hasOne(Dsmonhoc::className(), ['MaMonHoc' => 'MaMonHoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaLoaiDiem()
    {
        return $this->hasOne(Dsloaidiem::className(), ['MaLoaiDiem' => 'MaLoaiDiem']);
    }
    public static function getScoresFollowStudent($idStudent, $idYear, $idSemester, $idObject, $idTypeScores, $serial)
    {

        $scocres = DsDiem::findOne(['MaHocSinh' => $idStudent, 'MaNamHoc' => $idYear, 'MaHocKy' => $idSemester,
            'MaMonHoc' => $idObject, 'MaLoaiDiem' => $idTypeScores, 'STTDiem' => $serial]);
        if ($scocres == null) {
            return ' ';
        } else {
            if($scocres->Diem<0)
            {
                if($scocres->Diem==-2)
                    return '<a>Đạt</a>';
                elseif ($scocres->Diem==-3)
                    return '<a style="color: red">Chưa đạt</a>';
                else
                    return '<a style="color: red">Unknown</a>';
            }
            elseif($scocres->Diem>=5)
                return '<a>'.$scocres->Diem.'</a>';
            else
                return '<a style="color: red">'.$scocres->Diem.'</a>';
        }

    }
    public static function getList($idStudent,$idSemester,$idClass,$idYear)
    {
        $str='';
        $listTypeRescroses=DsLoaiDiem::getListTypeScrose();
        $listSubject=DsMonHocTheoLop::find()->where(['MaNamHoc'=>$idYear,'MaLop'=>$idClass,'MaHocKy'=>$idSemester])->all();
        for($i=0;$i<count($listSubject);$i++) {
            if ($i % 2 == 0) {
                $str = $str . '<tr><td style="text-align: center">
                                ' . ($i + 1) . '</td>
                             <td style="text-align: center">
                                ' . DsMonHoc::getNameRescrose($listSubject[$i]->MaMonHoc) . '</td>
                  ';
                for ($j = 0; $j < count($listTypeRescroses); $j++) {
                    for ($k = 1; $k <= $listTypeRescroses[$j]->SoDiemToiDa; $k++) {
                        $str = $str .
                            '<td style="text-align: center">
                            ' . DsDiem::getScoresFollowStudent($idStudent, $idYear, $idSemester, $listSubject[$i]->MaMonHoc, $listTypeRescroses[$j]->MaLoaiDiem, $k) . '</td>';


                    }
                }
                $str = $str . '</tr>';
            } else {
                $str = $str . '<tr><td style="text-align: center">
                                ' . ($i + 1) . '</td>
                            <td style="text-align: center" >   ' . DsMonHoc::getNameRescrose($listSubject[$i]->MaMonHoc) . '</td>
                            ';
                for ($j = 0; $j < count($listTypeRescroses); $j++) {
                    for ($k = 1; $k <= $listTypeRescroses[$j]->SoDiemToiDa; $k++) {
                        $str = $str . '<td style="text-align: center"> ' . DsDiem::getScoresFollowStudent($idStudent, $idYear, $idSemester, $listSubject[$i]->MaMonHoc, $listTypeRescroses[$j]->MaLoaiDiem, $k) . '</td>';

                    }
                }
                $str = $str . '</tr>';
            }
        }
        return $str;
    }
}
