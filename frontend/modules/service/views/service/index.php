<?php

use yii\helpers\Html;
use yii\grid\GridView;
use  yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
* @var $service array
 * @var $all array
 * @var $title string
 */


$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;


$img = Url::to('@web/img/');
?>
<!-- start content-service.html-->
<main class="main-service">
	<section class="blog blog__single blog_about">
		<div class="container">
			
			<p class="paragraph">Услуги</p>
			
			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Услуги</span>
			</nav>
			
			<div class="wrap">
				<div class="tittle">
					<span>что мы можем</span>
					<h2>услуги компании</h2>
					<?=$service[0]['description']?>
				</div>
				
				<div class="services">
					
					<?php foreach($all as $key => $value):?>
						<div class="services__service">
							<h4 class="services__service-title"><a href="<?=Url::to(['single-service', 'slug' => $value['slug']])?>"><?=$value['title']?></a></h4>
							<p class="services__service-desc"><?=$value['meta_desc']?></p>
						</div>
					<?php endforeach;?>
				</div>
				
				<div class="novelty">
					<?=$service[2]['file']?>
					
					<div class="novelty__desc">
						<div class="novelty__head">
							<h2 class="novelty__big-title"><?=$service[2]['h1']?></h2>
						</div>
						<div class="novelty__body">
							<h3 class="novelty__title">
								<?=$service[2]['meta_key']?>
							</h3>
							<h3 class="novelty__title novelty__title_margin">
								<?=$service[2]['meta_desc']?>
							</h3>
							<p class="novelty__text"><?=$service[2]['description']?></p>
							<a href="<?=$service[2]['href']?>" class="vacancies-p__vacancy-more vacancies-p__vacancy-more_novelty">подробнее</a>
						</div>
					</div>
				</div>
				
				
				<div class="technologies">
					<div class="tittle">
						<span>Используем</span>
						<h2>новые технологии</h2>
						<p>
							<?=$service[1]['description']?>
						</p>
					</div>
					
					<div class="technologies__cards">
						<?=$service[1]['file']?>
					</div>
				</div>
			
			</div>
		
		</div>
	</section>
