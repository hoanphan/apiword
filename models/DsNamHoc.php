<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dsnamhoc".
 *
 * @property string $MaNamHoc
 * @property string $TenNamHoc
 * @property integer $NamHienTai
 *
 * @property Dsdiem[] $dsdiems
 * @property Dsmonhoctheolop[] $dsmonhoctheolops
 */
class DsNamHoc extends \yii\db\ActiveRecord
{
    //TODO Hoan Phan Lấy học kỳ hiện tại
    const STATUS_CURRENT=1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsnamhoc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MaNamHoc'], 'required'],
            [['NamHienTai'], 'integer'],
            [['MaNamHoc'], 'string', 'max' => 8],
            [['TenNamHoc'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MaNamHoc' => 'Ma Nam Hoc',
            'TenNamHoc' => 'Ten Nam Hoc',
            'NamHienTai' => 'Nam Hien Tai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsdiems()
    {
        return $this->hasMany(Dsdiem::className(), ['MaNamHoc' => 'MaNamHoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsmonhoctheolops()
    {
        return $this->hasMany(Dsmonhoctheolop::className(), ['MaNamHoc' => 'MaNamHoc']);
    }
}
