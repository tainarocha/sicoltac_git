<?php

namespace app\components;

use yii\bootstrap\ButtonGroup;
use yii\helpers\Html;

/**
 * Class CollapseBox - Caixa com botão de minimizar
 * 
 * @example
 * <?php
 *   Box::begin([
 *      'type'=>Box::TYPE_SUCCESS,
 *      'tooltip'=>'Caixa estilo adminLte',
 *      'title'=>'Título',
 *      'footer'=>'Rodapé'
 *   ]);
 * ?>
 *    Conteúdo da caixa
 * <?php
 *   Box::end();
 * ?>
 * 
 * Também suporte 
 * <?= Box::widget([
 *      'type'=>Box::TYPE_SUCCESS,
 *      'tooltip'=>'Caixa estilo adminLte',
 *      'title'=>'Título',
 *      'body'=>'Conteúdo da caixa',
 *      'footer'=>'Rodapé'
 * ])?>
 * 
 * @author Christopher Morandi Mota
 * @since 1.1.0
 */
class BoxCollapse extends Box {

    /**
     * @var string
     */
    public $collapsIconClass = "fa-minus";

    /**
     * @var string
     */
    public $expandIconClass = "fa-plus";

    /**
     * @var boolean $collapseRemember - Definir cookies para lembrar o estado da caixa
     */
    public $collapseRemember = false;

    /**
     * @var boolean $collapseDefault - mostrar no inicialmente no estado minimizado
     */
    public $collapseDefault = false;
    public $collapseButtonTemplate = <<<HTML
<button class="btn {btnType} btn-xs" data-widget="collapse" id="{uniq}_btn"><i class="fa {iconClass}"></i></button>
HTML;
    protected $uniqId;

    /**
     *
     */
    public function init() {
        if (!isset($this->options['id'])) {
            $this->uniqId = $this->options['id'] = 'bc_' . $this->getId();
        }
        if ($this->collapseDefault and ! $this->collapseRemember) {
            Html::addCssClass($this->options, 'collapsed-box');
        }
        if ($this->collapseRemember) {
            Html::addCssClass($this->options, 'remember');
        }
        $this->registerJs();
        parent::init();
    }

    /**
     *
     */
    public function run() {
        return parent::run();
    }

    protected function registerJs() {
        if ($this->collapseRemember) {
//            $view = $this->getView();
//            JsCookieAsset::register($view);
//            CollapseBoxAsset::register($view);
        }
    }

    /**
     * @return string
     */
    protected function prepareBoxTools() {
        $boxTools = '';
        $collapseButton = strtr(
                $this->collapseButtonTemplate, [
            '{btnType}' => ($this->isTile) ? 'bg-' . $this->type : 'btn-' . $this->type,
            '{uniq}' => $this->uniqId,
            '{iconClass}' => ($this->collapseDefault && !$this->collapseRemember) ? $this->expandIconClass : $this->collapsIconClass,
        ]);
        if (!empty($this->boxTools)) {
            if (is_array($this->boxTools)) {
                $boxTools[] = $collapseButton;
                $boxTools = ButtonGroup::widget([
                            'buttons' => $this->boxTools,
                            'encodeLabels' => false,
                ]);
            } else {
                $boxTools = $this->boxTools . $collapseButton;
            }
        } else {
            $boxTools = $collapseButton;
        }
        return Html::tag('div', $boxTools, ['class' => 'box-tools pull-right']);
    }

}
