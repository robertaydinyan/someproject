<?php

/** @var yii\web\View $this */

$this->title = 'Home';
$this->params['breadcrumbs'] = [
//    [
//        'label' => 'Post Category',
//        'url' => ['post-category/view', 'id' => 10],
//    ],
//    ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]],
    ' ',
];//[['label' => 'Home', 'url' => '/']];
//?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Welcome!</h1>
    </div>

    <div class="body-content">

            <div class="d-flex justify-content-around">
                <a class="btn btn-primary " href="/products">products</a>
                <a class="btn btn-primary " href="/categories">categories</a>
            </div>

    </div>
</div>
