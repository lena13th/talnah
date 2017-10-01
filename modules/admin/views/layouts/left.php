<?

use yii\helpers\html;
use app\modules\admin\components\Sportb;

?>
<aside class="main-sidebar">
<?php
//echo app\modules\admin\components\Sportb::widget();
//$sportb=app\modules\admin\components\Sportb::widget();
//echo $sportb;
//app\modules\admin\components\Sportb::widget()
?>


    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
//                    ['label' => 'Панель управления', 'options' => ['class' => 'header']],
                    ['label' => 'Редактировать данные', 'icon' => 'gear', 'url' => ['company/view']],
                    [
                        'label' => 'Объявления',
                        'icon' => 'info-circle',
                        'url' => ['ads/index'],
                    ],
                    [
                        'label' => 'Новости',
                        'icon' => 'newspaper-o',
                        'url' => ['news/index'],
                    ],
                    [
                        'label' => 'Мероприятия',
                        'icon' => 'calendar',
                        'url' => ['events/index'],
                    ],
                    [
                        'label' => 'Спортивные сооружения',
                        'icon' => 'building',
//                        'url' => ['sportbuilding/index', 'id'=>1],
                        'url' => '#',
//                        'items' => [ echo $sportb ],
                    //TODO левое меню
                        'items' => [
                            ['label' => 'СОЦ Восток',
                                'icon' => 'gear',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Редактировать данные', 'icon' => 'gear', 'url' => ['page/view', 'id'=>38,'grf'=>'sportbuilding'],],
                                    ['label' => 'Страницы', 'icon' => 'gear', 'url' => ['page/index', 'parent_alias'=>'soc'],],
                                ],
                            ],
                            ['label' => 'КОЦ',
                                'icon' => 'gear',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Редактировать данные', 'icon' => 'gear', 'url' => ['page/view', 'id'=>39,'grf'=>'sportbuilding'],],
                                    ['label' => 'Страницы', 'icon' => 'gear', 'url' => ['page/index', 'parent_alias'=>'koc'],],
                                ],
                                ],
                            ['label' => 'Плавательный бассейн',
                                'icon' => 'gear',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Редактировать данные', 'icon' => 'gear', 'url' => ['page/view', 'id'=>40,'grf'=>'sportbuilding'],],
                                    ['label' => 'Страницы', 'icon' => 'gear', 'url' => ['page/index', 'parent_alias'=>'pool'],],
                                ],
                                ],
                            ['label' => 'СЗ Горняк',
                                'icon' => 'gear',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Редактировать данные', 'icon' => 'gear', 'url' => ['page/view', 'id'=>41,'grf'=>'sportbuilding'],],
                                    ['label' => 'Страницы', 'icon' => 'gear', 'url' => ['page/index', 'parent_alias'=>'sz'],],
                                ],
                                ],
                            ['label' => 'КК Умка',
                                'icon' => 'gear',
                                'items' => [
                                    ['label' => 'Редактировать данные', 'icon' => 'gear', 'url' => ['page/view', 'id'=>42,'grf'=>'sportbuilding'],],
                                    ['label' => 'Страницы', 'icon' => 'gear', 'url' => ['page/index', 'parent_alias'=>'kk'],],
                                ],
                            ],
                            ['label' => 'СТК Гора Отдельная',
                                'icon' => 'gear',
                                'items' => [
                                    ['label' => 'Редактировать данные', 'icon' => 'gear', 'url' => ['page/view', 'id'=>43,'grf'=>'sportbuilding'],],
                                    ['label' => 'Страницы', 'icon' => 'gear', 'url' => ['page/index', 'parent_alias'=>'stk'],],
                                ],
                            ],



        ],
                    ],
                    [
                        'label' => 'Страницы сайта',
                        'icon' => 'files-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Раздел О нас', 'icon' => 'gear', 'url' => ['page/index', 'parent_alias'=>'about'],],
                            ['label' => 'Вакансии', 'icon' => 'gear', 'url' => ['vacancy/index'],],
                            ['label' => 'Анкета', 'icon' => 'gear', 'url' => ['questionary/index'],],
                        ],
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],                    
                ],
            ]
        ) ?>

    </section>

</aside>
