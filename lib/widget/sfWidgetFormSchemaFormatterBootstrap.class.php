<?php

class sfWidgetFormSchemaFormatterBootstrap extends sfWidgetFormSchemaFormatter
{
    protected
        $rowFormat       = "<div class=\"control-group %error_class%\">\n%label%\n<div class=\"controls\">%field%\n%help%\n%error%</div>\n%hidden_fields%</div>\n",
        $helpFormat      = '<span class="help-inline">%help%</span>',
        $errorRowFormat  = "\n%errors%\n",
        $errorListFormatInARow     = "  \n%errors%\n",
        $errorRowFormatInARow      = "    <div class=\"help-block\">%error%</div>\n",
        $namedErrorRowFormatInARow = "    <div class=\"help-block\">%name%: %error%</div>\n",
        $decoratorFormat = "%content%",
        $widgetSchema              = null,
        $translationCatalogue      = null;

    public function generateLabel($name, $attributes = array()) {
        $labelName = $this->generateLabelName($name);

        if (false === $labelName)
        {
            return '';
        }

        if (!isset($attributes['for']))
        {
            $attributes['for'] = $this->widgetSchema->generateId($this->widgetSchema->generateName($name));
        }

        if (isset($attributes['class'])) {
            $attributes['class'] .= ' ';
        } else {
            $attributes['class'] = '';
        }

        $attributes['class'] .= 'control-label';

        return $this->widgetSchema->renderContentTag('label', $labelName, $attributes);
    }

    public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
    {
        return strtr($this->getRowFormat(), array(
            '%label%'         => $label,
            '%error_class%'   => count($errors) ? 'error' : '',
            '%field%'         => $field,
            '%error%'         => $this->formatErrorsForRow($errors),
            '%help%'          => $this->formatHelp($help),
            '%hidden_fields%' => null === $hiddenFields ? '%hidden_fields%' : $hiddenFields,
        ));
    }
}