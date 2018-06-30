<?php
namespace models;
use movicon\db\DbActiveRecord;
use movicon\db\DbConnection;

class ItemModel extends DbActiveRecord
{
    /**
     * Constructor.
     *
     * @param DbConnection $db Database connection
     * @param string       $id Record ID (not required)
     */
    public function __construct($db, $id = null)
    {
        parent::__construct($db, "item", $id);
    }

    /**
     * Gets the list of items.
     *
     * @param DbConnection $db Database connection
     *
     * @return array
     */
    public static function getList($db)
    {
        $sql = "
        select
            id,
            title
        from item
        order by id";

        return $db->queryAll($sql);
    }
}
