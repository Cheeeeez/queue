<?php


namespace queue;

include_once "Node.php";

class Queue
{
    public $front;
    public $back;
    public $count;

    public function __construct()
    {
        $this->front = null;
        $this->back = null;
    }

    public function isEmpty()
    {
        if ($this->front == null) {
            return true;
        } else {
            return false;
        }
    }

    public function enqueue($value)
    {
        $node = new Node($value);
        if ($this->isEmpty()) {
            $this->front = $node;
            $this->back = $node;
            $this->count++;
        } elseif ($this->count == 1) {
            $this->back = $node;
            $this->front->next = $this->back;
            $this->count++;
        } else {
            $this->back->next = $node;
            $this->back = $node;
            $this->count++;
        }
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null;
        } else {
            if ($this->count == 1) {
                $removedValue = $this->front->value;
                $this->front = null;
                $this->back = null;
                $this->count--;
                return $removedValue;
            } else {
                $removedValue = $this->front->value;
                $this->front = $this->front->next;
                $this->count--;
                return $removedValue;
            }
        }
    }
}