<?php

namespace WIFI\PHP3\DataBanking;

class Validate 
{   
    private $errors = array();

    public function is_formular_filled(string $value, string $error_name): bool 
    {
        if (empty($value)) {
            $this->errors[] = $error_name . " must be filled.";
            return false;
        } 
        return true;
    }

    public function is_licenceplate(string $value, string $error_name): bool 
    {   // "i" in preg_match is for case sensitive
        // Nach irgendeinem Zeichen im Kennword suchen, das NICHT A-Z, 0-9, oder Binderstricht ist.
        if (preg_match("/[^A-Z0-9\-]/i", $value)) 
        {
            $this->errors[] = $error_name . " was not filled correct. (Only Letters,Numbers and '-' allowed)";
            return false;
        }
        // Auf korrekte Länge prufen.
        if(strlen($value) > 8 || strlen($value) < 3)
        {
            $this->errors[] = $error_name . " must be between 3 and 8 spaces long.";
            return false;
        }
        return true;
    }

    public function is_year(string $value, string $error_name): bool
    {
        // if (preg_match("/[^0-9]/", $value))
        if (!is_numeric($value) || strlen($value) != 4) // but it can be a float
        { 
            $this->errors[] = $error_name . " was not filled correct. (Only Numbers allowed)";
            return false;
        }
        // if(strlen($value) != 4)
        if($value > date("Y") || $value < 1890)
        {
            $this->errors[] = $error_name . " must be between 1890 and " . date("Y");
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