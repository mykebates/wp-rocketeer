<?php
class DBPush extends Rocketeer\Traits\Task
{
    protected $description = 'Pull database from remote to local';

    public function execute()
    {
        $stage = $this->rocketeer->getStage();

        $random = substr( "abcdefghijklmnopqrstuvwxyz", mt_rand(0, 25) , 1) .substr( md5( time() ), 1);
        $root_directory = $this->rocketeer->getHomeFolder().'/'.$this->rocketeer->getStage();
        $backup_directory = $root_directory.'/'.'backup/database';

        // Set DB & Remote data
        $local_db_host =        $this->rocketeer->getOption('config.local.db.host');
        $local_db_user =        $this->rocketeer->getOption('config.local.db.user');
        $local_db_password =    $this->rocketeer->getOption('config.local.db.password');
        $local_db_name =        $this->rocketeer->getOption('config.local.db.name');
        $local_domain_name =    $this->rocketeer->getOption('config.local.domain_name');
        $local_mysql_path =     $this->rocketeer->getOption('config.local.mysql_path');

        $remote_db_host =       $this->rocketeer->getOption('remote.db.host');
        $remote_db_user =       $this->rocketeer->getOption('remote.db.user');
        $remote_db_password =   $this->rocketeer->getOption('remote.db.password');
        $remote_db_name =       $this->rocketeer->getOption('remote.db.name');
        $remote_login_user =    $this->rocketeer->getOption('config.connections.'.$stage.'.username');
        $remote_login_host =    $this->rocketeer->getOption('config.connections.'.$stage.'.host');
        $remote_domain_name =   $this->rocketeer->getOption('remote.domain_name');

        $this->command->info('Dumping local data');

        // Make sure there is backup folder on the remote server
        if(!$this->fileExists($backup_directory))
        {
            $this->command->info('Initializing backup folder');
            $this->remote->run('mkdir -p '.$backup_directory);
        }

        // Dump Local
        exec('mkdir -p tmp');
        exec('rm -rf tmp/*.sql');
        exec($local_mysql_path.'mysqldump -u'.$local_db_user.' -p'.$local_db_password.' -h'.$local_db_host.' '.$local_db_name.' > tmp/'.$random.'.sql'); // dump local db
        exec("sed -i '' 's/".$local_domain_name."/".$remote_domain_name."/g' tmp/".$random.".sql");  // find&replace domain name
        exec('rsync -avzO tmp/'.$random.'.sql '.$remote_login_user.'@'.$remote_login_host.':'.$backup_directory.'/import.sql'); // send to server

        // Import
        $this->command->info('Importing on remote database');

        $this->remote->run(array(
            'mysql -p'.$remote_db_password.' -u '.$remote_db_user.' '.$remote_db_name.' < '.$backup_directory.'/import.sql',
            'rm '.$backup_directory.'/*.sql'
        ));
    }
}
?>