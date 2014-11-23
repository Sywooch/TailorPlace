<?php
/**
 * Страница создания товара.
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\cabinet\models\GoodForm $GoodForm
 */

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/cabinet-studio-addGood.css', [
    'depends' => [AppAsset::className()]
]);
$this->registerJsFile('@web/js/cabinet-studio-addGood.js', [
    'depends' => [AppAsset::className()]
]);

$fieldTemplate = '<div class="left-col">{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
$requiredFieldTemplate = '<div class="left-col"><i class="icon asterisk"></i>{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
$selectTemplate = '<div class="left-col"><i class="icon asterisk"></i>{label}</div><div class="center-col"><div class="select category">{input}<div class="select-button"><span class="caret"></span></div></div><div class="help-block"></div></div>';
?>
<div class="panel width-panel">
    <?php
    $form = ActiveForm::begin([
        'id' => 'good-form','fieldConfig' => [
            'template' => $fieldTemplate,
        ],
    ]);
    ?>
    <div class="panel-header">
        <div class="icon-circle good"><i></i></div><h3>Добавление товара</h3>
    </div>
    <div class="panel-body">
        <ul>
            <li>
                <?= $form->errorSummary($GoodForm, [
                    'header' => ''
                ])
                ?>
            </li>
            <li>
                <?= $form->field($GoodForm, 'name', [
                    'template' => $requiredFieldTemplate,
                ])
                ?>
            </li>
            <li>
                <?= $form->field($GoodForm, 'price', [
                    'template' => $requiredFieldTemplate,
                ])
                ?>
            </li>
            <li class="multyField">
                <div class="left-col">Категория</div><div class="center-col">
                    <div class="select category">
                        <?= Html::dropDownList('GoodForm[categories][]',
                            null, //номер выбранной опции
                            ArrayHelper::map($GoodForm->categoryList, 'id', 'name_ru'), [
                                'id' => 'goodform-categories'
                            ])
                        ?>
                        <div class="select-button"><span class="caret"></span></div>
                    </div>
                </div>
                <button type="button" class="deleteButton" id="deleteCategory" data-toggle="tooltip" data-placement="right" title="Убрать категорию"></button>
                <div class="left-col"></div><div class="center-col">
                    <button type="button" class="addButton" id="addCategory" data-toggle="tooltip" data-placement="right" title="Добавить категорию"></button>
                </div>
				 <!-- $form->field($GoodForm, 'categories[]', [
                        'template' => $selectTemplate,
                    ])->dropDownList(
                        ArrayHelper::map($GoodForm->categoryList, 'id', 'name_ru')
                    ) -->
            </li>
            <li class="quantity">
                <?php
                if ($GoodForm->isStoreGood()) {
                    echo $form->field($GoodForm, 'quantity');
                }
                ?>
            </li>
            <li class="description">
                <?= $form->field($GoodForm, 'description')->textArea([
                        'placeholder' => 'Здесь вы можете дать подробное описание товара',
                    ])
                ?>
            </li>
            <li class="photos">
                <div class="left-col">Фотографии товара</div>
                <div class="center-col">
                    <div id="photos-to-upload">
                        <div class="photo-wrapper">
                            <img src="/photos/good/test.jpg" width="82" height="82">
                            <div class="icon-circle setting" data-toggle="tooltip" data-placement="right" title="Настроить фотографию"><i></i></div>
                            <div class="icon-circle remove" data-toggle="tooltip" data-placement="right" title="Убрать фотографию"><i></i></div>
                        </div>
                        <div class="photo-wrapper">
                            <img src="/photos/good/test.jpg" width="82" height="82">
                            <div class="icon-circle setting" data-toggle="tooltip" data-placement="right" title="Настроить фотографию"><i></i></div>
                            <div class="icon-circle remove" data-toggle="tooltip" data-placement="right" title="Убрать фотографию"><i></i></div>
                        </div>
                        <div class="photo-wrapper">
                            <img src="/photos/good/test.jpg" width="82" height="82">
                            <div class="icon-circle setting" data-toggle="tooltip" data-placement="right" title="Настроить фотографию"><i></i></div>
                            <div class="icon-circle remove" data-toggle="tooltip" data-placement="right" title="Убрать фотографию"><i></i></div>
                        </div>
                    </div>
                    <div id="photos">
                        <!-- Когда нет фотографий -->
<!--                        <p>Нажмите для выбора файлов<br>или<br>перетащиет файлы сюда</p>-->
                        <!-- Когда есть фотографии -->
                        <p>Добавить еще</p>
                    </div>
                    <div class="help-block"></div>
                </div>
            </li>
        </ul>
    </div>
    <div class="panel-footer">
        <div class="button yellow" id="add-action">
            <div class="low-layer"></div>
            <button type="submit">Добавить товар</button>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<div class="modal fade" id="photo-settings" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="darker">Выберите область фотографии для превью</h4>
            </div>
            <div class="modal-body">
                <div id="photo-place">
                    <div id="photo-wrapper">
                        <img src="/photos/good/1/1.jpg" height="400">
                        <div class="photo-shadow"></div>
                        <div id="select-place">
                            <img src="/photos/good/1/1.jpg" height="400">
                        </div>
                        <div class="marker left-top"></div>
                        <div class="marker right-top"></div>
                        <div class="marker right-bottom"></div>
                        <div class="marker left-bottom"></div>
                    </div>
                </div>
                <div id="preview-wrapper">
                    <figure>
                        <div id="preview">
                            <img src="/photos/good/1/1_small.jpeg" width="82" height="82">
                        </div>
                        <figcaption class="darker">Превью</figcaption>
                    </figure>
                    <p class="italic">Изображение-превью
                        используется для
                        отображения товара
                        в общем каталоге
                        товаров.</p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="modal-footer">
                <div class="button" id="photo-settings-cancel">
                    <div class="low-layer"></div>
                    <button type="submit" data-dismiss="modal">Отмена</button>
                </div>
                <div class="button yellow" id="photo-settings-save">
                    <div class="low-layer"></div>
                    <button type="submit">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</div>