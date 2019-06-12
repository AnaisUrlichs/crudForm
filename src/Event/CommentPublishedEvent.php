<?php

namespace AppBundle\Event;

use App\Entity\Post;
use Symfony\Component\EventDispatcher\Event;

class CommentPublishedEvent extends Event
{
    /**
     * @var Post $_post
     */
    private $_name;
    const Name = "foo.bar";

    public function __construct(Post $post){
        $this->_name = $post;
    }

    public function getName() {
        return $this->_name;
    }

    public function getDescription(){
        $this->_name->getDescription();
    }
}

