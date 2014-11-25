<?php
/**
 * Страница редактирования данных студии.
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\cabinet\models\StudioForm $StudioForm
 */

use yii\widgets\ActiveForm;

$fieldTemplate = '<div class="left-col">{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
$requiredFieldTemplate = '<div class="left-col"><i class="icon asterisk"></i>{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
$selectTemplate = '<div class="left-col"><i class="icon asterisk"></i>{label}</div><div class="center-col"><div class="select currency">{input}<div class="select-button"><span class="caret"></span></div></div><div class="help-block"></div></div>';
?>
<div class="panel width-panel">
    <?php
    $form = ActiveForm::begin([
        'id' => 'studio-form','fieldConfig' => [
            'template' => $fieldTemplate,
        ],
    ]);
    ?>
    <div class="panel-header">
        <div class="icon-circle good"><i></i></div><h3>Редактирование данных <?= $studioType ?></h3>
    </div>
    <div class="panel-body">

    </div>
    <div class="panel-footer">

    </div>
    <?php ActiveForm::end(); ?>
</div>