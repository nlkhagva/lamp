<?php $mainmenu = $sf_request->getParameter('mainmenu'); ?>
<?php $submenu = $sf_request->getParameter('submenu'); ?>

<a class="menu-toggler" id="menu-toggler" href="#">
    <span class="menu-text"></span>
</a>

<div class="sidebar" id="sidebar">
<script type="text/javascript">
    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
        <button class="btn btn-small btn-success">
            <i class="icon-signal"></i>
        </button>

        <button class="btn btn-small btn-info">
            <i class="icon-pencil"></i>
        </button>

        <button class="btn btn-small btn-warning">
            <i class="icon-group"></i>
        </button>

        <button class="btn btn-small btn-danger">
            <i class="icon-cogs"></i>
        </button>
    </div>

    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
        <span class="btn btn-success"></span>

        <span class="btn btn-info"></span>

        <span class="btn btn-warning"></span>

        <span class="btn btn-danger"></span>
    </div>
</div><!--#sidebar-shortcuts-->

<ul class="nav nav-list">
<li <?php echo ($mainmenu == 'homepage' )?'class="active"':''; ?>>
    <a href="<?php echo url_for('public/index'); ?>">
        <i class="icon-dashboard"></i>
        <span class="menu-text"> Dashboard </span>
    </a>
</li>

<li <?php echo ($mainmenu == 'content' )?'class="active open"':''; ?>>
    <a href="#" class="dropdown-toggle">
        <i class="icon-desktop"></i>
        <span class="menu-text"> Мэдээлэл </span>

        <b class="arrow icon-angle-down"></b>
    </a>

    <ul class="submenu">
        <li <?php echo ($submenu == 'page-index' )?'class="active"':''; ?>>
            <a href="<?php echo url_for('content_page/index'); ?>">
                <i class="icon-double-angle-right"></i>
                Хуудас
            </a>
        </li>

        <li <?php echo ($submenu == 'content-new' )?'class="active"':''; ?>>
            <a href="<?php echo url_for('content/new'); ?>">
                <i class="icon-double-angle-right"></i>
                Мэдээлэл нэмэх
            </a>
        </li>
        <li <?php echo ($submenu == 'content-index' )?'class="active"':''; ?>>
            <a href="<?php echo url_for('content/index'); ?>">
                <i class="icon-double-angle-right"></i>
                Мэдээлэл жагсаалт
            </a>
        </li>

        <li <?php echo ($submenu == 'category' )?'class="active open"':''; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="icon-double-angle-right"></i>
                Ангилал
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <?php $category_menu = $sf_request->getParameter('categorymenu') ?>
                <li <?php echo ($category_menu == 'new' )?'class="active open"':''; ?>>
                    <a href="<?php echo url_for('category/new'); ?>">
                        <i class="icon-plus"></i>
                        Нэмэх
                    </a>
                </li>

                <li <?php echo ($category_menu == 'index' )?'class="active open"':''; ?>>
                    <a href="<?php echo url_for('category/index'); ?>">
                        <i class="icon-eye-open"></i>
                        Жагсаалт
                    </a>
                </li>
            </ul>
        </li>
        <li <?php echo ($submenu == 'section' )?'class="active open"':''; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="icon-double-angle-right"></i>
                Секци
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <?php $menu = $sf_request->getParameter('section_menu') ?>
                <li <?php echo ($menu == 'new' )?'class="active open"':''; ?>>
                    <a href="<?php echo url_for('section/new'); ?>">
                        <i class="icon-plus"></i>
                        Нэмэх
                    </a>
                </li>

                <li <?php echo ($menu == 'index' )?'class="active open"':''; ?>>
                    <a href="<?php echo url_for('section/index'); ?>">
                        <i class="icon-eye-open"></i>
                        Жагсаалт
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>

