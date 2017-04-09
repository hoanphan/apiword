<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dslop".
 *
 * @property string $MaLop
 * @property string $TenLop
 * @property string $MaGVCN
 * @property string $MaNamHoc
 * @property string $MaKhoi
 *
 * @property Dsmonhoctheolop[] $dsmonhoctheolops
 */
class DsLop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dslop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MaLop'], 'required'],
            [['MaLop'], 'string', 'max' => 4],
            [['TenLop'], 'string', 'max' => 50],
            [['MaGVCN'], 'string', 'max' => 5],
            [['MaNamHoc'], 'string', 'max' => 8],
            [['MaKhoi'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MaLop' => 'Ma Lop',
            'TenLop' => 'Ten Lop',
            'MaGVCN' => 'Ma Gvcn',
            'MaNamHoc' => 'Ma Nam Hoc',
            'MaKhoi' => 'Ma Khoi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsmonhoctheolops()
    {
        return $this->hasMany(Dsmonhoctheolop::className(), ['MaLop' => 'MaLop']);
    }
}
