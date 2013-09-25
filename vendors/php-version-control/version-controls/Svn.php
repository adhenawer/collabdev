<?php
class Svn implements Actions
{
    /**
    * Repository path.
    */
    public $path = null;

    /**
    * Path svn-auth-users.
    */
    public $pathAuthUsers = null;

    public function create($repo)
    {
        return $this->runCmd('cd '. $this->path .' ; svnadmin create '.$repo);
    }

    public function rename($oldName, $newName)
    {
        return $this->runCmd('cd ' . $this->path .' ; mv ' . $oldName . ' ' . $newName);
    }

    public function delete($repo)
    {
        shell_exec('chmod 777 -R ' . $this->path . '/' . $repo);
        return $this->runCmd('cd ' . $this->path .' ; rm -Rf ' . $repo);
    }

    public function addUser($user, $pass)
    {
        return $this->runCmd('htpasswd -b ' . $this->pathAuthUsers . '/svn-auth-users ' . $user .' '. $pass . ' 2>&1');
    }

    public function deleteUser($user)
    {
        return $this->runCmd('htpasswd -D ' . $this->pathAuthUsers . '/svn-auth-users ' . $user .' 2>&1');
    }

    private function runCmd($command){
        if ($this->path == NULL || $this->pathAuthUsers == NULL) {
            throw new NotFoundException('Path is not defined!');
        }
        return shell_exec($command);
    }
}