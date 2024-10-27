<?php namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'Clockwork Share');

// Project repository
set('repository', 'https://github.com/underground-works/clockwork-share.git');

set('writable_dirs', []);

set('default_stage', 'production');

set('allow_anonymous_stats', false);

set('user', function () {
	return runLocally('git config --get user.name');
});

// Hosts

host('arizona')
	->set('labels', [ 'stage' => 'production' ])
	->set('user', 'its')
	->set('deploy_path', '/Sites/its/clockwork.underground.works');
