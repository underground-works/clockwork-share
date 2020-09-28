<?php namespace Deployer;

require __DIR__ . '/vendor/autoload.php';

require 'recipe/composer.php';

// Project name
set('application', 'Clockwork Share');

// Project repository
set('repository', 'https://github.com/underground-works/clockwork-share.git');

// Shared files/dirs between deploys
add('shared_files', [
	'.env'
]);

add('shared_dirs', [
	'storage'
]);

set('default_stage', 'production');

set('allow_anonymous_stats', false);

set('user', function () {
	return runLocally('git config --get user.name');
});

// Hosts

host('arizona')
	->stage('production')
	->user('its')
	->set('deploy_path', '/Sites/its/clockwork.underground.works');

// Tasks

desc('Execute artisan config:cache');
task('artisan:config:cache', function () {
	run('{{bin/php}} {{release_path}}/artisan config:cache');
});

desc('Execute artisan route:cache');
task('artisan:route:cache', function () {
	run('{{bin/php}} {{release_path}}/artisan route:cache');
});

desc('Execute artisan storage:link');
task('artisan:storage:link', function () {
	run('{{bin/php}} {{release_path}}/artisan storage:link');
});

desc('Prepare a new release');
task('prepare', [
	'artisan:config:cache',
	'artisan:route:cache',
	'artisan:storage:link'
]);

// Prepare app before symlinking new release.
before('deploy:symlink', 'prepare');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
