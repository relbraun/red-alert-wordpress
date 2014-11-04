<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RedAlert
{
    const OREF_URL='http://www.oref.org.il/WarningMessages/alerts.json';
    
    
    public function registerScripts()
    {
        $scriptFile=RED_ALERT_URL.'/script.js';
        $styleFile=RED_ALERT_URL.'/style.css';
        wp_register_script(__FILE__.'reer',$scriptFile,array('jquery'),false,false);
        wp_enqueue_script(__FILE__.'reer');
        wp_register_style(__FILE__.'style', $styleFile);
        wp_enqueue_style(__FILE__.'style');
        
        
    }
    public function echoScript()
    {
        $scriptString='<script>'
                . 'redAlertPikudOref("'.  plugin_dir_url(__FILE__).'/cities.json","'. admin_url('admin-ajax.php').'");'
                . '</script>';
        echo $scriptString;
    }
    public function parseCities() 
    {
        $json=  file_get_contents(plugin_dir_path(__FILE__).'/cities.json');
        $arr=  json_decode($json);
        $data=array(
            
        );
    }
    public function getAlerts()
    {
        $msg=  wp_remote_get(self::OREF_URL);
        header('content-type:json');
        echo( $msg['body']);
        die;
    }
    public function init()
    {
        add_action('wp_enqueue_scripts', array(&$this,'registerScripts'));
        add_action('wp_footer', array(&$this,'echoScript'));
        add_action('wp_ajax_nopriv_red_alert_msg',array(&$this,'getAlerts'));
    }
    public function __construct() 
    {
        $this->init();
    }
    public static function run()
    {
        return new self();
    }
}
