<?php

/**
 * Class KL_FreshCache_Model_Cron
 */
class KL_FreshCache_Model_Cron {

    /**
     * Refresh invalidated caches
     *
     * @return void
     */
    public function refreshCache()
    {
        /**
         * Fetch all invalidated caches
         */
        $invalidated = Mage::app()
            ->getCacheInstance()
            ->getInvalidatedTypes();

        /**
         * Loop them
         */
        foreach ($invalidated as $invalid) {
            /**
             * Refresh the cache
             */
            Mage::app()
                ->getCacheInstance()
                ->cleanType($invalid->getData('id'));
        }
    }
}