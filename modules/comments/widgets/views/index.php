<?php

use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $commentModel \app\modules\comments\models\CommentModel */
/* @var $maxLevel null|integer comments max level */
/* @var $encryptedEntity string */
/* @var $pjaxContainerId string */
/* @var $sessid string */
/* @var $username string */
/* @var $formId string comment form id */
/* @var $commentDataProvider \yii\data\ArrayDataProvider */
/* @var $listViewConfig array */
/* @var $commentWrapperId string */
?>
<div class="comment-wrapper" id="<?php echo $commentWrapperId; ?>">
    <?php Pjax::begin(['enablePushState' => false, 'timeout' => 0, 'id' => $pjaxContainerId]); ?>
    <div class="comments row">
        <div class="col-md-12 col-sm-12">
            <div class="title-block clearfix">
                <h3 class="h3-body-title">
                    <?php echo Yii::t('yii2mod.comments', 'Comments ({0})', $commentModel->getCommentsCount()); ?>
                </h3>
                <div class="title-separator"></div>
            </div>
            <?php echo ListView::widget(ArrayHelper::merge(
                [
                    'dataProvider' => $commentDataProvider,
                    'layout' => "{items}\n{pager}",
                    'itemView' => '_list',
                    'viewParams' => [
                        'maxLevel' => $maxLevel,
                        'sessid' => $sessid,
                    ],
                    'options' => [
                        'tag' => 'ol',
                        'class' => 'comments-list',
                    ],
                    'itemOptions' => [
                        'tag' => false,
                    ],
                ],
                $listViewConfig
            )); ?>
                <?php echo $this->render('_form', [
                    'commentModel' => $commentModel,
                    'formId' => $formId,
                    'encryptedEntity' => $encryptedEntity,
                    'username' => $username,
                ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
