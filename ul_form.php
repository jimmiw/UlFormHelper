<?php

/**
 * A simple form helper, that acts as a wrapper to the Core Form helper.
 * All it does, is to remove the div's and adds an UnorderedList at the form
 * create method, and adds ListItems around each element in the form.
 *
 * @author jimmiw
 * @since 2010-11-21
 */
class UlFormHelper extends AppHelper {
  // we are using the form helper, so include it!
  var $helpers = array('Form');
  
  /**
   * Overriding the default Form's create function
   * @param string $model (optional)
   * @param array $options (optional)
   */
  function create(string $model = null, array $options = array()) {
    $formStart = $this->Form->create($model, $options);
    
    return $formStart."\n<ul>";
  }
  
  /**
   * Overriding the default Form's end function
   * @param string $model (optional)
   * @param array $options (optional)
   */
  function end(array $options = array()) {
    $formEnd = $this->Form->end($options);
    
    return "</ul>\n".$formEnd;
  }
  
  /**
   * Using PHP 5's magic __call function to handle the calling.
   * @param string $name the function that was called.
   * @param array $arguments the arguments that should be added.
   * @return the data from the Form helper, with the LI element added
   */
  function __call($name, array $arguments = array()) {
    // the className to add to the li
    $className = $name;
    // standard options, removes the div
    $options = array(
      'div' => false
    );
    
    // options are set, set "div" to false
    if(isset($arguments[1])) {
      $options = $arguments[1];
      $options['div'] = false;
    }
    
    // if it is a button, test if the type is there and add the
    // type's name as class name
    if($name == 'button') {
      if(isset($options['type']) && $options['type'] != "") {
        $className .= " ".$options['type'];
      }
    }
    
    // returns the element wrapped in LI
    return '<li class="'.$className.'">'. $this->Form->$name($arguments[0], $options). '</li>';
  }
  
  /**
   * Overrides the year function
   * @return the data from the Form helper, with the LI element added
   */
  function year(string $fieldName, int $minYear, int $maxYear, mixed $selected, array $attributes) {
    // standard options, removes the div
    $options = array(
      'div' => false
    );
    
    // options are set, set "div" to false
    if(isset($attributes)) {
      $options = $attributes;
      $options['div'] = false;
    }
    
    return '<li class="year">'.$this->Form->year(
      $fieldName,
      $minYear,
      $maxYear,
      $selected,
      $options
    ).'</li>';
  }
  
  /**
   * Overrides the month function
   * @return the data from the Form helper, with the LI element added
   */
  function month(string $fieldName, mixed $selected, array $attributes, boolean $showEmpty) {
    // standard options, removes the div
    $options = array(
      'div' => false
    );
    
    // options are set, set "div" to false
    if(isset($attributes)) {
      $options = $attributes;
      $options['div'] = false;
    }
    
    return '<li class="month">'.$this->Form->month(
      $fieldName,
      $selected,
      $attributes,
      $showEmpty
    ).'</li>';
  }
  
  /**
   * Overrides the dateTime function
   * @return the data from the Form helper, with the LI element added
   */
  function dateTime($fieldName, $dateFormat = 'DMY', $timeFormat = '12', $selected = null, $attributes = array()) {
    // standard options, removes the div
    $options = array(
      'div' => false
    );
    
    // options are set, set "div" to false
    if(isset($attributes)) {
      $options = $attributes;
      $options['div'] = false;
    }
    
    return '<li class="datetime">'.$this->Form->dateTime(
      $fieldName,
      $dateFormat, 
      $timeFormat,
      $selected,
      $attributes
    ).'</li>';
  }
  
  /**
   * Overrides the hour function
   * @return the data from the Form helper, with the LI element added
   */
  function hour(string $fieldName, boolean $format24Hours, mixed $selected, array $attributes, boolean $showEmpty) {
    // standard options, removes the div
    $options = array(
      'div' => false
    );
    
    // options are set, set "div" to false
    if(isset($attributes)) {
      $options = $attributes;
      $options['div'] = false;
    }
    
    return '<li class="hour">'.$this->Form->hour(
      $fieldName,
      $format24Hours,
      $selected,
      $attributes,
      $showEmpty
    ).'</li>';
  }
  
  /**
   * Overrides the minute function
   * @return the data from the Form helper, with the LI element added
   */
  function minute(string $fieldName, mixed $selected, array $attributes, boolean $showEmpty) {
    // standard options, removes the div
    $options = array(
      'div' => false
    );
    
    // options are set, set "div" to false
    if(isset($attributes)) {
      $options = $attributes;
      $options['div'] = false;
    }
    
    return '<li class="minute">'.$this->Form->minute(
      $fieldName, 
      $selected, 
      $attributes, 
      $showEmpty
    ).'</li>';
  }
  
  /**
   * Overrides the meridian function
   * @return the data from the Form helper, with the LI element added
   */
  function meridian(string $fieldName, mixed $selected, array $attributes, boolean $showEmpty) {
    // standard options, removes the div
    $options = array(
      'div' => false
    );
    
    // options are set, set "div" to false
    if(isset($attributes)) {
      $options = $attributes;
      $options['div'] = false;
    }
    
    return '<li class="meridian">'.$this->Form->meridian(
      $fieldName,
      $selected,
      $attributes,
      $showEmpty
    ).'</li>';
  }
  
  /**
   * Overrides the error function
   * @return the data from the Form helper, with the LI element added
   */
  function error(string $fieldName, mixed $text, array $options) {
    // removes the div
    $options['div'] = false;
    
    return '<li class="error">'.$this->Form->error(
      $fieldName,
      $text,
      $options
    ).'</li>';
  }
}


?>