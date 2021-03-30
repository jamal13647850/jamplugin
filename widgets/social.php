<?php
/**
 *@author Sayyed Jamal Ghasemi <https://www.linkedin.com/in/jamal1364/>
 */
namespace widgets;
use WP_Widget;

/**
 * Class Socials
 */
class social extends WP_Widget {
    /**
     * Socials constructor.
     */
    function __construct(){
        parent::__construct(
            'social_widget',
            __( 'Socials Network' , "jamplugin"),
            array( 'description' => __( 'It show social networks icon' , 'jamplugin') )
        );
    }

    function form($instance) {
        // outputs the options form on admin
        //Set up some default widget settings.
        $defaults = array(
            'rsslink'=>'http://2rnica.com/feed',
            'facebooklink'=>'http://www.facebook.com/2rnica',
            'twitterlink'=>'https://twitter.com/2rnica',
            'googlepluslink'=>'https://plus.google.com/',
            'instagramlink'=>'https://instagram.com/',
            'linkedinlink'=>'https://linkedin.com/',
            'telegramlink'=>'https://telegram.com/',
            'linelink'=>'https://line.com/',
            'aparatlink'=>'https://aparat.com/',
            'pinterestlink'=>'https://pinterest.com/',
            'background'=>'#222222'
        );

        $instance = wp_parse_args( (array) $instance, $defaults );
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __('title:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'rsslink' ); ?>"><?php echo __('rss link:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'rsslink' ); ?>" name="<?php echo $this->get_field_name( 'rsslink' ); ?>" value="<?php echo $instance['rsslink']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebooklink' ); ?>"><?php echo __('facebook link:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'facebooklink' ); ?>" name="<?php echo $this->get_field_name( 'facebooklink' ); ?>" value="<?php echo $instance['facebooklink']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitterlink' ); ?>"><?php echo __('twitter link:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'twitterlink' ); ?>" name="<?php echo $this->get_field_name( 'twitterlink' ); ?>" value="<?php echo $instance['twitterlink']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'googlepluslink' ); ?>"><?php echo __('google plus link:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'googlepluslink' ); ?>" name="<?php echo $this->get_field_name( 'googlepluslink' ); ?>" value="<?php echo $instance['googlepluslink']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagramlink' ); ?>"><?php echo __('instagram link:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'instagramlink' ); ?>" name="<?php echo $this->get_field_name( 'instagramlink' ); ?>" value="<?php echo $instance['instagramlink']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedinlink' ); ?>"><?php echo __('linkedin link:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'linkedinlink' ); ?>" name="<?php echo $this->get_field_name( 'linkedinlink' ); ?>" value="<?php echo $instance['linkedinlink']; ?>" style="width:100%;" />
        </p>


        <p>
            <label for="<?php echo $this->get_field_id( 'telegramlink' ); ?>"><?php echo __('telegram link:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'telegramlink' ); ?>" name="<?php echo $this->get_field_name( 'telegramlink' ); ?>" value="<?php echo $instance['telegramlink']; ?>" style="width:100%;" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'aparatlink' ); ?>"><?php echo __('Aparat link:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'aparatlink' ); ?>" name="<?php echo $this->get_field_name( 'aparatlink' ); ?>" value="<?php echo $instance['aparatlink']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'pinterestlink' ); ?>"><?php echo __('Pinterest link:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'pinterestlink' ); ?>" name="<?php echo $this->get_field_name( 'pinterestlink' ); ?>" value="<?php echo $instance['pinterestlink']; ?>" style="width:100%;" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'background' ); ?>"><?php echo __('background color:', 'jamplugin'); ?></label>
            <input id="<?php echo $this->get_field_id( 'background' ); ?>" name="<?php echo $this->get_field_name( 'background' ); ?>" value="<?php echo $instance['background']; ?>" style="width:100%;" />
        </p>
        <?php
    }
    function update($new_instance, $old_instance) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['googlepluslink'] = strip_tags( $new_instance['googlepluslink']) ;
        $instance['rsslink'] = strip_tags( $new_instance['rsslink']) ;
        $instance['facebooklink'] = strip_tags( $new_instance['facebooklink']) ;
        $instance['twitterlink'] = strip_tags( $new_instance['twitterlink']) ;
        $instance['instagramlink'] = strip_tags( $new_instance['instagramlink']) ;
        $instance['linkedinlink'] = strip_tags( $new_instance['linkedinlink']) ;
        $instance['telegramlink'] = strip_tags( $new_instance['telegramlink']) ;
        $instance['aparatlink'] = strip_tags( $new_instance['aparatlink']) ;
        $instance['pinterestlink'] = strip_tags( $new_instance['pinterestlink']) ;
        $instance['background'] = strip_tags( $new_instance['background']) ;
        $instance['title'] = strip_tags( $new_instance['title']) ;

        return $instance;
    }
    function widget($args, $instance) {
        // outputs the content of the widget
        extract( $args );
        $googlepluslink = isset($instance['googlepluslink'])?$instance['googlepluslink']:'';
        $rsslink = isset($instance['rsslink'])?$instance['rsslink']:'';
        $facebooklink = isset($instance['facebooklink'])?$instance['facebooklink']:'';
        $twitterlink = isset($instance['twitterlink'])?$instance['twitterlink']:'';
        $instagramlink = isset($instance['instagramlink'])?$instance['instagramlink']:'';
        $telegramlink = isset($instance['telegramlink'])?$instance['telegramlink']:'';
        $linkedinlink = isset($instance['linkedinlink'])?$instance['linkedinlink']:'';
        $aparatlink = isset($instance['aparatlink'])?$instance['aparatlink']:'';
        $pinterestlink = isset($instance['pinterestlink'])?$instance['pinterestlink']:'';
        $background = isset($instance['background'])?$instance['background']:'';
        $title = isset($instance['title'])?$instance['title']:'';

        $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
        ?>
        <style>
            div.mainsocial{
                background: <?php echo $background; ?>;
            }
        </style>
        <?php
            $app=new app();
            echo $before_widget;
            if($title){
                echo $before_title . $title . $after_title;
            }
        ?>
        <div class="mainsocial" >
            <span>
            <?php if ($rsslink!=''){ ?>
                <a target="_blank" data-tooltip aria-haspopup="true" title="<?php echo $app->feed;  ?>" class="has-tip ext-link" rel="external nofollow" href="<?php echo $rsslink ?>" style="position: relative; overflow: hidden;" >
                    <i class="fa fa-rss fa-2x" aria-hidden="true"></i>
                </a>
            <?php } ?>
                <?php if ($linkedinlink!=''){ ?>
                    <a target="_blank"  data-tooltip aria-haspopup="true" title="<?php echo $app->linkedin;  ?>" class="has-tip ext-link" rel="external nofollow" href="<?php echo $linkedinlink ?>" style="position: relative; overflow: hidden;" >
                    <i class="fa fa-linkedin fa-2x" aria-hidden="true"></i>
                </a>
                <?php } ?>
                <?php if ($instagramlink!=''){ ?>
                    <a target="_blank"  data-tooltip aria-haspopup="true" title="<?php echo $app->instagram;  ?>" class="has-tip ext-link" rel="external nofollow" href="<?php echo $instagramlink ?>" style="position: relative; overflow: hidden;" >
                    <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                </a>
                <?php } ?>
                <?php if ($twitterlink!=''){ ?>
                    <a target="_blank"  data-tooltip aria-haspopup="true" title="<?php echo $app->twitter;  ?>" class="has-tip ext-link" rel="external nofollow" href="<?php echo $twitterlink ?>" style="position: relative; overflow: hidden;" >
                    <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                </a>
                <?php } ?>
                <?php if ($googlepluslink!=''){ ?>
                    <a target="_blank"  data-tooltip aria-haspopup="true" title="<?php echo $app->gp;  ?>" class="has-tip ext-link" rel="external nofollow" href="<?php echo $googlepluslink ?>" style="position: relative; overflow: hidden;" >
                    <i class="fa fa-google-plus fa-2x" aria-hidden="true"></i>
                </a>
                <?php } ?>
                <?php if ($facebooklink!=''){ ?>
                    <a target="_blank"  data-tooltip aria-haspopup="true" title="<?php echo $app->facebook;  ?>" class="has-tip ext-link"  rel="external nofollow" href="<?php echo $facebooklink ?>" style="position: relative; overflow: hidden;" >
                    <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                </a>
                <?php } ?>


                <?php if ($telegramlink!=''){ ?>
                    <a target="_blank"  data-tooltip aria-haspopup="true" title="<?php echo $app->telegram;  ?>" class="has-tip ext-link"  rel="external nofollow" href="<?php echo $telegramlink ?>" style="position: relative; overflow: hidden;" >
                    <i class="fa fa-telegram fa-2x" aria-hidden="true"></i>

                </a>
                <?php } ?>

                <?php if ($aparatlink!=''){ ?>
                    <a target="_blank"  data-tooltip aria-haspopup="true" title="<?php echo $app->aparat;  ?>" class="has-tip ext-link"  rel="external nofollow" href="<?php echo $aparatlink ?>" style="position: relative; overflow: hidden;" >
                        <!--<img class="fa fa-aparat" src="<?php /*echo jamplugin_img_url."aparatlogo.png"  */?>">-->
                        <i class="fa fa-2x aparat"  aria-hidden="true"></i>
                    </a>
                <?php } ?>

                <?php if ($pinterestlink!=''){ ?>
                    <a target="_blank"  data-tooltip aria-haspopup="true" title="<?php echo $app->pinterestlink;  ?>" class="has-tip ext-link"  rel="external nofollow" href="<?php echo $pinterestlink ?>" style="position: relative; overflow: hidden;" >
                        <i class="fa fa-pinterest fa-2x"  aria-hidden="true"></i>
                    </a>
                <?php } ?>


                </span>
        </div>
        <?php echo $after_widget; ?>
        <?php
    }
}


