<?php
/**
 * Үнэ бодох
 *
 * @author EagLe
 * 
 * @param double $price
 * @param char $prefix
 * @param double $value
 * 
 * @return double $price
 */

/**
 * Үнэ харуулах
 *
 * @author EagLe
 * 
 * @param double $price
 * @param char $symbol
 * 
 * @return string $price
 */
function price_format($price, $symbol = '₮') {
    $price = (float) $price;

    return number_format($price, 0, '', ' ') . $symbol;
}

/**
 * Нэгжийн сериал дугаарыг харуулах
 *
 * @param string $serial
 * 
 * @return string $serial
 */
function serial_format($serial) {
    $str = $serial;

    if (strlen($serial) == 12) {
        $str = substr($serial, 0, 4) . ' ' . substr($serial, 4, 4) . ' ' . substr($serial, 8, 4);
    }

    return $str;
}

function __pager($pager, $uri) {
    $navigation = '';

    if ($pager->haveToPaginate()) {
        $navigation = '<div class="pagination pagination-centered"><ul>';
        $uri .= (preg_match('/\?/', $uri) ? '&' : '?') . 'page=';

        // First and previous page
        if ($pager->getPage() != 1) {
            $navigation .= '<li>' . link_to('<<', $uri . $pager->getPreviousPage()) . '</li>';
        } else {
            $navigation .= '<li class="disabled"><a style="background-color: #f5f5f5" href="javascript:void(0)"><<</a></li>';
        }

        // Pages one by one
        foreach ($pager->getLinks() as $page) {
            if ($page == $pager->getPage()) {
                $navigation .= '<li class="active"><a href="javascript:void(0)">' . $page . '</a></li>';
            } else {
                $navigation .= '<li>' . link_to($page, $uri . $page) . '</li>';
            }
        }

        // Next and last page
        if ($pager->getPage() != $pager->getCurrentMaxLink()) {
            $navigation .= '<li>' . link_to('>>', $uri . $pager->getNextPage()) . '</li>';
        } else {
            $navigation .= '<li class="disabled"><a href="javascript:void()">>></a></li>';
        }
        $navigation .= '</ul></div>';
    }

    return $navigation;
}

function pager_navigation($pager, $uri) {
    $navigation = '<div class="pagebar">';
    $navigation .= 'Нийт ' . count($pager) . ' үр дүн <br/>';
    if ($pager->haveToPaginate()) {

        $uri .= (preg_match('/\?/', $uri) ? '&' : '?') . 'page=';

        // First and previous page
        if ($pager->getPage() != 1) {
            $navigation .= link_to(image_tag('/images/first.png', array('align' => 'absmiddle')), $uri . $pager->getFirstPage()) . '&nbsp;';
            $navigation .= link_to(image_tag('/images/previous.png', array('align' => 'absmiddle')), $uri . $pager->getPreviousPage()) . '&nbsp;';
        } else {
            $navigation .= '<span class="disabled">' . image_tag('/images/first.png', array('align' => 'absmiddle')) . '</span>';
            $navigation .= '<span class="disabled">' . image_tag('/images/previous.png', array('align' => 'absmiddle')) . '</span>';
        }

        // Pages one by one
        $links = array();
        foreach ($pager->getLinks(10) as $page) {
            if ($page == $pager->getPage())
                $links[] = '<span class="this-page">' . $page . '</span>';
            else
                $links[] = link_to($page, $uri . $page, array('class' => 'number'));
        }
        $navigation .= join('&nbsp;', $links);

        // Next and last page
        if ($pager->getPage() != $pager->getCurrentMaxLink()) {
            $navigation .= '&nbsp;' . link_to(image_tag('/images/next.png', array('align' => 'absmiddle')), $uri . $pager->getNextPage());
            $navigation .= '&nbsp;' . link_to(image_tag('/images/last.png', array('align' => 'absmiddle')), $uri . $pager->getLastPage());
        } else {
            $navigation .= '<span class="disabled">' . image_tag('/images/next.png', array('align' => 'absmiddle')) . '</span>';
            $navigation .= '<span class="disabled">' . image_tag('/images/last.png', array('align' => 'absmiddle')) . '</span>';
        }
    }
    $navigation .= '</div>';
    return $navigation;
}

