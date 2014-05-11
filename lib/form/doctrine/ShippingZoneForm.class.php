<?php

/**
 * ShippingZone form.
 *
 * @package    CMS
 * @subpackage form
 * @author     Lkhagva-Ochir Narmandakh
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShippingZoneForm extends BaseShippingZoneForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at'], $this['zone']);
      
      $this->widgetSchema['description'] = new sfWidgetFormTextarea();
  }
}
