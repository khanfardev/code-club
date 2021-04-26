<?php


namespace App\Repo;


use App\Inter\VenueInterface;
use App\Models\Venue;

class VenueRepo implements VenueInterface
{

    public function all()
    {
        return Venue::paginate(10);
    }

    public function show($id)
    {
        return Venue::findOrFail($id);
    }

    public function create(array $data)
    {
        return Venue::create($data);
    }

    public function update(array $data, string $id)
    {
        return $this->show($id)->update($data);
    }

    public function delete($id)
    {
        $this->show($id)->delete($id);
    }

    public function massDestroy($id)
    {
        // TODO: Implement massDestroy() method.
    }
}
