<?php
declare (strict_types = 1);

namespace jamal\jamplugin\classes;

defined('ABSPATH') || exit();

use jamal\wpmstructure\wphooks;
use jamal\wpmstructure\Action;
use jamal\jamplugin\admin\Menu;
use jamal\jamplugin\admin\WidgetArea;
class loadAssets
{
    private array $cssList;
    private array $jsList;
    private string $mode;
    private string $cssPath;
    private string $jsPath;

   
    public function __construct(string $mode,string $cssPath,string $jsPath)
    {
        $this->mode=$mode;
        $this->cssPath=$cssPath;
        $this->jsPath=$jsPath;
    }

    public function LoadStyle()
    {
        
        $this->cssList=apply_filters( "jamplugincssList",[
            'admin-core'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'media'=>'all'
            ],
            'home-280'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'media'=>'only screen and (min-width: 280px) and (max-width: 480px)'
            ],
            'home-481'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'media'=>'only screen and (min-width: 481px) and (max-width: 768px)'
            ],
            'home-769'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'media'=>'only screen and (min-width: 769px) and (max-width: 1024px)'
            ],
            'home-1025'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'media'=>'only screen and (min-width: 1025px) and (max-width: 1200px)'
            ],
            'home-1201'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'media'=>'only screen and (min-width: 1201px)  and (max-width: 1823px)'
            ],
            'home-1824'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'media'=>'only screen and (min-width: 1824px)'
            ],
            'home-core'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'media'=>'all'
            ],
            'home-handheld'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'media'=>'handheld'
            ],
            'home-print'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'media'=>'print'
            ]
        ] );
        
        $this->cssList=$this->addType($this->createAssetsNames($this->cssList),'css');
        foreach($this->cssList as $key=>$css){
            wp_register_style(
                $css[$key]['handle'], 
                $this->cssPath.$css[$key]['src'],
                $css[$key]['deps'],$css[$key]['ver'],$css[$key]['media']);
            wp_enqueue_style($css[$key]['handle']);
        }
    }
    public function LoadScripts()
    {
        $this->jsList=apply_filters( "jampluginjsList",[
            'admin-core'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'in_footer'=>true
            ],
            'home-280'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'in_footer'=>true
            ],
            'home-481'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'in_footer'=>true
            ],
            'home-769'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'in_footer'=>true
            ],
            'home-1025'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'in_footer'=>true
            ],
            'home-1201'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'in_footer'=>true
            ],
            'home-1824'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'in_footer'=>true
            ],
            'home-core'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'in_footer'=>true
            ],
            'home-handheld'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'in_footer'=>true
            ],
            'home-print'=>[
                'handle'=>'',
                'src'=>'',
                'deps'=>[],
                'ver'=>false,
                'in_footer'=>true
            ]
        ] );
        

        
        $this->jsList=$this->addType($this->createAssetsNames($this->jsList),'js');
        foreach($this->jsList as $key=>$js){
            wp_enqueue_script($js[$key]['handle'], 
            $this->jsPath.$js[$key]['src'],
            $js[$key]['deps'],
            $js[$key]['ver'], 
            $js[$key]['in_footer']);
        }
    }

    private function createAssetsNames(array $assets):array{
        
        
        foreach( $assets as $key=>$asset ){
            switch ($this->mode) {
                case "development":
                    
                    if ( is_rtl() ) {
                        $assets[$key]['handle']=$key.'-rtl';
                        $assets[$key]['src']=$key.'-rtl';
                    }
                    else{
                        $assets[$key]['handle']=$key.'-ltr';
                        $assets[$key]['src']=$key.'-ltr';
                    }
                    
                    break;
                case "production":
                    if ( is_rtl() ) {
                        $assets[$key]['handle']=$key.'-rtl-min';
                        $assets[$key]['src']=$key.'-rtl.min';
                    }
                    else{
                        $assets[$key]['handle']=$key.'-ltr-min';
                        $assets[$key]['src']=$key.'-ltr.min';
                    }
    
                    break;
            }
        }
        return $assets;
    }

 
    private function addType(array $assetList,string $type):array{
        foreach($assetList as $key=>$value){
            $assetList[$key]['handle']=$assetList[$key]['handle'].'-'.$type;
            $assetList[$key]['src']=$assetList[$key]['src'].'.'.$type;
        }
        return $assetList;
    }
    private function addPath(array $assetList,string $path){
        foreach($assetList as $key=>$value){
            $assetList[$key]['src']=$path.$assetList[$key]['src'];
        }
        return $assetList;
    }
}