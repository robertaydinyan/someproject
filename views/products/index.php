<?php

use app\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row products">
        <?php if ($products):
            foreach ($products as $product):?>
                <div class="product col-4">
                    <div class="card-header">
                        <div>
                            <h3><?php echo $product->name; ?></h3>
                        </div>
                    </div>
<!--                    <img alt="" class="u-expanded-width u-image u-image-default u-image-1" src="/uploads/products/--><?php //echo $product->imageLink; ?><!--" style="width: 100%">-->
                    <div class="card-body" style="border: 1px solid #555c66">
                        <div class="card-info">
                            <p class="product-price">Starting at <b>$<?php echo $product->price; ?></b>
                            </p>
                            <ul class="card-description-list">
                                <li>
                                    <div class="card-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512.019 512.019" x="0px" y="0px" id="svg-b379" style="color: rgb(221, 53, 46);"><path fill="currentColor" d="M362.676,0H149.343C119.888,0,96.01,23.878,96.01,53.333v448 c-0.011,5.891,4.757,10.675,10.648,10.686c2.84,0.005,5.565-1.123,7.571-3.134L256.01,367.083l141.781,141.781 c4.16,4.171,10.914,4.179,15.085,0.019c2.006-2.001,3.133-4.717,3.134-7.55v-448C416.01,23.878,392.131,0,362.676,0z"></path></svg>
                                    </div>
                                    <span>Category - <?php echo $product->getCategoryByID()->one()['name'];?></span>
                                </li>
                                <li>
                                    <div class="card-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512.019 512.019" x="0px" y="0px" id="svg-b379" style="color: rgb(221, 53, 46);"><path fill="currentColor" d="M362.676,0H149.343C119.888,0,96.01,23.878,96.01,53.333v448 c-0.011,5.891,4.757,10.675,10.648,10.686c2.84,0.005,5.565-1.123,7.571-3.134L256.01,367.083l141.781,141.781 c4.16,4.171,10.914,4.179,15.085,0.019c2.006-2.001,3.133-4.717,3.134-7.55v-448C416.01,23.878,392.131,0,362.676,0z"></path></svg>
                                    </div>
                                    <span>Quantity - <?php echo $product->quantity; ?></span>
                                </li>
                            </ul>
                            <a href="/products/view?id=<?php echo $product->id; ?>" class="btn btn-rectangle button-style card-link">learn more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif; ?>
    </div>
</div>
