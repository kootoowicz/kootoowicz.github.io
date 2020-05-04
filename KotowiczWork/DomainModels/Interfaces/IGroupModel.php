<?php
/**
 * Author: Kotowicz 17018747
 */

interface IGroupModel
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     */
    public function setId(int $id): void;

    /**
     * @return string
     */
    public function getGroupName(): string;

    /**
     * @param string $groupName
     */
    public function setGroupName(string $groupName): void;
}