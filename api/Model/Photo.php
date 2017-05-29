<?php
namespace Knight\Model;

use Knight\Component\Dao;
use Courser\Traits\Facade;

class Photo extends Dao
{

    use Facade;

    public $table = 'articles';

    public $fields = [
        'id' => ['column' => 'id', 'pk' => true, 'type' => 'int'],
        'userId' => ['column' => 'user_id', 'type' => 'int'],
        'cateId' => ['column' => 'cate_id', 'type' => 'int'],
        'title' => ['column' => 'title', 'type' => 'string'],
        'content' => ['column' => 'content', 'type' => 'string'],
        'isShow' => ['column' => 'is_show', 'type' => 'int', 'default' => 1],
        'created' => ['column' => 'created', 'type' => 'int'],
        'updated' => ['column' => 'updated', 'type' => 'timestamp'],
    ];
}