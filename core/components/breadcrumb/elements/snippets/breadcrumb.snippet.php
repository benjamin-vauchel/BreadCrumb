<?php
/**
 * BreadCrumb
 * Copyright 2011 Benjamin Vauchel <contact@omycode.fr>
 *
 * BreadCrumb is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * BreadCrumb is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * BreadCrumb; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package breadcrumb
 * @author Benjamin Vauchel <contact@omycode.fr>
 *
 * @version Version 1.4.3 pl
 * 07/03/15
 *
 * Breadcrumb is a snippet for MODx Revolution, inspired by the Jared's BreadCrumbs snippet.
 * It will create a breadcrumb navigation for the current resource or a specific resource.
 *
 * Optional properties:
 *
 * @property from - (int) Resource ID of the first crumb; [Default value : 0].
 * @property to - (int) Resource ID of the last crumb; [Default value : current resource id].
 * @property exclude - (string) Comma separated list of resources IDs not shown in breadcrumb. [Default value : []]
 * @property maxCrumbs - (int) Max crumbs shown in breadcrumb. Max delimiter template can be customize with property maxCrumbTpl ; [Default value : 100].
 * @property showHidden - (bool) Show hidden resources in breadcrumb; [Default value : true].
 * @property showContainer - (bool) Show container resources in breadcrumb; [Default value : true].
 * @property showUnPub - (bool) Show unpublished resources in breadcrumb; [Default value : true].
 * @property showCurrentCrumb - (bool) Show current resource as a crumb; [Default value : true].
 * @property showBreadCrumbAtHome - (bool) Show BreadCrumb on the home page; [Default value : true].
 * @property showHomeCrumb - (bool) Add the home page crumb at the start of the breadcrumb; [Default value : true].
 * @property useWebLinkUrl - (bool) Use the weblink url instead of the url to the weblink; [Default value : true].
 * @property direction - (string) Direction or breadcrumb : Left To Right (ltr) or Right To Left (rtl) for Arabic language for example; [Default value : ltr].
 * @property scheme - (string) URL Generation Scheme; [Default value : -1].
 *
 * Templates :
 *
 * @property containerTpl - (string) Container template for BreadCrumb; [Default value : BreadCrumbContainerTpl].
 * @property currentCrumbTpl - (string) Current crumb template for BreadCrumb; [Default value : BreadCrumbCurrentCrumbTpl].
 * @property linkCrumbTpl - (string) Default crumb template for BreadCrumb; [Default value : BreadCrumbLinkCrumbTpl].
 * @property categoryCrumbTpl - (string) Default category crumb template for BreadCrumb; [Default value : BreadCrumbCategoryCrumbTpl].
 * @property maxCrumbTpl - (string) Max delimiter crumb template for BreadCrumb; [Default value : BreadCrumbMaxCrumbTpl].
 */

// Script Properties
$from                 = !empty($from) ? $from : $modx->getOption('from', $scriptProperties, 0, true, true);
$to                   = $currentResourceId = !empty($to) ? $to : $modx->getOption('to', $scriptProperties, $modx->resource->get('id'), true);
$exclude              = !empty($exclude) ? explode(',', $exclude) : array();
$maxCrumbs            = !empty($maxCrumbs) ? abs(intval($maxCrumbs)) : $modx->getOption('maxCrumbs', $scriptProperties, 100, true);
$showHidden           = isset($showHidden) ? (bool)$showHidden : (bool)$modx->getOption('showHidden', $scriptProperties, true, true);
$showContainer        = isset($showContainer) ? (bool)$showContainer : (bool)$modx->getOption('showContainer', $scriptProperties, true, true);
$showUnPub            = isset($showUnPub) ? (bool)$showUnPub : (bool)$modx->getOption('showUnPub', $scriptProperties, true, true);
$showCurrentCrumb     = isset($showCurrentCrumb) ? (bool)$showCurrentCrumb : (bool)$modx->getOption('showCurrentCrumb', $scriptProperties, true, true);
$showBreadCrumbAtHome = isset($showBreadCrumbAtHome) ? (bool)$showBreadCrumbAtHome : (bool)$modx->getOption('showBreadCrumbAtHome', $scriptProperties, true, true);
$showHomeCrumb        = isset($showHomeCrumb) ? (bool)$showHomeCrumb : (bool)$modx->getOption('showHomeCrumb', $scriptProperties, true, true);
$useWebLinkUrl        = isset($useWebLinkUrl) ? (bool)$useWebLinkUrl : (bool)$modx->getOption('useWebLinkUrl', $scriptProperties, true, true);
$direction            = !empty($direction) ? $direction : $modx->getOption('direction', $scriptProperties, 'ltr', true);
$scheme               = !empty($scheme) ? $scheme : $modx->getOption('scheme', $scriptProperties, $modx->getOption('link_tag_scheme'), true);
$containerTpl         = !empty($containerTpl) ? $containerTpl : $modx->getOption('containerTpl', $scriptProperties, '@INLINE <ul id="breadcrumb" itemprop="breadcrumb">[[+crumbs]]</ul>');
$homeCrumbTpl         = !empty($homeCrumbTpl) ? $homeCrumbTpl : $modx->getOption('homeCrumbTpl', $scriptProperties, '@INLINE <li><a href="[[+link]]">[[+pagetitle]]</a></li>');
$currentCrumbTpl      = !empty($currentCrumbTpl) ? $currentCrumbTpl : $modx->getOption('currentCrumbTpl', $scriptProperties, '@INLINE <li>[[+pagetitle]]</li>');
$linkCrumbTpl         = !empty($linkCrumbTpl) ? $linkCrumbTpl : $modx->getOption('linkCrumbTpl', $scriptProperties, '@INLINE <li><a href="[[+link]]">[[+pagetitle]]</a></li>');
$categoryCrumbTpl     = !empty($categoryCrumbTpl) ? $categoryCrumbTpl : $modx->getOption('categoryCrumbTpl', $scriptProperties, '@INLINE <li><a href="[[+link]]">[[+pagetitle]]</a></li>');
$maxCrumbTpl          = !empty($maxCrumbTpl) ? $maxCrumbTpl : $modx->getOption('maxCrumbTpl', $scriptProperties, '@INLINE <li>...</li>');

