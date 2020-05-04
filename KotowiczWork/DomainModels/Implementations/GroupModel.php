<?php
/**
 * Author: Kotowicz 17018747
 */

class GroupModel implements IGroupModel
{
    private int $_id;
    private string $_groupName;

    /**
     * GroupModel constructor.
     * @param int $_id
     */
    public function __construct(int $_id)
    {
        $this->_id = $_id;
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
    public function getGroupName(): string
    {
        return $this->_groupName;
    }

    /**
     * @param string $groupName
     */
    public function setGroupName(string $groupName): void
    {
        $this->_groupName = $groupName;
    }


}