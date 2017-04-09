<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dshocky".
 *
 * @property string $MaHocKy
 * @property string $TenHocKy
 * @property integer $HeSo
 * @property integer $TongHop
 * @property integer $KiHienTai
 *
 * @property Dsdiem[] $dsdiems
 * @property Dsmonhoctheolop[] $dsmonhoctheolops
 */
class DsHocKy extends \yii\db\ActiveRecord
{

    //TODO Hoan Phan trạng thái kỳ hiện tại
    const STATUS_CURRENT=1;
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'dshocky';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MaHocKy'], 'required'],
            [['HeSo', 'TongHop', 'KiHienTai'], 'integer'],
            [['MaHocKy'], 'string', 'max' => 2],
            [['TenHocKy'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MaHocKy' => 'Ma Hoc Ky',
            'TenHocKy' => 'Ten Hoc Ky',
            'HeSo' => 'He So',
            'TongHop' => 'Tong Hop',
            'KiHienTai' => 'Ki Hien Tai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsdiems()
    {
        return $this->hasMany(Dsdiem::className(), ['MaHocKy' => 'MaHocKy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsmonhoctheolops()
    {
        return $this->hasMany(Dsmonhoctheolop::className(), ['MaHocKy' => 'MaHocKy']);
    }
}
