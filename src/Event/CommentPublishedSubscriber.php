<?php

namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class CommentPublishedSubscriber implements EventSubscriberInterface {

    public static function getSubscribedEvents(){
        return [
            CommentPublishedEvent::Name => [
                ['onCommentPublished' => 1000],
                ['onCommentPublished' => 1000],
                ]
        ];
    }

    public function onCommentPublished() {

    }
}