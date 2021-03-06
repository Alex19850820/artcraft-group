<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 23.05.2018
 * Time: 10:21
 */
/**
* @var $more object
 */

use yii\helpers\Url;

$img = Url::to('@web/img/');
$n         = 0;
?>
	<?php  foreach($more as $key => $value):?>
		<?php $n++;?>
		<div class="grid-item">
			<a class="grid-item__watch" href="<?=Url::to(['single-portfolio', 'slug' => $value->slug])?>">
				Посмотреть работу
			</a>

			<a class="grid-item__fancybox" href="<?=$value->file?>" data-fancybox="images" data-caption="
			<div class='portfolio__block-caption'>
				<span><?=$value->title?></span>
				<a href='#'>Смотреть работу на <span class='gradient'>behance.ru</span></a>
			</div">

				<span class="magnifier">
					<img src="<?=$img?>img/full-size.svg" width="20" height="20" alt="">
				</span>
			</a>
			<img src="<?=$value->file?>">
		</div>
	<?php endforeach;?>
		<input type="hidden" id="countItems" data-count="<?=$n?>" value="<?=$n?>">
<?php die();?>