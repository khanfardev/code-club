<?php


namespace App\Repo;


use App\Inter\QuestionInterface;
use App\Models\Category;
use App\Models\Question;

class QuestionRepo implements QuestionInterface
{

    public function all()
    {
        return Question::paginate(10);
    }

    public function show($id)
    {
        return Question::findOrFail($id);
    }

    public function create(array $data)
    {
        return Question::create($data);
    }

    public function update(array $data, string $id)
    {
        return $this->show($id)->update($data);
    }

    public function delete($id)
    {
        return $this->show($id)->delete();

    }

    public function massDestroy($id)
    {
        // TODO: Implement massDestroy() method.
    }

    public function allCategory()
    {
        return Category::all();
    }
}
