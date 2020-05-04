<?php

namespace Tests\Unit\Http\Middleware;

use App\Http\Kernel;
use App\Http\Middleware\AcceptJsonOnly;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Router;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tests\TestCase;

class AcceptJsonOnlyTest extends TestCase
{
    /** @test */
    public function user_with_different_accept_header_are_getting_an_error()
    {
        $middleware = new AcceptJsonOnly();
        $request = new Request();
        $request->headers->set('Accept', 'text/html');
        $expectedException = new HttpException(
            Response::HTTP_BAD_REQUEST,
            'You have to accept application/json.'
        );

        $this->expectExceptionObject($expectedException);

        $middleware->handle($request, function () {
            $this->fail('Next middleware was called when it should not have been.');
        });
    }

    /** @test */
    public function users_with_application_json_accept_header_can_continue()
    {
        $middleware = new AcceptJsonOnly();
        $request = new Request();
        $request->headers->set('Accept', 'application/json');
        $callbackIsCalled = false;

        $response = $middleware->handle($request, function (Request $request) use (&$callbackIsCalled) {
            $callbackIsCalled = true;

            return $request;
        });

        $this->assertTrue($callbackIsCalled);
        $this->assertSame($response, $request);
    }

    /** @test */
    public function middleware_is_presented_in_api_middleware_group()
    {
        $kernel = new Kernel($this->app, new Router(new Dispatcher()));

        $this->assertContains(AcceptJsonOnly::class, $kernel->getMiddlewareGroups()['api']);
    }
}
