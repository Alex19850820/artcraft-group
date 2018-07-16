<?php

use yii\helpers\Html;
use yii\grid\GridView;
use  yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var $portfolio array
 * @var $title string
 * @var $count integer
 */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;


$img = Url::to('@web/img/');
?>
<!-- start content-portfolio.html-->
<main class="main-portfolio">

	<section class="blog blog__single" id="blog">
		<div class="container">

			<p class="paragraph">наши работы</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Портфолио</span>
			</nav>

			<div class="wrap">
				<div class="tittle">
					<span>актуальные </span>
					<h2>работы</h2>
					<p>
						Мы ответственно относимся к любой работе и уделяем достаточно внимания
						всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
						Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
					</p>
				</div>

				<div class="wrapper">
					<div class="grid-preloader">
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
						<p class="text-preloader">Загружаем галерею</p>
					</div>

					<div class="grid_p">
						<?php if($portfolio):?>
							<?php $i = 0; foreach ($portfolio as $key => $value):?>
								<?php if($i <= $count - 1):?>
									<div class="grid-item">
										<a class="grid-item__watch" href="<?=Url::to(['single-portfolio', 'slug' => $value['slug']])?>">Посмотреть работу</a>
	<!--									--><?php //preg_match('%<img.*?src=["\'](.*?)["\'].*?/>%i', $value['file'], $matches);
	//									$imgSrc = $matches[1];?>
										
										<a class="grid-item__fancybox" href="<?=$value['file']?>" data-fancybox="images" data-caption="
											<div class='portfolio__block-caption'>
												<span><?=$value['title']?> </span>
												<a href='#'>Смотреть работу на <span class='gradient'>behance.ru</span></a>
											</div">
			
											<span class="magnifier">
												<img src="<?=$img?>full-size.svg" width="20" height="20" alt="">
											</span>
										</a>
										<img src="<?=$value['file']?>">
									</div>
								<?php $i++; endif;?>
							<?php endforeach;?>
						<?php endif;?>
					</div>
				</div>
				
				<button type="button" class="more_btn" id="curButton"  data-inpage="<?=$count?>"  data-page="1">Загрузить ещё</button>
			</div>

		</div>
	</section>