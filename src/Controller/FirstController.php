<?php
/**
 * @file
 * Contains \Drupal\first_module\Controller\FirstController.
 */
 
namespace Drupal\first_module\Controller; 
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\Component\Utility\Unicode;

 
class FirstController extends ControllerBase {
	public $nodes =[];
	function __construct(){
		$this->loadNodes();
	}

  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello world'),
      '#theme'=>'PrincipalTemplate',
      '#nodes'=>$this->nodes,
      '#attached' => array(
    		'library' => array(
        		'first_module/global-styling',
    		),
		),
    );
  }

  protected function loadNodes(){
  	$this->GetNodes();
  	foreach ( $this->Nodes as $key => $node) {
  		$node = Node::load($node->nid);
  		$image = file_create_url($node->field_image->entity->getFileUri());
  		$text = Unicode::truncate($node->get('body')->getValue()[0]['summary'], 500);
  		$this->nodes[]=[
  			'title'=> $node->get('title')->getValue()[0]['value'],
  			'body'=> $text,
  			'image'=> file_url_transform_relative($image),
  		];
  	}

  }
  protected function GetNodes(){
  	$database = \ Drupal::database();
  	$nodes = $database->select('node_field_data', 'n');
  	$nodes->fields('n', [ 'nid', 'type', 'status',  'created']);  
  	$nodes->range(0,2);
  	$this->Nodes = $nodes->execute()-> fetchAll();
  }
}