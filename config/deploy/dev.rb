server '85.143.221.253', user: 'deployer', roles: %w{app db web}

set :deploy_to, '/var/www/php/bqbs_symfony'
set :branch, 'dev'
set :symfony_env,  "prod"

set :controllers_to_clear, []