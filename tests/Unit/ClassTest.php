<?php

use GettOnline\PipeIt\Pipe;

it('returns its self', function () {
    expect(
        pipe('test')
            ->strtoupper()
    )
        ->toBeInstanceOf(Pipe::class)
        ->toHaveProperty('value')
    ;
});

it('returns string if requested', function () {
    expect(
        (string) pipe('test')
            ->strtoupper()
    )
        ->toBeString()
        ->toEqual('TEST')
    ;
});

it('returns null on non existing property', function () {
    expect(
        pipe('test')
            ->ucfirst()
            ->test
    )
        ->toBeNull()
    ;
});
