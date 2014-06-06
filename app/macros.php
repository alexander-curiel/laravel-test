<?php

/*
|--------------------------------------------------------------------------
| Delete form macro
|--------------------------------------------------------------------------
|
| This macro creates a form with only a submit button. 
| We'll use it to generate forms that will post to a certain url with the DELETE method,
| following REST principles.
|
*/

Form::macro('delete',function($url, $button_label='Delete',$form_parameters = array(),$button_options=array()){
 
    if(empty($form_parameters)){
        $form_parameters = array(
            'method'=>'DELETE',
            'class' =>'delete-form',
            'url'   =>$url
            );
    }else{
        $form_parameters['url'] = $url;
        $form_parameters['method'] = 'DELETE';
    };
 
    return Form::open($form_parameters)
            . Form::submit($button_label, $button_options)
            . Form::close();
});

/*
|--------------------------------------------------------------------------
| Update form macro
|--------------------------------------------------------------------------
|
| This macro creates a form with only a submit button. 
| We'll use it to generate forms that will post to a certain url with the PUT method,
| following REST principles.
|
*/
/*
Form::macro('update',function($url, $button_label='Update',$form_parameters = array(),$button_options=array()){
 
    if(empty($form_parameters)){
        $form_parameters = array(
            'method'=>'PUT',
            'class' =>'update-form',
            'url'   =>$url
            );
    }else{
        $form_parameters['url'] = $url;
        $form_parameters['method'] = 'PUT';
    };
 
    return Form::open($form_parameters)
            . Form::submit($button_label, $button_options)
            . Form::close();
});
*/

/*
|--------------------------------------------------------------------------
| Laravel Macros for Bootstrap 3 form fields
|--------------------------------------------------------------------------
|
*/
Form::macro('formField',  function($name, $value='', $label, $class='', $required = false) {

    $output = '<div class="form-group">'
            . Form::label($name, $label,array('class'=>'col-md-3 control-label'))
            . '<div class="col-md-9">'
            . Form::text($name, $value, array('class'=>'form-control ' . $class, 'placeholder'=>$label))
            . '</div>'
          . '</div>';
    
    return $output;
});
Form::macro('emailField', function($name, $value='', $label, $class='', $required = false) {

    $output = '<div class="form-group">'
            . Form::label($name, $label,array('class'=>'col-md-3 control-label'))
            . '<div class="col-md-9">'
            . Form::email($name, $value, array('class'=>'form-control ' . $class, 'placeholder'=>$label))
            . '</div>'
          . '</div>';
    
    return $output;
});
Form::macro('radioField', function($name, $label, $value, $class='', $required = false) {
    $output = '<div class="form-group">'
            . Form::label('married', $label['field'],array('class'=>'col-md-3 control-label'))
            . ' <div class="col-md-9">'
                . ' <div class="radio-inline " . $class>'
                  . ' <label>'
                    . ' <input type="radio" name="' . $name . '" id="' . $name . '1" value="'. $value['one'] .'" checked>'
                    . $label['one']
                  . ' </label>'
                . ' </div>'
                . ' <div class="radio-inline">'
                  . ' <label>'
                    . ' <input type="radio" name="' . $name . '" id="' . $name . '0" value="'. $value['zero'] .'">'
                    . $label['zero']
                  . ' </label>'
                . ' </div>'
            . ' </div>'
          . ' </div>';
    
    return $output;
});
