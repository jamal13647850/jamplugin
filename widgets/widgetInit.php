<?php
namespace widgets;
/**
 *@author Sayyed Jamal Ghasemi <https://www.linkedin.com/in/jamal1364/>
 * Date: 11/18/2017
 * Time: 10:55 AM
 */
class widgetInit
{
    /**
     * widgetInit constructor.
     */
    public function __construct()
    {

        add_action( 'widgets_init', function(){
            register_widget( 'widgets\social' );
        } );
      
    }
}