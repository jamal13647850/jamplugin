<?php
declare (strict_types = 1);

namespace jamal\jamplugin\hooks;

defined('ABSPATH') || exit();


use jamal\wpmstructure\ActionBodyDecorator;
use jamal13647850\mycustomcodes\MonoLogFactory;

class WidgetArea extends ActionBodyDecorator {
    public function loadBody() {
        add_action( 'widgets_init', [$this,'register_custom_widget_area'] );
        $this->actionBody->loadBody();
    }

    public function register_custom_widget_area()
    {
        register_sidebar(
            array(
                'id' => 'new-widget-area',
                'name' => esc_html__('My new widget area', 'theme-domain'),
                'description' => esc_html__('A new widget area made for testing purposes', 'theme-domain'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
                'after_title' => '</h3></div>'
            )
        );
    }
}

/*show widget area example

<?php if ( is_active_sidebar( 'new-widget-area' ) ) : ?>
<div id="secondary-sidebar" class="new-widget-area">
<?php dynamic_sidebar( 'new-widget-area' ); ?>
</div>
<?php endif; ?>

*/