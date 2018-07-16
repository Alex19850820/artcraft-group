<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 11:40
 */
/**
* @var $blog array
 * @var $slider array
 * @var $all object
 */


use  yii\helpers\Url;
use common\models\BlogSlider;

$this->title =  $blog['title'];
$img = Url::to('@web/img/');
?>
<!-- start content-blog.html-->
<main>
	<!-- start single-blog.html-->
	<main class="single-post">
		<section class="blog blog__single" id="blog">
			<div class="container">

				<p class="paragraph">наш блог</p>

				<nav class="broadcrumbs">
					<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
					<span class="broadcrumbs__divider"> / </span>
					<a class="broadcrumbs__link" href="<?=Url::to(['/blog'])?>">Блог</a>
					<span class="broadcrumbs__divider"> / </span>
					<span class="broadcrumbs__curr"><?=$blog['title']?></span>
				</nav>

				<div class="wrap">

					<div class="blog__content">
						<div class="blog__content--img">
							<!--<img src="">-->
						</div>
						<h1 class="blog__single-title"><?=$blog['h1']?></h1>
						<?=$blog['description']?>
					</div>


					<div class="blog__slider">
						<div class="tittle">
							<span>читайте еще  </span>
							<h2>в нашием блоге</h2>

						</div>
						<div class="blog__slider--wrap">
							<?php if($all):?>
								<div class="blog__slider--slide">
									<img src="<?=$all->file?>">
									<a class="blog__slider--blog" href="<?=Url::to('/blog');?>"><?=$all->title?></a>
								</div>
							<?php endif;?>
							<?php foreach ($slider as $key => $value):?>
								<?php if( $value['options']):?>
									<div class="blog__slider--slide">
										<img src="<?=$value['file']?>">
										<div class="slide__title">
											<h3 class="slide__post-title"><?=$value['title']?></h3>
											<time class="slide__post-time"><?=$value['date'] = BlogSlider::getTime(strtotime($value['date']));?></time>
										</div>
										<div class="slide__hover">
											<span class="dotdot"><?=$value['description']?></span>
											<a href="<?=Url::to(['single-blog', 'slug' => $value['slug']])?>">Читать далее</a>
										</div>
									</div>
								<?php endif;?>
							<?php endforeach;?>

						</div>
					</div>


				</div>

			</div>
		</section>
	</main>
	<!-- end single-blog.html-->