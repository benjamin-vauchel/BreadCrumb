<?php

/**
 * Default properties for the BreadCrumb snippet
 * @author Benjamin Vauchel <contact@omycode.fr>
 * 27/8/12
 *
 * @package breadcrumb
 * @subpackage build
 */

$properties = array(
    array(
        'name' => 'from',
        'desc' => 'breadcrumb_snippet_from_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '0',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'to',
        'desc' => 'breadcrumb_snippet_to_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'maxCrumbs',
        'desc' => 'breadcrumb_snippet_maxcrumbs_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '100',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'showHidden',
        'desc' => 'breadcrumb_snippet_showhidden_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '1',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'showContainer',
        'desc' => 'breadcrumb_snippet_showcontainer_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '1',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'showUnPub',
        'desc' => 'breadcrumb_snippet_showunpub_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '1',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'showCurrentCrumb',
        'desc' => 'breadcrumb_snippet_showcurrentcrumb_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '1',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'showBreadCrumbAtHome',
        'desc' => 'breadcrumb_snippet_showbreadcrumbatHome_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '1',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'showHomeCrumb',
        'desc' => 'breadcrumb_snippet_showhomecrumb_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '0',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'useWebLinkUrl',
        'desc' => 'breadcrumb_snippet_useweblinkurl_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '1',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'direction',
        'desc' => 'breadcrumb_snippet_direction_desc',
        'type' => 'list',
        'options' => array(
            array(
                'name' => 'Left To Right (ltr)',
                'value' => 'ltr',
                'menu' => '',
            ),
            array(
                'name' => ' Right To Left (rtl)',
                'value' => 'rtl',
                'menu' => '',
            ),
        ),
        'value' => 'ltr',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'scheme',
        'desc' => 'breadcrumb_snippet_scheme_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'containerTpl',
        'desc' => 'breadcrumb_snippet_containertpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '@CODE:<ul id="breadcrumb" itemprop="breadcrumb"><li><a href="[[++site_url]]">[[++site_name]]</a></li>[[+crumbs]]</ul>',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'currentCrumbTpl',
        'desc' => 'breadcrumb_snippet_currentcrumbtpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '@CODE:<li>[[+pagetitle]]</li>',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'linkCrumbTpl',
        'desc' => 'breadcrumb_snippet_linkcrumbtpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '@CODE:<li><a href="[[+link]]">[[+pagetitle]]</a></li>',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'categoryCrumbTpl',
        'desc' => 'breadcrumb_snippet_categorycrumbtpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '@CODE:<li><a href="[[+link]]">[[+pagetitle]]</a></li>',
        'lexicon' => 'breadcrumb:properties',
    ),
    array(
        'name' => 'maxCrumbTpl',
        'desc' => 'breadcrumb_snippet_maxcrumbtpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '@CODE:<li>...</li>',
        'lexicon' => 'breadcrumb:properties',
    ),
 );

return $properties;
