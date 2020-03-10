<?php

// HOME
Breadcrumbs::for('home', function ($trail) {
    $trail->push('HOME', url('home'));
});

// HOME > ABOUT
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('ABOUT', url('about'));
});

// HOME > EVENTS
