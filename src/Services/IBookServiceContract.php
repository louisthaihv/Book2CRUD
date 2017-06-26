<?php
namespace Lthaihv\Book2CRUD\Services;

interface IBookServiceContract {
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}