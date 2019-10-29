<?php

/**
 * @file
 * Contains \Drupal\first_module\Plugin\Block\FirstBlock.
 */

namespace Drupal\first_module\Plugin\Block;
use Drupal\Core\Block\BlockBase;
/**
 * Provides a 'Hello' Block
 *
 * @Block(
 *   id = "first_block",
 *   admin_label = @Translation("First Block"),
 * )
 */

class FirstBlock extends BlockBase{

	public function build(){
		return array(
			'#markup'=>$this->t('Hello world here'),
		);
	}
}