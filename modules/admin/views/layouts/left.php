<?
use yii\helpers\html;
use app\modules\admin\components\OrderCountWidget;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
//                    ['label' => 'Панель управления', 'options' => ['class' => 'header']],
                    ['label' => 'Редактировать данные', 'icon' => 'gear', 'url' => ['company/view']],
                    [
                        'label' => 'Объявления',
                        'icon' => 'gear',
                        'url' => ['ads/index', 'id'=>1],
                    ],
                    [
                        'label' => 'Новости',
                        'icon' => 'gear',
                        'url' => ['news/index'],
                    ],
                    [
                        'label' => 'Мероприятия',
                        'icon' => 'gear',
                        'url' => ['events/index', 'id'=>1],
                    ],
                    [
                        'label' => 'Страницы сайта',
                        'icon' => 'files-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Раздел О нас', 'icon' => 'gear', 'url' => ['company/index', 'id'=>1],],
                            ['label' => 'Вакансии', 'icon' => 'gear', 'url' => ['vacancy/index', 'id'=>1],],
                            ['label' => 'Анкета', 'icon' => 'gear', 'url' => ['company/index', 'id'=>1],],
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
