<?php

declare(strict_types=1);

namespace Heimseiten\ContaoArticleWidthHeightBundle\Listener;

use Contao\FrontendTemplate;
use Contao\Template;
use Contao\Module;

class HooksListener
{
    
    public function onParseTemplate(Template $objTemplate)
    {
        if ($objTemplate->type == 'article') {
            if ($objTemplate->articleMinHeight) { 
                $objTemplate->style .= '--article_min_height:' . $objTemplate->articleMinHeight . ';'; 
            }
            if ($objTemplate->articleMaxWidth) { 
                $objTemplate->style .= '--article_inside_width:' . $objTemplate->articleMaxWidth . ';'; 
                if ( $objTemplate->articleMaxWidth == '100%' || $objTemplate->articleMaxWidth == '100vw' ) {
                    $objTemplate->class .= ' full_width';
                }
            }
        }
    }

}