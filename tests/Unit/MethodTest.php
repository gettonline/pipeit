<?php

use GettOnline\PipeIt\Pipe;

it('can use the constructor', function () {
    $this->assertEquals(
        'bar',
        (new Pipe(',,,foo,bar,,'))
            ->explode(',', PIPE_IT)
            ->array_filter()
            ->end()
    );
});

it('can use the static', function () {
    $this->assertEquals(
        'foo,bar',
        Pipe::it([' foo', ' bar'])
            ->array_map('trim', PIPE_IT)
            ->implode(',', PIPE_IT)
    );
});

it('can use the callable', function () {
    $this->assertEquals(
        'Foo bar',
        pipe('foo bar')
            ->ucfirst()
    );
});

it('can use the invoke', function () {
    $this->expect(
        pipe('composer.json')('file_get_contents')
            ->value
    )->toBeJson();
});

it('can use the invoke with closure', function () {
    $this->assertEquals(
        [1, 2, 3],
        pipe(range(0, 3))(function ($v) {
            array_shift($v);

            return $v;
        })
            ->value
    );
});

it('can be complex', function () {
    $this->assertEquals(
        '2',
        pipe(['test' => 'OK'])
            ->array_merge(
                [
                    pipe('composer.json')
                        ->file_get_contents()
                        ->json_decode(true)
                        ->value['name'],
                ]
            )
            ->count()
            ->strval()
    );
});

it('throws error on unknown function', function () {
    pipe('error')
        ->unknown()
    ;
})->throws('Call to undefined function unknown()');
