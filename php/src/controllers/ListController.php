<?php
/**
 * The only purpose of this file is to illustrate a 'controller'. A 'controller'
 * intercepts and processes HTTTP requests.
 *
 * Please delete this file in production.
 */
namespace controllers;
use core\http\Controller;
use models\ItemModel;

class ListController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->onOpen([$this, "open"]);
    }

    /**
     * Open request handler.
     *
     * This handler is called in first place, before any other handler. It's a
     * good place to initializa resources.
     *
     * @return void
     */
    public function open()
    {
        $this->items = ItemModel::getList($this->db);
    }
}
