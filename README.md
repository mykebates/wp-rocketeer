# Important!

This is a raw-ass file I used for my private use at WCSTL and still needs some TLC.  Opening up for anyone who might be eager enough to uset his as a starting point.

*Eventually* I will circle back and edit the tight coupling specific to what I was working with :)

## Things you will need to edit
- scm.php
- remote.php(wp_content_director, domain_name, db, permissions specific to your setup)
- config.php(connections, local)

### Notes
- This setup expects WordPress to be installed the /wp directory and all wp-content to be in the /content directory.  I used YeoPress to bootsrap my install and set WordPress as a submodule "wp"
- Be sure to edit the mysql_path in the local config array to match your local setup
- run commands as root
- point the config to your local ssh key
- remember to generate an ssh key on your server and add to your repositories deploy keys so it has access to pull down