// include parseTpl
include_once $modx->getOption('breadcrumb.core_path',null,$modx->getOption('core_path').'components/breadcrumb/includes/').'include.parsetpl.php';

// Output variable
$output = '';

// We check if current resource is the homepage and if breadcrumb is shown for the homepage
if (!$showBreadCrumbAtHome && $modx->resource->get('id') == $modx->getOption('site_start')) {
    return '';
}

// We get all the other crumbs
$crumbs = array();
$crumbsCount = 0;
$resourceId = $to;
while ($resourceId != $from && $crumbsCount < $maxCrumbs)
{
    if (!$resource = $modx->getObject('modResource', $resourceId)) {
        break;
    }

    // We check the conditions to show crumb
    if (
        $resourceId != $modx->getOption('site_start')                                                                           // ShowHomeCrumb
        && (($resource->get('hidemenu') && $showHidden) || !$resource->get('hidemenu'))                                         // ShowHidden
        && (($resource->get('isfolder') && $showContainer) || !$resource->get('isfolder'))                                      // ShowContainer
        && ((!$resource->get('published') && $showUnPub) || $resource->get('published'))                                        // UnPub
        && (($resourceId == $currentResourceId && $showCurrentCrumb) || $resourceId != $currentResourceId)                      // ShowCurrent
        && !in_array($resourceId, $exclude)                                                                                     // Excluded resources
    ) {
        // If is LTR direction, we push resource at the beginning of the array
        if ($direction == 'ltr') {
            array_unshift($crumbs, $resource);
        }
        // Else we push it at the end
        else {
            $crumbs[] = $resource;
        }

        $crumbsCount++;
    }
    $resourceId = $resource->get('parent');
}

// Add home crumb
if ($showHomeCrumb && $resource = $modx->getObject('modResource', $modx->getOption('site_start'))) {
    if ($direction == 'ltr') {
        array_unshift($crumbs, $resource);
    } else {
        $crumbs[] = $resource;
    }
}

// We build the output of crumbs
foreach($crumbs as $key => $resource)
{
    // Home crumb tpl ?
    if ($resource->get('id') == $modx->getOption('site_start'))
    {
        $tpl = $homeCrumbTpl;
    }
    // Current crumb tpl ?
    elseif ($showCurrentCrumb && ($resource->get('id') == $currentResourceId))
    {
        $tpl = $currentCrumbTpl;
    }
    // resource is a container only, calculated in a similar manner to Wayfinder
    elseif ($resource->get('isfolder')
        && ( $resource->get('template') == 0
            || strpos($resource->get('link_attributes'), 'rel="category"') !== false
            )
    ) {
        $tpl = $categoryCrumbTpl;
    }
    // or default crumb tpl ?
    else {
        $tpl = $linkCrumbTpl;
    }

    // Placeholders
    $placeholders = $resource->toArray();
    if ($resource->get('class_key') == 'modWebLink' && $useWebLinkUrl) {
        if (is_numeric($resource->get('content'))) {
            $link = $modx->makeUrl($resource->get('content'), '', '', $scheme);
        } else {
            $link = $resource->get('content');
        }
    } else {
        $link = $modx->makeUrl($resource->get('id'), '', '', $scheme);
    }
    $placeholders = array_merge($resource->toArray(), array('link' => $link));

    // Output
    $output .= parseTpl($tpl, $placeholders);
}

// We add the max delimiter to the crumbs output, if the max limit was reached
if ($crumbsCount == $maxCrumbs) {
    // If is LTR direction, we push the max delimiter at the beginning of the crumbs
    if ($direction == 'ltr') {
        $output = parseTpl($maxCrumbTpl).$output;
    }
    // Else we push it at the end
    else {
        $output .= parseTpl($maxCrumbTpl);
    }
}

// We build the breadcrumb output
$output = parseTpl($containerTpl, array(
    'crumbs' => $output,
));

return $output;

?>
