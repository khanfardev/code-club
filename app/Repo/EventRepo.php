<?php


namespace App\Repo;


use App\Inter\EventInterface;
use App\Models\Event;
use App\Models\Venue;

class EventRepo implements EventInterface
{
    public function showVenue()
    {
        return Venue::all();
    }

    public function all()
    {
        return Event::paginate(10);
    }

    public function show($id)
    {
        return Event::findOrFail($id);
    }

    public function create(array $data)
    {
        return Event::create($data);
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
}
