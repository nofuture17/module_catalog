<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\Manufacture */

?>
<div class="manufacture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
