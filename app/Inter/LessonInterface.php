<?php


namespace App\Inter;


interface LessonInterface
{
    public function showLevel(string $level_id);
    public function showTopic(string $topic_id);
    public function allLevel();
    public function allTopic();
    public function all();
    public function show($id);
    public function create(array $data);
    public function update(array $data, string $id);
    public function delete($id);
}
