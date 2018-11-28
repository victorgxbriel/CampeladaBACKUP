<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\Equipe;

/* @var $this yii\web\View */
/* @var $model app\models\Equipe */ 
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/usuario/js/testemodal.js');
$this->registerJsFile('https://cdn.jsdelivr.net/npm/vue');
$this->registerJsFile('@web/usuario/js/equipe_create_form.js');
$this->registerJsFile('@web/usuario/js/botaodomodal.js');

$this->registerCss('#exampleModal { z-index: 1500; }');
?>
<div class="usuario-inicial">
	<h1>Olá, <?php echo Yii::t('app', '{user}', ['user'=>Yii::$app->user->identity->nome]);?></h1>         
	<h4>Seus campeonatos</h4>
	 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            //'idcampeonato',
            'nome',
            'modalidade',
            'formato',
            [
                'attribute'=> 'qtdEquipe',
                'header'=> 'Quant. Equipes',
            ],
            //'qtdGrupo',
            //'qtdEquipeGrupo',

        ],
    ]); ?>
</div>  

<script type="text/x-template" id="modal-template">
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
              cabeçalho
            </slot>
          </div>

          <div class="modal-body">
            <slot name"body>
              corpo
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              footer
              <button class="modal-default-button" @click="$emit('close')">
                OK
              </button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</script>

<!-- app -->
<div id="app">
  <button id="show-modal" @click="show-modal = true">Show modal</button>
  
  <modal v-if="showModal" @close="showModal=false">
    <h3 slot="header">custom header</h3>
</div>
  