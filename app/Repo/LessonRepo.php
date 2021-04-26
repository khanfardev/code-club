<?php


namespace App\Repo;


use App\Inter\LessonInterface;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LessonRepo implements LessonInterface
{
    public function showLevel(string $level_id)
    {
        return Level::findOrFail($level_id);
    }
    public function showTopic(string $topic_id)
    {
        return Topic::findOrFail($topic_id);
    }
    public function allLevel()
    {
        return Level::all();
    }
    public function allTopic()
    {
        return Topic::all();
    }
    public function all()
    {
        return Lesson::paginate(10);
    }

    public function show($id)
    {
    return Lesson::findOrfail($id);
    }

    public function create(array $data)
    {
        $this->showLevel($data['level_id']);
        $this->showTopic($data['topic_id']);

        $image = $data['image'];
        $new_image = time().$image->getClientOriginalName();
        $image->move('public/uploads/lesson/',$new_image);
        return Lesson::create([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'body'=>$data['body'],
            'image'=>'public/uploads/lesson/'.$new_image,
            'level_id'=>$data['level_id'],
            'topic_id'=>$data['topic_id'],
            'user_id'=>Auth::id(),
            'slug'=>Str::slug($data['name'])
        ]);
    }

    public function update(array $data, string $id)
    {
        $this->showLevel($data['level_id']);
        $this->showTopic($data['topic_id']);

        if(!empty($data['image'])){
            $image = $data['image'];
            $new_image = time().$image->getClientOriginalName();
            $image->move('public/uploads/lesson/', $new_image);
            $lessons = [
                'name'=>$data['name'],
                'description'=>$data['description'],
                'body'=>$data['body'],
                'image'=>'public/uploads/lesson/'.$new_image,
                'level_id'=>$data['level_id'],
                'topic_id'=>$data['topic_id'],
                'user_id'=>Auth::id(),
                'slug'=>Str::slug($data['name'])
            ];
        }else{
            $lessons = [
                'name'=>$data['name'],
                'description'=>$data['description'],
                'body'=>$data['body'],
                'level_id'=>$data['level_id'],
                'user_id'=>Auth::id(),
                'topic_id'=>$data['topic_id'],

                'slug'=>Str::slug($data['name'])];
        }
        return $this->show($id)->update($lessons);
    }

    public function delete($id)
    {
     return $this->show($id)->delete();
    }
}
