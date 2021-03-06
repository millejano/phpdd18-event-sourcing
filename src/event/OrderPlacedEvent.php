<?php declare(strict_types=1);

namespace Eventsourcing;

class OrderPlacedEvent implements Event
{
    /**
     * @var \DateTimeImmutable
     */
    private $occuredAt;

    /**
     * @var EmitterId
     */
    private $emitterId;
    /**
     * @var Order
     */
    private $order;

    public function __construct(\DateTimeImmutable $occuredAt, EmitterId $emitterId, Order $order)
    {
        $this->occuredAt = $occuredAt;
        $this->emitterId = $emitterId;
        $this->order = $order;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function getOccuredAt(): \DateTimeImmutable
    {
        return $this->occuredAt;
    }

    public function getEmitterId(): EmitterId
    {
        return $this->emitterId;
    }

    public function getTopic(): Topic
    {
        return new OrderPlacedTopic();
    }
}
