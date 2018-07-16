<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 15.05.2018
 * Time: 13:58
 */
namespace  console\models\sitemap;

use Yii;
use yii\helpers\Url;
use common\models\BlogSlider;
use demi\sitemap\interfaces\Basic;
use demi\sitemap\interfaces\GoogleAlternateLang;
use demi\sitemap\interfaces\GoogleImage;

class SitemapPost extends BlogSlider implements Basic, GoogleImage, GoogleAlternateLang
{
	/**
	 * Handle materials by selecting batch of elements.
	 * Increase this value and got more handling speed but more memory usage.
	 *
	 * @var int
	 */
	public $sitemapBatchSize = 10;
	/**
	 * List of available site languages
	 *
	 * @var array [langId => langCode]
	 */
	public $sitemapLanguages = [
		'en',
		'ru-RU',
	];
	/**
	 * If TRUE - Yii::$app->language will be switched for each sitemapLanguages and restored after.
	 *
	 * @var bool
	 */
	public $sitemapSwithLanguages = true;
	
	/* BEGIN OF Basic INTERFACE */
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapItems($lang = null)
	{
		// Add to sitemap.xml links to regular pages
		return [
			// site/index
			[
				'loc' => Url::to(['/site/index', 'lang' => $lang]),
				'lastmod' => time(),
				'changefreq' => static::CHANGEFREQ_DAILY,
				'priority' => static::PRIORITY_10,
				'alternateLinks' => [
					'en' => Url::to(['/site/index', 'lang' => 'en']),
					'ru' => Url::to(['/site/index', 'lang' => 'ru']),
				],
			],
			// post/index
			[
				'loc' => Url::to(['/post/index', 'lang' => $lang]),
				'lastmod' => time(),
				'changefreq' => static::CHANGEFREQ_DAILY,
				'priority' => static::PRIORITY_10,
				'alternateLinks' => [
					'en' => Url::to(['/post/index', 'lang' => 'en']),
					'ru' => Url::to(['/post/index', 'lang' => 'ru']),
				],
			],
			// ... you can add more regular pages if needed, but I recommend
			// separate pages related only for current model class
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapItemsQuery($lang = null)
	{
		// Base select query for current model
		return static::find()
		             ->select(['id', 'title', 'date', 'updated_at'])
		             ->where(['status' => Post::STATUS_ACTIVE])
		             ->orderBy(['date' => SORT_DESC]);
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapLoc($lang = null)
	{
		// Return absolute url to Post model view page
		return Url::to(['/post/view', 'id' => $this->id], true);
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapLastmod($lang = null)
	{
		return $this->updated_at;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapChangefreq($lang = null)
	{
		return static::CHANGEFREQ_MONTHLY;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapPriority($lang = null)
	{
		return static::PRIORITY_8;
	}
	
	/* END OF Basic INTERFACE */
	/* BEGIN OF GoogleImage INTERFACE */
	
	/**
	 * @inheritdoc
	 *
	 * @param self $material
	 */
	public function getSitemapMaterialImages($material, $lang = null)
	{
		// List of Post related images without scheme (news logo eg.)
		$images = [];
		// "/uploads/post/1.jpg"
		$images[] = $this->logo;
		// You can add more images (if Post have a photo gallery etc.)
		
		// !important! You can return array of any elements(Objects eg. $this->images relation), because its elements
		// will be foreached and become as $image argument for $this->getSitemapImageLoc($image)
		
		return $images;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapImageLoc($image, $lang = null)
	{
		// Return absolute url to each Post image
		// @see $image argument becomes from $this->getSitemapMaterialImages()
		return Yii::$app->urlManager->baseUrl . $image;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapImageGeoLocation($image, $lang = null)
	{
		// Location name string, for example: "Limerick, Ireland"
		return null;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapImageCaption($image, $lang = null)
	{
		// Image caption, simply use Post title
		return $this->title;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapImageTitle($image, $lang = null)
	{
		// Image title, simply use Post title
		return $this->title;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapImageLicense($image, $lang = null)
	{
		return null;
	}
	
	/* END OF GoogleImage INTERFACE */
	/* BEGIN OF GoogleAlternateLang INTERFACE */
	
	/**
	 * @inheritdoc
	 */
	public function getSitemapAlternateLinks()
	{
		// Generate altername links for all site language versions for this Post
		$buffer = [];
		
		foreach ($this->sitemapLanguages as $langCode) {
			$buffer[$langCode] = $this->getSitemapLoc($langCode);
			// or eg.: $buffer[$langCode] = Url::to(['post/view', 'id' => $this->id, 'lang' => $langCode]);
		}
		
		return $buffer;
	}
	
	/* END OF GoogleAlternateLang INTERFACE */
}