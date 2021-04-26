<?php


namespace App\Repo;


use App\Inter\ProblemInterface;
use App\Models\Problem;

class ProblemRepo implements ProblemInterface
{

    public function all()
    {
        return Problem::paginate(10);
    }

    public function show($id)
    {
        return Problem::findOrFail($id);
    }

    public function create(array $data)
    {

    }
    public function createLadderProblem(array $data , string $ladder_id){
        $checkProblemExists= Problem::where(['ladder_id'=>$ladder_id,'name'=>$data[0]['name']])->count();
        if($checkProblemExists>0)
        {
            return false;
        }
        return Problem::create(['name'=>$data[0]['name'],
            'url'=>$data[0]['href'],
            'index'=>$data[0]['index'],
            'contestId'=>$data[0]['contestId'],
            'ladder_id'=>$ladder_id]);
    }
    public function update(array $data, string $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        $this->show($id)->delete();
    }

    public function showLadderProblem(string $ladder_id)
    {

        return Problem::where(['ladder_id'=>$ladder_id])->paginate(10);

    }
}
