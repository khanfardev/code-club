<?php


namespace App\Inter;


interface LadderInterface
{
    public function showLevel(string $level_id);
    public function allLevel();
    public function all();
    public function show($id);
    public function create(array $data);
    public function update(array $data, string $id);
    public function delete($id);
}
