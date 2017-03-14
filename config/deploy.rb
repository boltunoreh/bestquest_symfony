# config valid only for current version of Capistrano
lock "3.7.2"

set :application, 'bestquest'
set :repo_url, 'git@github.com:boltunoreh/bestquest_symfony.git'
set :symfony_directory_structure, 2
set :composer_install_flags, '--no-interaction --quiet --optimize-autoloader'

set :linked_files, fetch(:linked_files, []).push('app/config/parameters.yml', 'web/robots.txt')

set :linked_dirs, fetch(:linked_dirs, []).push('web/uploads/media')

namespace :deploy do

  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

end

# Apply migrations
after 'deploy:updated', 'skeleton:migrate'

# Fix Sonata Media contexts
#after 'deploy:updated', 'skeleton:fix_media'

# Install assets
after 'deploy:updated', 'symfony:assets:install'

# Dump exposed js routes
#after 'deploy:updated', 'skeleton:dump_js_routes'
