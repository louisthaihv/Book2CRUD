<?php
namespace Lthaihv\Book2CRUD\Services;
use Lthaihv\Book2CRUD\Repositories\IBookRepositoryContract;

class BookService implements IBookServiceContract {
    protected $repository;

    public function __construct(IBookRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($i, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}