<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dshocsinh".
 *
 * @property string $MaHocSinh
 * @property string $HoDem
 * @property string $Ten
 * @property string $TenThuongGoi
 * @property integer $DaQuaLop
 * @property string $NgaySinh
 * @property integer $GioiTinh
 * @property string $NoiSinh
 * @property string $QueQuan
 * @property string $HoTenBo
 * @property string $NgheNghiepBo
 * @property string $HoTenMe
 * @property string $NgheNghiepMe
 * @property string $Anh
 * @property integer $MaDanToc
 * @property integer $MaTonGiao
 * @property integer $MaTinhTrangSucKhoe
 * @property string $NgayVaoDoan
 * @property string $NoiVaoDoan
 * @property string $MatKhau
 * @property string $EmailPhuHuynh
 * @property string $SoDienThoaiPhuHuynh
 * @property integer $DangKyDichVu
 *
 * @property Dsdiem[] $dsdiems
 * @property Dshocsinhtheolop $dshocsinhtheolop
 */
class DsHocSinh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dshocsinh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MaHocSinh'], 'required'],
            [['DaQuaLop', 'GioiTinh', 'MaDanToc', 'MaTonGiao', 'MaTinhTrangSucKhoe', 'DangKyDichVu'], 'integer'],
            [['NgaySinh', 'NgayVaoDoan'], 'safe'],
            [['MaHocSinh'], 'string', 'max' => 7],
            [['HoDem', 'NoiSinh', 'QueQuan', 'HoTenBo', 'NgheNghiepBo', 'HoTenMe', 'NgheNghiepMe', 'NoiVaoDoan'], 'string', 'max' => 50],
            [['Ten'], 'string', 'max' => 10],
            [['TenThuongGoi'], 'string', 'max' => 30],
            [['Anh', 'MatKhau'], 'string', 'max' => 200],
            [['EmailPhuHuynh'], 'string', 'max' => 100],
            [['SoDienThoaiPhuHuynh'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MaHocSinh' => 'Ma Hoc Sinh',
            'HoDem' => 'Ho Dem',
            'Ten' => 'Ten',
            'TenThuongGoi' => 'Ten Thuong Goi',
            'DaQuaLop' => 'Da Qua Lop',
            'NgaySinh' => 'Ngay Sinh',
            'GioiTinh' => 'Gioi Tinh',
            'NoiSinh' => 'Noi Sinh',
            'QueQuan' => 'Que Quan',
            'HoTenBo' => 'Ho Ten Bo',
            'NgheNghiepBo' => 'Nghe Nghiep Bo',
            'HoTenMe' => 'Ho Ten Me',
            'NgheNghiepMe' => 'Nghe Nghiep Me',
            'Anh' => 'Anh',
            'MaDanToc' => 'Ma Dan Toc',
            'MaTonGiao' => 'Ma Ton Giao',
            'MaTinhTrangSucKhoe' => 'Ma Tinh Trang Suc Khoe',
            'NgayVaoDoan' => 'Ngay Vao Doan',
            'NoiVaoDoan' => 'Noi Vao Doan',
            'MatKhau' => 'Mat Khau',
            'EmailPhuHuynh' => 'Email Phu Huynh',
            'SoDienThoaiPhuHuynh' => 'So Dien Thoai Phu Huynh',
            'DangKyDichVu' => 'Dang Ky Dich Vu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsdiems()
    {
        return $this->hasMany(Dsdiem::className(), ['MaHocSinh' => 'MaHocSinh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDshocsinhtheolop()
    {
        return $this->hasOne(Dshocsinhtheolop::className(), ['MaHocSinh' => 'MaHocSinh']);
    }
}
