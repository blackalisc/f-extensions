<?php

namespace Flagrow\Masquerade\Forum\Content;

use Flarum\Frontend\Content\ContentInterface;
use Flarum\Frontend\Document;
use Flarum\User\AssertPermissionTrait;
use Flarum\User\Exception\PermissionDeniedException;
use Psr\Http\Message\ServerRequestInterface as Request;

class ConfigureProfile
{
    use AssertPermissionTrait;

    public function __invoke(Document $document, Request $request)
    {
        if (! $request->getAttribute('session')->get('user_id')) {
            throw new PermissionDeniedException;
        }

        $this->assertCan($request->getAttribute('actor'), 'flagrow.masquerade.have-profile');
    }
}
