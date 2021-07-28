<?php

namespace GettOnline\PipeIt;

class Pipe
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;

        if (!defined('PIPE_IT')) {
            define('PIPE_IT', 'PIPE_IT-' . uniqid('', true));
        }
    }

    public function __get(string $key)
    {
        return $key === 'value'
            ? $this->value
            : null;
    }

    public function __call(string $callable, array $arguments): self
    {
        $this->value = $callable(
            ...$this->arguments($arguments)
        );

        return $this;
    }

    public function __invoke($callable, array ...$arguments): self
    {
        $this->value = $callable(
            ...$this->arguments($arguments)
        );

        return $this;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function it($value)
    {
        return new self($value);
    }

    private function arguments(array $arguments)
    {
        if (!in_array(PIPE_IT, $arguments, true)) {
            return array_merge([$this->value], $arguments);
        }

        return array_map(function ($argument) {
            return $argument === PIPE_IT ? $this->value : $argument;
        }, $arguments);
    }
}
