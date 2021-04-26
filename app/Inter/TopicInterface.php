<?php


namespace App\Inter;


interface TopicInterface
{
    public function showLevel(string $level_id);
    public function getLevel();
    public function all();
    public function show($id);
    public function create(array $data);
    public function update(array $data, string $id);
    public function delete($id);
}
