<?php

namespace util;


use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;


class CustomDialog extends Widget{
	
	const SIZE_LARGE = "modal-lg";
	const SIZE_SMALL = "modal-sm";
	const SIZE_DEFAULT = "";
	
	public $id_w;
	public $html ="";
	public $header;
	public $headerOptions;
	public $footer;
	public $footerOptions;
	public $size;
	public $closeButton = [];
	public $toggleButton = false;
	public $content;
	public $options=[];
	public $clientOptions=[];
	
	public function init(){
		
		$this->id_w = 1;
		parent::init();
		$this->loadOptions();
		$this->html.= $this->renderToggleButton() . "\n";
		$this->html.= Html::beginTag('div', $this->options) . "\n";
		$this->html.= Html::beginTag('div', ['class' => 'modal-dialog ' . $this->size]) . "\n";
		$this->html.= Html::beginTag('div', ['class' => 'modal-content']) . "\n";
		
		$this->html.= $this->renderHeader() . "\n";
		$this->html.= $this->renderBodyBegin() . "\n";
		$this->html.=  $this->content ."\n";
	}
	
	public function run(){
		
		
		$this->html.= "\n" . $this->renderBodyEnd();
		$this->html.= "\n" . $this->renderFooter();
		$this->html.= "\n" . Html::endTag('div'); // modal-content
	
		$this->html.= "\n" . Html::endTag('div'); // modal-dialog
		$this->html.= "\n" . Html::endTag('div');
		
		
		return $this->html;
	}
	
	
	
	
	public function loadOptions(){
		if(!is_array($this->options)){
			$this->options = [];
		}
	 $this->options = array_merge([
            'class' => 'fade',
            'role' => 'dialog',
            'tabindex' => -1,
        ], $this->options);
        Html::addCssClass($this->options, ['widget' => 'modal']);

        if ($this->clientOptions !== false) {
            $this->clientOptions = array_merge(['show' => false], $this->clientOptions);
        }

        if ($this->closeButton !== false) {
            $this->closeButton = array_merge([
                'data-dismiss' => 'modal',
                'aria-hidden' => 'true',
                'class' => 'close',
            ], $this->closeButton);
        }

        if ($this->toggleButton !== false) {
            $this->toggleButton = array_merge([
                'data-toggle' => 'modal',
            ], $this->toggleButton);
            if (!isset($this->toggleButton['data-target']) && !isset($this->toggleButton['href'])) {
                $this->toggleButton['data-target'] = '#' . $this->options['id'];
            }
        }
	}
	
	
	public function renderToggleButton()
	{
		
		if (($toggleButton = $this->toggleButton) !== false) {
			$tag = ArrayHelper::remove($toggleButton, 'tag', 'button');
			$label = ArrayHelper::remove($toggleButton, 'label', 'Show');
			if ($tag === 'button' && !isset($toggleButton['type'])) {
				$toggleButton['type'] = 'button';
			}
			
			return Html::tag($tag, $label, $toggleButton);
		} else {
			return null;
		}
	}
	
	public function renderHeader()
	{
		$button = $this->renderCloseButton();
		if ($button !== null) {
			$this->header = $button . "\n" . $this->header;
		}
		if ($this->header !== null) {
			Html::addCssClass($this->headerOptions, ['widget' => 'modal-header']);
			return Html::tag('div', "\n" . $this->header . "\n", $this->headerOptions);
		} else {
			return null;
		}
	}
	
	public function renderCloseButton()
	{
		if (($closeButton = $this->closeButton) !== false) {
			$tag = ArrayHelper::remove($closeButton, 'tag', 'button');
			$label = ArrayHelper::remove($closeButton, 'label', '&times;');
			if ($tag === 'button' && !isset($closeButton['type'])) {
				$closeButton['type'] = 'button';
			}
	
			return Html::tag($tag, $label, $closeButton);
		} else {
			return null;
		}
	}
	
	public function renderBodyBegin()
	{
		return Html::beginTag('div', ['class' => 'modal-body']);
	}
	
	/**
	 * Renders the closing tag of the modal body.
	 * @return string the rendering result
	 */
	public function renderBodyEnd()
	{
		return Html::endTag('div');
	}
	
	public function renderFooter()
	{
		
		if ($this->footer !== null) {
			Html::addCssClass($this->footerOptions, ['widget' => 'modal-footer']);
			return Html::tag('div', "\n" . $this->footer . "\n", $this->footerOptions);
		} else {
			return null;
		}
	}
}