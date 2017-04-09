<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dsmonhoctheolop".
 *
 * @property string $MaNamHoc
 * @property string $MaLop
 * @property string $MaMonHoc
 * @property string $MaHocKy
 * @property string $MaGiaoVien
 *
 * @property Dsnamhoc $maNamHoc
 * @property Dslop $maLop
 * @property Dsmonhoc $maMonHoc
 * @property Dshocky $maHocKy
 */
class DsMonHocTheoLop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsmonhoctheolop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MaNamHoc', 'MaLop', 'MaMonHoc', 'MaHocKy', 'MaGiaoVien'], 'required'],
            [['MaNamHoc'], 'string', 'max' => 8],
            [['MaLop', 'MaMonHoc'], 'string', 'max' => 4],
            [['MaHocKy'], 'string', 'max' => 2],
            [['MaGiaoVien'], 'string', 'max' => 5],
            [['MaNamHoc'], 'exist', 'skipOnError' => true, 'targetClass' => Dsnamhoc::className(), 'targetAttribute' => ['MaNamHoc' => 'MaNamHoc']],
            [['MaLop'], 'exist', 'skipOnError' => true, 'targetClass' => Dslop::className(), 'targetAttribute' => ['MaLop' => 'MaLop']],
            [['MaMonHoc'], 'exist', 'skipOnError' => true, 'targetClass' => Dsmonhoc::className(), 'targetAttribute' => ['MaMonHoc' => 'MaMonHoc']],
            [['MaHocKy'], 'exist', 'skipOnError' => true, 'targetClass' => Dshocky::className(), 'targetAttribute' => ['MaHocKy' => 'MaHocKy']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MaNamHoc' => 'Ma Nam Hoc',
            'MaLop' => 'Ma Lop',
            'MaMonHoc' => 'Ma Mon Hoc',
            'MaHocKy' => 'Ma Hoc Ky',
            'MaGiaoVien' => 'Ma Giao Vien',
        ];
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
    public function getMaLop()
    {
        return $this->hasOne(Dslop::className(), ['MaLop' => 'MaLop']);
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
    public function getMaHocKy()
    {
        return $this->hasOne(Dshocky::className(), ['MaHocKy' => 'MaHocKy']);
    }
}
