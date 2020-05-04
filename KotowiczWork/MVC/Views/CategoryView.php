<?php
/**
 * Author: Kotowicz 17018747
 */

class CategoryView
{
    private CategoryModel $_categoryModel;
    private CategoryController $_categoryController;

    /**
     * CategoryView constructor.
     * @param CategoryModel $_categoryModel
     * @param CategoryController $_categoryController
     */
    public function __construct(CategoryModel $_categoryModel, CategoryController $_categoryController)
    {
        $this->_categoryModel = $_categoryModel;
        $this->_categoryController = $_categoryController;
    }

    public function displayTopics()
    {
        $topics = $this->_categoryModel->getTopics();

        $topicContent = "";


        for($i = 0; $i < sizeof($topics); $i++)
        {
            $topic = $topics[$i];
            $topicContent .= " <section class='specificSection'>
                <div class='sectionHeader'>
                    <a href='topic.php?topicId={$topic->getId()}'>{$topic->getTopicName()}</a>
                </div>
                <div class='sectionDescription'>
                    By {$topic->getUser()->getUsername()}, {$topic->getDateTopicCreated()->format('d/M/Y')}
                </div>
            </section>";
        }

        return $topicContent;
    }

    public function displayCreateTopicButton()
    {
        return "<form method='post' action=''>
                <input class='createTopicButton' type='submit' name='createTopic' value='Create Topic' />
                </form>";
    }
}