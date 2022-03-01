<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js', ['depends'=>'yii\web\JqueryAsset', 'position' => \yii\web\View::POS_END]);
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
$this->registerCssFile('@web/css/custom-tree-view.css', ['depends'=>'yii\web\JqueryAsset', 'position' => \yii\web\View::POS_READY]);
$this->registerJsFile('@web/js/custom-tree.js', ['depends'=>'yii\web\JqueryAsset', 'position' => \yii\web\View::POS_END]);
?>
<div class="categories-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <a class="btn btn-success" data-toggle="modal" data-target="#addCategory"
           onclick="Events.addCategory(null)">Add Category</a>
    </p>
    <div class="categories-container">

        <div style="display: flex">
            <div class="col-lg-12">
                <ul class="file-tree" style="border:1px solid #dee2e6;padding: 30px;padding-top: 10px;margin-top:20px;">
                    <?php foreach ($tableTreeGroups as $tableTreeGroup) : ?>
                        <li class="file-tree-folder" data-id="<?= $tableTreeGroup['id'] ?>"> <span data-name="<?= $tableTreeGroup['name'] ?>" class="parent-block"> <?= $tableTreeGroup['name'] ?>

                        </span><i class="fa fa-plus" data-toggle="modal" data-target="#addCategory" onclick="Events.addCategory(<?= $tableTreeGroup['id'] ?>)"></i>
                            <ul style="display: block;">
                                <?= \Yii::$app->view->renderFile('@app/views/categories/tree_table.php', [
                                    'tableTreeGroup' => $tableTreeGroup,
                                    'groupProducts' => $groupProducts
                                ]); ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php ActiveForm::begin([
                        'action' => '/categories/create',
                        'options' => [
                            'class' => 'create-category-form',
                        ]
                ]); ?>
                    <input type="hidden" name="parentID" class="category-parent-id">
                    <div class="form-group">
                        <label for="">Name
                            <input type="text" class="form-control category-name" name="name">
                        </label>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="Events.createCategory()">Save changes</button>
            </div>
        </div>
    </div>
</div>