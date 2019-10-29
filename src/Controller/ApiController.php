<?php
/**
 * @file
 * Contains \Drupal\first_module\Controller\ApiController.
 */
 
namespace Drupal\first_module\Controller; 
use Drupal\Core\Controller\ControllerBase;
use Drupal\Component\Serialization\Json;


class ApiController extends ControllerBase{


  public function __construct( ) {
    $clientFactory = \Drupal::service('http_client_factory');
    $this->apiKey = '2e8b28a95f7c4ea8adf453f4d73d3964';
    $this->pageSize  = 5;
	   $this->client = $clientFactory->fromOptions([
		'verify' => FALSE,
		'base_uri' => 'https://newsapi.org/v2/'
	]);

  }

  public function News() {
  	 $response = $this->client->get('top-headlines', [
      'query' => [
        'country'=>'us',
        'apiKey'=>$this->apiKey,
        'pageSize'=>$this->pageSize,
        'page'=> 1,
      ]
    ]);

    return Json::decode($response->getBody());  
  }

  public function load() {
  	$data = $this->News();  	
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello world'),
      '#theme'=>'PrincipalApi',
      '#items'=>$data['articles'],
      '#attached' => array(
    		'library' => array(
        		'first_module/global-styling',
    		),
    		'drupalSettings' => ['NewsApi'=>[
    			'BaseUrl' =>'https://newsapi.org/v2/',
    			'ApiKey'=>$this->apiKey,
          'pageSize'=>$this->PageSize
    		]]
		),
    );
  }
}



