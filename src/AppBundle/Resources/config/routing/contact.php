<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('contact_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Contact:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('contact_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Contact:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('contact_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Contact:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('contact_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Contact:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('contact_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Contact:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
