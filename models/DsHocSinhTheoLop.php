<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dshocsinhtheolop".
 *
 * @property string $MaNamHoc
 * @property string $MaHocSinh
 * @property string $MaLop
 * @property integer $STT
 *
 * @property Dshocsinh $maHocSinh
 */
class DsHocSinhTheoLop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dshocsinhtheolop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MaHocSinh'], 'required'],
            [['STT'], 'integer'],
            [['MaNamHoc'], 'string', 'max' => 8],
            [['MaHocSinh'], 'string', 'max' => 7],
            [['MaLop'], 'string', 'max' => 4],
            [['MaHocSinh'], 'exist', 'skipOnError' => true, 'targetClass' => Dshocsinh::className(), 'targetAttribute' => ['MaHocSinh' => 'MaHocSinh']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MaNamHoc' => 'Ma Nam Hoc',
            'MaHocSinh' => 'Ma Hoc Sinh',
            'MaLop' => 'Ma Lop',
            'STT' => 'Stt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaHocSinh()
    {
        return $this->hasOne(Dshocsinh::className(), ['MaHocSinh' => 'MaHocSinh']);
    }
}
