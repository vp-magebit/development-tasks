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

namespace Magebit\Faq\Api\Data;

use DateTime;
use Magebit\Faq\Api\Magebit;
use Magento\Framework\Api\ExtensibleDataInterface;

interface FaqInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getQuestion(): string;

    /**
     * @param string $question
     * @return void
     */
    public function setQuestion(string $question): void;

    /**
     * @return string
     */
    public function getAnswer(): string;

    /**
     * @param string $answer
     * @return void
     */
    public function setAnswer(string $answer): void;

    /**
     * @return int
     */
    public function getPosition(): int;

    /**
     * @param int $position
     * @return void
     */
    public function setPosition(int $position): void;

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime;
}

