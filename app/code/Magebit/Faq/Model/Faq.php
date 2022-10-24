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

namespace Magebit\Faq\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Model\AbstractModel;

class Faq extends AbstractModel implements IdentityInterface
{
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'magebit_faq_faq';

    /**
     * @var string
     */
    protected $_cacheTag = 'magebit_faq_faq';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'magebit_faq_faq';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct(): void
    {
        parent::_construct();
        $this->_init('Magebit\Faq\Model\ResourceModel\Faq');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Save from collection data
     *
     * @param array $data
     * @return $this|bool
     *
     * @throws AlreadyExistsException
     */
    public function saveCollection(array $data): bool|static
    {
        if (isset($data[$this->getId()])) {
            $this->addData($data[$this->getId()]);
            $this->getResource()->save($this);
        }
        return $this;
    }

//    /**
//     * @param $question
//     * @return $this
//     */
//    public function setQuestion($question)
//    {
//        return $this->setData('question', $question);
//    }
//
//    /**
//     * @param $answer
//     * @return $this
//     */
//    public function setAnswer($answer)
//    {
//        return $this->setData('answer', $answer);
//    }
//
//    /**
//     * @param $status
//     * @return $this
//     */
//    public function setStatus($status)
//    {
//        return $this->setData('status', $status);
//    }
//
//    /**
//     * @param $position
//     * @return $this
//     */
//    public function setPosition($position)
//    {
//        return $this->setData('position', $position);
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getId()
//    {
//        return $this->getData('id');
//    }
//
//    /**
//     * @return integer
//     */
//    public function getQuestion(): int
//    {
//        return $this->getData('question');
//    }
//
//    /**
//     * @return string
//     */
//    public function getAnswer(): string
//    {
//        return $this->getData('answer');
//    }
//
//    /**
//     * @return string
//     */
//    public function getStatus(): string
//    {
//        return $this->getData('status');
//    }
//
//    /**
//     * @return string
//     */
//    public function getPosition(): string
//    {
//        return $this->getData('position');
//    }
//
//    /**
//     * @return \DateTime
//     */
//    public function getUpdatedAt()
//    {
//        return $this->getData('updated_at');
//    }

}
