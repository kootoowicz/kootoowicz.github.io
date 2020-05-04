<?php
/**
 * Author: Kotowicz 17018747
 */

class CategoryController
{
    private CategoryModel $_categoryModel;
    private string $_categoryName;
    private CategoryMapper $_categoryMapper;

    /**
     * CategoryController constructor.
     * @param CategoryModel $_categoryModel
     * @param string $_categoryName
     * @param CategoryMapper $_categoryMapper
     */
    public function __construct(CategoryModel $_categoryModel, string $_categoryName, CategoryMapper $_categoryMapper)
    {
        $this->_categoryModel = $_categoryModel;
        $this->_categoryName = $_categoryName;
        $this->_categoryMapper = $_categoryMapper;
    }

    public function getAllTopics()
    {

    }

    public function createTopic()
    {
        if(!empty($_POST["createTopic"]))
        {
            Session::put("currentCategoryId", $this->_categoryModel->getId());

            $user = UserModel::getLoggedInUser();

            if(!$user->isLoggedIn())
                Redirect::redirectTo('login.php');
            else
            {
                Redirect::redirectTo('topic.php');
            }
        }
    }
}