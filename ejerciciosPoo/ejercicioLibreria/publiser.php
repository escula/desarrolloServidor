<?php

    class Publiser{
        private $id;
        private $name;
        private $address;
        private $telephone;
        private $website;
        
        function __construct($id,$name,$address,$telephone,$website)
        {
            $this->id=$id;
            $this->name=$name;
            $this->address=$address;
            $this->telephone=$telephone;
            $this->website=$website;
            
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of website
         */
        public function getWebsite()
        {
                return $this->website;
        }

        /**
         * Set the value of website
         */
        public function setWebsite($website): self
        {
                $this->website = $website;

                return $this;
        }

        /**
         * Get the value of telephone
         */ 
        public function getTelephone()
        {
                return $this->telephone;
        }

        /**
         * Set the value of telephone
         *
         * @return  self
         */ 
        public function setTelephone($telephone)
        {
                $this->telephone = $telephone;

                return $this;
        }

        /**
         * Get the value of address
         */ 
        public function getAddress()
        {
                return $this->address;
        }

        /**
         * Set the value of address
         *
         * @return  self
         */ 
        public function setAddress($address)
        {
                $this->address = $address;

                return $this;
        }
    }
?>