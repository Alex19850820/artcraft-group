<?php

use yii\helpers\Html;
use  yii\helpers\Url;
use common\models\BlogSlider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
* @var $blog array
* @var $title string
 */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;


$img = Url::to('@web/img/');
?>
<!-- start blog-page.html-->
<main class="all-news">
	<section class="blog blog__single" id="blog">
		<div class="container">
			
			<p class="paragraph">наш блог</p>
			
			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Блог</span>
			</nav>
			
			<div class="wrap">
				
				<div class="tittle">
					<span>актуальное </span>
					<h2>в нашем блоге</h2>
					<p>
						Мы ответственно относимся к любой работе и уделяем достаточно внимания
						всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
						Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
					</p>
				</div>
				
				<div class="blog__blocks">
					<?php foreach ($blog as $key => $value):?>
						<?php if($value['h1']!='current'):?>
							<article class="blog__block">
								<div class="blog__block-wrap">
									<a href="<?=Url::to(['single-blog', 'slug' => $value['slug']])?>">
<!--										--><?php //preg_match('%<img.*?src=["\'](.*?)["\'].*?/>%i', $value['file'], $matches);
//										$imgSrc = $matches[1];?>
										<img class="blog__block-img" src="<?=$value['file']?>" alt="">
									</a>
									
									<h2 class="blog__block-title">
										<a class="blog__block-link dotdot" href="<?=Url::to(['single-blog', 'slug' => $value['slug']])?>"><?=$value['title']?></a>
									</h2>
									
									<p class="blog__block-text"><?=$value['meta_desc']?></p>
								</div>
								
								<footer class="blog__block-footer">
									
									<time class="blog__block-time"><?=$value['date'] = BlogSlider::getTime(strtotime($value['date']));?></time>
									<a class="blog__block-more"  href="<?=Url::to(['single-blog', 'slug' => $value['slug']])?>">
										<span>Читать далее</span>
										<span class="blog__block-arrow"></span>
									</a>
								</footer>
							</article>
						<?php endif;?>
					<?php endforeach;?>
				</div>
			
			</div>
		
		</div>
	</section>