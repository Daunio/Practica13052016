<?php

use yii\helpers\Html;
//use kartik\grid\GridView;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Profesores';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="profesor-index">
    
    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a('Crear Profesor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class'=> 'yii\grid\SerialColumn'],
            'id',
            'Nombre',
            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>
    
</div>


