<?php

declare(strict_types=1);

namespace Akeneo\CouplingDetector\Domain;

/**
 * Rule.
 *
 * @author  Julien Janvier <j.janvier@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 */
class Rule implements RuleInterface
{
    /** @var string */
    private $subject;

    /** @var array */
    private $requirements = array();

    /** @var string */
    private $type;

    /** @var string|null */
    private $description;

    public function __construct(string $subject, array $requirements, string $type, ?string $description = null)
    {
        $this->requirements = $requirements;
        $this->subject = $subject;
        $this->type = $type;
        $this->description = $description;

        if (RuleInterface::TYPE_ONLY === $this->type) {
            $this->requirements[] = $this->subject;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequirements(): array
    {
        return $this->requirements;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}