<li <?php echo ($mainmenu == 'user' )?'class="active open"':''; ?>>
    <a href="#" class="dropdown-toggle">
        <i class="icon-user"></i>
        <span class="menu-text"> Хэрэглэгч</span>

        <b class="arrow icon-angle-down"></b>
    </a>

    <ul class="submenu">
        <li <?php echo ($submenu == 'user-index' )?'class="active open"':''; ?>>
            <a href="<?php echo url_for('@sf_guard_user'); ?>">
                <i class="icon-double-angle-right"></i>
                Хэрэглэгчид
            </a>
        </li>

        <li <?php echo ($submenu == 'user-group' )?'class="active open"':''; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="icon-double-angle-right"></i>
                Групп
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <?php $group_menu = $sf_request->getParameter('user-group-menu') ?>
                <li <?php echo ($group_menu == 'new' )?'class="active open"':''; ?>>
                    <a href="<?php echo url_for('@sf_guard_group_new'); ?>">
                        <i class="icon-plus"></i>
                        Нэмэх
                    </a>
                </li>

                <li <?php echo ($group_menu == 'index' )?'class="active open"':''; ?>>
                    <a href="<?php echo url_for('@sf_guard_group'); ?>">
                        <i class="icon-eye-open"></i>
                        Жагсаалт
                    </a>
                </li>
            </ul>
        </li>
        <li <?php echo ($submenu == 'user-permission' )?'class="active open"':''; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="icon-double-angle-right"></i>
                Хандах эрх
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <?php $permission_menu = $sf_request->getParameter('user-permission-menu') ?>
                <li <?php echo ($permission_menu == 'new' )?'class="active open"':''; ?>>
                    <a href="<?php echo url_for('@sf_guard_permission_new'); ?>">
                        <i class="icon-plus"></i>
                        Нэмэх
                    </a>
                </li>

                <li <?php echo ($permission_menu == 'index' )?'class="active open"':''; ?>>
                    <a href="<?php echo url_for('@sf_guard_permission'); ?>">
                        <i class="icon-eye-open"></i>
                        Жагсаалт
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
<li <?php echo ($mainmenu == 'gallery')?'class="active"':''; ?>>
    <a href="<?php echo url_for('@gallery'); ?>">
        <i class="icon-camera"></i>
        <span class="menu-text"> Зургийн цомог </span>
    </a>
</li>

<li <?php echo ($mainmenu == 'video')?'class="active"':''; ?>>
    <a href="<?php echo url_for('video/index'); ?>">
        <i class="icon-expand"></i>
        <span class="menu-text"> Видео </span>
    </a>
</li>



<!--<li>-->
<!--    <a href="#" class="dropdown-toggle">-->
<!--        <i class="icon-cogs "></i>-->
<!--        <span class="menu-text"> Тохиргоо </span>-->
<!---->
<!--        <b class="arrow icon-angle-down"></b>-->
<!--    </a>-->
<!---->
<!--    <ul class="submenu">-->
<!--        <li>-->
<!--            <a href="form-elements.html">-->
<!--                <i class="icon-double-angle-right"></i>-->
<!--                Form Elements-->
<!--            </a>-->
<!--        </li>-->
<!---->
<!--        <li>-->
<!--            <a href="form-wizard.html">-->
<!--                <i class="icon-double-angle-right"></i>-->
<!--                Wizard &amp; Validation-->
<!--            </a>-->
<!--        </li>-->
<!---->
<!--        <li>-->
<!--            <a href="wysiwyg.html">-->
<!--                <i class="icon-double-angle-right"></i>-->
<!--                Wysiwyg &amp; Markdown-->
<!--            </a>-->
<!--        </li>-->
<!---->
<!--        <li>-->
<!--            <a href="dropzone.html">-->
<!--                <i class="icon-double-angle-right"></i>-->
<!--                Dropzone File Upload-->
<!--            </a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</li>-->

</ul><!--/.nav-list-->

<div class="sidebar-collapse" id="sidebar-collapse">
    <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
</div>

<script type="text/javascript">
    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
</script>
</div>
