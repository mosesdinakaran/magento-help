<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Moses\Blog\Api\Data;

interface BlogInterface
{

    const BLOG_ID = 'blog_id';
    const TITLE = 'title';
    const CONTENT = 'content';

    /**
     * Get blog_id
     * @return string|null
     */
    public function getBlogId();

    /**
     * Set blog_id
     * @param string $blogId
     * @return \Moses\Blog\Blog\Api\Data\BlogInterface
     */
    public function setBlogId($blogId);

    /**
     * Get content
     * @return string|null
     */
    public function getContent();

    /**
     * Set content
     * @param string $content
     * @return \Moses\Blog\Blog\Api\Data\BlogInterface
     */
    public function setContent($content);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \Moses\Blog\Blog\Api\Data\BlogInterface
     */
    public function setTitle($title);
}