function pager_navigation_v2($pager, $uri) {
    $uri .= (preg_match('/\?/', $uri) ? '&' : '?') . 'page=';
    if ($pager->haveToPaginate()):
        ?>
        <div class="pagination">
            <a href="<?php echo url_for($uri . 1) ?>">
                <img src="/images/first.png" alt="Эхний хуудас" title="Эхний хуудас" border="0" align="absmiddle"/>
            </a>
            <a href="<?php echo url_for($uri . $pager->getPreviousPage()) ?>">
                <img src="/images/previous.png" alt="Өмнөх хуудас" title="Өмнөх хуудас" border="0" align="absmiddle"/>
            </a>
        <?php foreach ($pager->getLinks() as $page): ?>
            <?php if ($page == $pager->getPage()): ?>
                    <span><?php echo $page ?></span>
            <?php else: ?>
                    <a href="<?php echo url_for($uri . $page) ?>"><?php echo $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?>    
            <a href="<?php echo url_for($uri . $pager->getNextPage()) ?>">
                <img src="/images/next.png" alt="Дараагийн хуудас" title="Дараагийн хуудас" border="0" align="absmiddle"/>
            </a>
            <a href="<?php echo url_for($uri . $pager->getLastPage()) ?>">
                <img src="/images/last.png" alt="Сүүлийн хуудас" title="Сүүлийн хуудас" border="0" align="absmiddle"/>
            </a>
        </div>
        <?php endif; ?>

    <div class="pagination_desc">
        Нийт <?php echo count($pager) ?> үр дүн

        <?php if ($pager->haveToPaginate()): ?>
            - хуудас <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
    </div>
    <?php
}

function time_ago($from_time, $to_time = null, $include_seconds = false) {
    if (!is_numeric($from_time)) {
        $from_time = strtotime($from_time);
    }

    $to_time = $to_time ? $to_time : time();

    $distance_in_minutes = floor(abs($to_time - $from_time) / 60);
    $distance_in_seconds = floor(abs($to_time - $from_time));

    $string = '';
    $parameters = array();

    if ($distance_in_minutes <= 1) {
        if (!$include_seconds) {
            $string = $distance_in_minutes == 0 ? 'саяхан' : '1 минут өмнө';
        } else {
            if ($distance_in_seconds <= 5) {
                $string = '5 секундийн өмнө';
            } else if ($distance_in_seconds >= 6 && $distance_in_seconds <= 10) {
                $string = '10 секундийн өмнө';
            } else if ($distance_in_seconds >= 11 && $distance_in_seconds <= 20) {
                $string = '20 секундийн өмнө';
            } else if ($distance_in_seconds >= 21 && $distance_in_seconds <= 40) {
                $string = '30 секундийн өмнө';
            } else if ($distance_in_seconds >= 41 && $distance_in_seconds <= 59) {
                $string = '50 секундийн өмнө';
            } else {
                $string = '1 минутын өмнө';
            }
        }
    } else if ($distance_in_minutes >= 2 && $distance_in_minutes <= 44) {
        $string = '%minutes% минутын өмнө';
        $parameters['%minutes%'] = $distance_in_minutes;
    } else if ($distance_in_minutes >= 45 && $distance_in_minutes <= 89) {
        $string = '1 цагийн өмнө';
    } else if ($distance_in_minutes >= 90 && $distance_in_minutes <= 1439) {
        $string = '%hours% цагийн өмнө';
        $parameters['%hours%'] = round($distance_in_minutes / 60);
    } else if ($distance_in_minutes >= 1440 && $distance_in_minutes <= 2879) {
        $string = '1 өдрийн өмнө';
    } else if ($distance_in_minutes >= 2880 && $distance_in_minutes <= 43199) {
        $string = '%days% өдрийн өмнө';
        $parameters['%days%'] = round($distance_in_minutes / 1440);
    } else if ($distance_in_minutes >= 43200 && $distance_in_minutes <= 86399) {
        $string = '1 сарын өмнө';
    } else /* if ($distance_in_minutes >= 86400 && $distance_in_minutes <= 525959)
      {
      $string = '%months% сарын өмнө';
      $parameters['%months%'] = round($distance_in_minutes / 43200);
      }
      else if ($distance_in_minutes >= 525960 && $distance_in_minutes <= 1051919)
      {
      $string = '1 жилийн өмнө';
      }
      else
      {
      $string = '%years%  жилийн өмнө';
      $parameters['%years%'] = floor($distance_in_minutes / 525960);
      } */ {
        return date("Y-m-d H:i", $from_time);
    }
    return strtr($string, $parameters);
}

