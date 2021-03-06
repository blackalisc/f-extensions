<?php
/**
 *  This file is part of reflar/gamification.
 *
 *  Copyright (c) ReFlar.
 *
 *  http://reflar.io
 *
 *  For the full copyright and license information, please view the license.md
 *  file that was distributed with this source code.
 */

namespace Reflar\Gamification\Api\Controllers;

use Flarum\Discussion\Discussion;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\User\AssertPermissionTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Reflar\Gamification\Gamification;
use Reflar\Gamification\Likes;
use Zend\Diactoros\Response\JsonResponse;

class ConvertLikesController implements RequestHandlerInterface
{
    use AssertPermissionTrait;

    /**
     * @var SettingsRepositoryInterface
     */
    protected $settings;

    /**
     * @var Gamification
     */
    protected $gamification;

    /**
     * @param SettingsRepositoryInterface $settings
     * @param Gamification                $gamification
     */
    public function __construct(SettingsRepositoryInterface $settings, Gamification $gamification)
    {
        $this->settings = $settings;
        $this->gamification = $gamification;
    }

    /**
     * @param ServerRequestInterface $request
     *
     * @return int
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $actor = $request->getAttribute('actor');

        if (null !== $actor && $actor->isAdmin() && 'POST' === $request->getMethod() && false == $this->settings->get('reflar.gamification.convertedLikes')) {
            $likes = Likes::all();

            $this->settings->set('reflar.gamification.convertedLikes', 'converting');

            $counter = 0;

            foreach ($likes as $like) {
                $this->gamification->convertLike($like->post_id, $like->user_id);
                $counter++;
            }

            $discussions = Discussion::all();

            foreach ($discussions as $discussion) {
                $this->gamification->calculateHotness($discussion);
            }

            $this->settings->set('reflar.gamification.convertedLikes', $counter);

            return new JsonResponse($counter, 200);
        }
    }
}
