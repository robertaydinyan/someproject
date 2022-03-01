<?php

/* @var $tableTreeGroup yii\data\ActiveDataProvider */
/* @var $groupProducts yii\data\ActiveDataProvider */
?>
<?php if(array_key_exists('children', $tableTreeGroup)) : ?>
    <?php foreach ($tableTreeGroup['children'] as $tableTreeGroup) : ?>
        <li class="file-tree-folder"> <span> <?= $tableTreeGroup['name'] ?></span><i class="fa fa-plus"  data-toggle="modal" data-target="#addCategory"  onclick="Events.addCategory(<?= $tableTreeGroup['id'] ?>)"></i>
            <ul style="display: block;">
                <?= \Yii::$app->view->renderFile('@app/views/categories/tree_table.php', [
                    'tableTreeGroup' => $tableTreeGroup,
                ]); ?>
            </ul>
        </li>
    <?php endforeach; ?>
<?php endif; ?>
