<?php
class UploadsPush extends Rocketeer\Traits\Task
{
    protected $description = 'Push uploads to remote server';

    public function execute()
    {
        $stage = $this->rocketeer->getStage();

        $root_directory = $this->rocketeer->getHomeFolder().'/'.$this->rocketeer->getStage().'/current';
        $content_dir = $this->rocketeer->getOption('remote.wp_content_director');

        $remote_login_user =    $this->rocketeer->getOption('config.connections.'.$stage.'.username');
        $remote_login_host =    $this->rocketeer->getOption('config.connections.'.$stage.'.host');

        // Run locally
        // might still need to do some checking here to see if directoris exist before running
        $this->command->info('Pushing uploads');

        exec('rsync --update -avzhLK --progress '.$content_dir.'/uploads '.$remote_login_user.'@'.$remote_login_host.':'.$root_directory.'/'.$content_dir.'/'); // send to server

        $this->command->info('Updating permissions');
        
        // Hope to find a way around not using sudo here, but when syncing the files up it is important to not get any of the file owndership residue
        $this->remote->run(array(
            'cd '.$root_directory.'/'.$content_dir,
            'sudo chown -R '.$remote_login_user.':www-data uploads',
            'sudo chmod g+w uploads -R'
        ));

        $this->command->info('Complete');
    }
}
?>