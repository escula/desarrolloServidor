<?php
    include 'readingMaterial.php';
    
    class Magazine extends RedigingMaterial{
        private $additionalResources;
        function __construct()
        {
            parent::__construct();
            
        }

        /**
         * Get the value of additionalResources
         */ 
        public function getAdditionalResources()
        {
                return $this->additionalResources;
        }

        /**
         * Set the value of additionalResources
         *
         * @return  self
         */ 
        public function setAdditionalResources($additionalResources)
        {
                $this->additionalResources = $additionalResources;

                return $this;
        }
    }
?>