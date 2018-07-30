<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 10.04.2018
 * Time: 17:45
 */
/**
 * @var $content string
 * @var $portfolio array
 * @var $blog array
 * @var $title string
 *
*/

use cybercog\yii\googleanalytics\widgets\GATracking;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

$contacts = \backend\modules\contacts\models\Contacts::find()->asArray()->all();
$phone = \backend\modules\contacts\models\Contacts::find()->where(['name' => 'phone'])->one();
$email = \backend\modules\contacts\models\Contacts::find()->where(['name' => 'email'])->one();
$logo = \backend\modules\contacts\models\Contacts::find()->where(['name' => 'logo'])->one();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!-- start html_open-index.html-->
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head lang="<?= Yii::$app->language ?>">
	<meta property="og:locale" content="ru_RU" />
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<script type="text/template" id="qq-template">
		<div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Положить файлы сюда">
			<div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
				<div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
			</div>
			<div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
				<span class="qq-upload-drop-area-text-selector"></span>
			</div>
			<div class="qq-upload-button-selector qq-upload-button">
				<div>Загрузить файл</div>
			</div>
			<span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
			<ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
				<li>
					<span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
					<div class="qq-progress-bar-container-selector qq-progress-bar-container">
						<div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
					</div>
					<span class="qq-upload-spinner-selector qq-upload-spinner"></span>
					<div class="qq-thumbnail-wrapper">
						<img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
					</div>
					<button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
					<button type="button" class="qq-upload-retry-selector qq-upload-retry">
						<span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
						Retry
					</button>

					<div class="qq-file-info">
						<div class="qq-file-name">
							<span class="qq-upload-file-selector qq-upload-file"></span>
							<span class="qq-edit-filename-icon-selector qq-btn qq-edit-filename-icon" aria-label="Edit filename"></span>
						</div>
						<input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
						<span class="qq-upload-size-selector qq-upload-size"></span>
						<button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
							<span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
						</button>
						<button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
							<span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
						</button>
						<button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
							<span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
						</button>
					</div>
				</li>
			</ul>

			<dialog class="qq-alert-dialog-selector">
				<div class="qq-dialog-message-selector"></div>
				<div class="qq-dialog-buttons">
					<button type="button" class="qq-cancel-button-selector">Close</button>
				</div>
			</dialog>

			<dialog class="qq-confirm-dialog-selector">
				<div class="qq-dialog-message-selector"></div>
				<div class="qq-dialog-buttons">
					<button type="button" class="qq-cancel-button-selector">No</button>
					<button type="button" class="qq-ok-button-selector">Yes</button>
				</div>
			</dialog>

			<dialog class="qq-prompt-dialog-selector">
				<div class="qq-dialog-message-selector"></div>
				<input type="text">
				<div class="qq-dialog-buttons">
					<button type="button" class="qq-cancel-button-selector">Отмена</button>
					<button type="button" class="qq-ok-button-selector">Ok</button>
				</div>
			</dialog>
		</div>
	</script>
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel=icon href=/48x48.png sizes="48x48" type="image/png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<?php $this->head() ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>
<body>
	<?php $this->beginBody() ?>
<!-- open .header -->
<div class="page-preloader">
	<svg viewBox="0 0 1000 200">
		<!-- Symbol-->
		<symbol id="s-text">
			<text text-anchor="middle" x="50%" y="50%" dy=".35em">Craft Group</text>
		</symbol>
		<!-- Duplicate symbols-->
		<use class="text" xlink:href="#s-text"></use>
		<use class="text" xlink:href="#s-text"></use>
		<use class="text" xlink:href="#s-text"></use>
	</svg>
</div>
<!-- end html_open-index.html-->

<!-- start header-index.html-->
<header class="header header-index js_headerIndex">
	<div class="header__wrapper js_header header-wrapper-down">
		<div class="header__logo logo header__index-appear">
			<a href="/">
				<?=$logo->file;?>
			</a>
		</div>
		<div class="container">
			<div class="header__mobile-btn"><span></span></div>
			
			<ul class="header__nav">
				<li class="header__logo header__logo_mobile logo"><a href="/">
						<?=$logo->file;?>
					</a>
				</li>
				<ul class="header__nav-container">
					<li class="header__nav-li"><a href="<?=Url::to('/service');?>">Услуги</a></li>
					<li class="header__nav-li"><a class="scroll" href="#portfolio">Портфолио</a></li>
					<li class="header__nav-li"><a href="#">Горячие предложения</a></li>
					<li class="header__nav-li"><a class="scroll" href="#blog">Блог</a></li>
					<li class="header__nav-li"><a href="#">Развеивание мифов</a></li>
					<li class="header__nav-li active-page dropdown">
						<a class="scroll" href="<?=Url::to('/about');?>">О нас</a>
						<button class="dropdown_mob">></button>
						<ul class="header__submenu header__submenu_mob">
							<li><a href="<?=Url::to('/feedback');?>">Отзывы</a></li>
							<li><a href="#">Клиенты</a></li>
							<li><a href="<?=Url::to('/vacancy');?>">Вакансии</a></li>
						</ul>
					</li>
					<li class="header__nav-li"><a class="scroll" href="#brief">Контакты</a></li>
				</ul>
				<li class="header__callback header__callback_mobile">
					<img class="header__callback_img" src="<?=Url::to('@web/img/phone-ico.png');?>" alt="">
					<div class="header__callback_text">
						<span class="header__callback_top"><?=$phone->description ?? ''?></span>
						<button class="header__callback_bottom">Заказать обратный звонок</button>
					</div>
				</li>
			</ul>
		</div>
		<div class="header__callback header__index-appear">
			<img class="header__callback_img" src="<?=Url::to('@web/img/phone-ico2.png');?>" width="50px" height="50px" alt="">
			<div class="header__callback_text">
				<span class="header__callback_top"><?=$phone->description ?? ''?></span>
				<button class="header__callback_bottom">Заказать обратный звонок</button>
			</div>
		</div>
		<!-- <button class="header__open-btn" type="button">Узнать больше</button> -->
	</div>
	<div class="header__overlay js-nav-menu-up"></div>
	
	<img src="<?=Url::to('@web/img/balloon.png');?>" alt="" class="balloon">
	<div class="clouds cloud1"></div>
	<div class="clouds cloud2"></div>
</header>

<!-- end header-index.html-->
<?= $content?>
	
	<section class="footer-section">
	
		<div class="footer-copyri">
			<div class="container">
				<div class="footer-copyright">
					<div class="footer-copyright-left">
						<p>2015-2018 &copy; Craft Group</p>
						<p>Все права защищены</p>
					</div>
					<div class="footer-copyright-right">
						<div class="footer-phone">
							<p><?=$phone->description ?? '';?></p>
							<p><?=$email->description ?? ''?></p>
						</div>
					</div>
					<div class="footer-socmenu">
						<?php foreach ($contacts as $key => $value){?>
							<?php if($value['name'] == 'social'){?>
								<a href="<?=$value['description']?>"><?=$value['file']?></a>
							<?php }?>
						<?php }?>
						<!--							<a href="#" class="fab fa-vk"></a>-->
						<!--							<a href="#" class="fab fa-facebook-f"></a>-->
						<!--							<a href="#" class="fab fa-instagram"></a>-->
					</div>
				</div>
			</div>
		</div>
		
	</section>
	<!-- end blog.html-->
	</main>
	<!-- end content-main.html-->
	<!-- start html_close-index.html-->
	
<a href="#" class="scrollup"></a>
	<?php $this->endBody() ?>
</body>
</html>
<!-- end html_close-index.html-->
<?php $this->endPage() ?>
