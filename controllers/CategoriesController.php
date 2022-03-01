<?php

namespace app\controllers;

use app\models\Categories;
use Yii;
use yii\filters\VerbFilter;

class CategoriesController extends \yii\web\Controller {
    public function behaviors() {
        return array_merge(
            parent::behaviors(), [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'create' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex() {

        $categories = Categories::find()->asArray()->all();
        $tableTreeGroups = $this->buildTree($categories);

        return $this->render('index', [
            'categories' => $categories,
            'tableTreeGroups' => $tableTreeGroups
        ]);
    }

    public function actionCreate() {
        $model = new Categories();
        $post = $this->request->post();
        $model->name = $post['name'];
        $model->parentID = $post['parentID'];
        $model->save(false);

        return $this->redirect(['index']);
    }

    public function buildTree(array $elements, $parentId = null) {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parentID'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] =  $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
}
