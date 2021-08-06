<?php

declare(strict_types=1);

namespace Heimseiten\ContaoArticleWidthHeightBundle\Listener;

use Contao\FrontendTemplate;
use Contao\Template;
use Contao\Module;

class HooksListener
{
    
    public function onCompileArticle(FrontendTemplate $objTemplate, array $arrData, Module $module): void
    {
        if (TL_MODE == 'FE' && $objTemplate->type == 'article') {
            $mod_article_before_content_elements = new FrontendTemplate('mod_article_before_content_elements');
            $mod_article_before_content_elements->articleMinHeight = $arrData['articleMinHeight'];
            $mod_article_before_content_elements->articleMaxWidth = $arrData['articleMaxWidth'];
            $elements = $objTemplate->elements;
            array_unshift($elements, $mod_article_before_content_elements->parse());

            $mod_article_after_content_elements = new FrontendTemplate('mod_article_after_content_elements');
            $mod_article_after_content_elements->articleMaxWidth = $arrData['articleMaxWidth'];
            array_push($elements, $mod_article_after_content_elements->parse());
            
            $objTemplate->elements = $elements;
        }
    }

    public function onParseTemplate(Template $objTemplate)
    {
        if (TL_MODE == 'FE' && $objTemplate->type == 'article') {
            if ($objTemplate->articleMinHeight) { $objTemplate->style .= '--article_min_height:' . $objTemplate->articleMinHeight . ';'; }
            if ($objTemplate->articleMaxWidth) { $objTemplate->class .= ' has_inside'; }
        }
    }

}
