<?php
namespace Drupal\first_module\Plugin\Block;
use Drupal\Core\Block\BlockBase;
/**
 * Provides a 'Hello' Block
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 * )
 */
class HellotBlock extends BlockBase{
 /**
   * {@inheritdoc}
   */
	public function build(){
		return array(

			'markup'=>$this->t('Hello word'),
		);
	}
}
