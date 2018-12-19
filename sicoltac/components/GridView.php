<?php

namespace app\components;

use Yii;
use yii\helpers\Html;
use yii\web\JsExpression;

/**
 * Description of GridView
 *
 * @author wesley
 */
class GridView extends \kartik\grid\GridView
{

    /**
     * @var título do box que contem o grid.
     */
    public $boxTitle;
    public $footer = '<div class="pull-right pagination">            
                        {summary}
                      </div>';

    /** @var tamanho da paginação. Padrão 10. Use falso para não utilizar paginação */
    public $pagination = 10;
    
    public $botaoAdicionar = true;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->layout = '<div class="box box-primary">
                <div class="box-header with-border">
        
              
                        {toolbar}
                    
                </div>
                <div class="box-body">
                    {items}
                    {pager}
                    ' . (($this->footer == false) ? '' : $this->footer) . '
                </div>
           
            </div>';

        
            // Toolbar do grid personalizada
        
        if ($this->botaoAdicionar == true){
            $botaoAdicionar = Html::a('<i class="glyphicon glyphicon-plus"></i> Adicionar', ['create'], ['class' => 'btn btn-success']);
            $botaoLimparFiltros = Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-default', 'title' => 'Limpar Filtros']);
            $this->toolbar = [
                'content' => $botaoAdicionar . ' ' . $botaoLimparFiltros,
                '{export}',
                '{toggleData}'
            ];
            
        }
        

        if ($this->dataProvider->getPagination() !== false) {
            $this->dataProvider->setPagination(['pageSize' => $this->pagination]);
        }


