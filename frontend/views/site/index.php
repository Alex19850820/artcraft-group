<?php

/* @var $this yii\web\View */
/**
* @var $blog array
 * @var $portfolio array
 * @var $contacts array
 * @var $title string
 * @var $desc string
 * @var $main object
 * @var $b_cur object
 */
use yii\helpers\Url;
use common\models\BlogSlider;
use himiklab\thumbnail\EasyThumbnailImage;

$home = (Url::home(true));
$this->title = $title;
$this->registerJsFile('/js/fine-uploader.min.js');
?>

<!-- start content-main.html-->
<main>
	<!-- start results.html-->
	<section class="results" id="results">
		<div class="container">
			<?=$main[0]->description?>
		</div>
		<div class="animate-circle"></div>

	</section>
	<!-- end results.html-->
	<!-- start portfolio.html-->
	<section class="portfolio" id="portfolio">

		<div class="animate-circle">
			<p>
				<a href="https://www.behance.net/CraftGroup"> <img src="img/be.png" alt=""></a>
				<span>Больше уникального дизайна в нашем профиле. Только свежие и качественные работы.</span>
			</p>
		</div>

		<div class="container">
			<p class="paragraph">наши работы</p>

			<div class="wrap">
				<div class="tittle">
					<span class="block_span_title">портфолио</span>
					<h2 class="block_title">наши работы</h2>
					<p>
						Мы готовы предложить вам все виды наших услуг. <br>
						Знайте: для каждого клиента у нас есть особое предложение.
					</p>
				</div>
				<?php $class = ['soc', 'angel', 'scrubb', 'loft', 'chair'];?>
				<div class="portfolio__gallery">
					<?php $i = 0; foreach ($portfolio as $key => $value):?>
						<?php if($value['h1'] == 'all'):?>
							<div class="gallery__block portfolio-link">
								<img src="<?=$value['file']?>">
								<a class="gallery__block-link" href="<?=Url::toRoute(['/portfolio']);?>"><?=$value['title']?></a>
							</div>
						<?php elseif($value['h1'] != 'brief'):?>
							<div class="gallery__block portfolio-<?=$class[$i]?> portfolio-link">
								<a href="<?=Url::toRoute(['/portfolio/'.$value['slug']]);?>">
									<?= EasyThumbnailImage::thumbnailImg(
											$home.$value['file'],
										    200,
										    200,
										    EasyThumbnailImage::THUMBNAIL_OUTBOUND);?>
								</a>
							</div>
							<?php $i++;?>
						<?php else:?>
							<?php if($value['h1'] == 'brief'):?>
								<div class="gallery__block portfolio__brief portfolio-link">
									<h2>
										<a class="scroll" href="#brief"><?=$value['title']?></a>
									</h2>
								</div>
							<?php endif;?>
						<?php endif;?>
					<?php endforeach;?>
				</div>

			</div>
		</div>

	</section>
	<!-- end portfolio.html-->
	<!-- start blog.html-->
	<section class="blog" id="blog">
		<div class="container">

			<p class="paragraph">наш блог</p>

			<div class="wrap">

				<div class="tittle">
					<span class="block_span_title">актуальное </span>
					<h2 class="block_title">в нашем блоге</h2>
					<p>
						Мы ответственно относимся к любой работе и уделяем достаточно внимания
						всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
						Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
					</p>
				</div>

				<div class="blog__slider--wrap">
					
					<?php if($b_cur):?>
						<div class="blog__slider--slide">
							<img src="<?=$b_cur->file?>"?>
							<a class="blog__slider--blog" href="<?=Url::to(['/blog']);?>"><?=$b_cur->title?></a>
						</div>
					<?php endif;?>
					<?php foreach ($blog as $key => $value):?>
						<?php if( $value['options']):?>
							<div class="blog__slider--slide">
								<img src="<?=$value['file']?>"?>
								<div class="slide__title">
									<h3 class="slide__post-title"><?=$value['title']?></h3>
									<time class="slide__post-time"><?=$value['date'] = BlogSlider::getTime(strtotime($value['date']));?></time>
								</div>
								<div class="slide__hover">
									<span class="dotdot"><?=$value['description']?></span>
									<a href="<?=Url::to(['/blog', 'slug' => $value['slug']])?>">Читать далее</a>
								</div>
							</div>
						<?php endif;?>
					<?php endforeach;?>

				</div>

			</div>

		</div>
	</section>
	<!-- end blog.html-->
