<?php
/**
 * BreadCrumb transport chunks
 * Copyright 2011 Benjamin Vauchel <contact@omycode.fr>
 * @author Benjamin Vauchel <contact@omycode.fr>
 * 19/11/11
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
 * BreadCrumb; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package breadcrumb
 */
/**
 * Description: Array of chunk objects for BreadCrumb package
 * @package breadcrumb
 * @subpackage build
 */

$chunks = array();

$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 1,
    'name' => 'BreadCrumbContainerTpl',
    'description' => 'Container template for BreadCrumb',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/breadcrumbcontainertpl.chunk.tpl'),
    'properties' => '',
),'',true,true);

$chunks[2]= $modx->newObject('modChunk');
$chunks[2]->fromArray(array(
    'id' => 2,
    'name' => 'BreadCrumbCurrentCrumbTpl',
    'description' => 'Current crumb template for BreadCrumb',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/breadcrumbcurrentcrumbtpl.chunk.tpl'),
    'properties' => '',
),'',true,true);

$chunks[3]= $modx->newObject('modChunk');
$chunks[3]->fromArray(array(
    'id' => 3,
    'name' => 'BreadCrumbLinkCrumbTpl',
    'description' => 'Default crumb template for BreadCrumb',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/breadcrumblinkcrumbtpl.chunk.tpl'),
    'properties' => '',
),'',true,true);

$chunks[4]= $modx->newObject('modChunk');
$chunks[4]->fromArray(array(
    'id' => 4,
    'name' => 'BreadCrumbMaxCrumbTpl',
    'description' => 'Max delimiter crumb template for BreadCrumb',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/breadcrumbmaxcrumbtpl.chunk.tpl'),
    'properties' => '',
),'',true,true);

return $chunks;