<?php


use JetBrains\PhpStorm\Pure;

class SquareDance
{
    protected SplQueue $queueMale;
    protected SplQueue $queueFemale;


    #[Pure] public function __construct()
    {
        $this->queueMale = new SplQueue();
        $this->queueFemale = new SplQueue();
    }

    public function addDance(Dance $dance): void
    {
        if ($dance->getGender() === GenderInterface::MALE) {
            $this->queueMale->enqueue($dance);
        } else {
            $this->queueFemale->enqueue($dance);
        }
    }

    public function pairDance(): string
    {
        while (!$this->queueFemale->isEmpty() || !$this->queueMale->isEmpty()) {
            if ($this->queueMale->isEmpty()) {
                return count($this->queueFemale) . ' nữ đang chờ' . '<br>';
            }

            if ($this->queueFemale->isEmpty()) {
                return count($this->queueMale) . ' nam đang chờ' . '<br>';
            }

            echo 'cặp: ' . $this->queueMale->dequeue()->getName() . '-' . $this->queueFemale->dequeue()->getName() . '<br>';
        }
    }
}