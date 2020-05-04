<?php
/**
 * Author: Kotowicz 17018747
 */

class CategoryModel
{
    private int $_id;
    private string $_categoryName;
    private string $_description;
    private array $_topics;
    private TopicMapper $_topicMapper;

    public function __construct()
    {
        $this->_topicMapper = new TopicMapper(new UserMapper());
    }


    public function create(int $id, string $categoryName, string $description)
    {
        $this->_id = $id;
        $this->_categoryName = $categoryName;
        $this->_description = $description;

        try
        {
            $this->_topics = $this->_topicMapper->loadTopicsByCategory($this->_id);
        }
        catch (Exception $e)
        {
            $this->_topics = array();
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->_categoryName;
    }

    /**
     * @param string $name
     */
    public function setCategoryName(string $name): void
    {
        $this->_categoryName = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->_description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->_description = $description;
    }

    /**
     * @return array
     */
    public function getTopics(): array
    {
        return $this->_topics;
    }
}