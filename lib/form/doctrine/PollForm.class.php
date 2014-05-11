<?php

/**
 * Poll form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollForm extends BasePollForm {

    public function configure() {
        $this->useFields(array('position_id', 'frequency', 'published', 'order_id'));
        $this->embedi18n(array('mn', 'en'));

        $this->widgetSchema->setLabel('position_id', 'Байрлал');
        $this->widgetSchema->setLabel('frequency', 'Санал өгөх хугацаа');
        $this->widgetSchema->setLabel('published', 'Харуулах?');
        $this->widgetSchema->setLabel('order_id', 'Дэс дугаар');
        
        $this->widgetSchema->setLabel('mn', 'Монгол');
        $this->widgetSchema['mn']->setLabel('question', 'Асуулт');
        $this->widgetSchema->setLabel('en', 'English');

//        $form_data = new PollDataCollectionForm(null, array(
//                    'poll' => $this->getObject(),
//                    'size' => $this->getOption('data_form_cnt', 1),
//                ));
//        $this->embedRelation('PollDatas');
//        $this->embedForm('newPollData', $form_data);
    }

//    public function saveEmbeddedForms($con = null, $forms = null) {
//        if (null === $forms) {
//            $datas = $this->getValue('newPollData');
//            $forms = $this->embeddedForms;
//            foreach ($this->embeddedForms['newPollData'] as $name => $form) {
//                if (!isset($datas[$name])) {
//                    unset($forms['newPollData'][$name]);
//                }
//            }
//        }
//
//        return parent::saveEmbeddedForms($con, $forms);
//    }

}
