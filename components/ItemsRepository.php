<?php
namespace app\components;

use yii\db\Connection;
use app\models\Item;

class ItemsRepository
{

    /**
     *
     * @var Item
     */
    private $model;

    /**
     *
     * @var Connection
     */
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
        $this->model = new Item();
    }

    public function getItemCategories($id)
    {
        $item = $this->model->findOne($id);

        if (! $item) {
            throw new \Exception("Missing Item");
        }

        return $item->categories;
    }

    public function getAll()
    {
        $items = $this->db->createCommand('SELECT i.id, i.name,i.description, c.name AS category FROM items AS i
                                    LEFT JOIN item_categories AS ic ON i.id=ic.item_id
                                    LEFT JOIN categories AS c ON c.id = ic.category_id')->queryAll();

        if (! $items) {
            throw new \Exception("Missing Item");
        }

        $result = [];
        foreach ($items as $key => $item) {
            if (! isset($result[$item["id"]])) {
                $result[$item["id"]] = $item;
            }

            $result[$item["id"]]["categories"][] = $item["category"];
        }

        return $result;
    }
}

