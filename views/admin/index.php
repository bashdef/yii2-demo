<?php

use app\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ФИО' => [
                    'attribute' => 'ФИО подавшего',
                    'value' => function($model) {
                        return $model->user->getFullUsername();
                    }
            ],
            'description',
            'auto_number',
            'status.name',
            [
                    'header' => 'Редактировать статус заявки',
                    'content' => function($model) {
                        if($model->status->code == 'new'){
                            $buttons = '<button class="btn">' . Html::a('Подтвердить', ['admin/success', 'id' => $model->id]) . '</button><button class="btn">' . Html::a('Отклонить', ['admin/cancel', 'id' => $model->id]) . '</button>';
                            return $buttons;
                        }
                    }
            ]
        ],
    ]); ?>


</div>
