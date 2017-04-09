<?php
/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 3/31/2017
 * Time: 8:12 PM
 */
/**
 * @var \app\models\DsLoaiDiem[] $listTypeScroses
 **/
?>
<body>
<table style="width: 100%">
    <thead>
    <tr class="size-row">
        <th class="floatThead-col" rowspan="2" style="text-align: center">#</th>
        <th class="floatThead-col" rowspan="2" width="10%"
            style="text-align: center">
            Tên môn học
        </th>
        <?php for ($i = 0; $i < count($listTypeScroses); $i++): ?>
            <?php if ($listTypeScroses[$i]->SoDiemToiDa > 1): ?>
                <th style="text-align: center"
                    colspan="<?= $listTypeScroses[$i]->SoDiemToiDa ?>"><?= $listTypeScroses[$i]->TenLoaiDiem ?></th>
            <?php elseif ($listTypeScroses[$i]->SoDiemToiDa == 1): ?>
                <th style="text-align: center"
                    rowspan="2"><?= $listTypeScroses[$i]->TenLoaiDiem ?></th>
            <?php endif; ?>
        <?php endfor; ?>
    </tr>
    <tr class="size-row">
        <?php for ($i = 0; $i < count($listTypeScroses); $i++): ?>
            <?php for ($j = 1; $j <= $listTypeScroses[$i]->SoDiemToiDa; $j++): ?>
                <?php if ($listTypeScroses[$i]->SoDiemToiDa > 1): ?>
                    <th class=""
                        style="text-align: center"><?= $listTypeScroses[$i]->HienThi . '' . $j ?> </th>
                <?php endif; ?>
            <?php endfor; ?>
        <?php endfor; ?>
    </tr>
    </thead>
    <tbody>
    <?php echo \app\models\dsDiem::getList($user, $Semester, $idClass, $idYearCurrent); ?>

    </tbody>

</table>
</body>