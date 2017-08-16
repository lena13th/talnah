<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="main_wrapper">
    <ul class="breadcrumbs col-lg-offset-3">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <?php
        if (!empty($grf)) {
            ?>
            <li><a href="<?= Url::to(['/page/index', 'alias' => $grf]) ?>">Спортивные
                    сооружения</a></li>
            <?php
        }
        if (!empty($parent_page)) {
            ?>
            <li>
                <a href="<?= Url::to(['/page/index', 'alias' => $parent_page->alias]) ?>">
                    <?= $parent_page->title ?>
                </a>
            </li>

            <?php
        }
        ?>
        <li><?= $page->title ?></li>
    </ul>
    <?php if (!empty($page)): ?>
        <?php
        if ((!empty($grf)) && ($grf != '0')) {
            $this->params['active_parent_page'][] = $grf;
            $this->params['active_page'][] = $page->parent_alias;
        } elseif ($page->parent_alias != '0') {
            $this->params['active_parent_page'][] = $page->parent_alias;
            $this->params['active_page'][] = $page->alias;
        } else {
            $this->params['active_page'][] = $page->alias;
            $this->params['active_parent_page'][] = '';
        }
        ?>
        <div class="main">
            <div class="left main_left col-xs-12 col-md-12 col-lg-3">
                <div class="left_block">
                    <div class="left_block_content">
                        <ul class="left_menu">
                            <?php if (!empty($child_pages)): ?>

                                <?php foreach ($child_pages as $child_page): ?>
                                    <li>
                                        <?php
                                        if ($child_page->alias == 'contacts'):
                                            ?>
                                            <a href="<?= Url::to(['/page/contacts', 'parent_alias' => $page->alias,'grf' => $parent_page->alias]) ?>"><?= $child_page->title ?></a>
                                        <?php else: ?>
                                            <a href="<?= Url::to(['/page/index', 'alias' => $child_page->alias, 'parent_alias' => $page->alias, 'grf' => $parent_page->alias]) ?>"><?= $child_page->title ?></a>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php foreach ($next_pages as $next_page): ?>
                                    <li
                                        <?php
                                        if ($next_page->alias == $page->alias) { ?>
                                            class="active"
                                        <?php }
                                        ?>
                                    >
                                        <?php
                                        if ($next_page->alias == 'contacts'):
                                            ?>
                                            <a href="<?= Url::to(['/page/contacts', 'parent_alias' => $next_page->parent_alias, 'grf' => $grf]) ?>"><?= $next_page->title ?></a>
                                        <?php else: ?>
                                            <a href="<?= Url::to(['/page/index', 'alias' => $next_page->alias, 'parent_alias' => $next_page->parent_alias, 'grf' => $grf]) ?>"><?= $next_page->title ?></a>
                                        <?php endif; ?>

                                    </li>

                                <?php endforeach; ?>
                            <?php endif; ?>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="content col-xs-12 col-sm-9 col-md-8 col-lg-9">
                <h1>
                    <?php
                    if (!empty($page->full_title)) {
                        echo $page->full_title;
                    } else {
                        echo $page->title;
                    }
                    ?>
                </h1>

                <?php
                if ($page->alias == 'vacancies') {

                } else {
                    ?>
                    <?= $page->content ?>

                    <?php
                }
                ?>
            </div>
        </div>
    <?php endif; ?>

</div>
