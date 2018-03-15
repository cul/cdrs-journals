# encoding: UTF-8
lock "3.9.1"

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
set :wp_docroot, "#{fetch(:deploy_to)}/html"
set :wp_content_path, "#{fetch(:deploy_to)}/wp-content"
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
  'twentytwelve' => 'wp-content/themes/twentytwelve'
}

set :wp_content_rsync_exclude_filters, [
  "uploads/sites/16/2016/05/PHIL-WATTS-READER-OF-RANCI*RE_2014.pdf",
  "uploads/sites/16/2016/05/Bruno-Chaouat.-L*Ombre_104_3-4.pdf",
  "uploads/sites/16/2016/06/d*Abondance_BR_103_3-4.pdf",
  "uploads/sites/16/2016/06/Lef*vre_101_1-2.pdf",
  "uploads/sites/16/2016/06/O*Beirne_101_3.pdf",
  "uploads/sites/16/2016/07/Jean-Louis-caban*s_98_4.pdf",
  "uploads/sites/3/2014/09",
  "uploads/sites/21/2016/01/CSWR-Spring-2014-Editorial*Tables.pdf",
  "uploads/sites/21/2016/01/CSWR-Spring-2014-Editorial*Figures.pdf",
  "uploads/sites/21/2014/05/CSWR-Spring-2014-Editorial*Figures.pdf",
  "uploads/sites/21/2014/05/CSWR-Spring-2014-Editorial*Tables.pdf"
]
