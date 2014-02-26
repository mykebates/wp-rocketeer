<?php
class WPConfig extends Rocketeer\Traits\Task
{
  protected $description = 'Generate wp-config.php';

  public function execute()
  {
  	$stage = $this->rocketeer->getStage();
  	$remote_db_host =       $this->rocketeer->getOption('remote.db.host');
  	$remote_db_user =       $this->rocketeer->getOption('remote.db.user');
  	$remote_db_password =   $this->rocketeer->getOption('remote.db.password');
  	$remote_db_name =       $this->rocketeer->getOption('remote.db.name');
  	$remote_login_user =    $this->rocketeer->getOption('config.connections.'.$stage.'.username');
    $remote_login_host =    $this->rocketeer->getOption('config.connections.'.$stage.'.host');
    $remote_domain_name =   $this->rocketeer->getOption('remote.domain_name');

  	$root_directory = $this->rocketeer->getHomeFolder().'/'.$this->rocketeer->getStage().'/current';

    $this->command->info('Generating wp-config.php');

    exec('rsync -avzkO .rocketeer/templates/wp-config.tpl.php '.$remote_login_user.'@'.$remote_login_host.':'.$root_directory.'/wp-config.php'); // send to server
    
    $this->remote->run(array(
        'cd '.$root_directory,
        "sed -i 's/{{DB_NAME}}/".$remote_db_name."/g' wp-config.php",
        "sed -i 's/{{DB_USER}}/".$remote_db_user."/g' wp-config.php",
        "sed -i 's/{{DB_PASSWORD}}/".$remote_db_password."/g' wp-config.php",
        "sed -i 's/{{DB_HOST}}/".$remote_db_host."/g' wp-config.php"
    ));
  }
}
?>