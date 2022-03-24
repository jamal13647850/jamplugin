<?php

declare(strict_types=1);

namespace jamal\jamplugin\shortcodes;

defined('ABSPATH') || exit();

use jamal\wpmstructure\wpshortcodes;

class shortcodes extends wpshortcodes
{
    function mainFunction($atts, $content, $tag)
    {
        $a = shortcode_atts(array(
            'form' => '',
            'vid' => ''
        ), $atts);
        $form = $a['form'];
        $vid = $a['vid'];

        switch ($form) {
            case 'secureupload':
                //echo $vid[lng form="secureupload" vid="lisuf8syfhsfsiufysft6s767%#%$#"];
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://op.jamplugin.com/enc/upload/getsecurl',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_REFERER=>'https://jamplugin.com/',
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('vid' =>$a['vid'],'token' => 'NSZvTUZNTjB3OEhMMTZSa3k4eEE'),
                ));

                $response = curl_exec($curl);
                
                curl_close($curl);
                
                $url="https://op.jamplugin.com/enc/upload/getvid/".json_decode($response)->hashedURL;
                echo '<video  controls controlsList="nodownload">
                <source src="'.$url.'" type="video/mp4">
                
              Your browser does not support the video tag.
              </video>';
                break;
        }
    }
}
