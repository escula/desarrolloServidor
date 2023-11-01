<?php
    include 'readingMaterial.php';

    class Book extends RedigingMaterial{
        private $chapter;
        private $authors;
        function __construct()
        {
            parent::__construct();
            
        }

        /**
         * Get the value of authors
         */ 
        public function getAuthors()
        {
                return $this->authors;
        }

        /**
         * Set the value of authors
         *
         * @return  self
         */ 
        public function setAuthors($authors)
        {
                $this->authors = $authors;

                return $this;
        }

        /**
         * Get the value of chapter
         */ 
        public function getChapter()
        {
                return $this->chapter;
        }

        /**
         * Set the value of chapter
         *
         * @return  self
         */ 
        public function setChapter($chapter)
        {
                $this->chapter = $chapter;

                return $this;
        }
    }
?>