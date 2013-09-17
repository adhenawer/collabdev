<?php
interface Actions
{
    /**
    * Create repository
    */
    public function create($repo);

    /**
    * Rename repository
    */
    public function rename($oldName, $newName);

    /**
    * Delete repository
    */
    public function delete($repo);
}