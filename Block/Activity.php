<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Activitystream\Block;

use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\View\Element\Template;
use PL\Activitystream\Helper\Data;

class Activity extends Template
{

    /**
     * @var StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var Data
     */
    protected $_helper;

    /**
     * @param Template\Context $context
     * @param StoreManagerInterface $storeManager
     * @param Data $helper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        StoreManagerInterface $storeManager,
        Data $helper,
        array $data
    ) {
        parent::__construct(
            $context,
            $data
        );
        $this->_storeManager = $storeManager;
        $this->_helper = $helper;
    }

    /**
     * @return array|void
     */
    public function getActivities()
    {
        $data = [];

        if (!$this->_helper->isEnabled()) {
            return;
        }
        if ($this->_helper->isMobile()) {
            if (!$this->_helper->allowMobile()) {
                return;
            }
        }

        $rand = rand(1, $this->_helper->getMaxNumber());
        $_img = '<img width="50" height="50" src="'.$this->getViewFileUrl('PL_Activitystream::images/viewer.png').'" alt="" title="" />';
        $output = '<div class="salenotify"><div class="notice-img">'.$_img.'</div><div class="notice-text">'.$rand.' '.$this->_helper->getMessage();
        $output.='</div></div>';
        $data[0] = $output;
        return $data;
    }
}
