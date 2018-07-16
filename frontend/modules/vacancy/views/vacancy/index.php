<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
* @var $vacancy array
* @var $all array
* @var $title string
 */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- start content-vacancy.html-->
<main class="main-vacancy">
	<section class="blog blog__single blog_feedback">
		<div class="container">

			<p class="paragraph">вакансии/стажировки</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Вакансии</span>
			</nav>

			<div class="wrap">
				<div class="tittle">
					<?=$vacancy[0]['h1']?>
					<p>
						<?=$vacancy[0]['description']?>
					</p>
				</div>

				<div class="brief__content brief__content_feedback">
					<p class="feedback-form__title">Отправить своё резюме</p>

					<form id="form_vacancy" class="brief__form form__feedback">
						<div class="brief__form-message brief__form-message_nomargin" lang="ru">
							<label for="message_vacancy">Напишите немного о себе</label>
							<textarea id="message_vacancy" placeholder="Напишите немного о себе"></textarea>
						</div>

						<div class="brief__form-head brief__form-head_feedback">
							<div>
								<label for="name_vacancy">Ваше имя, фамилия *</label>
								<input id="name_vacancy" name="name" type="text" placeholder="Ваше имя" required >
							</div>

							<div>
								<label for="speciality_vacancy">Ваша специальность</label>
								<input id="speciality_vacancy" name="specialty" type="text" placeholder="Ваша специальность" required>
								<input name="subject" type="text" value="Заявка на работу <?=$vacancy['title'] ?? ''?>" hidden>
							</div>

							<div>
								<label for="mail_vacancy">Ваш e-mail *</label>
								<input id="mail_vacancy" type="email" name="email" placeholder="Ваш e-mail" required>
							</div>

							<div>
								<label for="city_vacancy">Ваш город</label>
								<input id="city_vacancy" name="city" type="text" placeholder="Ваш город">
							</div>
						</div>

						<div id="uploader" class="uploader"></div>

						<div class="brief__form-desc">
							<p><span>*</span> обязательные поля</p>
							<input id="submit_feedback" class="send_vacancy" type="submit" value="Хочу в команду">
						</div>
					</form>
				</div>

				<div class="vacancies-p__wrap">
					<h2 class="vacancies-p__title">Свежие вакансии Craft Group</h2>

					<div class="vacancies-p">
						<?php foreach ($all as $key => $value):?>
							<div class="vacancies-p__vacancy">
								<header class="vacancies-p__vacancy-header">
									<img class="vacancies-p__vacancy-img" src="img/programmer.png" alt="">
									<h3 class="vacancies-p__vacancy-title"><?=$value['title']?></h3>
								</header>
	
								<div class="feedback-item__content">
									<div class="feedback-item__desc">
										<p class="feedback-item__text"><?=$value['description']?></p>
										<a class="vacancies-p__vacancy-more" href="<?=Url::to(['single-vacancy', 'slug' => $value['slug']])?>">подробнее</a>
									</div>
								</div>
							</div>
						<?php endforeach;?>
						
						<?php preg_match('|<div class="conditions">(.*?)</div>|isU', $vacancy[0]['file'], $match);
						?>
						<?=$match[1]?>
					
				</div>

				<div class="internships">

					<h2 class="vacancies-p__title"><?=$vacancy[1]['h1']?></h2>

					<div class="internships__desc-container">
						<?php foreach ($vacancy  as $key => $value):?>
							<?php if($value['options'] && $value['meta_key'] == 'v'):?>
								<div class="vacancies-p__vacancy">
									<header class="vacancies-p__vacancy-header">
										<img class="vacancies-p__vacancy-img" src="img/programmer.png" alt="">
										<h3 class="vacancies-p__vacancy-title"><?=$value['h1']?></h3>
									</header>
		
									<div class="feedback-item__content">
										<div class="feedback-item__desc">
											<p class="feedback-item__text"><?=$value['description']?></p>
										</div>
									</div>
								</div>
							<?php endif;?>
						<?php endforeach;?>

						<div class="internships__desc">
							<?=$vacancy[1]['description']?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
