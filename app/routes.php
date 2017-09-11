<?php
// Routes

$app->get('/', App\Action\HomeAction::class)
    ->setName('homepage');

$app->get('/section', App\Action\SectionAction::class)
    ->setName('section');

$app->get('/area', App\Action\AreaAction::class)
    ->setName('area');

$app->get('/region', App\Action\RegionAction::class)
    ->setName('region');

$app->get('/sar', App\Action\SARAction::class)
    ->setName('sar');

