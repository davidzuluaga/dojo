<?php

namespace Drupal\CultureNews\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\CultureNews\model\Article;

class createCultureArticleForm extends FormBase {

  public function getFormId() {
    return 'create_artile';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    
    $form['title'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Título')];
    
    $form['description'] = [
        '#type' => 'textarea',
        '#title' => $this->t('Descripción')];
    
    $form['author'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Autor')];
    
    $form['submit'] = [
        '#type' => 'submit',
        '#name' => 'saveSettings',
        '#value' => t('Guardar')];
    
    return $form;
    
  }
  
  public function submitForm(array &$form, FormStateInterface $form_state) {
    
    $values = $form_state->getValues();
    
    $article = new Article($values['title'],$values['description'],$values['author']);
    $result = $article->save();
    
    if($result){
      drupal_set_message('Articulo creado exitosamente');
    } else  {
      drupal_set_message('Articulo no ha sido creado');
    }
  }
  
}

