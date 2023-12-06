<?php

namespace app\model\repository;
    class MemoryProductRepository implements ProductRepositoryInterface
{

    public function findAll(): array
    {
        //TODO

    }

        public function add(\app\model\entity\ProductEntity $product): \app\model\entity\ProductEntity
        {
            // TODO: Implement add() method.
        }

        public function findById(int $id): ?\app\model\entity\ProductEntity
        {
            // TODO: Implement findById() method.
        }

        public function update(int $id, \app\model\entity\ProductEntity $product): \app\model\entity\ProductEntity
        {
            // TODO: Implement update() method.
        }

        public function delete(int $id): bool
        {
            // TODO: Implement delete() method.
        }
    }