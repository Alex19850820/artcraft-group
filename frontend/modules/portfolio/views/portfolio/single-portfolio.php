<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 11:40
 */
/**
* @var $portfolio array
 */


use  yii\helpers\Url;

$this->title =  $portfolio['title'];
$img = Url::to('@web/img/');
?>
<main class="main__single-p">
	<section class="blog blog__single" id="blog">
		<div class="container">
			
			<p class="paragraph">наши работы</p>
			
			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to('/')?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<a class="broadcrumbs__link" href="<?=Url::to('/portfolio')?>">Портфолио</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr"><?=$portfolio['title']?></span>
			</nav>
<!--			--><?php //preg_match('%<img.*?src=["\'](.*?)["\'].*?/>%i', $portfolio['file'], $matches);
//			$imgSrc = $matches[1];?>
			<div class="wrap single-p">
				<div class="single-p__layout">
					<a class="single-p__fancybox" href="<?=$portfolio['file']?>" data-fancybox="images" data-caption="
                        <div class='portfolio__block-caption'>
                            <span><?=$portfolio['title']?> </span>
                            <a href='#'>Смотреть работу на <span class='gradient'>behance.ru</span></a>
                        </div">
						
						<img src="<?=$portfolio['file']?>" alt="">
					</a>
				</div>
				
				<div class="single-p__desc">
					<h2 class="single-p__title"><?=$portfolio['h1']?></h2>
					
					<p class="single-p__text"><?=$portfolio['description']?></p>
					<?php $href = explode(',' , $portfolio['href']);?>
					<?php if(!empty($href)):?>
						<div class="single-p__soc">
							<?php if(!empty($href[0])):?>
								<div class="soc__block soc__be">
									<div class="soc__icon">
										<a href="<?=$href[0]?>">
											<img src="<?=$img?>be-p.png" alt="">
										</a>
									</div>
									
									<div class="soc__desc">
										<p>Наша работа на</p>
											<?=\yii\helpers\Html::a('www.behance.net', $href[0],['target'=>'_blank'])?>
									</div>
								</div>
							<?php endif;?>
							<?php if(!empty($href[1])):?>
								<div class="soc__block soc__pin">
									<div class="soc__icon">
										<a href="<?=$href[1]?>">
											<img src="<?=$img?>pinterest.png" alt="">
										</a>
									</div>
									
									<div class="soc__desc">
										<p>Наша работа на</p>
											<?=\yii\helpers\Html::a('www.pinterest.com', $href[1],['target'=>'_blank'])?>
									</div>
								</div>
							<?php endif;?>
						</div>
					<?php endif;?>
					
					<div class="single__order">
						<div class="order__ask">
							<h3 class="order__ask-title">Понравилась работа?</h3>
							<p class="order__ask-text">Хотите заказать похожее?</p>
						</div>
						
						<a href="#brief" class="order__btn scroll">Заказать</a>
					</div>
					<?php if($portfolio['stock']):?>
						<div class="single-p__stock">
							<h3 class="stock__title">
								<img src="<?=$img?>stock.png" alt=""><span class="stock__red">Акция!</span>
							</h3>
							<?=$portfolio['stock']?>
						</div>
					<?php endif;?>
				</div>
			</div>
		
		</div>
	</section>