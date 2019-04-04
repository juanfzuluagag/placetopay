<?php  
	
	require_once('vendor/autoload.php');

	use Phpfastcache\CacheManager;
	use Phpfastcache\Config\ConfigurationOption;

	
	class Cache {
		
		private $InstanceCache;
		private $CachedString;

		function __construct($key){
			CacheManager::setDefaultConfig(
				new ConfigurationOption(
					[
			    		'path' => 'C:/xampp/htdocs/placetopay/business/tmp', // or in windows "C:/tmp/"
					]
				)
			);

			$this->InstanceCache = CacheManager::getInstance('files');
			$this->CachedString = $this->InstanceCache->getItem($key);
		}

		public function exist_cache(){
			// In your class, function, you can call the Cache
			
			if (!$this->CachedString->isHit()) {
				return false;

			} else {
				return true;
			}

		}

		public function create_record($records){
			    $this->CachedString->set($records)->expiresAfter(3600);//in seconds, also accepts Datetime
				$this->InstanceCache->save($this->CachedString); // Save the cache item just like you do with doctrine and entities
		}

		public function get_records(){
			return $this->CachedString->get();
		}
	}

?>