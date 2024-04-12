<?php

namespace WIFI\PHP3\DataBanking;

class Validate 
{   
    private $errors = array();

    public function is_formular_filled(string $value, string $error_name): bool 
    {
        if (empty($value)) {
            $this->errors[] = $error_name . " is empty.";
            return false;
        } 
        return true;
    }

    public function is_errors(): bool 
    {   
        // Alternative(shorter) writeing.
        // return !empty($this->errors);
    
        // Easy(longer) writeing.
        if (empty($this->errors)) {
            return false;
        }
        return true;
    }

    public function error_html(): string 
    {   
        // if (empty($this->errors)){
        if (!$this->is_errors()){
            return "";
        }

        $ret = "<ul>";
        foreach ($this->errors as $error) {
            $ret .= "<li>" . $error . "</li>";
        }
        $ret .= "</ul>";
        return $ret;
    }

    public function error_entry(string $error): void
    {
        $this->errors[] = $error;
    }
}