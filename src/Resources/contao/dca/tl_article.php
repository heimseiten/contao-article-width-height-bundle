<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

PaletteManipulator::create()
    ->addLegend('articleWidthHeightLegend', 'layout_legend', PaletteManipulator::POSITION_BEFORE)
    ->addField('articleMaxWidth', 'articleWidthHeightLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('articleMinHeight', 'articleWidthHeightLegend', PaletteManipulator::POSITION_APPEND)
    
    ->applyToPalette('default', 'tl_article');

$GLOBALS['TL_DCA']['tl_article']['fields']['articleMaxWidth'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['articleMaxWidth'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['articleMinHeight'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['articleMinHeight'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];

