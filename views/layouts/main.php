<?php
//use app\components\ContactFormWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\MainAsset;
use app\assets\IndexAsset;

MainAsset::register($this);
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
    </head>

    <body data-spy="scroll">

    <?php $this->beginBody() ?>
    <div class="pre_header_container">
        <div class="pre_header">
            <div class="pre_header_logo col-xs-12 col-sm-2 col-md-2 col-lg-1">
                <a href="<?= Url::Home() ?>">
                        <?= Html::img("@web/img/logo.png", ['alt' => 'Логотип', 'class'=> 'pre_header-logo']) ?>
                </a>
            </div>
            <div class="pre_header_company_information col-xs-12 col-sm-8 col-md-8 col-lg-9">
                <div class="pre_header_company_type">Управление по спорту администрации города Норильск, муниципальное бюджетное учреждение </div>
                <div class="pre_header_company_name h4">Спортивный комплекс  «ТАЛНАХ»</div>
            </div>
            <div class="pre_header_socials_container col-xs-12 col-sm-2 col-md-2">
                <div class="socials pre_header_socials">
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
        </div>

    </div>
    <div class="nav_cover index_section1">
        <?php $this->beginContent('@app/views/layouts/menu.php'); ?>
        <?php $this->endContent(); ?>
    </div>
    <?= $content ?>

    <?php  $this->beginContent('@app/views/layouts/footer.php'); ?>
    <?php  $this->endContent(); ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>