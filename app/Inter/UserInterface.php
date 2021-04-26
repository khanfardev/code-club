<?php


namespace App\Inter;


interface UserInterface
{
    public function all();
    public function show($id);
    public function create(array $data);
    public function update(array $data, string $id);
    public function updateHandel(array $data);
    public function delete($id);
}
