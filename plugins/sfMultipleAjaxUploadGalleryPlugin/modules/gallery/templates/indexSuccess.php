<?php include_partial('gallery/assets') ?>

<div id="sf_admin_container">
    <?php if ($pager->count()) { ?>
        <link href="/galleryview/css/jquery.galleryview-3.0.css" media="screen" type="text/css" rel="stylesheet">

        <div class="smaugv">
            <div id="smaugv-others">
                <h1>Зургийн цомгууд</h1>
                <div>
                    <div>
                        <ul>
                            <?php foreach ($pager->getResults() as $nb => $g) { ?>
                                <li>
                                    <!-- this way we remember where the user is (gallery and page -->
                                    <a title="<?php echo __("Editer") ?>" href="<?php echo url_for("gallery/edit?id=" . $g->getId()) ?>"
                                       style="background-image:url(<?php echo $g->getPhotoDefault() ?>);">
                                        <span class="disposition alpha60"><?php echo "<span style='font-weight:bold'>" . $g->getTitle() . "</span>" ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div style="float: right">
                <?php if ($pager->haveToPaginate()) { ?>
                    <ul class="pagination ball">
                        <?php foreach ($pager->getLinks() as $page) { ?>
                            <li <?php echo $page == $pager->getPage() ? "class='current'" : ""; ?>>
                                <!-- this way we remember where the user is (gallery and page -->
                                <a href="<?php echo preg_replace("/\?[a-z\-&=0-9]+/", "", $_SERVER["REQUEST_URI"]) ?><?php echo isset($_GET["gallery"]) ? "?gallery=" . $_GET["gallery"] . "&" : "?"; ?>page=<?php echo $page ?>">
                                    <span><?php echo $page ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>

            <div style="border-top: 1px solid #EEE; margin-top: 10px;">
                <ul class="sf_admin_actions">
                    <?php include_partial('gallery/list_actions', array('helper' => $helper)) ?>
                </ul>
            </div>

        </div>
    <?php } else { ?>
        <?php echo __("No content yet"); ?> <br class="clear" />
    <?php } ?>
        
    <a class="btn btn-primary" href="<?php echo url_for('gallery/new') ?>">New</a>
</div>

