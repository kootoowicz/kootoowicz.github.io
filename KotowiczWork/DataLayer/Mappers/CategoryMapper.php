<?php
/**
 * Author: Kotowicz 17018747
 */
define("CATEGORIES_TABLE_NAME", "categories");

class CategoryMapper
{
    private Database $_db;

    /**
     * CategoryMapper constructor.
     */
    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function loadCategoryByName(string $categoryName) : CategoryModel
    {
        $data = $this->_db->get(CATEGORIES_TABLE_NAME, array('Name', '=', $categoryName));

        if($data->count())
        {
            $category = $data->first();
            $categoryModel = new CategoryModel();
            $categoryModel->create(
                $category->Id,
                $category->Name,
                $category->Description
            );

            return $categoryModel;
        }

        throw new ErrorException("Couldn't load category");
    }

    public function getCategoryIdByName(string $categoryName) : int
    {
        $data = $this->_db->get(CATEGORIES_TABLE_NAME, array('Name', '=', $categoryName));

        if($data->count())
        {
            $category = $data->first();
            return $category->Id;
        }

        throw new ErrorException("Couldn't find category");
    }
}