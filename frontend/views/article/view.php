<?php
/* @var $this yii\web\View */
/* @var $model common\models\Article */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <article class="article-item">
        <h1><?php echo $model->title ?></h1>

        <?php if ($model->thumbnail_path): ?>
            <?php echo \yii\helpers\Html::img(
                Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $model->thumbnail_path,
                    'w' => 200
                ], true),
                ['class' => 'article-thumb img-rounded pull-left']
            ) ?>
        <?php endif; ?>

        <?php echo $model->body ?>

        <div class="row">
            <div class="col-md-8 col-xs-8">
                <ul class="list-inline">
                    <li>
                        <?= \hauntd\vote\widgets\Favorite::widget([
                            'entity' => 'itemFavorite',
                            'model' => $model,
                        ]); ?>
                    </li>
                    <li>
                        <?= \hauntd\vote\widgets\Like::widget([
                            'entity' => 'itemLike',
                            'model' => $model,
                        ]); ?>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-xs-4 text-right" >
                <?= \hauntd\vote\widgets\Vote::widget([
                    'entity' => 'itemVote',
                    'model' => $model,
                    'options' => ['class' => 'vote vote-visible-buttons']
                ]); ?>
            </div>
        </div>


        <?php if (!empty($model->articleAttachments)): ?>
            <h3><?php echo Yii::t('frontend', 'Attachments') ?></h3>
            <ul id="article-attachments">
                <?php foreach ($model->articleAttachments as $attachment): ?>
                    <li>
                        <?php echo \yii\helpers\Html::a(
                            $attachment->name,
                            ['attachment-download', 'id' => $attachment->id])
                        ?>
                        (<?php echo Yii::$app->formatter->asSize($attachment->size) ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    </article>
    <comment>
        <?php echo \yii2mod\comments\widgets\Comment::widget([
            'model' => $model,
        ]); ?>
    </comment>
</div>