function display_options($parent, $level, $selected_cat_id, $group_ids = null) { // уг $parent ийн доод талын division үүдийг хэвлэдэг функц
    $product_cats = ProductCategoryPeer::getListByParentId($parent, $group_ids);
    foreach ($product_cats as $product_cat) {

        if ($selected_cat_id == $product_cat->getId()) {

            echo '<option value="' . $product_cat->getId() . '" selected>';

            for ($i = 0; $i < $level; $i++)
                echo "------";

            echo $rows ['name'];

            echo '</option>';
        } else {

            echo '<option value="' . $product_cat->getId() . '">';

            for ($i = 0; $i < $level; $i++)
                echo "------";

            echo $product_cat->getName();

            echo '</option>';
        }

        display_options($product_cat->getId(), $level + 1, $selected_cat_id);
    }
}

function options_for_select_organizations($parent, $level, $selected_id) {
// уг $parent ийн доод талын division үүдийг хэвлэдэг функц

    $organizations = Doctrine_Core::getTable('Organization')->getByParentId($parent, $level);

    foreach ($organizations as $organization) :

        if ($selected_id == $organization->getId()):
            ?> 

            <option value="<?php echo $organization->getId() ?>" selected="selected">

            <?php
            for ($i = 0; $i < $level; $i++)
                echo "------";

            echo $organization->getName();
            ?>

            </option>

            <?php
        else:
            ?>

            <option value="<?php echo $organization->getId() ?>">

            <?php
            for ($i = 0; $i < $level; $i++)
                echo "------";

            echo $organization->getName();
            ?>

            </option>

        <?php
        endif;

        options_for_select_organizations($organization->getId(), $level + 1, $selected_id);

    endforeach;
}

function print_for_table_organizations($parent, $level, $counter) {

// уг $parent ийн доод талын division үүдийг хэвлэдэг функц

    $organizations = Doctrine_Core::getTable('Organization')->getByParentId($parent, $level + 1);

    $cntr = 0;

    foreach ($organizations as $organization) {

        $cntr++;

        echo '<tr><td align="center">' . $counter . '.' . $cntr . '</td><td>';

        for ($i = 0; $i <= $level; $i++)
            echo "------";

        echo $organization->getName();
        ?>

        </td>

        <td width="50" align="center"><?php echo link_to(image_tag('/images/icons/edit.png', array('border' => 0)), '@organization_edit?id=' . $organization->getId()) ?></td>

        <td width="50" align="center"><?php echo link_to(image_tag('/images/icons/delete.png', array('border' => 0)), '@organization_delete?id=' . $organization->getId(), array('confirm' => 'Та устгахдаа итгэлтэй байна уу?')) ?></td>

        </tr>

        <?php
        print_for_table_organizations($organization->getId(), $level + 1, $cntr);
    }
}

function convert($haystack) {
    $words = array();

    $symbol = '#';
    $space = ' ';
    $length = strlen($haystack);
    for ($i = 0; $i <= $length; $i++) {
        $char = substr($haystack, $i, 1);
        $word = '';
        if ($char == $symbol) {
            $start = $i;
            $needle = substr($haystack, $start - strlen($haystack));

            $j = 0;
            do {
                $j++;
                $total = $start + $j;
            } while (substr($needle, $j, 1) != $space && $total <= $length && substr($needle, $j, 1) != $symbol);

            $end = $j;
            $word = substr($haystack, $start, $end);
            $words[] = $word;
        }
    }

    if (count($words)) {
        foreach ($words as $w) {
            $replace_word = '<a href="' . url_for('@search?q=' . substr($w, 1 - strlen($w))) . '">' . $w . '</a>';
            $haystack = str_replace($w, $replace_word, $haystack);
        }
    }
    return $haystack;
}

function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }
    return $trimmed_text;
}

function renderError($form) {
    if ($form->hasErrors()) {
        echo '<div class="error">';
        foreach ($form as $field) {
            echo $field->renderError();
        }
        echo $form->renderGlobalErrors();
        echo '</div>';
    }
}

function renderSuccess($sf_user) {
    if ($sf_user->hasFlash('success')) {
        echo '<div class="success">';
        echo $sf_user->getFlash('success');
        echo '</div>';
    }
}
?>
