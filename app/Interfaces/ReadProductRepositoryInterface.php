<?php

namespace App\Interfaces;

interface ReadProductRepositoryInterface
{
public function select(array $selectedColumns);
public function getAll();
}
