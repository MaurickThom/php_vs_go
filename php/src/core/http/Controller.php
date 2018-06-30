<?php
namespace core\http;
use movicon\db\mysql\MySqlConnection;
use movicon\http\HttpController;

/**
 * The base class of any controller.
 */
class Controller extends HttpController
{
    protected $db;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->onOpen(
            function () {
                $this->db = new MySqlConnection(DBNAME, DBUSER, DBPASS, DBHOST);
            }
        );
    }
}
