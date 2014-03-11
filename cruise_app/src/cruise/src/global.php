<?php
 
/**
 * This is the shortcut to Yii::app()
 */
function app()
{
    return Yii::app();
}
 
/**
 * This is the shortcut to Yii::app()->clientScript
 */
function cs()
{
    // Client script instance via Yii::app()->clientScript
    return Yii::app()->getClientScript();
}
 
/**
 * This is the shortcut to Yii::app()->user.
 */
function user() 
{
    return Yii::app()->getUser();
}
 
/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function url($route,$params=array(),$ampersand='&')
{
    return Yii::app()->createUrl($route,$params,$ampersand);
}

/**
 * This is the shortcut to Yii::app()->createAbsoluteUrl()
 */
function aUrl($route=null,$params=array(),$schema='',$ampersand='&')
{
    // use exising request if no route specified.
    $route = $route ? $route : Yii::app()->request->requestUri;
    return Yii::app()->createAbsoluteUrl($route, $params, $schema, $ampersand);
}

/**
 * This is the shortcut to CHtml::encode
 */
function html($text)
{
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}
 
/**
 * This is the shortcut to CHtml::link()
 */
function href($text, $url = '#', $htmlOptions = array()) 
{
    return CHtml::link($text, $url, $htmlOptions);
}
 
/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($message,$category='stay',$params=array(),$source=null,$language=null) 
{
    return Yii::t($category, $message, $params, $source, $language);
}
 
/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function asset($url=null) 
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl() . "/assets";
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}
 

/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function param($name) 
{
    return Yii::app()->params[$name];
}

/**
 * Shortcut function to return a variable or alternate value
 * if variable is not set
 */
function ifset(&$var, $default="") {
    return isset($var) ? $var : $default;
}
