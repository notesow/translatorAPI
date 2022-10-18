<?php
namespace notesow\translatorAPI\Filters;

use notesow\translatorAPI\HttpClient;

class Filters {
    protected $filters = array();
    protected $categories = array();
    protected $category = null;
    protected $category_name = null;

    private function subArray($sub){
        if(!in_array($sub, $this->categories)){
            $this->categories[$sub] = array();
        }
    }
    public function onSub($sub){
        $this->subArray($sub);
        $this->category = $this->categories[$sub];
        $this->category_name = $sub;
        return $this;    
    }

    private function _addFilter($key, $value, $replace = false){
        if($replace == true){
            unset($this->filters[$this->category_name]);
            $this->filters[$key] = $value;       
        } else {
            if(!array_key_exists($key, $this->filters)){
                $this->filters[$key] = $value;      
            } 
        }
          
    }

    public function add_filter($key, $value, $replace = false){
        $backup_group = null;

        if(is_null($this->category)){
            $this->_addFilter($key, $value, $replace);    
        } else {
            if(!array_key_exists($key, $this->category)){
                $this->category[$key] = $value; 
                if(array_key_exists($this->category_name, $this->filters)){
                    $backup_group = $this->filters[$this->category_name];
                    foreach($backup_group as $bKey => $bValue){
                        $this->category[$bKey] = $bValue;      
                    }
                }   
                $this->_addFilter($this->category_name, $this->category, true);        
            }
        }
        $this->clean_filter_category();
    }

    public function replace_filter($key, $value){
        $this->add_filter($key, $value, true);  
    }

    private function clean_filter_category(){
        $this->category = null;
        $this->category_name = null;
    }

    public function getFilters(){
        return $this->filters;
    }
}