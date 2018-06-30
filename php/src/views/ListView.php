<?php
namespace views;
use core\http\View;
use controllers\ListController;

class ListView extends View
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(new ListController());
    }

    /**
     * Makes a document.
     *
     * This abstract method must be implemented in each view. Note also the
     * 'json_encode' function. It converts any string to a JSON format.
     *
     * @return string
     */
    public function getDocument()
    {
        return json_encode(
            array_map(
                function ($item) {
                    return $item["title"];
                },
                $this->controller->items
            )
        );
    }
}
