<?php
namespace Lthaihv\Book2CRUD\Repositories;
use Lthaihv\Book2CRUD\Models\Book;
class BookRepository implements IBookRepositoryContract {
    protected $model;

    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
        return $this->model->paginate(10);
    }
    
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }
    
    public function update($id, $data)
    {
        $model = $this->model->findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function destroy($id)
    {
        $model = $this->findOrFail($id);
        return $model->destroy($id);
    }
}