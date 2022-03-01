<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parentID
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parentID'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parentID' => 'Parent ID',
        ];
    }

    public function getChild() {
        return $this->hasMany(Categories::class, ['parentID' => 'id'])->all();
    }

//    public function printChild($categories) {
//        $res = '';
//        if ($categories) {
//            foreach ($categories as $category) {
//                $child = $category->getChild();
//                $add = '<button class="btn icon-button" data-toggle="modal" data-target="#addCategory"
//                                onclick="Events.addCategory(' . $category->id . ')">
//                            <i class="fa fa-plus" aria-hidden="true"></i>
//                        </button>';
//
//                $res .= sprintf('
//                    <div class="category">
//                        <div class="category-item d-flex justify-content-center m-4">
//                            <span>%s</span>
//                            %s
//                        </div>
//                        %s
//                    </div>',
//
//                    $category->name,
//                    $category->hasProduct() ? $add : '',
//                    count($child) > 0 ? '<div class="category-child d-flex justify-content-around" style="margin-top: 20px; border-left: 1px solid; border-right: 1px solid">' . self::printChild($child) . '</div>' : ''
//                );
//            }
//        }
//        return $res;
//
//    }

    public function hasProduct() {
        return $this->hasOne(Products::class, ['categoryID' => 'id'])->count() == 0;
    }

}
