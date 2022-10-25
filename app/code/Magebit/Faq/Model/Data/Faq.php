<?php
/**
 * This file is part of the Magebit_Faq package.
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade Magebit_Faq
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2022 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Magebit\Faq\Model\Data;

use DateTime;
use Magebit\Faq\Api\Data\FaqInterface;
use Magento\Framework\Model\AbstractExtensibleModel;
use Magebit\Faq\Model\ResourceModel\Faq as FaqResourceModel;

class Faq extends AbstractExtensibleModel implements FaqInterface
{
    const ID = 'entity_id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const POSITION = 'position';

    protected function _construct()
    {
        $this->_init(FaqResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->getPosition();
    }

    /**
     * @inheritDoc
     */
    public function getQuestion(): string
    {
        return $this->getQuestion();
    }

    /**
     * @inheritDoc
     */
    public function setQuestion(string $question): void
    {
        $this->setData(self::QUESTION);
    }

    /**
     * @inheritDoc
     */
    public function getAnswer(): string
    {
        return $this->getAnswer();
    }

    /**
     * @inheritDoc
     */
    public function setAnswer(string $answer): void
    {
        $this->setData(self::ANSWER);
    }

    /**
     * @inheritDoc
     */
    public function getPosition(): int
    {
        return $this->getPosition();
    }

    /**
     * @inheritDoc
     */
    public function setPosition(int $position): void
    {
        $this->setData(self::POSITION);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->getUpdatedAt();
    }
}
