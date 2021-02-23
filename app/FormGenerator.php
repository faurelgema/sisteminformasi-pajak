<?php

function getModel($table) {
    switch($table) {
        case 'kasun':
            return new Kasun();
        case 'pajak':
            return new Pajak();
        case 'penduduk':
            return new Penduduk();
        case 'wilayah':
            return new Wilayah();
        case 'blok':
            return new Blok();
        default:
            return null;
    }
}

function generateForm($schema, $showFields, $values = false) {    
    $form = "";        
    foreach($schema as $field => $rule) {
        $showField = isset($showFields[$field]) ? $showFields[$field] : '';
        $form .= generateFormComponent($field, $rule, $showField, $values);        
    }    
    echo $form;
}

function generateFormComponent($field, $rule, $showField, $values) {
    $input = "";
    if(stringContains($rule, ":text:") || stringContains($rule, "number")) {        
        $arr_rule = explode(":", $rule);
        $input_value = $values ? $values[$field] : "";
        $required = $arr_rule[0] === "required" ? "required" : "";
        $maxlength = $arr_rule[2];
        $type = $arr_rule[1];
        $input .= "<div class='form-group'>";
        $input .= "<label>$showField</label>";
        $input .= "<input type='$type' name='$field' class='form-control' value='$input_value' maxlength='$maxlength' />";
        $input .= "</div>";
    } else if(stringContains($rule, "date")) {        
        $arr_rule = explode(":", $rule);
        $input_value = $values ? $values[$field] : "";
        $required = $arr_rule[0] === "required" ? "required" : "";        
        $type = $arr_rule[1];
        $input .= "<div class='form-group'>";
        $input .= "<label>$showField</label>";
        $input .= "<input type='$type' name='$field' class='form-control' value='$input_value'/>";
        $input .= "</div>";
    } else if(stringContains($rule, "textarea")) {        
        $arr_rule = explode(":", $rule);
        $input_value = $values ? $values[$field] : "";
        $required = $arr_rule[0] === "required" ? "required" : "";
        $maxlength = $arr_rule[2];
        $type = $arr_rule[1];
        $input .= "<div class='form-group'>";
        $input .= "<label>$showField</label>";
        $input .= "<textarea rows='5' name='$field' class='form-control' maxlength='$maxlength'>$input_value</textarea>";
        $input .= "</div>";
    }else if(stringContains($rule, 'auto')) {        
        $arr_rule = explode(":", $rule);
        $input_value = isset($values[$field]) ? $values[$field] : '';
        $input .= "<input type='hidden' name='$field' value='$input_value'/>";
    } else if(stringContains($rule, 'select')) {        
        $arr_rule = explode(":", $rule);
        $select = $arr_rule[2];
        $arr_select = explode("|", $select);
        $table = $arr_select[0];
        $id_relation = $arr_select[1];
        $name_relation = $arr_select[2];
        $model = getModel($table);
        $data = $model->getAllData();
        $input_value = isset($values[$field]) ? $values[$field] : '';
        
        $label = strtoupper($table);
        $input .= "<div class='form-group'>";
        $input .= "<label>$label</label>";
        $input .= "<select name='$field' class='form-control'>";
        while($row = $data->fetch_assoc()) {
            $value = $row[$id_relation];
            $name = $row[$name_relation];
            $selected = $input_value === $value ? 'selected' : '';
            $input .= "<option value='$value' $selected>$name</option>";
        }
        $input .= "</select>";
        $input .= "</div>";
    } else if(stringContains($rule, 'boolean')) {                
        $input_value = isset($values[$field]) ? $values[$field] : '';
        
        if($input_value) {
            $option1 = $input_value == 0 ? 'selected' : '';
            $option2 = $input_value == 1 ? 'selected' : '';
        } else {
            $option1 = '';
            $option2 = '';
        }

        $input .= "<div class='form-group'>";
        $input .= "<label>$showField</label>";
        $input .= "<select name='status_wajib_pajak_penduduk' class='form-control'>";        
        $input .= "<option value='0' $option1>TIDAK WAJIB</option>";
        $input .= "<option value='1' $option2>WAJIB</option>";
        $input .= "</select>";
        $input .= "</div>";
    }
    return $input;
}

?>