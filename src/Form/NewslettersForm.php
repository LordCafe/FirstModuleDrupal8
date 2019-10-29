<?php
namespace Drupal\first_module\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class NewslettersForm extends FormBase{

	public function getFormId{
		return 'NewslettersForm'
	}

	public function buildForm( array $form , FormStateInterface $form_state ){
		$form = [];
		return $form;
	}

	public function validateForm(array $form , FormStateInterface $form_state){

	}

	public function submitForm(array $form , FormStateInterface $form_state){
		
	}
}