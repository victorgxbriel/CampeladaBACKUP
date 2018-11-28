<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Equipe;
use app\controllers\CampeonatoController;
use \yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Campeonato */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('https://cdn.jsdelivr.net/npm/vue');
$this->registerJsFile('@web/usuario/js/campeonato_create_form.js');
$this->registerJsFile('@web/usuario/js/ativaVue.js');
$this->registerJsFile('@web/usuario/js/campeonato_form.js', ['depends'=>'\yii\web\JqueryAsset']);
$displayFormatos = array_merge(['' => 'Selecione um formato'], $formatos);


?>
<div class="campeonato-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modalidade')->dropDownList(['prompt'=>'Seleciona uma modalidade','futsal'=>'Futsal','basquete'=>'Basquete','voleibol'=>'Voleibol','handebol'=>'Handebol','queimada'=>'Queimada','futebol'=>'Futebol','voleibolDeAreia'=>'Voleibol de areia','jogoEletronico'=>'Jogo eletrônico','outros'=>'Outros']) 	?>

	<?= $form->field($model, 'formato')->dropDownList($displayFormatos, ['id'=>'formato']) ?>

    <?= $form->field($model, 'usuario_idusuario')->hiddenInput(['value'=> Yii::$app->user->identity->idusuario])->label(false) ?>

    <?= $form->field($model, 'qtdEquipe')->textInput(['onchange'=>'pushVarios()','id'=>'qtdEquipe']) ?>
    
    <div id="qtdGrupo">
    <?= $form->field($model, 'qtdGrupo')->textInput() ?>
    </div>

    <?= $form->field($model, 'qtdEquipeGrupo')->textInput(['maxlength' => true]) ?>
    
    <label>Equipes:</label>
    <div id="app">
        <div v-for="equipe in equipes" class="form-group">
            <?= Html::dropDownList('equipe',null,ArrayHelper::map($equipes2,'idequipe','nome'), ['class' =>'form-control'])  ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
