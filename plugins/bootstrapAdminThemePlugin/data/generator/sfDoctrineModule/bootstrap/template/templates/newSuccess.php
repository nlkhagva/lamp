[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <ul class="breadcrumb">
        <li>
            <a href="[?php echo url_for('@homepage'); ?]"><i class="icon-home home-icon"></i></a>

                                <span class="divider">
                                    <i class="icon-angle-right arrow-icon"></i>
                                </span>
        </li>
        <li>
            <a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/index'); ?]">[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</a>
                                <span class="divider">
                                    <i class="icon-angle-right arrow-icon"></i>
                                </span>
        </li>
        <li class="active">[?php echo <?php echo $this->getI18NString('new.title') ?> ?]</li>
    </ul>

</div>
<div class="page-content">
  <div class="page-header">
    <h1>[?php echo <?php echo $this->getI18NString('new.title') ?> ?]</h1>
  </div>

  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

  [?php include_partial('<?php echo $this->getModuleName() ?>/form_header', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]

  [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]

  [?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
</div>