<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dsloaidiem".
 *
 * @property string $MaLoaiDiem
 * @property string $TenLoaiDiem
 * @property integer $SoDiemToiDa
 * @property integer $HeSo
 * @property string $HienThi
 * @property integer $ChoPhepChinhsua
 * @property integer $TinhToan
 * @property integer $TongHop
 * @property integer $LaHocKy
 *
 * @property Dsdiem[] $dsdiems
 */
class DsLoaiDiem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsloaidiem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MaLoaiDiem', 'TenLoaiDiem', 'SoDiemToiDa', 'HeSo', 'HienThi', 'ChoPhepChinhsua', 'TinhToan', 'TongHop', 'LaHocKy'], 'required'],
            [['SoDiemToiDa', 'HeSo', 'ChoPhepChinhsua', 'TinhToan', 'TongHop', 'LaHocKy'], 'integer'],
            [['MaLoaiDiem'], 'string', 'max' => 3],
            [['TenLoaiDiem', 'HienThi'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MaLoaiDiem' => 'Ma Loai Diem',
            'TenLoaiDiem' => 'Ten Loai Diem',
            'SoDiemToiDa' => 'So Diem Toi Da',
            'HeSo' => 'He So',
            'HienThi' => 'Hien Thi',
            'ChoPhepChinhsua' => 'Cho Phep Chinhsua',
            'TinhToan' => 'Tinh Toan',
            'TongHop' => 'Tong Hop',
            'LaHocKy' => 'La Hoc Ky',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsdiems()
    {
        return $this->hasMany(Dsdiem::className(), ['MaLoaiDiem' => 'MaLoaiDiem']);
    }
    public static function getListTypeScrose()
    {
        return DsLoaiDiem::find()->orderBy(['MaLoaiDiem'=>SORT_ASC])->all();
    }
}
