<?php

namespace Flagrow\Linguist\Api\Controllers;

use Flagrow\Linguist\Api\Serializers\StringSerializer;
use Flagrow\Linguist\Repositories\StringRepository;
use Flarum\Api\Controller\AbstractListController;
use Flarum\User\AssertPermissionTrait;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class StringIndexController extends AbstractListController
{
    use AssertPermissionTrait;

    public $serializer = StringSerializer::class;

    /**
     * @var StringRepository
     */
    protected $strings;

    public function __construct(StringRepository $strings)
    {
        $this->strings = $strings;
    }

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $this->assertAdmin($request->getAttribute('actor'));

        return $this->strings->all();
    }
}
