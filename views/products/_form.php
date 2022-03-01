<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

<!--    --><?//= $form->field($model, 'categoryID')->textInput() ?>
<!--    --><?//= $form->field($model, 'categoryID')->widget(Select2::class, [
//        'pluginOptions' => [
//            'allowClear' => true,
//            'ajax' => [
//                'url' => '/categories/get-categories-for-product',
//                'dataType' => 'json',
//            ],
//        ],
//    ]); ?>
    <?php

    /* @var $tableTreeGroup yii\data\ActiveDataProvider */
    /* @var $groupProducts yii\data\ActiveDataProvider */
    ?>
    <?php if ($tableTreeGroups):?>
        <div style="display: flex">
            <div class="col-lg-12">
                <ul class="file-tree" style="border:1px solid #dee2e6;padding: 30px;padding-top: 10px;margin-top:20px;">
                    <?php foreach ($tableTreeGroups as $tableTreeGroup) : ?>
                        <li class="file-tree-folder" data-id="<?= $tableTreeGroup['id'] ?>"> <span data-name="<?= $tableTreeGroup['name'] ?>" class="parent-block"> <?= $tableTreeGroup['name'] ?>

                            </span>
                            <ul style="display: block;">
                                <?= \Yii::$app->view->renderFile('@app/views/products/tree_table.php', [
                                    'tableTreeGroup' => $tableTreeGroup,
                                    'groupProducts' => $groupProducts
                                ]); ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif;?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
