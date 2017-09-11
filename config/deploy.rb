lock "3.9"

set :department, 'cdrs'
set :application, 'journals'
set :remote_user, "#{fetch(:department)}serv"
set :repo_url, "git@github.com:cul/#{fetch(:department)}-#{fetch(:application)}.git"
set :deploy_to, "/opt/www/#{fetch(:department)}/#{fetch(:application)}_#{fetch(:stage)}"
set :ssh_options, { :forward_agent => true }

set :keep_releases, 2

######################
# WordPress settings #
######################

# Set up important directories
set :wp_docroot, "#{fetch(:deploy_to)}/wp_docroot"
set :wp_data_path, "#{fetch(:deploy_to)}/wp_data"
set :multisite, true
set :title, 'CDRS Journals Network'

# List custom plugins and themes to pull in from repo
set :wp_custom_plugins, {
  'dragNdrop' => 'wp-content/plugins/dragNdrop',
  'journal_settings_plugin' => 'wp-content/plugins/journal_settings_plugin'
}

set :wp_custom_themes, {
  'cdrs_journals' => 'wp-content/themes/cdrs_journals',
  'cdrs_tmr' => 'wp-content/themes/cdrs_tmr',
  'cdrs-ST' => 'wp-content/themes/cdrs-ST',
  'cujo-dev' => 'wp-content/themes/cujo-dev',
  'journals-home' => 'wp-content/themes/journals-home',
  'twentysixteen' => 'wp-content/themes/twentysixteen',
  'twentythirteen' => 'wp-content/themes/twentythirteen',
  'twentytwelve' => 'wp-content/themes/twentytwelve'
}
