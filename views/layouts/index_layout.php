<?php
//use app\components\ContactFormWidget;
use app\components\CompanyWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\IndexAsset;

IndexAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <meta name="google-site-verification" content="f6F4NOc-LjSHjrNhJ1v9HQzl3gd5eMnzf5EII1dVp1E" />
        <meta name="yandex-verification" content="01416f3124e064ff" />
        <meta name="yandex-verification" content="bc6c31f8175498ed" />
    </head>

    <body data-spy="scroll">

    <?php $this->beginBody() ?>

    <div class="nav_cover index_section1">
        <?php $this->beginContent('@app/views/layouts/menu.php'); ?>
        <?php $this->endContent(); ?>
        <?php if (!Yii::$app->user->isGuest) { ?>
            <div class="admin_buttons">
                <a href="<?= \yii\helpers\URL::to(['/admin']) ?>" class="btn btn-default" style="color:white!important">Админ</a>
                <a href="<?= \yii\helpers\URL::to(['/site/logout']) ?>" class="btn btn-default"
                   style="color:white!important">Выход</a>
            </div>
        <?php } ?>

        <?= Html::img("@web/img/index_logo.png", ['alt' => 'Логотип', 'class' => 'index-logo']) ?>
        <div class="index_section1_company_description">
            <div class="index_company_type">
                <?= CompanyWidget::widget(['object' => 'organization']); ?>
            </div>
            <div class="index_company_name h2">
                <?= CompanyWidget::widget(['object' => 'name']); ?>

            </div>
        </div>
        <div class="index_socials socials">
            <a href="#">
                <i class="fa fa-vk" aria-hidden="true"></i>
            </a>
            <a href="#">
                <i class="fa fa-odnoklassniki" aria-hidden="true"></i>
            </a>
            <a href="#">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <?= $content ?>

    <?php $this->beginContent('@app/views/layouts/footer.php'); ?>
    <?php $this->endContent(); ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>