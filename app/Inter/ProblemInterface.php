<?php


namespace App\Inter;


interface ProblemInterface
{
    public function showLadderProblem(string $ladder_id);
    public function all();
    public function show($id);
    public function create(array $data);
    public function update(array $data, string $id);
    public function delete($id);
    public function createLadderProblem(array $data , string $ladder_id);
}
