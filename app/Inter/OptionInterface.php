<?php


namespace App\Inter;


interface OptionInterface
{
    public function all();
    public function show($id);
    public function create(array $data);
    public function update(array $data, string $id);
    public function delete($id);
    public function massDestroy($id);
    public function allQuestion();
}