        parent::init();
    }

    /**
     * Initialize grid export.
     */
    protected function initExport()
    {
        if ($this->export === false) {
            return;
        }
        $this->exportConversions = array_replace_recursive(
            [
            ['from' => self::ICON_ACTIVE, 'to' => Yii::t('kvgrid', 'Active')],
            ['from' => self::ICON_INACTIVE, 'to' => Yii::t('kvgrid', 'Inactive')],
            ], $this->exportConversions
        );
        if (!isset($this->export['fontAwesome'])) {
            $this->export['fontAwesome'] = false;
        }
        $isFa = $this->export['fontAwesome'];
        $this->export = array_replace_recursive(
            [
            'label' => '',
            'icon' => $isFa ? 'share-square-o' : 'glyphicon glyphicon-export',
            'messages' => [
                'allowPopups' => Yii::t(
                    'kvgrid', 'Disable any popup blockers in your browser to ensure proper download.'
                ),
                'confirmDownload' => Yii::t('kvgrid', 'Ok to proceed?'),
                'downloadProgress' => Yii::t('kvgrid', 'Generating the export file. Please wait...'),
                'downloadComplete' => Yii::t(
                    'kvgrid', 'Request submitted! You may safely close this dialog after saving your downloaded file.'
                ),
            ],
            'options' => ['class' => 'btn btn-default', 'title' => Yii::t('kvgrid', 'Export')],
            'menuOptions' => ['class' => 'dropdown-menu dropdown-menu-right '],
            ], $this->export
        );
        if (!isset($this->export['header'])) {
            $this->export['header'] = '<li role="presentation" class="dropdown-header">' .
                Yii::t('kvgrid', 'Export Page Data') . '</li>';
        }
        if (!isset($this->export['headerAll'])) {
            $this->export['headerAll'] = '<li role="presentation" class="dropdown-header">' .
                Yii::t('kvgrid', 'Export All Data') . '</li>';
        }
        $title = empty($this->caption) ? Yii::t('kvgrid', 'Grid Export') : $this->caption;
        $pdfHeader = [
            'L' => [
                'content' => 'IFNMG',
                'font-size' => 8,
                'color' => '#333333',
            ],
            'C' => [
                'content' => Yii::$app->view->title,
                'font-size' => 16,
                'color' => '#333333',
            ],
            'R' => [
                'content' => Yii::t('kvgrid', 'Generated') . ': ' . Yii::$app->session->get('nome'). ' - ' . date('d-m-Y H:i:s'), //date("D, d-M-Y g:i a T"),
                'font-size' => 8,
                'color' => '#333333',
            ],
        ];
        $pdfFooter = [
            'L' => [
                'content' => 'Instituto Federal do Norte de Minas Gerais',
                'font-size' => 8,
                'font-style' => 'B',
                'color' => '#999999',
            ],
            'R' => [
                'content' => '[ {PAGENO} ]',
                'font-size' => 10,
                'font-style' => 'B',
                'font-family' => 'serif',
                'color' => '#333333',
            ],
            'line' => true,
        ];
        $defaultExportConfig = [
            self::HTML => [
                'label' => Yii::t('kvgrid', 'HTML'),
                'icon' => $isFa ? 'file-text' : 'glyphicon glyphicon-floppy-saved',
                'iconOptions' => ['class' => 'text-info'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => Yii::t('kvgrid', 'grid-export'),
                'alertMsg' => Yii::t('kvgrid', 'The HTML export file will be generated for download.'),
                'options' => ['title' => Yii::t('kvgrid', 'Hyper Text Markup Language')],
                'mime' => 'text/html',
                'config' => [
                    'cssFile' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
                ],
            ],
            self::CSV => [
                'label' => Yii::t('kvgrid', 'CSV'),
                'icon' => $isFa ? 'file-code-o' : 'glyphicon glyphicon-floppy-open',
                'iconOptions' => ['class' => 'text-primary'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => Yii::t('kvgrid', 'grid-export'),
                'alertMsg' => Yii::t('kvgrid', 'The CSV export file will be generated for download.'),
                'options' => ['title' => Yii::t('kvgrid', 'Comma Separated Values')],
                'mime' => 'application/csv',
                'config' => [
                    'colDelimiter' => ",",
                    'rowDelimiter' => "\r\n",
                ],
            ],
            self::TEXT => [
                'label' => Yii::t('kvgrid', 'Text'),
                'icon' => $isFa ? 'file-text-o' : 'glyphicon glyphicon-floppy-save',
                'iconOptions' => ['class' => 'text-muted'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => Yii::t('kvgrid', 'grid-export'),
                'alertMsg' => Yii::t('kvgrid', 'The TEXT export file will be generated for download.'),
                'options' => ['title' => Yii::t('kvgrid', 'Tab Delimited Text')],
                'mime' => 'text/plain',
                'config' => [
                    'colDelimiter' => "\t",
                    'rowDelimiter' => "\r\n",
                ],
            ],
            self::EXCEL => [
                'label' => Yii::t('kvgrid', 'Excel'),
                'icon' => $isFa ? 'file-excel-o' : 'glyphicon glyphicon-floppy-remove',
                'iconOptions' => ['class' => 'text-success'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => Yii::t('kvgrid', 'grid-export'),
                'alertMsg' => Yii::t('kvgrid', 'The EXCEL export file will be generated for download.'),
                'options' => ['title' => Yii::t('kvgrid', 'Microsoft Excel 95+')],
                'mime' => 'application/vnd.ms-excel',
                'config' => [
                    'worksheet' => Yii::t('kvgrid', 'ExportWorksheet'),
                    'cssFile' => '',
                ],
            ],
            self::PDF => [
                'label' => Yii::t('kvgrid', 'PDF'),
                'icon' => $isFa ? 'file-pdf-o' : 'glyphicon glyphicon-floppy-disk',
                'iconOptions' => ['class' => 'text-danger'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => Yii::t('kvgrid', 'grid-export'),
                'alertMsg' => Yii::t('kvgrid', 'The PDF export file will be generated for download.'),
                'options' => ['title' => Yii::t('kvgrid', 'Portable Document Format')],
                'mime' => 'application/pdf',
                'config' => [
                    'mode' => 'UTF-8',
                    'format' => 'A4-L',
                    'destination' => 'D',
                    'marginTop' => 20,
                    'marginBottom' => 20,
                    'cssInline' => '.kv-wrap{padding:20px;}' .
                    '.kv-align-center{text-align:center;}' .
                    '.kv-align-left{text-align:left;}' .
                    '.kv-align-right{text-align:right;}' .
                    '.kv-align-top{vertical-align:top!important;}' .
                    '.kv-align-bottom{vertical-align:bottom!important;}' .
                    '.kv-align-middle{vertical-align:middle!important;}' .
                    '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                    '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                    '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
                    'methods' => [
                        'SetHeader' => [
                            ['odd' => $pdfHeader, 'even' => $pdfHeader],
                        ],
                        'SetFooter' => [
                            ['odd' => $pdfFooter, 'even' => $pdfFooter],
                        ],
                    ],
                    'options' => [
                        'title' => $title,
                        'subject' => Yii::t('kvgrid', 'PDF export generated by kartik-v/yii2-grid extension'),
                        'keywords' => Yii::t('kvgrid', 'krajee, grid, export, yii2-grid, pdf'),
                    ],
                    'contentBefore' => '',
                    'contentAfter' => '',
                ],
            ],
            self::JSON => [
                'label' => Yii::t('kvgrid', 'JSON'),
                'icon' => $isFa ? 'file-code-o' : 'glyphicon glyphicon-floppy-open',
                'iconOptions' => ['class' => 'text-warning'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => Yii::t('kvgrid', 'grid-export'),
                'alertMsg' => Yii::t('kvgrid', 'The JSON export file will be generated for download.'),
                'options' => ['title' => Yii::t('kvgrid', 'JavaScript Object Notation')],
                'mime' => 'application/json',
                'config' => [
                    'colHeads' => [],
                    'slugColHeads' => false,
                    'jsonReplacer' => new JsExpression("function(k,v){return typeof(v)==='string'?$.trim(v):v}"),
                    'indentSpace' => 4,
                ],
            ],
        ];
        $this->exportConfig = self::parseExportConfig($this->exportConfig, $defaultExportConfig);
    }
}

